<template>

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] px-4 py-12 sm:px-6 lg:px-8 lg:pt-16 lg:pb-28 mx-auto">
            <!-- Gradients -->
            <div aria-hidden="true" class="flex absolute left-0 -z-[1]">
                <div class="bg-primary-200 opacity-20 blur-3xl w-[1036px] h-[300px]"></div>
            </div>
            <!-- End Gradients -->

            <div class="grid md:grid-cols-6 gap-8 md:gap-16 md:items-center">
                <div class="md:col-span-2">
                    <img class="rounded-xl" :src="promo.img.thumbnail" alt="{{ promo.title }}" v-if="promo.img">
                </div>

                <div class="md:col-span-4">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">
                            {{ promo.title }}
                        </h2>
                        <p class="text-gray-600 italic">{{ promo.content }}</p>
                        <div class="mt-4">
                            <inertia-link v-if="promo.url" :href="promo.url" class="py-3 px-4 gap-2 rounded-md bg-primary-100 border border-transparent font-semibold text-primary-500 hover:text-white hover:bg-primary-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                                Подробнее
                            </inertia-link>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="promo">-->

<!--        <img :src="promo.img.thumbnail" alt="" style="width: 350px;" v-if="promo.img">-->
<!--        <h1>{{ promo.title }}</h1>-->
<!--        <div v-html="promo.content"></div>-->

<!--        <a :href="promo.url" v-if="promo.url">Подробнее</a>-->
<!--    </div>-->
</template>

<script>
import {replaceHtmlLinksToInertiaLinks} from "@/helpers";

export default {
    name: "PromoComponent",
    props: {
        promo: {
            type: Object,
            required: true
        }
    },
    mounted() {
        replaceHtmlLinksToInertiaLinks('.promo')
    }
}
</script>
