<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

import { ArrowDownIcon, ArrowUpIcon } from '@heroicons/vue/20/solid'
import moment, * as moments from 'moment';

const stats = [

  { name: 'Total Subscribers', stat: '71,897', previousStat: '70,946', change: '12%', changeType: 'increase' },
  { name: 'Avg. Open Rate', stat: '58.16%', previousStat: '56.14%', change: '2.02%', changeType: 'increase' },
  { name: 'Avg. Click Rate', stat: '24.57%', previousStat: '28.62%', change: '4.05%', changeType: 'decrease' },
]

const people = [


  { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
  // More people...
]

import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    date(){
        return {
            moments: moments
        }
    },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
      ArrowDownIcon,
      ArrowUpIcon,
    //   moment,
    },
    props: {
      new_products_this_month: Object,
      new_users_this_month: Number,
      total_deals: Number,
      total_users: Object,
      total_active_posts: Number,
      total_amount: Number,
      avarage_price: Number,
      latest_five_users: Array,
      latest_five_products: Array,
      product_count: Object,

    },
  }

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
               <!-- <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                     <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                           <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                        </div>
                        <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                           12.5%
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                           </svg>
                        </div>
                     </div>
                     <div id="main-chart"></div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="mb-4 flex items-center justify-between">
                        <div>
                           <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Transactions</h3>
                           <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
                        </div>
                        <div class="flex-shrink-0">
                           <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all</a>
                        </div>
                     </div>
                     <div class="flex flex-col mt-8">
                        <div class="overflow-x-auto rounded-lg">
                           <div class="align-middle inline-block min-w-full">
                              <div class="shadow overflow-hidden sm:rounded-lg">
                                 <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                       <tr>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Transaction
                                          </th>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Date & Time
                                          </th>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Amount
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                       <tr>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                             Payment from <span class="font-semibold">Bonnie Green</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 23 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $2300
                                          </td>
                                       </tr>
                                       <tr class="bg-gray-50">
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                             Payment refund to <span class="font-semibold">#00910</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 23 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             -$670
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                             Payment failed from <span class="font-semibold">#087651</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 18 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $234
                                          </td>
                                       </tr>
                                       <tr class="bg-gray-50">
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                             Payment from <span class="font-semibold">Lana Byrd</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 15 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $5000
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                             Payment from <span class="font-semibold">Jese Leos</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 15 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $2300
                                          </td>
                                       </tr>
                                       <tr class="bg-gray-50">
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                             Payment from <span class="font-semibold">THEMESBERG LLC</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 11 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $560
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                             Payment from <span class="font-semibold">Lana Lysle</span>
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                             Apr 6 ,2021
                                          </td>
                                          <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                             $1437
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
               <div>
  <h3 class="text-lg font-medium leading-6 text-gray-900">Last 30 days</h3>

  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <!-- Heroicon name: outline/users -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Users</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ total_users }}</p>
        <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
          <!-- Heroicon name: mini/arrow-up -->
          <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
          </svg>
            <span class="sr-only"> Increased by </span>
            {{ new_users_this_month }}
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="/users" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
          </div>
        </div>
      </dd>
    </div>

    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <!-- Heroicon name: outline/envelope-open -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18M3 18h18M3 6v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
            </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Listings</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ total_active_posts }} </p>

        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="/products" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Open Rate stats</span></a>
          </div>
        </div>
      </dd>
    </div>

    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <!-- Heroicon name: outline/cursor-arrow-rays -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Deals</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ total_deals }}</p>

        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="/product_listings" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Click Rate stats</span></a>
          </div>
        </div>
      </dd>
    </div>
  </dl>
</div>
        <br />

  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Users</h1>
      <p class="mt-2 text-sm text-gray-700"></p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <Link :href="route('users')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        View All</Link>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.No</th>
                <!-- <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User ID</th> -->
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                <!-- <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Country</th> -->
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Joined Date</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Last Login Ip</th>

              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(user,key) in latest_five_users" :key="user.id">
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ key+1  }}</td>
                <!-- <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ user.unique_id }}</td> -->
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ user.name }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ user.email }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ user.created_at_mod  }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ user.ip_address }}</td>

              </tr>

              <!-- More transactions... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<br />
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Last 5 Deals</h1>
      <p class="mt-2 text-sm text-gray-700"></p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <Link :href="route('products')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        View All</Link>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.No</th>
                <!-- <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Deal Unique ID</th> -->

                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Posted User</th>
                <!-- <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th> -->
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Deal Type</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">price</th>


              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(posts,key) in latest_five_products" :key="posts.id">
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ key+1  }}</td>
                <!-- <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ posts.tmp_token }} </td> -->
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ posts.product ? posts.product.title : 'N/A' }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ posts.user ? posts.user.name : 'N/A' }}</td>

                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ posts.deal_type ? posts.deal_type.title : 'N/A'  }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">${{ posts.price  }}</td>

              </tr>

              <!-- More transactions... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



                  <!-- <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Latest Users</h3>
                        <Link :href="route('users')" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        View all
                        </Link>
                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>

                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name</th>
                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Email
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Posts
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Country
                                 </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Date
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <div v-for="user in latest_five_users" :key="user.id">
                              <tr class="text-gray-500" v-for="user in latest_five_users" :key="user.id">
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ user.name }}</td>
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ user.email }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    <Link :href="route('products.readmore',`${user.id}`)" target="_new" class="icon" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                     </Link></td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ user.created_at }}</td></tr>
                              </div>

                           </tbody>
                        </table>
                     </div>
                  </div> -->





                  <!-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <h3 class="text-xl font-bold leading-none text-gray-900">Latest Users <Link :href="route('users')" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        View all
                        </Link></h3>

                     <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name</th>
                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Email
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Posts
                                 </th>

                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Date
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                              <tr class="text-gray-500" v-for="user in latest_five_users" :key="user.id">
                                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ user.name }}</td>
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ user.email }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    <Link :href="route('products.readmore',`${user.id}`)" target="_new" class="icon" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    </Link></td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ user.created_at }}</td>
                              </tr>


                           </tbody>
                        </table>
                     </div>
                  </div> -->
                  <!-- <br /> -->
                  <!-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Products Overview</h3>
                     <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Name</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Country</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Date</th>
                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                              <tr class="text-gray-500" v-for="products in latest_five_products" :key="products.id">
                                 <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ products.title }}</th>

                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ products.country_code }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                   {{ products.created_at }}
                                 </td>
                              </tr>




                           </tbody>
                        </table>
                     </div>
                  </div> -->
               </div>


    </BreezeAuthenticatedLayout>
</template>
