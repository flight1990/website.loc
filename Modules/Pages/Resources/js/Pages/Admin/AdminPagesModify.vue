<template>
    <h1>{{ page ? 'Редактировать' : 'Создать новую' }} страницу</h1>

    <form>
        <div>
            <label for="title">Название</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div>
            <label for="content">Содержимое</label>
            <TinyEditor id="content" v-model="form.content" />
            <small>{{ form.errors.content }}</small>
        </div>

        <div>
            <label for="meta_keywords">SEO ключевые слова</label>
            <input type="text" id="meta_keywords" v-model="form.meta_keywords">
            <small>{{ form.errors.meta_keywords}}</small>
        </div>

        <div>
            <label for="meta_description">SEO описание</label>
            <input type="text" id="meta_description" v-model="form.meta_description">
            <small>{{ form.errors.meta_description }}</small>
        </div>

        <div>
            <label for="is_active">Статус ({{ form.is_active ? 'Активна' : 'Не активна' }})</label>
            <input type="checkbox" id="is_active" v-model="form.is_active">
            <small>{{ form.errors.is_active }}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="submitHandler">{{ page ? 'Обновить' : 'Сохранить' }}</button>

        <inertia-link href="/admin/pages">Вернуться назад</inertia-link>

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


