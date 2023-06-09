<template>

    <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block">
            <MenuItemComponent :menu="$page.props.menu.data"/>
    </div>

<!--    <nav>-->
<!--        <ul>-->
<!--            <MenuItemComponent :menu="$page.props.menu.data"/>-->
<!--        </ul>-->

<!--        <ul v-if="!$page.props.authUser">-->
<!--            <li>-->
<!--                <inertia-link href="/login">Авторизация</inertia-link>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
</template>

<script>
import MenuItemComponent from "./MenuItemComponent.vue";

export default {
    name: "MenuComponent",
    components: {
        MenuItemComponent
    }
}
</script>
