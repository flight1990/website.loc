<template>
    <h1>{{ promo ? 'Редактировать' : 'Создать новый' }} промо</h1>

    <form>

        <div>
            <label for="title">Название</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div v-if="promo">
            <img :src="promo.img" alt="" width="250">
        </div>

        <div>
            <label for="file">Изображение</label>
            <input type="file" id="file" accept="image/png, image/jpg, image/jpeg" @input="form.file = $event.target.files[0]">
            <small>{{ form.errors.file }}</small>
        </div>

        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>

        <div>
            <label for="url">URL</label>
            <input type="text" id="url" v-model="form.url">
            <small>{{ form.errors.url }}</small>
        </div>

        <div>
            <label for="content">Содержимое</label>
            <SimpleTinyEditor id="content" v-model="form.content" />
            <small>{{ form.errors.content }}</small>
        </div>

        <div>
            <label for="is_active">Статус ({{ form.is_active ? 'Активен' : 'Не активен' }})</label>
            <input type="checkbox" id="is_active" v-model="form.is_active">
            <small>{{ form.errors.is_active }}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="submitHandler">{{ promo ? 'Обновить' : 'Сохранить' }}</button>

        <inertia-link href="/admin/promos">Вернуться к списку</inertia-link>
    </form>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";
import SimpleTinyEditor from "@/Share/Admin/SimpleTinyEditor.vue";
import {zoomImages} from "@/helpers";

export default {
    name: "AdminPromosModify",
    layout: AdminLayout,
    components: {
        SimpleTinyEditor
    },
    props: {
        promo: Object
    },
    data() {
        return {
            form: useForm({
                title: this.promo ? this.promo.title : '',
                url: this.promo ? this.promo.url : '',
                content: this.promo ? this.promo.content : '',
                is_active: this.promo ? this.promo.is_active : true,
                file: null,
                _method: this.promo ? 'patch' : 'post',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/promos');
        },
        update() {
            this.form.post(`/admin/promos/${this.promo.id}`);
        },
        submitHandler() {
            this.promo ? this.update() : this.create()
        }
    },
    mounted() {
        zoomImages();
    }
}
</script>
