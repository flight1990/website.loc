<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">{{ album ? 'Редактировать' : 'Создать новый' }} альбом</h1>
        <inertia-link href="/admin/gallery" class="soft-button-gray">
            <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9h11a4 4 0 1 1 0 8h-1"></path>
                <path d="M9 13 5 9l4-4"></path>
            </svg>
            Вернуться назад
        </inertia-link>
    </div>

    <form class="space-y-6">

        <div>
            <label for="title" class="block text-sm font-medium mb-2">Название</label>
            <input type="text" id="title" v-model="form.title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.title }}</p>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium mb-2">Описание</label>
            <textarea id="description" rows="5" v-model="form.description" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.description }}</p>
        </div>

        <div class="">
            <label for="photos" class="block text-sm font-medium mb-2">Добавить фотографии</label>
            <input type="file" @input="form.photos = $event.target.files" multiple  accept="image/png, image/jpeg, image/jpg" class="w-full bg-white border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:!border-primary-500 focus:ring-primary-500 file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 pr-2 focus:outline-0" />
            <p class="text-sm text-gray-500 mb-2">Максимум 10 файлов в формате .jpeg .jpg .png за один раз.</p>
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.photos }}</p>
        </div>

<!--        <div>-->
<!--            <label for="photos">Добавить фотографии</label>-->
<!--            <input type="file" @input="form.photos = $event.target.files" multiple  accept="image/png, image/jpeg, image/jpg" />-->

<!--            <small>Максимум 4</small>-->

<!--            <small>{{ form.errors.photos }}</small>-->

<!--            <progress v-if="form.progress" :value="form.progress.percentage" max="100">-->
<!--                {{ form.progress.percentage }}%-->
<!--            </progress>-->

<!--        </div>-->

        <div v-if="album?.photos.length" class="gap-8 columns-1 sm:columns-2 md:columns-3 lg:columns-4">
            <div v-for="photo in album.photos" :key="photo.id" class="relative">
                <img :src="photo.img.thumbnail" class="w-full h-auto mb-8 rounded-xl" alt="">
                <div class="absolute inset-0 flex justify-end transition">
                    <inertia-link
                        method="delete"
                        as="button"
                        preserve-state
                        preserve-scroll
                        :href="`/admin/gallery/photos/${photo.id}`"
                        class="mr-2 mt-2 inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.875rem] w-[2.875rem] rounded-md border border-transparent font-semibold bg-rose-500 text-white hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 transition-all text-sm">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <path d="M10 11v6"></path>
                            <path d="M14 11v6"></path>
                        </svg>
                    </inertia-link>
                </div>
            </div>
        </div>

        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="submitHandler">{{ album ? 'Обновить' : 'Сохранить' }}</button>

    </form>

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
    }
}
</script>
