<template>
    <div v-if="$page.props.numbers.data[0]" class="mt-8">
        <div class="mt-6 mx-6 sm:mx-24 lg:mx-64">
            <div class="mt-8 pl-8 pr-4 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto ">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-md">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#373737]">
                                    <tr>
                                        <th scope="col" class="pl-6 sm:pl-12 pr-3 py-3.5 text-left text-sm font-semibold text-gray-100">Phone number/block</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-100">Raw input</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-neutral-400" v-for="number in $page.props.numbers.data" >
                                    <tr>
                                        <td class="whitespace-nowrap pl-6 sm:pl-12 pr-3 py-4 text-sm font-medium text-gray-900">{{ number['formatted'] }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">{{ number['rawInput'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <pagination :links="$page.props.numbers.links"/>
        </div>
    </div>
</template>

<script>

import Pagination from "@/Components/Pagination.vue";

export default {
    components: {Pagination},
    props: {
        numbers: Object,
    }
}

</script>
