<template>

    <div class="min-h-screen bg-gray-50">
        <!-- ========== HEADER ========== -->
        <div
            class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:pl-64">
            <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">

                <div class="lg:hidden mr-5">
                    <button type="button" class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs" data-hs-overlay="#application-sidebar"
                            aria-controls="application-sidebar" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <svg class="h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12h18"></path>
                            <path d="M3 6h18"></path>
                            <path d="M3 18h18"></path>
                        </svg>
                    </button>
                </div>

                <div class="mr-5 lg:mr-0 lg:hidden">
                    <inertia-link class="flex-none text-xl font-semibold whitespace-nowrap" href="/admin" aria-label="Brand">
                        {{ $page.props.app_name }}
                    </inertia-link>
                </div>

                <div class="w-full flex items-center justify-end ml-auto sm:gap-x-3 sm:order-3">
                    <div class="flex flex-row items-center justify-end gap-2">

                        <inertia-link href="/" class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs" title="Вернуться к сайту">
                            <svg class="h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.75 9.938V21a.75.75 0 0 0 .75.75H9v-6.375a1.125 1.125 0 0 1 1.125-1.125h3.75A1.125 1.125 0 0 1 15 15.375v6.375h4.5a.75.75 0 0 0 .75-.75V9.937"></path>
                                <path d="m22.5 12-9.99-9.563c-.234-.248-.782-.25-1.02 0L1.5 11.999"></path>
                                <path d="M18.75 8.39V3H16.5v3.234"></path>
                            </svg>
                        </inertia-link>

                        <AuthUser />

                    </div>
                </div>
            </nav>
        </div>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->

        <!-- Sidebar -->
        <div id="application-sidebar"
             class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-64 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0">
            <div class="px-6">
                <inertia-link class="flex-none text-xl font-semibold" href="/admin" aria-label="Brand">
                    {{ $page.props.app_name }}
                </inertia-link>
            </div>

            <MenuComponent/>

        </div>
        <!-- End Sidebar -->

        <!-- Content -->
        <div class="w-full py-6 px-4 sm:px-6 md:px-8 lg:pl-72">
            <!-- Page Heading -->
            <main>
                <slot></slot>
            </main>
            <!-- End Page Heading -->

        </div>
        <!-- End Content -->
        <!-- ========== END MAIN CONTENT ========== -->
    </div>

</template>

<script>

import MenuComponent from "@/Share/Admin/Menu/MenuComponent.vue";
import AuthUser from "@/Share/Common/AuthUser.vue";

export default {
    name: "AdminLayout",
    components: {
        AuthUser,
        MenuComponent
    }
}
</script>
