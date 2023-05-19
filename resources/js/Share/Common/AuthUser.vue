<template>
    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]" v-if="$page.props.authUser">
        <button id="hs-dropdown-with-header" type="button"
                class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs">
            <svg class="h-5" fill="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.592 3.027C14.68 2.042 13.406 1.5 12 1.5c-1.414 0-2.692.54-3.6 1.518-.918.99-1.365 2.334-1.26 3.786C7.348 9.67 9.528 12 12 12c2.472 0 4.648-2.33 4.86-5.195.106-1.439-.344-2.78-1.268-3.778Z"></path>
                <path
                    d="M20.25 22.5H3.75a1.454 1.454 0 0 1-1.134-.522 1.655 1.655 0 0 1-.337-1.364c.396-2.195 1.63-4.038 3.571-5.333C7.574 14.132 9.758 13.5 12 13.5c2.242 0 4.426.633 6.15 1.781 1.94 1.294 3.176 3.138 3.571 5.332.091.503-.032 1-.336 1.365a1.453 1.453 0 0 1-1.135.522Z"></path>
            </svg>
        </button>

        <div
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2"
            aria-labelledby="hs-dropdown-with-header">
            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg">
                <p class="text-sm font-medium text-gray-800">{{ $page.props.authUser.name }}</p>
                <p class="text-sm text-gray-500">{{ $page.props.authUser.email }}</p>
            </div>
            <div class="mt-2 py-2 first:pt-0 last:pb-0">

                <inertia-link href="/logout" method="post" as="button"
                              class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
                    <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"></path>
                        <path d="M21 12H7"></path>
                        <path d="m18 15 3-3-3-3"></path>
                    </svg>
                    Выход
                </inertia-link>

            </div>
        </div>

    </div>


    <!--    <div v-if="$page.props.authUser">-->
    <!--        <p>-->
    <!--            <b>{{ $page.props.authUser.name }}</b>-->
    <!--        </p>-->
    <!--        <p>-->
    <!--            <small>{{ $page.props.authUser.email }}</small>-->
    <!--        </p>-->

    <!--        <inertia-link href="/logout" method="post" as="button">Выход</inertia-link>-->
    <!--    </div>-->
</template>

<script>
export default {
    name: "AuthUser"
}
</script>
