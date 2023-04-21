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
                    <img class="block h-8 w-auto" src="https://dealcode.org/images/Dealcode_Original.svg" alt="Your Company" />
                  </a>
                </div>
              </div>
              <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
                <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                  <div class="w-full">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                      </div>
                      <input id="search" name="search" class="block w-full rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:border-rose-500 focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-rose-500 sm:text-sm" placeholder="Search" type="search" />
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
                <a href="#" class="text-sm font-medium text-gray-900 hover:underline">Go Premium</a>
                <a href="#" class="ml-5 flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <BellIcon class="h-6 w-6" aria-hidden="true" />
                </a>

                <!-- Profile dropdown -->
                <Menu as="div" class="relative ml-5 flex-shrink-0">
                  <div>
                    <MenuButton class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                      <span class="sr-only">Open user menu</span>
                      <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="" />
                    </MenuButton>
                  </div>
                  <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                        <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block py-2 px-4 text-sm text-gray-700']">{{ item.name }}</a>
                      </MenuItem>
                    </MenuItems>
                  </transition>
                </Menu>

                <a href="#" class="ml-6 inline-flex items-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">New Post</a>
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
          <main class="lg:col-span-9 xl:col-span-6">
            <slot />
          </main>

        </div>
      </div>
    </div>
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
    IdentificationIcon
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

// alert(route('home2'))

  const user = {


    name: 'Chelsea Hagon',
    email: 'chelsea.hagon@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  }
  const navigation = [


    { name: 'Dashboard', href: route('home2'), icon: HomeIcon, current: route().current('home2') },
    { name: 'Users', href: route('users'), icon: UserGroupIcon, current: route().current('users') },
    { name: 'Products', href: route('products'), icon: FireIcon, current: route().current('products') },
    { name: 'Database', href: route('tables'), icon: Bars3Icon, current: route().current('tables') },
    { name: 'Review Listing', href: route('pending.products'), icon: ArrowTrendingUpIcon, current: route().current('pending.products') },
    { name: 'System Info', href: route('system_info'), icon: IdentificationIcon, current: route().current('system_info') },

    { name: 'General Settings', href: '#', icon: CogIcon, current: false,
    children: [
        { name: 'Pages', href: route('pages'), icon: FireIcon },
        { name: 'Settings', href: route('settings'), icon: ArrowTrendingUpIcon },
        ] },

    //seo optimization
    { name: 'SEO Optimization', href: '#', icon: Cog6ToothIcon, current: false,
    children: [
        { name: 'Metatags', href: route('meta-tags'), icon: FireIcon },
        // { name: 'Sitemap', href: route('sitemap'), icon: ArrowTrendingUpIcon },
        // { name: 'Latest', href: '#', icon: ArrowTrendingUpIcon },
        ] },

  ]
  const userNavigation = [


    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
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
  </script>
