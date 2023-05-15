<template>
    <h1>{{ page.title }}</h1>
    <div v-html="page.content" id="content"></div>

    <inertia-link href="/admin/pages">Вернуться назад</inertia-link>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {replaceHtmlLinksToInertiaLinks} from "@/helpers";

export default {
    name: "AdminPagesShow",
    layout: AdminLayout,
    props: {
        page: Object
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('#content');
    }
}
</script>
