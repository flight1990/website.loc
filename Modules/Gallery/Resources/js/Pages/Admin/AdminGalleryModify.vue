<template>
    <h1>{{ album ? 'Редактировать' : 'Создать новый' }} альбом</h1>

    <form>
        <div>
            <label for="title">Название</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div>
            <label for="">Описание</label>
            <textarea id="description" cols="100" rows="10" v-model="form.description"></textarea>
            <small>{{ form.errors.description }}</small>
        </div>

        <div>
            <label for="photos">Добавить фотографии</label>
            <input type="file" @input="form.photos = $event.target.files" multiple  accept="image/png, image/jpeg, image/jpg" />

            <small>Максимум 4</small>

            <small>{{ form.errors.photos }}</small>

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>

        </div>

        <div v-if="album?.photos.length">
            <div v-for="photo in album.photos" :key="photo.id">

                <img :src="photo.img" alt="" style="width: 200px;">

                <inertia-link
                    method="delete"
                    as="button"
                    preserve-state
                    preserve-scroll
                    :href="`/admin/gallery/photos/${photo.id}`"
                >
                    Удалить фото
                </inertia-link>
            </div>
        </div>


        <button :disabled="form.processing" @click.prevent="submitHandler">
            {{ album ? 'Обновить' : 'Сохранить' }}
        </button>

    </form>

    <inertia-link href="/admin/gallery">
        Вернуться назад
    </inertia-link>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";
import {zoomImages} from "@/helpers";

export default {
    name: "AdminGalleryModify",
    layout: AdminLayout,
    props: {
        album: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            form: useForm({
                title: this.album ? this.album.title : '',
                description: this.album ? this.album.description : '',
                photos: [],
                _method: this.album ? 'patch' : 'post',
            })
        }
    },
    methods: {

        create() {
            this.form.post('/admin/gallery');
        },
        update() {
            this.form.post(`/admin/gallery/${this.album.id}`);
        },
        submitHandler() {
            this.album ? this.update() : this.create()
        }
    },
    mounted() {
        zoomImages();
    }
}
</script>
