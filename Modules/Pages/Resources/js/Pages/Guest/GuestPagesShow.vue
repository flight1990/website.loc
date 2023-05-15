<template>

    <inertia-head>
        <title>{{ page.title }}</title>
        <meta name="description" :content="page.meta_description">
        <meta name="keywords" :content="page.meta_keywords">
    </inertia-head>

    <h1>{{ page.title }}</h1>

    <div v-html="page.content" id="content"></div>
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
        zoomImages();
    }
}
</script>
