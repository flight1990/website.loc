<template>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" ><!--         data-hs-accordion-always-open-->
        <ul class="space-y-1.5">
            <MenuItemComponent :menu="$page.props.menu.data"/>
        </ul>
    </nav>


    <!--    <nav>-->
    <!--        <ul>-->
    <!--            <MenuItemComponent :menu="$page.props.menu.data"/>-->
    <!--        </ul>-->

    <!--        <ul v-if="!$page.props.authUser">-->
    <!--            <li>-->
    <!--                <inertia-link href="/login">Авторизация</inertia-link>-->
    <!--            </li>-->
    <!--            <li>-->
    <!--                <inertia-link href="/register">Регистрация</inertia-link>-->
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
