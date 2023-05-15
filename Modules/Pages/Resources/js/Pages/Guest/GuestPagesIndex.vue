<template>
    <h1>Главная</h1>

    <div v-if="promos.length" id="content">
        <div v-for="promo in promos" :key="promo.id">

            <PromoComponent
                :promo="promo"
            />

        </div>
    </div>

</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import PromoComponent from "../../Components/Guest/PromoComponent.vue";

export default {
    name: "GuestPagesIndex",
    components: {PromoComponent},
    layout: GuestLayout,
    props: {
        promos: {
            type: Array,
            required: false,
            default: () => []
        }
    },
}
</script>
