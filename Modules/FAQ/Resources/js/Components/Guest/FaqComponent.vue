<template>
    <div class="faq">
        <h3>{{ faq.question }}</h3>
        <div v-html="faq.answer"></div>
    </div>
</template>

<script>

import {replaceHtmlLinksToInertiaLinks} from "@/helpers";

export default {
    name: "FaqComponent",
    props: {
        faq: {
            type: Object,
            required: true
        }
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('.faq')
    }
}
</script>
