<template>
    <div class="bg-gray-100 mb-4 py-2 px-6 rounded-xl border flex items-center justify-between">

        <div class="flex items-center gap-6">
            <div class="cursor-move text-gray-400 active:text-primary-500">
                <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 5v14"></path>
                    <path d="M17 19V5"></path>
                    <path d="m21 15-4 4-4-4"></path>
                    <path d="m3 9 4-4 4 4"></path>
                </svg>
            </div>
            <div>
                <div class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full mr-2" :class="[menuItem.is_active ? 'bg-green-500' : 'bg-rose-500']"></div>
                    <h4 class="font-medium">{{ menuItem.title }}</h4>
                </div>
                <div>
                    <span>URL:</span>
                    <span class="ml-2 text-gray-500">{{ menuItem.url }}</span>
                </div>
            </div>
        </div>


        <div class="flex items-center gap-2">
            <inertia-link :href="`/admin/menus/${menuItem.id}/edit`" class="soft-icon-button-amber-sm">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
            </inertia-link>
            <inertia-link :href="`/admin/menus/${menuItem.id}`" as="button" method="delete" :preserveState="false" class="soft-icon-button-rose-sm">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 6h18"></path>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                </svg>
            </inertia-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MenuItem",
        props: {
            menuItem: {
                type: Object,
                required: true
            }
        }
    }
</script>
