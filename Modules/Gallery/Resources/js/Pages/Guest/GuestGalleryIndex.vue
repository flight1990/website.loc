<template>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight mb-8">Галерея</h2>
        <div v-if="albums.length" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <AlbumComponent
                v-for="album in albums"
                :key="album.id"
                :album="album"
            />

        </div>
        <div v-else>
            В настоящее время доступных альбомов нет.
        </div>
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
