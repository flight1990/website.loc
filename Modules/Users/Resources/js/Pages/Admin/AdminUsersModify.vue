<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">{{ user ? 'Редактировать' : 'Создать нового' }} пользователя</h1>
        <inertia-link href="/admin/users" class="soft-button-gray">
            <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9h11a4 4 0 1 1 0 8h-1"></path>
                <path d="M9 13 5 9l4-4"></path>
            </svg>
            Вернуться назад
        </inertia-link>
    </div>

    <form class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium mb-2">Имя</label>
            <input type="text" id="name" v-model="form.name" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.name }}</p>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium mb-2">Электронный адрес</label>
            <input type="email" id="email" v-model="form.email" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.email }}</p>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-2">Пароль</label>
            <input type="password" id="password" v-model="form.password" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.password }}</p>
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium mb-2">Подтверждение пароля</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
            <p class="text-sm text-rose-500 mb-2">{{ form.errors.password_confirmation }}</p>
        </div>

        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="submitHandler">{{ user ? 'Обновить' : 'Сохранить' }}</button>

    </form>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "AdminUsersModify",
    layout: AdminLayout,
    props: {
        user: Object,
    },
    data() {
        return {
            form: useForm({
                name: this.user ? this.user.name : '',
                email: this.user ? this.user.email : '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/users');
        },
        update() {
            this.form.patch(`/admin/users/${this.user.id}`);
        },
        submitHandler() {
            this.user ? this.update() : this.create()
        }
    }
}
</script>
