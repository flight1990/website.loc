<template>
    <div class="h-screen">
        <div class="bg-gray-100 flex h-full items-center py-16">
            <div class="w-full max-w-md mx-auto p-6">
                <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <div class="p-4 sm:p-7">
                        <div class="text-center">
                            <h1 class="block text-2xl font-bold text-gray-800">Авторизация</h1>
                            <p class="mt-2 text-sm text-gray-600">
                                Для управления сайтом Вам необходимо авторизоваться.
                            </p>
                        </div>

                        <div class="mt-5">

                            <!-- Form -->
                            <form>
                                <div class="grid gap-y-4">

                                    <!-- Form Group -->
                                    <div>
                                        <label for="email" class="block text-sm mb-2">Электронная почта</label>
                                        <div class="relative">
                                            <input type="email" id="email" v-model="form.email" required
                                                   class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
                                        </div>
                                        <p class="text-xs text-red-600 mt-2" id="email-error">{{ form.errors.email }}</p>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <label for="password" class="block text-sm mb-2">Пароль</label>
<!--                                            <a class="text-sm text-primary-600 decoration-2 hover:underline font-medium" href="#">Forgot password?</a>-->
                                        </div>
                                        <div class="relative">
                                            <input type="password" id="password" v-model="form.password" required
                                                   class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
                                        </div>
                                        <p class="text-xs text-red-600 mt-2" id="password-error">{{ form.errors.password }}</p>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Checkbox -->
<!--                                    <div class="flex items-center">-->
<!--                                        <div class="flex">-->
<!--                                            <input id="remember-me" name="remember-me" type="checkbox"-->
<!--                                                   class="shrink-0 mt-0.5 border-gray-200 rounded text-primary-600 pointer-events-none focus:ring-primary-500">-->
<!--                                        </div>-->
<!--                                        <div class="ml-3">-->
<!--                                            <label for="remember-me" class="text-sm">Remember me</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <!-- End Checkbox -->

                                    <button :disabled="form.processing" @click.prevent="login"
                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all">
                                        Вход
                                    </button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "Login",
    data() {
        return {
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
