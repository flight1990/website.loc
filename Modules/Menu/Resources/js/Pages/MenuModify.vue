<template>
    <h1>{{ menuItem ? 'Редактировать' : 'Создать' }} пункт меню</h1>

    <form>

        <div>
            <label for="parent_id">Родитель</label>
            <select id="parent_id" v-model="form.parent_id">
                <option value="">Корень</option>
                <template v-if="!menuItem || menuItem.children_count === 0">
                    <option :value="parent.id" v-for="parent in parents">{{ parent.title }}</option>
                </template>
            </select>
        </div>

        <div>
            <label for="title">Название</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" id="url" v-model="form.url">
            <small>{{ form.errors.url }}</small>
        </div>

        <div>
            <label for="is_active">Статус ({{ form.is_active ? 'Активна' : 'Не активна' }})</label>
            <input type="checkbox" id="is_active" v-model="form.is_active">
            <small>{{ form.errors.is_active }}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="submitHandler">{{ menuItem ? 'Обновить' : 'Сохранить' }}</button>

        <inertia-link href="/admin/menus">Вернуться к списку</inertia-link>
    </form>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "MenuModify",
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
