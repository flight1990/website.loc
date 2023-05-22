<template>
    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">{{ page ? 'Редактировать' : 'Создать новую' }} страницу</h1>
        <inertia-link href="/admin/pages" class="soft-button-gray">
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
            <label for="title" class="block text-sm font-medium mb-2">Содержимое</label>
            <TinyEditor id="content" v-model="form.content" />
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.content }}</p>
        </div>

        <div>
            <label for="meta_keywords" class="block text-sm font-medium mb-2">SEO ключевые слова</label>
            <input type="text" id="meta_keywords" v-model="form.meta_keywords" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.meta_keywords }}</p>
        </div>

        <div>
            <label for="meta_description" class="block text-sm font-medium mb-2">SEO описание</label>
            <input type="text" id="meta_description" v-model="form.meta_description" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.meta_description }}</p>
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="is_active" v-model="form.is_active" class="relative shrink-0 w-[3.25rem] h-7 bg-gray-200 checked:bg-none checked:bg-primary-600 checked:hover:bg-primary-700 checked:focus:bg-primary-700 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-primary-600 focus:ring-primary-600 ring-offset-white focus:outline-none appearance-none before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-primary-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200">
            <label for="is_active" class="text-sm font-medium ml-3 select-none">Статус ({{ form.is_active ? 'Активна' : 'Не активна' }})</label>
        </div>

        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="submitHandler">{{ page ? 'Обновить' : 'Сохранить' }}</button>

    </form>
</template>

<script>
import {useForm} from "@inertiajs/vue3";
import TinyEditor from "@/Share/Admin/TinyEditor.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "AdminPagesModify",
    layout: AdminLayout,
    components: {
        TinyEditor
    },
    props: {
        page: Object
    },
    data() {
        return {
            form: useForm({
                title: this.page ? this.page.title : '',
                content: this.page ? this.page.content : '',
                is_active: this.page ? this.page.is_active : true,
                meta_keywords: this.page ? this.page.meta_keywords : '',
                meta_description: this.page ? this.page.meta_description : '',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/pages');
        },
        update() {
            this.form.patch(`/admin/pages/${this.page.id}`);
        },
        submitHandler() {
            this.page ? this.update() : this.create()
        }
    }
}
</script>


