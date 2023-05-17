<template>
    <h1>Пользовтелями</h1>

    <inertia-link href="/admin/users/create">
        Создать нового пользователя
    </inertia-link>

    <div>
        <table id="table" class="display" style="width: 100%;" v-once>
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Email</th>
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
    name: "AdminUsersIndex",
    layout: AdminLayout,
    mounted() {
        $('#table').DataTable({
            serverSide: true,
            processing: true,
            ajax: "/admin/users",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ],
            fnDrawCallback: function () {
                replaceHtmlLinksToInertiaLinks('#table');
            }
        });
    }
}
</script>
