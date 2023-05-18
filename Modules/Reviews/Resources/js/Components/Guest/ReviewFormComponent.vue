<template>

    <h1>Оставить отзыв</h1>

    <form>
        <div>
            <label for="title">Заголовок</label>
            <input type="text" id="title" v-model="form.title">
            <small>{{ form.errors.title }}</small>
        </div>

        <div>
            <label for="content">Отзыв</label>
            <SimpleTinyEditor id="content" v-model="form.content" />
            <small>{{ form.errors.content }}</small>
        </div>

        <div>
            <label for="client">Ф.И.О</label>
            <input type="text" id="client" v-model="form.client">
            <small>{{ form.errors.client}}</small>
        </div>

        <button :disabled="form.processing" @click.prevent="create">Отправить</button>

    </form>
</template>

<script>
import {useForm} from "@inertiajs/vue3";
import SimpleTinyEditor from "@/Share/Admin/SimpleTinyEditor.vue";

export default {
    name: "ReviewFormComponent",
    components: {SimpleTinyEditor},
    data() {
        return {
            form: useForm({
                title: this.review ? this.review.title : '',
                content: this.review ? this.review.content : '',
                client: this.review ? this.review.client : '',
            })
        }
    },
    methods: {
        create() {
            this.form.post('/reviews', {preserveScroll: true});
        },
    }
}
</script>
