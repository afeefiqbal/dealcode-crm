<script setup>
import { ref } from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import AsideBars from '@/Components/Sidebars.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Facebook, Instagram, Twitter} from "@/Components/Icons/index.js";
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);

const navigation = {

company: [
    {name: 'About', href: '#'},
    {name: 'Blog', href:'#'},
    {name: 'SAAS Agencies', href:'#'},
],
legal: [
    {name: 'Anti-Scam', href:'#'},
    {name: 'Privacy',  href:'#'},
    {name: 'Terms', href:'#'},
],
support: [
    {name: 'Contact Us', href:'#'},
    {name: 'Guides', href: 'https://goto.seenlyst.com/9teA'},
    {name: 'Help', href: '#'},
],


social: [
    {
        name: 'Facebook',
        href: '#',
        icon: Facebook
    },
    {
        name: 'Instagram',
        href: '#',
        icon: Instagram
    },
    {
        name: 'Twitter',
        href: '#',
        icon: Twitter
    },

],
}
</script>

<template>

           <!-- This is an example component -->
<div>
   <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
               <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                  <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
               </button>
               <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
               <img src="https://dealcode.org/images/Dealcode_Original.svg" class="h-8 mr-2" alt="Windster Logo">
               <!-- <span class="self-center whitespace-nowrap">Dealcode</span> -->
               </a>
               <form action="#" method="GET" class="hidden lg:block lg:pl-32">
                  <label for="topbar-search" class="sr-only">Search</label>
                  <div class="mt-1 relative lg:w-64">
                     <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                     <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                  </div>
               </form>
            </div>
            <div class="flex items-center">
               <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                  <span class="sr-only">Search</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </button>
               <div class="hidden lg:flex items-center">

               </div>

                  <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button" class="hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
                                Log Out
                    </BreezeResponsiveNavLink>


            </div>
         </div>
      </div>
   </nav>
   <div class="flex overflow-hidden bg-white pt-16">
    <AsideBars :showingNavigationDropdown="showingNavigationDropdown" />
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main>
           <slot />
         </main>
      <!-- <footer class="bg-white" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="custom-container py-12">
            <div class="md:grid md:grid-cols-3 lg:grid-cols-5 md:gap-6">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.company" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="mt-12 md:mt-0">
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.legal" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="mb-8 mt-12 md:mt-auto">
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                    <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.support" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="lg:mt-0 mt-12 col-span-5 md:col-span-2">
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Subscribe to our
                        newsletter</h3>
                    <p class="mt-4 text-sm text-primary-light">The latest news, articles, and resources, sent to your inbox weekly.</p>
                    <form class="mt-4 inline-flex space-x-2 w-full items-center" @submit.prevent="submitNewslater">
                        <Input placeholder="Enter your email" class="" type="email" required v-model="form.email" />
                        <Button type="submit" class="">
                                Subscribe
                            </Button>
                    </form>
                </div>
            </div>
            <div class="pt-12 mt-12 border-t border-gray-200 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <Link v-for="item in navigation.social" :key="item.name" :href="item.href"
                          class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">{{ item.name }}</span>
                        <component :is="item.icon" class="h-6 w-6" aria-hidden="true"/>
                    </Link>
                </div>
                <p class="text-base text-gray-400  md:order-1 mt-12 md:mt-auto">&copy; 2020 Deal Code, <a class="hover:text-primary" target="_blank" href="https://meavita.in">MeaVita Technologies  Pvt
                    Ltd</a>. All rights reserved.</p>
            </div>
        </div>
    </footer> -->
         <footer class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
            
            <ul class="md:grid md:grid-cols-4 lg:grid-cols-3 md:gap-12">
               <li> <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                  <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.company" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
               </li>
               <li><h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                  <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.legal" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
               </li>
               <li> <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                  <ul role="list" class="mt-4 space-y-4">
                        <li v-for="item in navigation.support" :key="item.name">
                            <Link :href="item.href" class="text-sm text-gray-500 hover:text-gray-700">
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>
               </li>
               <!-- <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Cookie Policy</a></li>
               <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline">Contact</a></li> -->
            </ul>
            <div class="flex sm:justify-center space-x-6">
               <!-- <a href="#" class="text-gray-500 hover:text-gray-900">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                     <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                  </svg>
               </a>
               <a href="#" class="text-gray-500 hover:text-gray-900">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                     <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                  </svg>
               </a>
               <a href="#" class="text-gray-500 hover:text-gray-900">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                     <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                  </svg>
               </a>
               <a href="#" class="text-gray-500 hover:text-gray-900">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                     <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                  </svg>
               </a>
                -->
                <Link v-for="item in navigation.social" :key="item.name" :href="item.href"
                          class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">{{ item.name }}</span>
                        <component :is="item.icon" class="h-6 w-6" aria-hidden="true"/>
                    </Link>
            </div>
         </footer>
         <p class="text-center text-sm text-gray-500 my-10">
            &copy; 2020-2022 <a href="#" class="hover:underline" target="_blank">Dealcode</a>. All rights reserved.
         </p>
      </div>
   </div>

</div>




</template>

