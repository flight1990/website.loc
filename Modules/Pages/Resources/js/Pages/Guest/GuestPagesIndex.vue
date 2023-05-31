<template>
    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="relative p-6 md:p-16">

            <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
                <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">

                    <div class="flex flex-col items-center gap-10">
                        <img class="w-full" src="/public/sun_dolina.svg" alt="">
                        <p class="text-center italic text-gray-600">
                            <span class="font-bold">ТУТ НАПИСАТЬ ТЕКСТ </span>
                            Наша агроусадьба находится на берегу живописного и
                            так далее ipsum dolor sit amet, consectetur adipisicing elit. Delectus fugiat, possimus.
                            Aliquid, consequatur deleniti eligendi est facere illo incidunt labore laudantium maxime
                            non, officiis omnis perferendis ullam! Blanditiis veniam, voluptate?</p>
                        <div class="flex items-center justify-center gap-2">
                            <a :href="`tel:${$page.props.site_settings.phone}`"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                                Забронировать
                            </a>
                            <a href="#contact"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-primary-100 border border-transparent font-semibold text-primary-500 hover:text-white hover:bg-primary-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                                Контакты
                            </a>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-6">
                    <div class="relative">
                        <img class="shadow-xl shadow-gray-200 rounded-xl w-full aspect-square object-cover" src="/public/main.jpg" alt="Image Description">

                        <!-- SVG Element -->
                        <div class="hidden absolute top-0 right-0 translate-x-20 -translate-y-10 md:block">
                            <svg class="w-16 h-auto text-primary-500" width="121" height="135" viewBox="0 0 121 135"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                      stroke-width="10" stroke-linecap="round"/>
                                <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                                      stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                                <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                      stroke-width="10" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <!-- End SVG Element -->
                    </div>
                </div>
            </div>

            <!-- Background Color -->
            <div class="absolute inset-0 grid grid-cols-12 w-full h-full">
                <div
                    class="col-span-full lg:col-span-7 lg:col-start-6 bg-gray-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full"></div>
            </div>
            <!-- End Background Color -->
        </div>
    </div>




    <div v-if="promos?.length">
        <PromoComponent v-for="promo in promos" :key="promo.id" :promo="promo"/>
    </div>

    <div v-if="albums?.length">

        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid md:grid-cols-5 gap-10">
                <div class="md:col-span-2">
                    <div class="md:max-w-sm">
                        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Галерея</h2>
                        <p class="mt-4 text-gray-600 italic"><span class="font-bold">ТУТ НАПИСАТЬ ТЕКСТ </span>Мы рады поделиться с Вами лучшими моментами проведенными на на нашей усадьбе</p>
                        <div class="mt-8">
                            <inertia-link href="/gallery" class="py-3 px-4 gap-2 rounded-md bg-primary-100 border border-transparent font-semibold text-primary-500 hover:text-white hover:bg-primary-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                                Все альбомы
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-3">
                    <div class="grid sm:grid-cols-2 gap-10">
                        <AlbumComponent v-for="album in albums" :key="album.id" :album="album"/>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div v-if="faqs.length">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid md:grid-cols-5 gap-10">
                <div class="md:col-span-2">
                    <div class="md:max-w-sm">
                        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Часто задаваемые вопросы</h2>
                        <p class="mt-4 text-gray-600 italic"><span class="font-bold">ТУТ НАПИСАТЬ ТЕКСТ </span>Тут мы постараемся ответить на самые часто задаваемые вопросы о нашей усадьбе и что-то напишем еще</p>
                    </div>
                </div>
                <div class="md:col-span-3">
                    <!-- Accordion -->
                    <div class="hs-accordion-group divide-y divide-gray-200">
                        <FaqComponent v-for="faq in faqs" :key="faq.id" :faq="faq"/>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>

    <div v-if="reviews?.length">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="md:grid md:grid-cols-5 gap-10">
                <div class="md:col-span-2">
                    <div class="md:max-w-sm">
                        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Отзывы</h2>
                        <p class="mt-4 text-gray-600 italic"><span class="font-bold">ТУТ НАПИСАТЬ ТЕКСТ </span>Мы собрали ваши мнения о нашей усадьбе ведь нам очень важно что вы думаете. Поделитесь мнением или впечатлениями о нашей усадбе.</p>
                        <div class="mt-8">
                            <button type="button" class="py-3 px-4 gap-2 rounded-md bg-primary-100 border border-transparent font-semibold text-primary-500 hover:text-white hover:bg-primary-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm" data-hs-overlay="#review-modal">
                                Оставить отзыв
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-10 md:mt-0 md:col-span-3">
                    <swiper :pagination="{clickable: true}" :modules="modules" :spaceBetween="30" :autoHeight="true" class="mySwiper">
                        <swiper-slide v-for="review in reviews" class="p-8 bg-gray-100 rounded-2xl">
                            <ReviewComponent :key="review.id" :review="review"/>
                        </swiper-slide>
                    </swiper>

                </div>
            </div>
        </div>
    </div>

    <ReviewFormComponent/>

</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";

import AlbumComponent from "../../../../../Gallery/Resources/js/Components/Guest/AlbumComponent.vue";
import FaqComponent from "../../../../../FAQ/Resources/js/Components/Guest/FaqComponent.vue";
import ReviewComponent from "../../../../../Reviews/Resources/js/Components/Guest/ReviewComponent.vue";
import ReviewFormComponent from "../../../../../Reviews/Resources/js/Components/Guest/ReviewFormComponent.vue";
import PromoComponent from "../../../../../Promos/Resources/js/Components/Guest/PromoComponent.vue";

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
import { Pagination } from 'swiper';


export default {
    name: "GuestPagesIndex",
    components: {PromoComponent, FaqComponent, ReviewComponent, ReviewFormComponent, AlbumComponent, Swiper, SwiperSlide,},
    layout: GuestLayout,
    setup() {
        return {
            modules: [Pagination],
        };
    },
    props: {
        promos: {
            type: Array,
            required: false,
            default: () => []
        },
        faqs: {
            type: Array,
            required: false,
            default: () => []
        },
        reviews: {
            type: Array,
            required: false,
            default: () => []
        },
        albums: {
            type: Array,
            required: false,
            default: () => []
        },
    },
}
</script>
