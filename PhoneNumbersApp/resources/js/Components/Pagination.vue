<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex justify-center mt-4">
        <Link
            :is="link.url ? 'link' : 'span'"
            v-for="link in links "
            :href="link.url"
            v-html="link.label"
            class="p-0.5 xs:p-1 sm:p-1.5 md:p-2 md text-gray-300"
            :class="{ 'text-gray-400': ! link.url, 'text-orange-400' : link.active }"
        />

    </div>
</template>

<script>
export default {
    props: {
        links: Array
    }
}
</script>
