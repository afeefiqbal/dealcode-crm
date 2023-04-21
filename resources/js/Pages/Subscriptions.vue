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
            subscriptions: Object,
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
        <Head title="All Subscriptions" />
        <BreezeAuthenticatedLayout>

     <div class="pt-6 px-4">
     <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
         <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                         <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">All Subscriptions</h3>

                         </div>
                         <div class="flow-root">
                           <table class="items-center w-full bg-transparent border-collapse">
                               <thead>
                                  <tr>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        User Name
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                       Provider Name
                                     </th>

                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                       Type
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                       Due Date
                                     </th>

                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                       Price
                                     </th>

                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                      Payment Type
                                     </th>


                                  </tr>
                               </thead>
                               <tbody class="divide-y divide-gray-100">
                                <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                                  <tr class="text-gray-500" v-for="subscription in subscriptions" :key="subscription.id">

                                     <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ subscription.users ? subscription.users.name : 'N/A' }}</td>
                                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                            {{ subscription.provider_name_or_custem_name ? subscription.provider_name_or_custem_name : 'N/A' }}
                                        </td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ subscription.type }}</td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ subscription.end_date }}</td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ subscription.price }}</td>
                                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ subscription.payment_mode }}</td>

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
