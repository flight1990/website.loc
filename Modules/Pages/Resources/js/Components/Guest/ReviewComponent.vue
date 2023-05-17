<template>
    <div class="review">
        <h3>{{ review.title }}</h3>
        <div v-html="review.content"></div>
        <small>{{ review.client }}</small>
    </div>
</template>

<script>

import {replaceHtmlLinksToInertiaLinks} from "@/helpers";

export default {
    name: "FaqComponent",
    props: {
        review: {
            type: Object,
            required: true
        }
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('.review')
    }
}
</script>
