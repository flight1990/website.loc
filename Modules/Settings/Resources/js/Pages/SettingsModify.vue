<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">Настройки сайта</h1>
    </div>

    <form class="space-y-6">

        <div v-for="(setting, index) in form.settings" :key="setting.key">
            <label :for="setting.key" class="block text-sm font-medium mb-2">{{ setting.name }}</label>
            <input type="text" :id="setting.key" v-model="form.settings[index].value" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500">
        </div>

        <button class="solid-button-primary disabled:bg-gray-500" :disabled="form.processing" @click.prevent="update">Сохранить</button>

    </form>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "SettingsModify",
    layout: AdminLayout,
    props: {
        settings: Array,
        required: true
    },
    data() {
        return {
            form: useForm({
                settings: this.settings
            })
        }
    },
    methods: {
        update() {
            this.form.patch('/admin/settings/update');
        }
    }
}
</script>
