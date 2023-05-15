<template>
    <div v-if="$page.props.authUser">
        <p>
            <b>{{ $page.props.authUser.name }}</b>
        </p>
        <p>
            <small>{{ $page.props.authUser.email }}</small>
        </p>

        <inertia-link href="/logout" method="post" as="button">Выход</inertia-link>
    </div>
</template>

<script>
export default {
    name: "AuthUser"
}
</script>
