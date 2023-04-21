<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';	
// import DataTable from 'laravel-vue-datatable';

// Vue.use(DataTable);

export default {
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     productBids: Object
    },
    methods: {
    deleteData(ids) {
        // alert(ids)
        this.$inertia.post(this.route('products.delete', {id: ids}));
    }
}
  }

</script>
<template>
    <Head title="Product Bid" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Products</h3>

                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                   Product Name
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                  User name 
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Bid amount
                                 </th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Current Bid amount  
                                 </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Start Date
                                 </th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   End Date
                                 </th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Time
                                 </th>
                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Description
                                 </th> -->
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->
                                <tr class="text-gray-500" v-for="product in productBids" :key="product.id">
                                
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ product.products.title }}</td>
                            
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.users ? product.users.name: 'N/A' }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.bid_amount }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.current_bid_amount }}</td>
                                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.start_date }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.end_date }}</td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.time }}</td>
                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        
                                        <button @click="deleteData(`${product.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
                                          Delete </button>

                                    </td>
                                 </tr>
                              <!-- </div> -->

                           </tbody>
                        </table>
                         <!-- <pagination class="mt-6" :links="users.links" /> -->
                     </div>
                  </div>
                </div>
              </div>




    </BreezeAuthenticatedLayout>
    </template>
