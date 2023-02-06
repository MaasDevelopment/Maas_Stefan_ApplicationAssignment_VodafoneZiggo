<template>
    <div class="py-9 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-xl text-center">
                <h2 class="text-3xl font-semibold leading-8 tracking-tight text-gray-100">CSV Phone number Optimizer</h2>

                <div>
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="sm:col-span-6 mt-8 sm:mt-16">
                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div class="space-y-1 text-center cursor-pointer">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" stroke="currentColor" fill="none" viewBox="0 0 30 30" aria-hidden="true">
                                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <div class="mx-auto ml-20 text-base text-gray-300">
                                        <input @input="form.csv = $event.target.files[0]" name="csv" id="csv" type="file" accept=".csv" class="text-md text-grey-500
                                        file:mr-2 file:py-1 file:px-2 file:rounded-md
                                        file:text-md file:font-bold
                                        file:bg-transparent file:text-[#cc4517]
                                        file:border file:border-solid file:border-[#cc4517]
                                        hover:file:border-[#e19731] hover:file:cursor-pointer hover:file:text-[#e19731]
                                      " />
                                    </div>
                                    <div class="mt-2 pl-1 text-base text-gray-300">or drag and drop</div>
                                </div>
                            </div>

                            <div class="flex justify-center mt-4" v-if="form.progress">
                                <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-[#e19731]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </div>

                            <div v-if="$page.props.errors.csv" class="mt-6 rounded-md border border-solid border-red-600 p-2">
                                <div class="flex justify-center">
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-600">{{ $page.props.errors.csv }}</h3>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" :disabled="form.processing" class="mt-6 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-[#cc4517] to-[#e19731] px-4 py-2 text-base font-bold text-white shadow-sm hover:text-black hover:scale-110 transition ease-in-out delay-110 duration-200">
                                <p id="buttonText">Upload file</p>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <p class="mt-10 text-lg leading-8 text-gray-300">Upload your .CSV file to optimize/normalize phone numbers and number blocks. After processing your optimised dataset will be displayed below.</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    csv: '',
})

const props = defineProps({ errors: Object })

function submit() {
    form.post('/upload')
}

</script>
