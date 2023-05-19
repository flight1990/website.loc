<template>

    <AuthUser />

    <MenuComponent />

    <main>
        <slot></slot>
    </main>

    <FooterComponent />

</template>

<script>
import MenuComponent from "@/Share/Guest/Menu/MenuComponent.vue";
import AuthUser from "@/Share/Common/AuthUser.vue";
import FooterComponent from "@/Share/Guest/FooterComponent.vue";
export default {
    name: "GuestLayout",
    components: {
        FooterComponent,
        AuthUser,
        MenuComponent
    }
}
</script>
