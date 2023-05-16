<template>
    <h1>{{ user ? 'Редактировать' : 'Создать нового' }} пользователя</h1>

    <form>

        <h3>Информация пользователя</h3>

        <div>
            <label for="name">ФИО</label>
            <input type="text" id="name" v-model="form.name">
            <small>{{ form.errors.name }}</small>
        </div>

        <div>
            <label for="email">Электронный адрес</label>
            <input type="text" id="email" v-model="form.email">
            <small>{{ form.errors.email }}</small>
        </div>

        <div>
            <label for="password">Пароль</label>
            <input type="password" id="password" v-model="form.password">
            <small>{{ form.errors.password }}</small>
        </div>

        <div>
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation">
            <small>{{ form.errors.password_confirmation }}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="submitHandler">
            {{ user ? 'Обновить' : 'Сохранить' }}
        </button>

        <inertia-link href="/admin/users">Вернуться к списку</inertia-link>
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
