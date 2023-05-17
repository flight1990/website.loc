<template>
    <h1>{{ album.title }}</h1>
    <div>{{ album.description }}</div>

    <div v-if="album.photos?.length">
        <img :src="photo.img" alt="" v-for="photo in album.photos" :key="photo.id">
    </div>

    <inertia-link href="/gallery">
        Все альбомы
    </inertia-link>

</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    name: "GuestGalleryShow",
    layout: GuestLayout,
    props: {
        album: {
            type: Object,
            required: true
        }
    }
}
</script>

