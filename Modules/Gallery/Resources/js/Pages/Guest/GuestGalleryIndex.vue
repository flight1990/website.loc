<template>
    <h1>Галлерея</h1>

    <div v-if="albums.length">

        <AlbumComponent
            v-for="album in albums"
            :key="album.id"
            :album="album"
        />

    </div>

</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AlbumComponent from "../../Components/Guest/AlbumComponent.vue";

export default {
    name: "GuestGalleryIndex",
    components: {AlbumComponent},
    layout: GuestLayout,
    props: {
        albums: {
            type: Array,
            required: false,
            default: () => []
        }
    }
}
</script>
