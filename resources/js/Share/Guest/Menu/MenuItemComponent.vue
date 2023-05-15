<template>
    <li v-for="item in menu">

        <template v-if="item.url !== ''">
            <inertia-link :href="item.url" v-if="checkIsInternalURL(item.url)" :class="{'active' : item.is_active}">
                {{ item.title }}
            </inertia-link>

            <a :href="item.url" target="_blank" v-else>
                {{ item.title }}
            </a>
        </template>

        <template v-else>
            <span>{{ item.title }}</span>
        </template>

        <ul v-if="item.children.length">
            <MenuItemComponent :menu="item.children"/>
        </ul>
    </li>
</template>

<script>
import {checkIsInternalURL} from "@/helpers";
export default {
    name: "MenuItemComponent",
    props: {
        menu: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        checkIsInternalURL(url) {
            return checkIsInternalURL(url);
        }
    }
}
</script>

<style scoped>
.active {
    color: red;
}
</style>
