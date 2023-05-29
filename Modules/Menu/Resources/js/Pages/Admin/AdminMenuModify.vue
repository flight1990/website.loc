<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">{{ menuItem ? 'Редактировать' : 'Создать' }} пункт меню</h1>
        <inertia-link href="/admin/menus" class="soft-button-gray">
            <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9h11a4 4 0 1 1 0 8h-1"></path>
                <path d="M9 13 5 9l4-4"></path>
            </svg>
            Вернуться назад
        </inertia-link>
    </div>

    <form class="space-y-6">

        <div>
            <label for="parent_id" class="block text-sm font-medium mb-2">Родитель</label>
            <select id="parent_id" v-model="form.parent_id" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
                <option value="">Корень</option>
                <template v-if="!menuItem || menuItem.children_count === 0">
                    <option :value="parent.id" v-for="parent in parents">{{ parent.title }}</option>
                </template>
            </select>
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.title }}</p>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium mb-2">Название</label>
            <input type="text" id="title" v-model="form.title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.title }}</p>
        </div>

        <div>
            <label for="url" class="block text-sm font-medium mb-2">URL (Ссылка)</label>
            <input type="text" id="url" v-model="form.url" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.url }}</p>
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="is_active" v-model="form.is_active" class="relative shrink-0 w-[3.25rem] h-7 bg-gray-200 checked:bg-none checked:bg-primary-600 checked:hover:bg-primary-700 checked:focus:bg-primary-700 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-primary-600 focus:ring-primary-600 ring-offset-white focus:outline-none appearance-none before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-primary-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200">
            <label for="is_active" class="text-sm font-medium ml-3 select-none">Статус ({{ form.is_active ? 'Активна' : 'Не активна' }})</label>
        </div>

        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="submitHandler">{{ menuItem ? 'Обновить' : 'Сохранить' }}</button>

    </form>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "AdminMenuModify",
    layout: AdminLayout,
    props: {
        menuItem: Object,
        parents: Array
    },
    data() {
        return {
            form: useForm({
                title: this.menuItem ? this.menuItem.title : '',
                url: this.menuItem ? this.menuItem.url : '',
                parent_id: this.menuItem ? this.menuItem.parent_id === null ? '' : this.menuItem.parent_id : '',
                is_active: this.menuItem ? this.menuItem.is_active : true,
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/menus');
        },
        update() {
            this.form.patch(`/admin/menus/${this.menuItem.id}`);
        },
        submitHandler() {
            this.menuItem ? this.update() : this.create()
        }
    }
}
</script>
