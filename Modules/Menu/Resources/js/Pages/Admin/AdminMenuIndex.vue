<template>
    <h1>Управление меню сайта</h1>

    <inertia-link href="/admin/menus/create">
        Создать пункт меню
    </inertia-link>

    <NestedDraggable
        @sort="rebuildTree"
        :menu="menus"
    />
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
