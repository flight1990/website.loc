<template>
    <h1>Управление галереей</h1>

    <form>

        <div>
            <label for="images">Фотографии</label>
            <input
                type="file"
                id="images"
                multiple
                accept="image/png, image/jpg, image/jpeg"
                @input="form.images = $event.target.files"
            >

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>

        </div>

        <button
            v-if="form.images.length"
            :disabled="form.processing"
            @click.prevent="upload"
        >
            Загрузить фотографии
        </button>
    </form>

    <div v-if="images.length">
        <div v-for="image in images" :key="image.id">
            <img :src="image.img.original" alt="" style="width: 200px;">

            <inertia-link
                :href="`/admin/gallery/${image.id}`"
                as="button"
                method="delete"
                preserve-scroll
            >
                Удалить
            </inertia-link>

        </div>
    </div>


</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";
import {zoomImages} from "@/helpers";

export default {
    name: "AdminGalleryIndex",
    layout: AdminLayout,
    props: {
        images: {
            type: Array,
            required: false,
            default: () => []
        }
    },
    data() {
        return {
            form: useForm({
                images: []
            })
        }
    },
    methods: {
        upload() {
            this.form.post('/admin/gallery', {preserveState: false});
        }
    },
    mounted() {
        zoomImages();
    }
}
</script>
