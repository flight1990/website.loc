<template>
    <inertia-head>
        <title>{{ page.title }}</title>
        <meta name="description" :content="page.meta_description">
        <meta name="keywords" :content="page.meta_keywords">
    </inertia-head>

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight mb-4">{{ page.title }}</h2>
        <div v-html="page.content" id="content" class="prose"></div>
    </div>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {replaceHtmlLinksToInertiaLinks, wrapTables, zoomImages} from "@/helpers";


export default {
    name: "GuestPagesShow",
    layout: GuestLayout,
    props: {
        page: Object
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('#content');
        wrapTables('#content');
    }
}
</script>
