<template>
    <ul class="flex flex-col gap-5 mt-5 lg:flex-row lg:items-center lg:justify-end lg:mt-0 lg:pl-5">
        <li v-for="item in menu">

            <div class="hs-dropdown [--strategy:static] lg:[--strategy:fixed] [--adaptive:none]"
                 v-if="item.children.length">
                <button id="hs-mega-menu-basic-dr" type="button"
                        class="flex items-center w-full text-gray-600 hover:text-gray-400 group font-medium">
                    <span>{{ item.title }}</span>
                    <svg class="ml-2 w-2.5 h-2.5 text-gray-600 group-hover:text-gray-400" width="16" height="16"
                         viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    </svg>
                </button>

                <div
                    class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] lg:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 lg:w-48 z-10 bg-white lg:shadow-md rounded-lg p-2 before:absolute top-full border before:-top-5 before:left-0 before:w-full before:h-5 hidden">

                    <template v-for="item in item.children">
                        <inertia-link v-if="checkIsInternalURL(item.url)"
                                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-primary-500"
                                      :href="item.url">
                            {{ item.title }}
                        </inertia-link>



                        <a :href="item.url" :target="item.url.includes('#') ? '_self' : '_blank'" v-else
                           class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-primary-500">
                            {{ item.title }}
                        </a>

                    </template>
                </div>
            </div>

            <template v-if="item.url !== '' && !item.children.length">

                <inertia-link class="font-medium text-gray-600 hover:text-gray-400" :href="item.url"
                              v-if="checkIsInternalURL(item.url)"
                              :class="{'text-primary-500 hover:text-primary-500' : item.is_active}">
                    {{ item.title }}
                </inertia-link>

                <a :href="item.url" :target="item.url.includes('#') ? '_self' : '_blank'" v-else class="font-medium text-gray-600 hover:text-gray-400">
                    {{ item.title }}
                </a>
            </template>
        </li>

    </ul>
</template>

<script>
import {checkIsInternalURL} from "@/helpers";

export default {
    name: "MenuItemComponent",
    props: {
        menu: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        checkIsInternalURL(url) {
            return checkIsInternalURL(url);
        }
    }
}
</script>
