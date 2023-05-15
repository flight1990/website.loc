<template>
    <div class="card">
        <div style="display: flex; align-content: center; justify-content: space-between;">
            <div>
                <div>{{ menuItem.is_active ? 'Активна' : 'Не активна' }}</div>
                <div>{{ menuItem.title }}</div>
                <div>{{ menuItem.url }}</div>
            </div>
            <div>
                <inertia-link :href="`/admin/menus/${menuItem.id}/edit`">
                    Редактировать
                </inertia-link>
                <inertia-link :href="`/admin/menus/${menuItem.id}`" as="button" method="delete" :preserveState="false" >
                    Удалить
                </inertia-link>
            </div>
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

<style scoped>
    .card {
        border:1px solid gray; margin: 5px; padding: 5px; cursor: move; user-select: none;
    }
</style>
