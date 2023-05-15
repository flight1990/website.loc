<template>
    <h1>Авторизация</h1>

    <form>
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

        <button :disabled="form.processing" @click.prevent="login">Вход</button>

        <inertia-link href="/register">Регистрация</inertia-link>

    </form>

</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "Login",
    data() {
        return  {
            form: useForm({
                email: '',
                password: ''
            })
        }
    },
    methods: {
        login() {
            this.form.post('/login');
        }
    }
}
</script>
