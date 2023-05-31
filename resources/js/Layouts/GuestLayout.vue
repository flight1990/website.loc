<template>

<div class=" flex flex-col h-screen">

    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap lg:justify-start lg:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-4">
        <nav class="max-w-[85rem] w-full mx-auto px-4 lg:flex lg:items-center lg:justify-between lg:px-6 lg:px-8" aria-label="Global">
            <div class="flex items-center justify-between">
                <inertia-link class="flex-none " href="/" aria-label="Brand">
                    <img class="w-20" src="/public/sun_half.svg" :alt="$page.props.app_name">
                </inertia-link>
                <div class="lg:hidden">
                    <button type="button" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-600 transition-all text-sm" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16"></path>
                            <path d="M4 12h16"></path>
                            <path d="M4 18h16"></path>
                        </svg>
                        <svg class="hs-collapse-open:block hidden w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <MenuComponent />

        </nav>
    </header>
    <!-- ========== END HEADER ========== -->


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="shrink-0">
        <slot></slot>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="mt-auto bg-gray-100" id="contact">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <FooterComponent />
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->



</div>



<!--    <AuthUser />-->

<!--    <MenuComponent />-->

<!--    <main>-->
<!--        <slot></slot>-->
<!--    </main>-->

<!--    <FooterComponent />-->

</template>

<script>
import MenuComponent from "@/Share/Guest/Menu/MenuComponent.vue";
import AuthUser from "@/Share/Common/AuthUser.vue";
import FooterComponent from "@/Share/Guest/FooterComponent.vue";
export default {
    name: "GuestLayout",
    components: {
        FooterComponent,
        AuthUser,
        MenuComponent
    }
}
</script>
