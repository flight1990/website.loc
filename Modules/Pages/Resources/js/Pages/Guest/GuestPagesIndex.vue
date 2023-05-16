<template>
    <h1>Главная</h1>

    <div v-if="promos.length">
        <div v-for="promo in promos" :key="promo.id">

            <PromoComponent
                :promo="promo"
            />

        </div>
    </div>

    <div v-if="faqs.length">

        <h2>FAQ</h2>

        <div v-for="faq in faqs" :key="faq.id">

            <FaqComponent
                :faq="faq"
            />

        </div>
    </div>

</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import PromoComponent from "../../Components/Guest/PromoComponent.vue";
import FaqComponent from "../../Components/Guest/FaqComponent.vue";

export default {
    name: "GuestPagesIndex",
    components: {PromoComponent, FaqComponent},
    layout: GuestLayout,
    props: {
        promos: {
            type: Array,
            required: false,
            default: () => []
        },
        faqs: {
            type: Array,
            required: false,
            default: () => []
        }
    },
}
</script>
