<template>

    <AuthUser />

    <MenuComponent />

    <main>
        <slot></slot>
    </main>

</template>

<script>

import MenuComponent from "@/Share/Admin/Menu/MenuComponent.vue";
import AuthUser from "@/Share/Common/AuthUser.vue";
export default {
    name: "AdminLayout",
    components: {
        AuthUser,
        MenuComponent
    }
}
</script>
