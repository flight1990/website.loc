<template>
    <div class="flex flex-col gap-6">
        <h3 class="text-xl font-semibold text-left text-gray-800">{{ review.title }}</h3>
        <p class="text-gray-500 italic indent-8 hyphens-auto whitespace-pre-line" lang="ru">{{ review.content }}</p>
        <p class="text-gray-700 ml-auto">{{ review.client }}</p>
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
