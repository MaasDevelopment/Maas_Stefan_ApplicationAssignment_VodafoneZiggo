## VodafoneZiggo application Assignment
##
### Installation:
- Open project path in terminal
- Run `composer install`
- Run `npm install` and `npm run build`.
- create a new Mysql database, name it `"phonenumbers"`.
- configure your .env.
- Run `php artisan migrate`.
- To start the application run `php artisan serve`. And click on your localhost link.

### How to use:
- Select the `.csv` file with your phone numbers or drag one onto the input field.
- Click 'upload file'.
- Your .csv will be parsed into the 'phonenumbers' database and displayed on the same page.

### Packages used:
- Laravel inertia/vue
- LeagueCSV - To read .csv data. (https://csv.thephpleague.com/9.0/reader/)
- Libphonenumber-for-php - To properly parse/format phonenumbers. (https://github.com/giggsey/libphonenumber-for-php#online-demo)

##
#### By: Stefan Maas (stefanmaas@live.nl)
