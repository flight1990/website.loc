<template>
    <div class="h-screen">
        <div class="max-w-[50rem] flex flex-col mx-auto w-full h-full">
            <header class="mb-auto flex justify-center z-50 w-full py-4">
                <nav class="px-4 sm:px-6 lg:px-8" aria-label="Global">
                    <a class="flex-none" href="#" aria-label="Brand">
                        <img class="w-72" src="/public/sun_dolina.svg" :alt="$page.props.app_name">
                    </a>
                </nav>
            </header>

            <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                <h1 class="block text-7xl font-bold text-gray-800 sm:text-9xl">{{ title }}</h1>
                <h1 class="block text-2xl font-bold text-white"></h1>
                <p class="mt-3 text-gray-600">{{ description }}</p>
                <div class="mt-10 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                    <inertia-link
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-primary-600 hover:bg-primary-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4"
                        href="/">
                        На главную
                    </inertia-link>
                </div>
            </div>

            <footer class="mt-auto text-center py-5">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-gray-500">© {{ $page.props.app_name }}</p>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    name: "Error",
    props: {
        status: Number,
    },
    computed: {
        title() {
            return {
                503: '503',
                500: '500',
                404: '404',
                403: '403',
            }[this.status]
        },
        // title() {
        //     return {
        //         503: '503: Service Unavailable',
        //         500: '500: Server Error',
        //         404: '404: Page Not Found',
        //         403: '403: Forbidden',
        //     }[this.status]
        // },
        description() {
            return {
                503: 'Извините, мы проводим техническое обслуживание. Пожалуйста, зайдите в ближайшее время.',
                500: 'Ой, что-то пошло не так на наших серверах.',
                404: 'К сожалению, страница, которую вы ищете, не может быть найдена.',
                403: 'Извините, вам запрещен доступ к этой странице.',
            }[this.status]
        },
    },
}
</script>
