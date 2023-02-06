<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import UploadFile from "@/Components/UploadFile.vue";
import Table from "@/Components/Table.vue";
</script>

<template>
    <Head title="Welcome" />

    <Application-logo />
    <Upload-file />

    <hr class="sm:mx-12 h-px my-8 bg-gray-400 border-0 ">

    <Table />

</template>
<script>
export default {
    props: {
        numbers: Object ,
    }
}
</script>
