<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">{{ promo ? 'Редактировать' : 'Создать новый' }} промо</h1>
        <inertia-link href="/admin/promos" class="soft-button-gray">
            <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9h11a4 4 0 1 1 0 8h-1"></path>
                <path d="M9 13 5 9l4-4"></path>
            </svg>
            Вернуться назад
        </inertia-link>
    </div>

    <form class="space-y-6">
        <div class="md:grid md:grid-cols-7 md:gap-10">

            <div class="md:col-span-5 space-y-6">

                <div>
                    <label for="title" class="block text-sm font-medium mb-2">Название</label>
                    <input type="text" id="title" v-model="form.title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
                    <p class="text-sm text-rose-500 mb-2">{{ form.errors.title }}</p>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium mb-2">Содержимое</label>
                    <textarea id="content" v-model="form.content" rows="5" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                    <p class="text-sm text-rose-500 mb-2">{{ form.errors.content }}</p>
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium mb-2">Ссылка для кнопки "Подробнее"</label>
                    <input type="text" id="url" v-model="form.url" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
                    <p class="text-sm text-rose-500 mb-2">{{ form.errors.url }}</p>
                </div>

                <div class="">
                    <label for="file" class="block text-sm font-medium mb-2">Изображение</label>
                    <input type="file" id="file" accept="image/png, image/jpg, image/jpeg" @input="form.file = $event.target.files[0]" class="w-full bg-white border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:!border-primary-500 focus:ring-primary-500 file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 pr-2 focus:outline-0">
                    <p class="text-sm text-rose-500 mb-2">{{ form.errors.file }}</p>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_active" v-model="form.is_active" class="relative shrink-0 w-[3.25rem] h-7 bg-gray-200 checked:bg-none checked:bg-primary-600 checked:hover:bg-primary-700 checked:focus:bg-primary-700 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-primary-600 focus:ring-primary-600 ring-offset-white focus:outline-none appearance-none before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-primary-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200">
                    <label for="is_active" class="text-sm font-medium ml-3 select-none">Статус ({{ form.is_active ? 'Активна' : 'Не активна' }})</label>
                </div>

            </div>



            <div class="md:col-span-2 mt-10 md:mt-0" v-if="promo">
                <div  class="relative">
                    <div class="absolute inset-0 w-full h-full bg-white/70 flex items-center justify-center" v-if="form.progress">
                        <div class="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-primary-600 rounded-full" role="status" aria-label="loading"></div>
                    </div>
                    <img :src="promo.img.original" alt="" class="w-full">
                </div>
            </div>



        </div>




        <div class="flex justify-between flex-wrap gap-10">
            <div class="flex-1">


            </div>

        </div>





        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="submitHandler">{{ promo ? 'Обновить' : 'Сохранить' }}</button>

    </form>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "AdminPromosModify",
    layout: AdminLayout,
    props: {
        promo: Object
    },
    data() {
        return {
            form: useForm({
                title: this.promo ? this.promo.title : '',
                url: this.promo ? this.promo.url : '',
                content: this.promo ? this.promo.content : '',
                is_active: this.promo ? this.promo.is_active : true,
                file: null,
                _method: this.promo ? 'patch' : 'post',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/promos');
        },
        update() {
            this.form.post(`/admin/promos/${this.promo.id}`);
        },
        submitHandler() {
            this.promo ? this.update() : this.create()
        }
    },
}
</script>
