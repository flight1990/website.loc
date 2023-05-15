<template>
    <div class="promo">
        <img :src="promo.img" alt="" style="width: 350px;" v-if="promo.img">

        <h3>{{ promo.title }}</h3>
        <div v-html="promo.content"></div>

        <a :href="promo.url" v-if="promo.url">Подробнее</a>
    </div>
</template>

<script>
import {replaceHtmlLinksToInertiaLinks} from "@/helpers";

export default {
    name: "PromoComponent",
    props: {
        promo: {
            type: Object,
            required: true
        }
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('.promo')
    }
}
</script>
