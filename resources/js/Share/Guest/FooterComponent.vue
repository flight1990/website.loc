<template>
    <div>
        Footer Here...

        <ul>
            <li>Телефон: {{ $page.props.site_settings.phone }}</li>
            <li>Email: {{ $page.props.site_settings.email }}</li>
            <li>Адрес: {{ $page.props.site_settings.address }}</li>
        </ul>

    </div>
</template>

<script>
export default {
    name: "FooterComponent"
}
</script>
