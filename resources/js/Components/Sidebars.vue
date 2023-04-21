<script>
import { Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2';



export default {
 components: {
        Link,
    },
    methods: {
    clearCache(){
        this.$inertia.post(this.route('clear-cache'), {
        });
        Swal.fire({
            title: 'Success',
            text: 'Cache cleared successfully',
            icon: 'success',
            confirmButtonText: 'Ok'
        });

    },
    cronjobs(){
        //call https://dealcode.org/change_deal
        var url = 'https://dealcode.org/change_deal';
        //ineteria visit
        this.$inertia.visit(url, {
            headers: {
                'Access-Control-Allow-Origin': '*',
            }
        });
        Swal.fire({
            title: 'Success',
            text: 'Cronjob executed successfully',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
        }
    }
}
// alert(333)
// console.log('tesst')
</script>

<template>

  <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
         <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
               <div class="flex-1 px-3 bg-white divide-y space-y-1">
                  <ul class="space-y-2 pb-2">
                     <li>
                        <form action="#" method="GET" class="lg:hidden">
                           <label for="mobile-search" class="sr-only">Search</label>
                           <div class="relative">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                 <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                 </svg>
                              </div>
                              <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                           </div>
                        </form>
                     </li>
                     <li>
                        <Link :href="route('dashboard')"  class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                           <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                           </svg>
                           <span class="ml-3">Dashboard</span>
                        </Link>
                     </li>

                     <li>
                        <Link :href="route('users')"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                        </Link>
                     </li>
                     <li>
                        <Link  :href="route('products')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Listings</span>
                        </Link>

                     </li>


                         <!-- <li>
                            <Link :href="route('product-lists')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Bulk Products</span>
                            </Link>
                        </li> -->

                       <!-- <li>
                     <Link  href="product-types" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Product Types</span>
                        </Link>

                     </li> -->
                     <!-- <li>
                        <Link   href="bidProducts"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Product bid</span>
                        </Link>
                     </li> -->
                     <!-- <li>
                        <Link   href="product-find"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Product Find</span>
                        </Link>
                     </li> -->
                       <!-- <li>
                        <Link   href="post-reports"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Post  Report</span>
                        </Link>
                     </li> -->
                     <li>
                        <Link :href="route('tables')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                          &nbsp; <i class="fa fa-database w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                           <span class="ml-3 flex-1 whitespace-nowrap">Database</span>
                        </Link>
                     </li>

                      <!-- <li>
                        <Link :href="route('categories')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                          &nbsp; <i class="fa fa-list-alt w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                           <span class="ml-3 flex-1 whitespace-nowrap">Categories</span>
                        </Link>
                     </li> -->

                       <li>
                        <Link :href="route('pending.products')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                          &nbsp; <i class="far fa-calendar-minus w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                           <span class="ml-3 flex-1 whitespace-nowrap">Review Listing</span>
                        </Link>
                        </li>




                        <!-- <li>
                            <Link :href="route('settings')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            &nbsp; <i class="fa fa-cogs w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">General Settings</span>
                            </Link>
                        </li> -->





                            <!-- <li>
                             <Link :href="route('providers')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-users w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Providers</span>
                             </Link>
                            </li> -->


                            <!-- <li>
                             <Link @click="cronjobs" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-clock w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Cron Jobs</span>
                             </Link>
                            </li> -->



                            <!-- <li>
                             <Link :href="route('meta-tags')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-tags w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Meta Tags</span>
                             </Link>
                            </li> -->

                            <!-- <li>
                             <Link :href="route('payments')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-money-bill-wave w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Payments</span>
                             </Link>
                            </li> -->


                            <!-- <li>
                             <Link :href="route('countries')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-globe w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Countries</span>
                             </Link>
                            </li> -->


                            <!-- <li>
                             <Link :href="route('sliders')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-images w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Sliders</span>
                             </Link>
                            </li> -->

                            <li>
                             <Link :href="route('system_info')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-info-circle w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">System Info</span>
                             </Link>
                            </li>




                            <li
                                x-data="{ open: false }"
                                class="relative"
                            >
                                <button
                                x-on:click="open = true"
                                class="flex items-center bg-white focus:bg-gray-400 text-gray-700 focus:text-gray-900 font-semibold rounded focus:outline-none focus:shadow-inner py-2 px-4"
                                type="button"
                                >
                                 <i class="fa fa-cogs w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                 <span class="ml-3 flex-1 whitespace-nowrap">General Settings</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  style="margin-top:3px">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                                </button>
                                <ul
                                x-show="open"
                                x-on:click.away="open = false"
                                class="bg-white text-gray-700 rounded shadow-lg absolute py-2 mt-1"
                                style="min-width:15rem"
                                >
                                <li>
                                <button @click="clearCache()" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                &nbsp; <i class="fa fa-refresh  w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap">Clear Cache</span>
                                </button>
                                 </li>
                                <li>
                                <Link :href="route('blacklist-words')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                &nbsp; <i class="fa fa-ban w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap">Blacklist</span>
                                </Link>
                                </li>
                                <li>
                                <Link :href="route('pages')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                &nbsp; <i class="fa fa-file-alt w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap">Pages</span>
                                </Link>
                                 </li>
                                <li>
                                <Link :href="route('settings')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                &nbsp; <i class="fa fa-cogs w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap">  Settings</span>
                                </Link>
                                <li>
                                   <a href="https://swiy.co/DCuser" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3">Help</span>
                        </a>
                                 </li>
                            </li>
                                </ul>
                            </li>


                            <li
                                x-data="{ opens: false }"
                                class="relative"
                            >
                                <button
                                x-on:click="opens = true"
                                class="flex items-center bg-white focus:bg-gray-400 text-gray-700 focus:text-gray-900 font-semibold rounded focus:outline-none focus:shadow-inner py-2 px-4"
                                type="button"
                                >
                                 <i class="fas fa-search-dollar w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                                 <span class="ml-3 flex-1 whitespace-nowrap">SEO Optimization  </span>
                                 <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  style="margin-top:3px">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                                </button>
                                <ul
                                x-show="opens"
                                x-on:click.away="opens = false"
                                class="bg-white text-gray-700 rounded shadow-lg absolute py-2 mt-1"
                                style="min-width:15rem"
                                >


                                <li>
                             <Link :href="route('meta-tags')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-tags w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">Meta Tags</span>
                             </Link>


                            </li>



                                </ul>
                            </li>




                             <!-- <li>
                             <Link :href="route('dealtrends')" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                             &nbsp; <i class="fa fa-chart-line w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true"></i>
                             <span class="ml-3 flex-1 whitespace-nowrap">DealTrends</span>
                             </Link>
                            </li> -->










                  </ul>
                  <div class="space-y-2 pt-2">
                     <!-- <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                        <svg class="w-5 h-5 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                        </svg>
                        <span class="ml-4">Upgrade to Pro</span>
                     </a> -->
                     <!-- <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                           <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3">Documentation</span>
                     </a> -->
                     <!-- <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                        </svg>
                        <span class="ml-3">Components</span>
                     </a> -->

                  </div>
               </div>
            </div>
         </div>
      </aside>

</template>
