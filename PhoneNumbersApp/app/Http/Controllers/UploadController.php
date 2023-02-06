<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Models\Number;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use libphonenumber\NumberParseException;

class UploadController extends Controller
{
    /**
     * Post function to parse and upload numbers into database.
     * @throws NumberParseException
     */
    public function uploadNumbers(UploadRequest $request): \Illuminate\Http\RedirectResponse
    {
        //for testing purposes only
        DB::table('numbers')->truncate();

        //use league\csv to read .csv file
        $csv = \League\Csv\Reader::createFromPath($request->file('csv')->getRealPath());

        //foreach row, parse and insert into database
        foreach ($csv as $record){

            //parse numbers
            $parsedNumber = $this->parseNumber($record[0]);

            if($parsedNumber == null)
                continue;

            //if number does not exist, insert into database
            if(DB::table('numbers')->where('rawInput', $parsedNumber->getRawInput())->exists())
                continue;

            if(strlen($parsedNumber->getRawInput()) > 9)
                continue;

            $formattedNumber = $this->formatNumber($parsedNumber);

            \App\Models\Number::create([
                'countryCode' => '+' . $parsedNumber->getCountryCode(),
                'number' => $parsedNumber->getNationalNumber(),
                'rawInput' => $parsedNumber->getRawInput(),
                'formatted' => $formattedNumber
            ]);
        }
        //Redirect back to welcome/last page
        return redirect()->back();
    }

    /**
     * Parse phone numbers into e.164 standard format.
     * @throws NumberParseException
     */
    private function parseNumber($number): ?\libphonenumber\PhoneNumber
    {
        $removedSymbols = preg_replace('/[^\dxX+]/', '', $number);
        $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        return $phoneNumberUtil->parse($removedSymbols, "NL", null, true );
    }

    private function formatNumber($parsedNumber): string
    {
        $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        $formatted = $phoneNumberUtil->format($parsedNumber, \libphonenumber\PhoneNumberFormat::E164);

        if(strlen($formatted) < 12)
            $formatted = str_pad($formatted, 12, "x");

        return $formatted;
    }

    public function index(): \Inertia\Response
    {
        $numbers = DB::table('numbers')->orderBy('formatted')->Paginate(20);

        return Inertia::render('Welcome', [
            'numbers' => $numbers,
        ]);
    }
}

