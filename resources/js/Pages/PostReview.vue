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
            reviews: Object,
            front_end_url: String,
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
        <Head title="Product Reviews" />
        <BreezeAuthenticatedLayout>

     <div class="pt-6 px-4">
     <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
         <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                         <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">Product Reviews</h3>

                         </div>
                         <div class="flow-root">
                           <table class="items-center w-full bg-transparent border-collapse">
                               <thead>
                                  <tr>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Post Title
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Post Link
                                     </th>

                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                       Total Reviews
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                       Avarage Rating
                                     </th>


                                  </tr>
                               </thead>
                               <tbody class="divide-y divide-gray-100">
                                <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                                  <tr class="text-gray-500" v-for="review in reviews" :key="review.id">

                                     <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ review.title }}</td>
                                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                            <a :href="front_end_url+'products/'+review.p_id" target="_blank">{{ front_end_url+'products/'+review.p_id }} </a>
                                        </td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ review.toatal_rating }}</td>
                                     <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ review.average_rating }}%</td>

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
