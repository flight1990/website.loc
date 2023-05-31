<template>

    <div class="md:grid md:grid-cols-2 gap-10 py-10">
        <div class="col-span-1">
            <div class="flex flex-col gap-4">
                <img class="max-h-32 w-full" src="/public/sun_dolina.svg" :alt="$page.props.app_name">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl font-semibold text-left text-gray-800">Адрес:</h3>
                    <p class="italic text-gray-500 md:max-w-sm">{{ $page.props.site_settings.address }}</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl font-semibold text-left text-gray-800">Контакты:</h3>
                    <a class="italic text-gray-500 hover:text-primary-500" :href="`tel:${$page.props.site_settings.phone}`">{{ $page.props.site_settings.phone }}</a>
                    <a class="italic text-gray-500 hover:text-primary-500" :href="`mailto:${$page.props.site_settings.email}`">{{ $page.props.site_settings.email }}</a>
                </div>
                <div class="flex items-center gap-2">
                    <a :href="$page.props.site_settings.inst" target="_blank" v-if="$page.props.site_settings.inst"
                       class="py-2.5 px-2.5 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-gray-600 hover:text-primary-500 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                        <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.375 3.25a4.388 4.388 0 0 1 4.375 4.375v8.75a4.388 4.388 0 0 1-4.375 4.375h-8.75a4.389 4.389 0 0 1-4.375-4.375v-8.75A4.388 4.388 0 0 1 7.625 3.25h8.75Zm0-1.75h-8.75C4.256 1.5 1.5 4.256 1.5 7.625v8.75c0 3.369 2.756 6.125 6.125 6.125h8.75c3.369 0 6.125-2.756 6.125-6.125v-8.75c0-3.369-2.756-6.125-6.125-6.125Z"></path>
                            <path d="M17.688 7.625a1.313 1.313 0 1 1 0-2.625 1.313 1.313 0 0 1 0 2.625Z"></path>
                            <path d="M12 8.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm0-1.75a5.25 5.25 0 1 0 0 10.5 5.25 5.25 0 0 0 0-10.5Z"></path>
                        </svg>
                    </a>
                    <a :href="`${$page.props.site_settings.tik-tok}`" target="_blank" v-if="$page.props.site_settings.tik-tok"
                       class="py-2.5 px-2.5 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-gray-600 hover:text-primary-500 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                        <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.321 5.562a5.124 5.124 0 0 1-.443-.258 6.229 6.229 0 0 1-1.137-.966c-.849-.971-1.166-1.956-1.282-2.645h.004c-.097-.573-.057-.943-.05-.943h-3.865v14.943c0 .2 0 .399-.008.595 0 .024-.003.046-.004.073 0 .01 0 .022-.003.033v.009a3.28 3.28 0 0 1-1.65 2.604 3.226 3.226 0 0 1-1.6.422c-1.8 0-3.26-1.468-3.26-3.281 0-1.814 1.46-3.282 3.26-3.282.341 0 .68.054 1.004.16l.005-3.936a7.178 7.178 0 0 0-5.532 1.62 7.583 7.583 0 0 0-1.655 2.04c-.163.281-.779 1.412-.853 3.246-.047 1.04.266 2.12.415 2.565v.01c.093.262.457 1.158 1.049 1.913a7.855 7.855 0 0 0 1.674 1.58v-.01l.009.01c1.87 1.27 3.945 1.187 3.945 1.187.359-.015 1.562 0 2.928-.647 1.515-.718 2.377-1.787 2.377-1.787a7.43 7.43 0 0 0 1.296-2.153c.35-.92.466-2.022.466-2.462V8.273c.047.028.672.441.672.441s.9.577 2.303.952c1.006.267 2.363.324 2.363.324V6.153c-.475.052-1.44-.098-2.429-.59Z"></path>
                        </svg>
                    </a>
                    <a :href="`${$page.props.site_settings.vk}`" target="_blank" v-if="$page.props.site_settings.vk"
                       class="py-2.5 px-2.5 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-gray-600 hover:text-primary-500 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                        <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M22.72 6.188c.167-.53 0-.914-.738-.914h-2.455c-.619 0-.905.337-1.072.697 0 0-1.263 3.075-3.026 5.069-.572.576-.834.768-1.144.768-.167 0-.381-.192-.381-.72V6.163c0-.625-.19-.913-.715-.913h-3.86c-.382 0-.62.288-.62.577 0 .6.881.744.976 2.426v3.653c0 .793-.14.938-.453.938-.833 0-2.859-3.1-4.074-6.63-.236-.7-.476-.964-1.096-.964H1.584c-.715 0-.834.336-.834.697 0 .648.834 3.915 3.884 8.239 2.026 2.953 4.909 4.54 7.506 4.54 1.573 0 1.764-.36 1.764-.96V15.53c0-.72.143-.84.643-.84.357 0 1.001.191 2.455 1.609 1.667 1.681 1.953 2.45 2.883 2.45h2.454c.715 0 1.049-.36.858-1.057-.214-.697-1.025-1.705-2.073-2.906-.572-.673-1.43-1.417-1.692-1.778-.357-.48-.262-.672 0-1.105-.024 0 2.979-4.276 3.288-5.718" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a :href="`${$page.props.site_settings.fb}`" target="_blank" v-if="$page.props.site_settings.fb"
                       class="py-2.5 px-2.5 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-gray-600 hover:text-primary-500 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm">
                        <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M22.5 12.063c0-5.799-4.702-10.5-10.5-10.5s-10.5 4.7-10.5 10.5c0 5.24 3.84 9.584 8.86 10.373v-7.337H7.692v-3.037h2.666V9.75c0-2.63 1.568-4.085 3.966-4.085 1.15 0 2.351.205 2.351.205v2.584h-1.324c-1.304 0-1.712.81-1.712 1.64v1.97h2.912l-.465 3.036H13.64v7.337c5.02-.788 8.859-5.131 8.859-10.373Z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-1 mt-10 md:mt-0">
            <iframe class="w-full h-96 rounded-2xl"
                    :src="`https://yandex.ru/map-widget/v1/?z=17&l=map&text=${$page.props.site_settings.address}`">
            </iframe>
        </div>
    </div>
    <div class="flex items-center justify-between border-t py-4">
        <span class="text-sm text-gray-500">© Долина счастья, 2023</span>
        <span class="text-sm text-gray-500">УНП 12345678</span>
    </div>


<!--    <div>-->
<!--        Footer Here...-->

<!--        <ul>-->
<!--            <li>Телефон: {{ $page.props.site_settings.phone }}</li>-->
<!--            <li>Email: {{ $page.props.site_settings.email }}</li>-->
<!--            <li>Адрес: {{ $page.props.site_settings.address }}</li>-->
<!--        </ul>-->

<!--    </div>-->
</template>

<script>
export default {
    name: "FooterComponent"
}
</script>
