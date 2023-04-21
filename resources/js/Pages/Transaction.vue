

    <template>
      <Head title="Transactions" />
      <BreezeAuthenticatedLayout>
  
          <div class="px-4 sm:px-6 lg:px-8" v-show="Table">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Transactions</h1>
      </div>
      <div class="mt-12 sm:mt-0 sm:ml-16 sm:flex-none">
        <!-- <input type=  "text" placeholder="Search product names..." v-model="search" name="search"  id="myInput" class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" /> -->

      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8" >
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr class="divide-x divide-gray-200">
                    <th scope="col" class=" text-center text-sm font-semibold text-gray-900">ID </th>
                      <th scope="col" class=" text-center text-sm font-semibold text-gray-900">Product </th>
                    <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Buyer Details</th>
                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Sold Date</th>
                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">User Name</th>
                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">purchase Price</th>
                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Sale Price</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  <tr v-for="(data,i) in datas.data" :key="data.id" class="divide-x divide-y divide-gray-200">
                    <td class="whitespace-nowrap p-4 text-sm text-gray-500 text-center">{{ data.id }}</td>
                    <td class="text-sm text-gray-500 text-center">{{ data.product_listing ? data.product_listing.product.title : '-'  }}</td>
                    <td class="text-sm text-gray-500 text-center">{{data.buyer_name}} - {{data.buyer_email}}</td>
                    <td class="text-sm text-gray-500 text-center">{{data.sold}}</td>
                    <td class="text-sm text-gray-500 text-center">{{data.user.name}}</td>
                    <td class="text-sm text-gray-500 text-center">{{data.purchase_price}}</td>
                    <td class="text-sm text-gray-500 text-center">{{data.sale_price}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <pagination class="mt-6" :links="datas.links" />
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="pt-6 px-4 z-30">
              <div class="w-full rounded-xl  ">
                  <div class="mt-4 md:col-span-2 md:mt-0">
    <div v-show="viewForm" class="">
      <h1 class="text-xl font-semibold text-gray-900"> Recent Chats From {{viewChat.user ? viewChat.user.name : '' }}</h1>
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8" >
          <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
              <div class="relativefocus-within:ring-indigo-500 shadow ring-5 focus-within:ring-offset-2 hover:border-gray-400">
                <br>
                  <div class="min-w-full flex-1">
                    <div v-for="user in viewChat.users" :key="user.email" class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                      <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" :src="user.photo" alt="" />
                      </div>
                      <div class="min-w-0 flex-1">
                        <a href="#" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true" />
                        <p class="text-sm font-medium text-gray-900">{{ user.name }}</p>
                        <p class="truncate text-sm text-gray-500">{{ user.user_name }}</p>
                        </a>
                      </div>
                    </div>
                    <br>
                  </div>
                 
              </div>
              <div class="relativefocus-within:ring-indigo-500 shadow ring-5 focus-within:ring-offset-2 hover:border-gray-400 col-span-3">
                <br>
                  <div class="min-w-full flex-1">
                    sdf
                  </div>
              </div>
          </div>
        </div>
      </div>
      </div>
        </div>
      </div>
  </div> -->
  
  
      </BreezeAuthenticatedLayout>
      </template>
  <script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import { Inertia } from '@inertiajs/inertia';
  import { ref, computed,watch } from 'vue'
  import axios from 'axios';
  import Pagination from '@/Components/Pagination.vue';
  const viewForm = ref(false);
  const Table = ref(true);
  const props = defineProps({
      datas : Object,
      filters : Object,
      
    });
    const viewChat = ref([]);
    
  function viewData(id){
      
      axios.post('view_chats',{id:id})
        .then((response) => {
          console.log(response);  
          viewChat.value = response.data;
         Table.value = false;
         viewForm.value = true;
        })
  }
  
const search = ref(props.filters.search);
watch(search, value => {
    Inertia.get(route('transactions'), {search: value}, {preserveState: true, replace: true})
})
  </script>