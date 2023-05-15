<template>
    <h1>Управление промо-блоками</h1>

    <inertia-link href="/admin/promos/create">
        Создать новый промо-блок
    </inertia-link>

    <div>
        <table id="table" class="display" style="width: 100%;" v-once>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Cсылка</th>
                <th>Изображение</th>
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
import {replaceHtmlLinksToInertiaLinks, zoomImages} from "@/helpers";

export default {
    name: "AdminPromosIndex",
    layout: AdminLayout,
    mounted() {
        $(function () {
            $('#table').DataTable({
                serverSide: true,
                processing: true,
                ajax: "/admin/promos",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'url', name: 'url'},
                    {data: 'img', name: 'img', orderable: false, searchable: false},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false},
                ],
                fnDrawCallback: function () {
                    replaceHtmlLinksToInertiaLinks('#table');
                    zoomImages();
                }
            });
        });
    }
}
</script>
