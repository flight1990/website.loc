<template>

    <div class="bg-gray-50">
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
                    <inertia-link class="flex-none text-xl font-semibold whitespace-nowrap" href="/admin"
                                  aria-label="Brand">{{ $page.props.app_name }}
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
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
            <!-- Page Heading -->
            <!--        <header>-->
            <!--            <p class="mb-2 text-sm font-semibold text-blue-600">Starter Pages & Examples</p>-->
            <!--            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">Application Layout: Sidebar & Header using Tailwind CSS</h1>-->
            <!--            <p class="mt-2 text-lg text-gray-800">This is a simple application layout with sidebar and header examples using Tailwind CSS.</p>-->
            <!--            <div class="mt-5 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">-->
            <!--                <a class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4" href="https://github.com/htmlstreamofficial/preline/tree/main/examples/html" target="_blank">-->
            <!--                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
            <!--                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>-->
            <!--                    </svg>-->
            <!--                    Get the source code-->
            <!--                </a>-->
            <!--                <a class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-blue-500 hover:text-blue-700 focus:outline-none focus:ring-2 ring-offset-gray-50 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm py-3 px-4" href="../examples.html">-->
            <!--                    <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">-->
            <!--                        <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>-->
            <!--                    </svg>-->
            <!--                    Back to examples-->
            <!--                </a>-->
            <!--            </div>-->
            <!--        </header>-->
            <!-- End Page Heading -->

            <main>
                <slot></slot>
            </main>
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
