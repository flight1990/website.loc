<template>
    <inertia-link class="group relative flex flex-col w-full min-h-[15rem] bg-center bg-cover rounded-xl hover:shadow-lg transition " :href="`/gallery/${album.slug}`">
        <div class="absolute inset-0 w-full h-full">
            <img class="w-full h-full object-cover rounded-xl" :src="JSON.parse(album.cover).thumbnail" :alt="album.title">
            <div class="w-full h-full -translate-y-full bg-black/20 rounded-xl"></div>
        </div>
        <div class="relative flex-auto p-4 md:p-6">
            <h3 class="text-xl text-white/[.9] group-hover:text-white">{{ album.title }}</h3>
        </div>
        <div class="relative pt-0 p-4 md:p-6">
            <div class="inline-flex items-center gap-2 text-sm font-medium text-white group-hover:text-white/[.7]">
                Смотреть
                <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </inertia-link>
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
