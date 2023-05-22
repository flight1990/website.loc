<template>
    <div>

        <img :src="JSON.parse(album.cover).thumbnail" :alt="album.title">

        <h3>{{ album.title }}</h3>
        <div>{{ album.description }}</div>
        <small>{{ album.updated_at }}</small>

        <inertia-link :href="`/gallery/${album.slug}`">
            Просмотр
        </inertia-link>

    </div>
</template>

<script>
export default {
    name: "AlbumComponent",
    props: {
        album: {
            type: Object,
            required: true
        }
    }
}
</script>
