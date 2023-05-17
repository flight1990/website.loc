<template>
    <h1>Главная</h1>

    <div v-if="promos?.length">

        <PromoComponent
            v-for="promo in promos" :key="promo.id"
            :promo="promo"
        />

    </div>

    <div v-if="albums?.length">

        <h1>Галлерея</h1>

        <AlbumComponent
            v-for="album in albums" :key="album.id"
            :album="album"
        />

    </div>

    <div v-if="faqs.length">

        <h1>FAQ</h1>

        <FaqComponent
            v-for="faq in faqs" :key="faq.id"
            :faq="faq"
        />

    </div>

    <div v-if="reviews?.length">

        <h1>Отзывы</h1>

        <ReviewComponent
            v-for="review in reviews" :key="review.id"
            :review="review"
        />

    </div>

    <ReviewFormComponent/>

</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";

import AlbumComponent from "../../../../../Gallery/Resources/js/Components/Guest/AlbumComponent.vue";
import FaqComponent from "../../../../../FAQ/Resources/js/Components/Guest/FaqComponent.vue";
import ReviewComponent from "../../../../../Reviews/Resources/js/Components/Guest/ReviewComponent.vue";
import ReviewFormComponent from "../../../../../Reviews/Resources/js/Components/Guest/ReviewFormComponent.vue";
import PromoComponent from "../../../../../Promos/Resources/js/Components/Guest/PromoComponent.vue";

export default {
    name: "GuestPagesIndex",
    components: {PromoComponent, FaqComponent, ReviewComponent, ReviewFormComponent, AlbumComponent},
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
        },
        albums: {
            type: Array,
            required: false,
            default: () => []
        },
    },
}
</script>
