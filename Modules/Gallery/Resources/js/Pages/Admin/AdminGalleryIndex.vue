<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">Галлерея</h1>
        <inertia-link href="/admin/gallery/create" class="solid-button-primary">
            Создать альбом
        </inertia-link>
    </div>

    <div>
        <table id="table" class="display" style="width: 100%;" v-once>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Slug</th>
                <th>Описание</th>
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
    name: "AdminGalleryIndex",
    layout: AdminLayout,
    mounted() {
        $('#table').DataTable({
            serverSide: true,
            processing: true,
            ajax: "/admin/gallery",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'slug', name: 'slug'},
                {data: 'description', name: 'description'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ],
            scrollX: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Все'],
            ],
            language: {
                "emptyTable": "Данные отсутствуют",
                "infoEmpty": "",
                "info": "C _START_ по _END_ из _TOTAL_",
                "lengthMenu": " _MENU_",
                "search": "Поиск: ",
                "zeroRecords": "Совпадающих записей не найдено",
                'paginate': {
                    'previous': '❮',
                    'next': '❯'
                },
            },
            fnDrawCallback: function () {
                replaceHtmlLinksToInertiaLinks('#table');
            }
        });

    }
}
</script>
