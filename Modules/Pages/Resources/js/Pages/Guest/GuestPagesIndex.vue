<template>
    <h1>Главная</h1>

    <div v-if="promos.length">

        <PromoComponent
            v-for="promo in promos" :key="promo.id"
            :promo="promo"
        />

    </div>

    <div v-if="faqs.length">

        <h1>FAQ</h1>

        <FaqComponent
            v-for="faq in faqs" :key="faq.id"
            :faq="faq"
        />

    </div>

    <h1>Отзывы</h1>

    <div v-if="reviews.length">

        <ReviewComponent
            v-for="review in reviews" :key="review.id"
            :review="review"
        />

    </div>

    <ReviewFormComponent />


</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import PromoComponent from "../../Components/Guest/PromoComponent.vue";
import FaqComponent from "../../Components/Guest/FaqComponent.vue";
import ReviewComponent from "../../Components/Guest/ReviewComponent.vue";
import ReviewFormComponent from "../../Components/Guest/ReviewFormComponent.vue";

export default {
    name: "GuestPagesIndex",
    components: {PromoComponent, FaqComponent, ReviewComponent, ReviewFormComponent},
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
        },
        reviews: {
            type: Array,
            required: false,
            default: () => []
        }
    },
}
</script>
