<template>
    <div class="flex m-10">
        <draggable
            class="dragArea"
            tag="ul"
            :list="menu"
            animation="100"
            :group="{name: `group_${level}`, pull: false}"
            @sort="sort"
        >

            <li v-for="item in menu" :key="item.id">

                <MenuItem
                    :menu-item="item"
                />

                <NestedDraggable
                    :level="level + 1"
                    :menu="item.children"
                    @sort="sort"
                    :allow-children="false"
                />
            </li>
        </draggable>
    </div>
</template>
<script>
import {defineComponent} from 'vue';
import {VueDraggableNext} from 'vue-draggable-next';
import MenuItem from "./MenuItem.vue";

export default defineComponent({
    name: "NestedDraggable",
    components: {
        draggable: VueDraggableNext,
        MenuItem
    },
    emits: ['sort'],
    props: {
        level: {
            type: Number,
            default: 1,
        },
        menu: {
            type: Array,
            required: true,
            default: () => []
        }
    },
    data() {
        return {
            enabled: true,
            dragging: false,
        }
    },
    methods: {
        sort() {
            let index = 1;

            this.menu.forEach(function (item) {
                item.sort = index++;
            })

            this.$emit('sort');
        },
    },
})
</script>

<style scoped>
li {
    list-style: none;
}

.dragArea {

}
</style>
