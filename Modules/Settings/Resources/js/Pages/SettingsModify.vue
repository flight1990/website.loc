<template>
    <h1>Настройки сайта</h1>

    <form>
        <div v-for="(setting, index) in form.settings" :key="setting.key">
            <label :for="setting.key">{{ setting.name }}</label>
            <input type="text" :id="setting.key" v-model="form.settings[index].value">
        </div>

        <button :disabled="form.processing" @click.prevent="update">Сохранить</button>

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
