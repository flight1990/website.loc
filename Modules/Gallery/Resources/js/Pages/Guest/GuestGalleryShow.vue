<template>
    <h1>{{ album.title }}</h1>
    <div>{{ album.description }}</div>

    <div v-if="album.photos?.length">
        <img :src="photo.img.original" alt="" v-for="photo in album.photos" :key="photo.id" style="width: 350px;">
    </div>

    <inertia-link href="/gallery">
        Все альбомы
    </inertia-link>

</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {zoomImages} from "@/helpers";

export default {
    name: "GuestGalleryShow",
    layout: GuestLayout,
    props: {
        album: {
            type: Object,
            required: true
        }
    },
    mounted() {
        zoomImages();
    }
}
</script>

