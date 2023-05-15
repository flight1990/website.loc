<template>
    <li v-for="item in menu">

            <inertia-link :href="item.url" :class="{'active' : item.is_active}" v-if="item.url !== null">
                {{ item.title }}
            </inertia-link>

            <span v-else>
                {{ item.title }}
            </span>

        <ul v-if="item.children.length">
            <MenuItemComponent :menu="item.children"/>
        </ul>
    </li>
</template>

<script>

export default {
    name: "MenuItemComponent",
    props: {
        menu: {
            type: Array,
            default: () => []
        }
    }
}
</script>

<style scoped>
.active {
    color: red;
}
</style>
