  <style>
    .user-image{
      width: 40px;
height: 40px;
border-radius: 60px;
background-color: #485bff;
transition: box-shadow 0.3s ease-in-out;
box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.15), 0px 0px 20px rgba(0, 0, 0, 0.1);
position: relative;
    }
  </style>
<template>
    <!--
      This example requires updating your template:

      ```
      <html class="h-full bg-gray-100">
      <body class="h-full">
      ```
    -->
    <div class="min-h-full">

      <!-- When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars -->
      <Popover as="template" v-slot="{ open }">
        <header :class="[open ? 'fixed inset-0 z-40 overflow-y-auto' : '', 'bg-white shadow-sm lg:static lg:overflow-y-visible']">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" style="max-width: 103rem;">
            <div class="relative flex justify-between lg:gap-8 xl:grid xl:grid-cols-12">
              <div class="flex md:absolute md:inset-y-0 md:left-0 lg:static xl:col-span-2">
                <div class="flex flex-shrink-0 items-center">
                  <a href="https://dealcode.org">
                    <svg width="150" height="40" viewBox="0 0 150 40" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_766_1684)"><path d="M30.6103 28.5715C30.6103 29.9772 30.1466 31.1254 29.2266 32.0233C28.3066 32.9212 27.1438 33.3702 25.738 33.3702H19.666V6.82272H25.738C27.1511 6.82272 28.314 7.27168 29.234 8.1696C30.1466 9.06752 30.6103 10.223 30.6103 11.6214V28.5715ZM28.2551 28.336V11.8275C28.2551 10.959 27.9828 10.2525 27.4308 9.7152C26.8788 9.17792 26.1722 8.91296 25.3038 8.91296H22.0286V31.2873H25.1639C26.0766 31.2873 26.8199 31.0224 27.394 30.4998C27.9681 29.9699 28.2551 29.2486 28.2551 28.336Z" fill="#4961A9"></path><path d="M43.7035 31.4566C43.7035 32.7372 43.0706 33.3702 41.8047 33.3702H36.373C35.1071 33.3702 34.4741 32.7299 34.4741 31.4566V18.7827C34.4741 17.502 35.1071 16.8691 36.373 16.8691H41.8047C43.0706 16.8691 43.7035 17.5094 43.7035 18.7827V24.7222L42.9381 25.5171H36.66V31.486H41.5103V28.4684H43.6962V31.4566H43.7035ZM41.5176 23.7212V18.7532H36.6674V23.7212H41.5176Z" fill="#4961A9"></path><path d="M56.7674 33.3775H54.5447V32.9212C53.6542 33.0463 52.7562 33.1641 51.8657 33.2745C50.7543 33.407 49.8711 33.4806 49.2014 33.4806C47.9649 33.4806 47.354 32.8697 47.354 31.6479V25.6275C47.354 24.3615 47.9943 23.7286 49.2676 23.7286H54.5742V18.7606H49.7239V21.5648H47.538V18.7827C47.538 17.502 48.171 16.8691 49.4369 16.8691H54.8686C56.1345 16.8691 56.7674 17.5094 56.7674 18.7827V33.3775V33.3775ZM54.5815 31.3241V25.4876H49.5399V31.4271L54.5815 31.3241Z" fill="#4961A9"></path><path d="M62.8248 33.3776H60.6021V6.82272H62.8248V33.3776Z" fill="#4961A9"></path><path d="M90.9325 31.4934C90.9325 32.0454 90.7485 32.5017 90.3879 32.8476C90.0273 33.2009 89.5709 33.3702 89.0116 33.3702H82.1742C81.6222 33.3702 81.1658 33.1936 80.8199 32.8476C80.4666 32.4944 80.2974 32.0454 80.2974 31.4934V8.70687C80.2974 8.15488 80.474 7.69856 80.8199 7.35264C81.1732 6.99936 81.6222 6.83008 82.1742 6.83008H89.0116C89.5636 6.83008 90.0199 7.00672 90.3879 7.35264C90.7485 7.70592 90.9325 8.15488 90.9325 8.70687V14.8819H88.5553V8.91295H82.6526V31.2873H88.5553V24.759H90.9325V31.4934Z" fill="#4961A9"></path><path d="M104.269 31.4566C104.269 32.7372 103.628 33.3702 102.355 33.3702H96.6879C95.422 33.3702 94.7891 32.7299 94.7891 31.4566V18.7827C94.7891 17.502 95.422 16.8691 96.6879 16.8691H102.355C103.636 16.8691 104.269 17.5094 104.269 18.7827V31.4566ZM102.009 31.3903V18.8563H97.0412V31.3903H102.009Z" fill="#4961A9"></path><path d="M117.326 33.3776H115.088V32.9212C112.667 33.2966 111.327 33.4806 111.07 33.4806C110.106 33.4806 109.333 33.1568 108.744 32.5017C108.155 31.854 107.861 31.0371 107.861 30.0656V20.4166C107.861 19.4009 108.192 18.5545 108.862 17.8774C109.532 17.2077 110.363 16.8691 111.372 16.8691H115.088V6.82272H117.326V33.3776ZM115.088 31.3241V18.8563H111.968C110.724 18.8563 110.098 19.4966 110.098 20.7699V29.5945C110.098 30.8604 110.717 31.4934 111.968 31.4934C112.262 31.4934 113.3 31.4345 115.088 31.3241Z" fill="#4961A9"></path><path d="M130.272 31.4566C130.272 32.7372 129.639 33.3702 128.373 33.3702H122.941C121.675 33.3702 121.042 32.7299 121.042 31.4566V18.7827C121.042 17.502 121.675 16.8691 122.941 16.8691H128.373C129.639 16.8691 130.272 17.5094 130.272 18.7827V24.7222L129.506 25.5171H123.228V31.486H128.079V28.4684H130.265V31.4566H130.272ZM128.086 23.7212V18.7532H123.236V23.7212H128.086Z" fill="#4961A9"></path><path d="M16.0006 10.856L0.750719 18.4147C0.28704 18.6429 0 19.1065 0 19.6217V20.5785C0 21.0937 0.28704 21.5574 0.750719 21.7856L16.0006 29.3369V26.702L2.65696 20.1001L16.0006 13.4909V10.856Z" fill="#F4112D"></path><path d="M133.937 10.856L149.187 18.4147C149.643 18.6429 149.938 19.1139 149.938 19.6217V20.5785C149.938 21.0937 149.651 21.5574 149.187 21.7856L133.937 29.3369V26.702L147.281 20.0928L133.937 13.4835V10.856Z" fill="#F4112D"></path><path d="M68.1316 40.2003H65.8794L75.4621 0H77.7143L68.1316 40.2003Z" fill="#F4112D"></path></g><defs><clipPath id="clip0_766_1684"><rect width="149.474" height="40" fill="white"></rect></clipPath></defs></svg>
                  </a>
                </div>
              </div>
              <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
                <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                  <div class="w-full">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" aria-hidden="true" /> -->
                      </div>
                      <br> <br>
                      <!-- <inp ut id="search" name="search" class="block w-full rounded-md border bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500  focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-rose-500 sm:text-sm"  /> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center md:absolute md:inset-y-0 md:right-0 lg:hidden">
                <!-- Mobile menu button -->
                <PopoverButton class="-mx-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500">
                  <span class="sr-only">Open menu</span>
                  <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                  <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                </PopoverButton>
              </div>
              <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                <!-- <a href="#" class="text-sm font-medium text-gray-900 hover:underline">Go Premium</a> -->
                <!-- <a href="#" class="ml-5 flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <BellIcon class="h-6 w-6" aria-hidden="true" />
                </a> -->

                <!-- Profile dropdown -->
                <Menu as="div" class="relative ml-5 flex-shrink-0">
                  <div>
                    <MenuButton class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                      <span class="sr-only">Open user menu</span>
                      <img class="h-8 w-8 rounded-full user-image"  src="https://cdn.gleap.io/static/1666608938138-d50db396-7156-4785-9ab9-c13ef28ac62b.png" alt="" />
                    </MenuButton>
                  </div>
                  <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                        <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block py-2 px-4 text-sm text-gray-700']">{{ item.name }}</a>
                      </MenuItem>
                      <a @click="signOut()"  class="block py-2 px-4 text-sm text-gray-700">Sign out</a>
                    </MenuItems>
                  </transition>
                </Menu>

                <!-- <a href="#" class="ml-6 inline-flex items-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">New Post</a> -->
              </div>
            </div>
          </div>

          <PopoverPanel as="nav" class="lg:hidden" aria-label="Global">
            <div class="mx-auto max-w-3xl space-y-1 px-2 pt-2 pb-3 sm:px-4">
              <a v-for="item in navigation" :key="item.name" :href="item.href" :aria-current="item.current ? 'page' : undefined" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'hover:bg-gray-50', 'block rounded-md py-2 px-3 text-base font-medium']">{{ item.name }}</a>
            </div>
            <div class="border-t border-gray-200 pt-4">
              <div class="mx-auto flex max-w-3xl items-center px-4 sm:px-6">
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
                </div>
                <div class="ml-3">
                  <div class="text-base font-medium text-gray-800">{{ user.name }}</div>
                  <div class="text-sm font-medium text-gray-500">{{ user.email }}</div>
                </div>
                <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <BellIcon class="h-6 w-6" aria-hidden="true" />
                </button>
              </div>
              <div class="mx-auto mt-3 max-w-3xl space-y-1 px-2 sm:px-4">
                <a v-for="item in userNavigation" :key="item.name" :href="item.href" class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">{{ item.name }}</a>
              </div>
            </div>

            <div class="mx-auto mt-6 max-w-3xl px-4 sm:px-6">
              <a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-rose-700">New Post</a>

              <div class="mt-6 flex justify-center">
                <a href="#" class="text-base font-medium text-gray-900 hover:underline">Go Premium</a>

              </div>
            </div>
          </PopoverPanel>
        </header>
      </Popover>

      <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-8 lg:px-8" style="max-width: 103rem;">

            <!-- <div class="mt-5 flex flex-grow flex-col">
      <nav class="flex-1 space-y-1 bg-white px-2" aria-label="Sidebar">
        <template v-for="item in navigation" :key="item.name">
          <div v-if="!item.children">
            <a href="#" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md']">
              <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
              {{ item.name }}
            </a>
          </div>
          <Disclosure as="div" v-else class="space-y-1" v-slot="{ open }">
            <DisclosureButton :class="[item.current ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500']">
              <component :is="item.icon" class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
              <span class="flex-1">{{ item.name }}</span>
              <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300', 'ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400']" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
              </svg>
            </DisclosureButton>
            <DisclosurePanel class="space-y-1">
              <DisclosureButton v-for="subItem in item.children" :key="subItem.name" as="a" :href="subItem.href" class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">{{ subItem.name }}</DisclosureButton>
            </DisclosurePanel>
          </Disclosure>
        </template>
      </nav>
    </div> -->
          <div class="hidden lg:col-span-3 lg:block xl:col-span-2">
            <nav aria-label="Sidebar" class="flex-1 space-y-1 bg-white px-2">
                <template v-for="item in navigation" :key="item.name">
                <div v-if="!item.children" >
                    <Link :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md']">
                    <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']" aria-hidden="true" />
                    <span class="truncate">{{ item.name }}</span>
                    </Link>

                </div>
                <Disclosure as="div" v-else class="space-y-1" v-slot="{ open }">
                    <DisclosureButton :class="[item.current ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500']">
                    <component :is="item.icon" class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                    <span class="flex-1">{{ item.name }}</span>
                    <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300', 'ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400']" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                    </svg>
                    </DisclosureButton>
                    <DisclosurePanel class="space-y-1">
                    <Link  v-for="subItem in item.children" :href="subItem.href" :class="[subItem.current ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md']">
                    <component :is="subItem.icon" :class="[subItem.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']" aria-hidden="true" />
                    <span class="truncate">{{ subItem.name }}</span>
                    </Link>
                    <!-- <DisclosureButton v-for="subItem in item.children" :key="subItem.name" as="a" :href="subItem.href" class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">{{ subItem.name }}</DisclosureButton> -->
                    </DisclosurePanel>
                </Disclosure>
                </template>
              <!-- <div class="space-y-1 pb-8">
                <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-50', 'group flex items-center px-3 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                  <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']" aria-hidden="true" />
                  <span class="truncate">{{ item.name }}</span>
                </a>
              </div> -->

            </nav>
          </div>

          <main class="lg:col-span-9 xl:col-span-10">
            <slot />
          </main>

        </div>
      </div>
    </div>
    <Footer />
  </template>

  <script setup>
  import { Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
  import {
    ChatBubbleLeftEllipsisIcon,
    CodeBracketIcon,
    EllipsisVerticalIcon,
    EyeIcon,
    FlagIcon,
    HandThumbUpIcon,
    MagnifyingGlassIcon,
    PlusIcon,
    ShareIcon,
    StarIcon,
    CheckIcon,
    IdentificationIcon,
    CurrencyRupeeIcon
  } from '@heroicons/vue/20/solid'
  import {
    ArrowTrendingUpIcon,
    Bars3Icon,
    BellIcon,
    FireIcon,
    HomeIcon,
    UserGroupIcon,
    XMarkIcon,
    CogIcon, Cog6ToothIcon,
  } from '@heroicons/vue/24/outline'

  import { Link } from '@inertiajs/inertia-vue3';
  import Footer from './Footer.vue'
  import { computed } from 'vue'
  import { usePage } from '@inertiajs/inertia-vue3';
  import { Inertia } from '@inertiajs/inertia'
  const roles = computed(() => usePage().props.value.auth.roles)
  const all_roles = computed(() => usePage().props.value.all_roles)

//   alert(logged.value)


  const user = {


    name: 'Chelsea Hagon',
    email: 'chelsea.hagon@example.com',
    imageUrl:
      'data:image/png;base64,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',
  }
  const navigation = [



    { name: 'Dashboard', href: route('dashboard'), icon: HomeIcon, current: route().current('dashboard'), disabled: true },
    { name: 'Users', href: route('users'), icon: UserGroupIcon, current: route().current('users') },
    { name: 'Listing', href: route('products'), icon: FireIcon, current: route().current('products') },
    { name: 'Database', href: route('tables'), icon: Bars3Icon, current: route().current('tables') },
    { name: 'Review Listing', href: route('review.listing'), icon: ArrowTrendingUpIcon, current: route().current('review.listing') },
    { name: 'Chats', href: route('chats'), icon: ChatBubbleLeftEllipsisIcon, current: route().current('chats') },
    { name: 'Transactions', href: route('transactions'), icon: CurrencyRupeeIcon, current: route().current('transactions') },
    { name: 'Subscribers', href: route('subscribers'), icon: UserGroupIcon, current: route().current('subscribers') },


    { name: 'Settings', href: '#', icon: CogIcon, current: false,
    children: [
        { name: 'Pages', href: route('pages'), icon: FireIcon },
        { name: 'Admin Links', href: route('admin_links'), icon: ArrowTrendingUpIcon },
        // { name: 'Metatags', href: route('meta-tags'), icon: FireIcon },
        { name: 'System Info', href: route('system_info'), icon: IdentificationIcon },
        ] },

    // //seo optimization
    // { name: 'SEO Optimization', href: '#', icon: Cog6ToothIcon, current: false,
    // children: [

    //     // { name: 'Sitemap', href: route('sitemap'), icon: ArrowTrendingUpIcon },
    //     // { name: 'Latest', href: '#', icon: ArrowTrendingUpIcon },
    //     ] },

  ]
  const userNavigation = [


    { name: 'Your Profile', href: '#' },
  ]
  const communities = [


    { name: 'Movies', href: '#' },
    { name: 'Food', href: '#' },
    { name: 'Sports', href: '#' },
    { name: 'Animals', href: '#' },
    { name: 'Science', href: '#' },
    { name: 'Dinosaurs', href: '#' },
    { name: 'Talents', href: '#' },
    { name: 'Gaming', href: '#' },
  ]
  const tabs = [


    { name: 'Recent', href: '#', current: true },
    { name: 'Most Liked', href: '#', current: false },
    { name: 'Most Answers', href: '#', current: false },
  ]
  const questions = [


    {
      id: '81614',
      likes: '29',
      replies: '11',
      views: '2.7k',
      author: {
        name: 'Dries Vincent',
        imageUrl:
          'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        href: '#',
      },
      date: 'December 9 at 11:43 AM',
      datetime: '2020-12-09T11:43:00',
      href: '#',
      title: 'What would you have done differently if you ran Jurassic Park?',
      body: `
        <p>Jurassic Park was an incredible idea and a magnificent feat of engineering, but poor protocols and a disregard for human safety killed what could have otherwise been one of the best businesses of our generation.</p>
        <p>Ultimately, I think that if you wanted to run the park successfully and keep visitors safe, the most important thing to prioritize would be&hellip;</p>
      `,
    },
    // More questions...
  ]
  const whoToFollow = [


    {
      name: 'Leonard Krasner',
      handle: 'leonardkrasner',
      href: '#',
      imageUrl:
        'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    // More people...
  ]
  const trendingPosts = [


    {
      id: 1,
      user: {
        name: 'Floyd Miles',
        imageUrl:
          'https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
      },
      body: 'What books do you have on your bookshelf just to look smarter than you actually are?',
      comments: 291,
    },
    // More posts...
  ]


  function signOut(){
    Inertia.post(route('logout'));
  }
  </script>
