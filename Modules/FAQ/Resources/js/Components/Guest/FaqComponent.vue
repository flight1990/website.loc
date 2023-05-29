<template>
    <div class="hs-accordion pt-6 pb-3" id="heading-{{ faq.id }}">
        <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500" aria-controls="collapse-{{ faq.id }}">
            {{ faq.question }}
            <svg class="hs-accordion-active:hidden block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <svg class="hs-accordion-active:block hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
        <div id="collapse-{{ faq.id }}" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="heading-{{ faq.id }}">
            <div v-html="faq.answer"></div>
        </div>
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
