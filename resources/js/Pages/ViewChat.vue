

    <template>
    <Head title="General Settings" />
    <BreezeAuthenticatedLayout>

        <div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Recent Chats From {{user.name}} </h1>
    </div>
   
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8" v-show="Table">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr class="divide-x divide-gray-200">
                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">ID</th>
                  <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">User Name</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Created Date</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="user in users" :key="user.id" class="divide-x divide-gray-200">
                  <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ user.id }}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ user.name }}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ user.joined_at }}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                    <a :href="`view_chats/`+user.id">
                    <button  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-eye"></i></button>
                </a><button @click="deleteData(`${user.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div v-show="viewForm" class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
            <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div v-for="person in people" :key="person.email" class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" :src="person.imageUrl" alt="" />
                </div>
                <div class="min-w-0 flex-1">
                    <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true" />
                    <p class="text-sm font-medium text-gray-900">{{ person.name }}</p>
                    <p class="truncate text-sm text-gray-500">{{ person.role }}</p>
                    </a>
                </div>
                </div>
            </div>
             </div>
        </div>
    </div>
</div>
</div>



    </BreezeAuthenticatedLayout>
    </template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { ref, computed } from 'vue'
import axios from 'axios';
const viewForm = ref(false);
const Table = ref(true);
const props = defineProps({
  messages : Object,
  user : Object
    
});

</script>