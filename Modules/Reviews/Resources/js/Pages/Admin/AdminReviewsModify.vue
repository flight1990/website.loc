<template>
    <h1>{{ review ? 'Редактировать' : 'Создать новый' }} отзыв</h1>

    <form>
        <div>
            <label for="title">Заголовок</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div>
            <label for="content">Отзыв</label>
            <TinyEditor id="content" v-model="form.content" />
            <small>{{ form.errors.content }}</small>
        </div>

        <div>
            <label for="client">Ф.И.О</label>
            <input type="text" id="client" v-model="form.client">
            <small>{{ form.errors.client}}</small>
        </div>

        <div>
            <label for="is_active">Статус ({{ form.is_active ? 'Активный' : 'Не активный' }})</label>
            <input type="checkbox" id="is_active" v-model="form.is_active">
            <small>{{ form.errors.is_active }}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="submitHandler">{{ review ? 'Обновить' : 'Сохранить' }}</button>

        <inertia-link href="/admin/reviews">Вернуться назад</inertia-link>

    </form>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";
import TinyEditor from "@/Share/Admin/TinyEditor.vue";
export default {
    name: "AdminReviewsModify",
    components: {TinyEditor},
    layout: AdminLayout,
    props: {
        review: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            form: useForm({
                title: this.review ? this.review.title : '',
                content: this.review ? this.review.content : '',
                is_active: this.review ? this.review.is_active : true,
                client: this.review ? this.review.client : '',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/reviews');
        },
        update() {
            this.form.patch(`/admin/reviews/${this.review.id}`);
        },
        submitHandler() {
            this.review ? this.update() : this.create()
        }
    }
}
</script>
