<template>
    <h1>Регистрация</h1>

    <div>
        <label for="name">Ф.И.О</label>
        <input type="text" id="name" v-model="form.name">
        <small>{{ form.errors.name }}</small>
    </div>

    <div>
        <label for="email">Электронная почта</label>
        <input type="text" id="email" v-model="form.email">
        <small>{{ form.errors.email }}</small>
    </div>

    <div>
        <label for="password">Пароль</label>
        <input type="password" id="password" v-model="form.password">
        <small>{{ form.errors.password }}</small>
    </div>

    <div>
        <label for="password_confirmation">Подтверждение Пароля</label>
        <input type="password" id="password_confirmation" v-model="form.password_confirmation">
        <small>{{ form.errors.password_confirmation }}</small>
    </div>

    <button :disabled="form.processing" @click.prevent="register">Регистрация</button>

    <inertia-link href="/login">Авторизация</inertia-link>

</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "Register",
    data() {
        return  {
            form: useForm({
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            })
        }
    },
    methods: {
        register() {
            this.form.post('/register');
        }
    }
}
</script>
