<template>

    <li v-for="item in menu" :class="{'hs-accordion' : item.children.length}" :id="item.id">

        <a v-if="item.children.length"  href="#"
           class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-primary-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-md hover:bg-gray-100">

            {{ item.title }}

            <svg class="hs-accordion-active:block ml-auto hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            <svg class="hs-accordion-active:hidden ml-auto block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
        </a>

        <div v-if="item.children.length" :id="item.id" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
            <ul class="pt-2 pl-2">
                <MenuItemComponent :menu="item.children"/>
            </ul>
        </div>

        <inertia-link v-else :href="item.url" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100" :class="{'bg-gray-100' : item.is_active}">
            {{ item.title }}
        </inertia-link>

    </li>


<!--    <li v-for="item in menu">-->

<!--        <inertia-link :href="item.url" :class="{'active' : item.is_active}" v-if="item.url !== null">-->
<!--            {{ item.title }}-->
<!--        </inertia-link>-->

<!--        <span v-else>-->
<!--                {{ item.title }}-->
<!--            </span>-->

<!--        <ul v-if="item.children.length">-->
<!--            <MenuItemComponent :menu="item.children"/>-->
<!--        </ul>-->
<!--    </li>-->


</template>

<script>

export default {
    name: "MenuItemComponent",
    props: {
        menu: {
            type: Array,
            default: () => []
        }
    }
}
</script>
