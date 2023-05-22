<template>
    <h1>{{ album.title }}</h1>
    <div>{{ album.description }}</div>

    <div v-if="album.photos?.length" id="images">
        <img
            v-for="(photo, index) in album.photos"
            :src="photo.img.thumbnail"
            :alt="`photo ${index + 1}`"
            :key="photo.id"
            style="width: 300px;"
        >
    </div>

    <inertia-link href="/gallery">
        Все альбомы
    </inertia-link>

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

