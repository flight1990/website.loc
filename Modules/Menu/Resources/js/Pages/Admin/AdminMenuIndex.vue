<template>

    <div class="flex items-center justify-between flex-wrap gap-6 mb-10">
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">Меню</h1>
        <inertia-link href="/admin/menus/create" class="solid-button-primary">
            Создать пункт меню
        </inertia-link>
    </div>
    <p class="italic text-gray-500 mb-6">Потяните пункт меню для изменения порядка.</p>
    <NestedDraggable @sort="rebuildTree" :menu="menus" />
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import NestedDraggable from "./infra/NestedDraggable.vue";
import {debounce} from "lodash";

export default {
    name: "AdminMenuIndex",
    layout: AdminLayout,
    components: {
        NestedDraggable
    },
    props: {
        menus: Array
    },
    methods: {
        rebuildTree: debounce(function (){

            let index = 1;

            this.menus.forEach(function (item) {
                item.sort = index++;
            })

            axios.post('/admin/menus/rebuild', {menu: this.menus})
                .catch(error => {})

        },  300)
    }
}
</script>
