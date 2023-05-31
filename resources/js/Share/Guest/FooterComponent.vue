<template>

    <div class="md:grid md:grid-cols-2 gap-10 py-10">
        <div class="col-span-1">
            <div class="flex flex-col gap-4">
                <img class="max-h-32 w-full" src="/public/sun_dolina.svg" alt="">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl font-semibold text-left text-gray-800">Адрес:</h3>
                    <p class="italic text-gray-500 md:max-w-sm">{{ $page.props.site_settings.address }}</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl font-semibold text-left text-gray-800">Контакты:</h3>
                    <a class="italic text-gray-500" :href="`tel:${$page.props.site_settings.phone}`">{{ $page.props.site_settings.phone }}</a>
                    <a class="italic text-gray-500" :href="`mailto:${$page.props.site_settings.email}`">{{ $page.props.site_settings.email }}</a>
                </div>
            </div>
        </div>
        <div class="col-span-1 mt-10 md:mt-0">
            <iframe class="w-full h-96 rounded-2xl"
                    src="https://yandex.ru/map-widget/v1/?z=17&l=skl&text=улица Беняконцы, 39, агрогородок Бенякони, Вороновский район, Гродненская область">
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
