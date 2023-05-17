<template>
    <h1>Отзывы</h1>

    <inertia-link href="/admin/reviews/create">
        Создать новый отзыв
    </inertia-link>

    <div>
        <table id="table" class="display" style="width: 100%;" v-once>
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Клиент</th>
                <th>Статус</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";
import {replaceHtmlLinksToInertiaLinks} from "@/helpers";
export default {
    name: "AdminReviewsIndex",
    layout: AdminLayout,
    mounted() {
        $('#table').DataTable({
            serverSide: true,
            processing: true,
            ajax: "/admin/reviews",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'client', name: 'slug'},
                {data: 'is_active', name: 'is_active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ],
            fnDrawCallback: function () {
                replaceHtmlLinksToInertiaLinks('#table');
            }
        });

    }
}
</script>
