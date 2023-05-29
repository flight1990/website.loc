<template>

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mb-8 max-w-3xl">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight mb-8">{{ album.title }}</h2>
            <p class="text-gray-600 italic">{{ album.description }}</p>
        </div>
        <div class="w-full gap-8 columns-1 sm:columns-2 md:columns-3 lg:columns-4" v-if="album.photos?.length" id="images">
            <img class="w-full h-auto mb-8 rounded-xl cursor-zoom-in"
                v-for="(photo, index) in album.photos"
                :src="photo.img.thumbnail"
                :alt="`photo ${index + 1}`"
                :key="photo.id"
            >
        </div>
        <div class="mt-16 flex justify-center">
            <inertia-link href="/gallery" class="py-3 px-4 gap-2 rounded-md bg-primary-100 border border-transparent font-semibold text-primary-500 hover:text-white hover:bg-primary-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                Все альбомы
            </inertia-link>
        </div>
    </div>





</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Viewer from 'viewerjs';
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
    methods: {
        showPhoto() {

        }
    },
    mounted() {
        $(function () {
            const gallery = new Viewer(document.getElementById('images'), {
                title: false,
                url: (image) => {
                    return image.src.replace('thumbnails', '');
                },
                toolbar: {
                    zoomIn: {show: 4, size: 'large'},
                    prev: {show: 4, size: 'large'},
                    next: {show: 4, size: 'large'},
                    zoomOut: {show: 4, size: 'large'},
                },
                zoomRatio: 0.5,
            });
        });
    }
}
</script>

