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
     data: Object
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
    <Head title="Deal Trends" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900"> Deal Trends</h3>

                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                <th  class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                   Id</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                  Icons
                                 </th>


                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th> -->

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                              <tr class="text-gray-500" v-for="datas in data" :key="datas.id">

                                    <td class="px-4 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-500">
                                        {{ datas.id }}
                                    </td>
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ datas.title }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                <img :src="datas.icon ? datas.icon : 'https://t3.ftcdn.net/jpg/04/34/72/82/360_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg'" alt="" class="w-full h-20 w-20" />
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
