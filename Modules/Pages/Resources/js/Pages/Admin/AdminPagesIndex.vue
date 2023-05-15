<template>
    <h1>Управление страницами</h1>

    <inertia-link href="/admin/pages/create">
        Создать новую страницу
    </inertia-link>

    <div>
        <table id="table" class="display" style="width: 100%;" v-once>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Slug</th>
                <th>Статус</th>
                <th>Создана</th>
                <th>Обновлена</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</template>

<script>

import {replaceHtmlLinksToInertiaLinks} from "@/helpers";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "AdminPagesIndex",
    layout: AdminLayout,
    mounted() {
            $('#table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "/admin/pages",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'slug', name: 'slug'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', orderable: false},
                ],
                fnDrawCallback: function () {
                    replaceHtmlLinksToInertiaLinks('#table');
                }
            });

    }
}
</script>
