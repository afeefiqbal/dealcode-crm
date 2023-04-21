<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';


export default {
    data() {
    return {
      name: '',
      url: '',
      id: '',  
      hashtags: '',
      isOpen: false,
      isOpens: false,
    };
  },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     productFinds: Object
    },
    methods: {
        saveData(){
            //validate
             this.$inertia.post(this.route('create.productFind'), {
                name: this.name,
                url: this.url,
                hashtags: this.hashtags,
            });
            this.isOpen = false;
        },
        editData(id, name, url){
            // alert(id)
            this.name = name;
            this.url = url;
            this.isOpens = true;
            this.id = id;
            this.hashtags = this.hashtags;
        },
        updateData(){
            // alert(this.id)
            this.$inertia.post(this.route('update.table', {id: this.id}), {
                name: this.name,
                url: this.url,
                hashtags: this.hashtags,
            });
            this.isOpens = false;
        }
}
  }

</script>
<template>
    <Head title="Product Find" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Products</h3>

                        <div class="flex items-center justify-between mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="isOpen = true">
                                Add New Product
                            </button>
                        </div>



      <div
        v-show="isOpen"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
        "
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Add Product</h3>
            <svg
              @click="isOpen = false"
              xmlns="http://www.w3.org/2000/svg"
              class="w-8 h-8 text-red-900 cursor-pointer"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
          </div>
          <div class="mt-4">


            <div class="justify-between">
              <label class="text-sm font-semibold">Product Name</label>
              <input v-on:input="name = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Product Url</label>
              <input  v-on:input="url = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Hashtags</label>
              <input  v-on:input="hashtags = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <br />
            <div class="flex items-center justify-between mt-4">
            <button
              @click="isOpen = false"
              class="px-6 py-2 text-blue-800 border border-blue-600 rounded"
            >
              Cancel
            </button>
            <button @click="saveData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">
              Save
            </button>
            </div>
          </div>
        </div>
      </div>

       <div
        v-show="isOpens"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
        "
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Edit Database</h3>
            <svg
              @click="isOpens = false"
              xmlns="http://www.w3.org/2000/svg"
              class="w-8 h-8 text-red-900 cursor-pointer"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
          </div>
          <div class="mt-4">


            <div class="justify-between">
              <label class="text-sm font-semibold">Table Name</label>
              <input v-on:input="name = $event.target.value"  v-bind:value="name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Table Url</label>
              <input  v-on:input="url = $event.target.value"  v-bind:value="url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <br />
            <div class="flex items-center justify-between mt-4">
            <button
              @click="isOpens = false"
              class="px-6 py-2 text-blue-800 border border-blue-600 rounded"
            >
              Cancel
            </button>
            <button @click="updateData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">
              Save
            </button>
            </div>
          </div>
        </div>
      </div>

                     </div>
                     <div class="flow-root">
                           <table class="items-center w-full bg-transparent border-collapse">
                               <thead>
                                  <tr>
                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        ID
                                     </th>

                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Title
                                     </th>


                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Url
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Hashtags
                                     </th>
                                     <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                        Actions
                                     </th> -->

                                  </tr>
                               </thead>
                               <tbody class="divide-y divide-gray-100">
                                <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                                  <tr class="text-gray-500"  v-for="(product, key) in productFinds" :key="product.id">
                                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ key+1 }}</td>
                           <!-- {{product}} -->
                          <!-- {{ product.report_types.name}} -->
                     
                                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ product.product_name }}</td>
                                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ product.url }}</td>
                                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ product.hash_tag }}</td>

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
