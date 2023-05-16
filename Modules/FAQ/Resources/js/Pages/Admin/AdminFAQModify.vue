<template>
    <h1>{{ faq ? 'Редактировать' : 'Создать новый' }} FAQ</h1>

    <form>

        <div>
            <label for="question">Вопрос</label>
            <input type="text" id="question" v-model="form.question">
            <small>{{ form.errors.question }}</small>
        </div>

        <div>
            <label for="answer">Ответ</label>
            <simple-tiny-editor
                id="answer"
                v-model="form.answer"
            />
            <small>{{ form.errors.answer }}</small>
        </div>

        <div>
            <label for="is_active">Статус ({{ form.is_active ? 'Активен' : 'Не активен' }})</label>
            <input type="checkbox" id="is_active" v-model="form.is_active">
            <small>{{ form.errors.is_active }}</small>
        </div>

        <button
            :disabled="form.processing"
            @click.prevent="submitHandler"
        >
            {{ faq ? 'Обновить' : 'Сохранить' }}
        </button>
    </form>

    <inertia-link href="/admin/faq">
        Вернуться назад
    </inertia-link>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";
import SimpleTinyEditor from "@/Share/Admin/SimpleTinyEditor.vue";

export default {
    name: "AdminFAQModify",
    components: {SimpleTinyEditor},
    layout: AdminLayout,
    props: {
        faq: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            form: useForm({
                question: this.faq ? this.faq.question : '',
                answer: this.faq ? this.faq.answer : '',
                is_active: this.faq ? this.faq.is_active : true,
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/faq');
        },
        update() {
            this.form.patch(`/admin/faq/${this.faq.id}`);
        },
        submitHandler() {
            this.faq ? this.update() : this.create()
        }
    }
}
</script>
