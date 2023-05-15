<template>

    <AuthUser />

    <MenuComponent />

    <main>
        <slot></slot>
    </main>

</template>

<script>
import MenuComponent from "@/Share/Guest/Menu/MenuComponent.vue";
import AuthUser from "@/Share/Common/AuthUser.vue";
export default {
    name: "GuestLayout",
    components: {
        AuthUser,
        MenuComponent
    }
}
</script>
