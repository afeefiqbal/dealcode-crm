<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2';

export default {
    data() {
    return {
      name: '',
      url: '',
      id: '',
      isOpen: false,
      isOpens: false,
      deal_trends: '',
      deal_image: '',
      category: '',
      deal_type: '',
      tags: '',
      discontinued_product: '',
      report_type: '',
      payment_methods: '',
      product_find: '',
    };
  },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
      combineTables: Object
    },
    methods: {
        clearInput(){
            this.id = '';
            this.deal_trends = '';
            this.deal_image = '';
            this.category = '';
            this.deal_type = '';
            this.tags = '';
            this.discontinued_product = '';
            this.report_type = '';
            this.payment_methods = '';
            this.product_find = '';
        },
        saveData(){
            //validate
             if(this.id){
                this.updateData();
             }else{
             this.$inertia.post(this.route('create.combine_table'), {
                deal_trend: this.deal_trends,
                deal_image: this.deal_image,
                category: this.category,
                deal_type: this.deal_type,
                tags: this.tags,
                discontinued_product: this.discontinued_product,
                report_type: this.report_type,
                payment_methods: this.payment_methods,
                product_find: this.product_find,
            });
            Swal.fire({
                title: 'Success',
                text: 'Combine Table created successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
            this.clearInput();
        }
            this.isOpen = false;
        },
        editData(id, datas){
            // alert(id)
            this.clearInput();
            this.deal_trends = datas.deal_trend;
            this.deal_image = datas.deal_image;
            this.category = datas.category;
            this.deal_type = datas.deal_type;
            this.tags = datas.tags;
            this.discontinued_product = datas.discontinued_product;
            this.report_type = datas.report_type;
            this.payment_methods = datas.payment_methods;
            this.product_find = datas.product_find;
            this.isOpen = true;
            this.id = id;
        },
        updateData(){
            // alert(this.id)
            this.$inertia.post(this.route('update.combine_table', {id: this.id}), {
                deal_trend: this.deal_trends,
                deal_image: this.deal_image,
                category: this.category,
                deal_type: this.deal_type,
                tags: this.tags,
                discontinued_product: this.discontinued_product,
                report_type: this.report_type,
                payment_methods: this.payment_methods,
                product_find: this.product_find,
            });
            this.isOpen = false;
            Swal.fire({
                title: 'Success',
                text: 'Combine Table updated successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        },
        deleteData(ids) {
        // alert(ids)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
          }).then((result) => {
            if (result.value) {
               this.$inertia.post(this.route('delete.table', {id: ids}));
               Swal.fire({
                title: 'Success',
                text: 'User deleted successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
            }
          });

    }
}
  }

</script>
<template>
    <Head title="Combine Tables" />
    <BreezeAuthenticatedLayout>

        <div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Combine Tables</h1>
      <!-- <p class="mt-2 text-sm text-gray-700">Your team is on the <strong class="font-semibold text-gray-900">Startup</strong> plan. The next payment of $80 will be due on August 4, 2022.</p> -->
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button @click="isOpen = true , clearInput()" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add New</button>
    </div>
  </div>
  <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300">
      <thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"> ID</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"> Category</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"> Deal Types</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Tags</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"> Deal Trends</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"> Deal Image</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Discontinued Product</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"> Report Type</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">  Payment Methods</th>
                <!-- <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Product Find</th> -->
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>

        </tr>
      </thead>
      <tbody>
        <tr v-for="(datas, index, i)  in combineTables" :key="index">
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ index+1 }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ datas.category }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ datas.deal_type }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.tags }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.deal_trend }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"><img v-if="datas.deal_image" :src="datas.deal_image" alt="" class="w-full h-10 w-10" /></td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.discontinued_product }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.report_type }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.payment_methods }}</td>
                <!-- <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.product_find }}</td> -->
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                    <button class="icon" @click="editData(datas.id, datas)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    </button>
                </td>
              </tr>


        <!-- More plans... -->
      </tbody>
    </table>
  </div>
</div>

<!--
        <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Combine Tables</h1>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <button @click="isOpen = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add New</button>
    </div>
  </div> -->




      <div v-show="isOpen"  class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
      <!-- Main modal -->
    <div class="relative p-4 w-full max-w-md h-full md:h-auto" style="max-width: 59rem;">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button @click="isOpen = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-4 px-8 lg:px-12">
                <h3 class="mb-5 text-xl font-medium text-gray-900 dark:text-white">Add New Combine Table Or Edit</h3>
                <form class="space-y-6" @submit.prevent="saveData">


                    <div class="grid grid-cols-3 gap-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2">
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category Name</label>
                        <input type="text" v-model="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="CRM" >
                    </div>
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deal Types</label>
                        <input type="text" v-model="deal_type" id="" placeholder="Buy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>

                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tags</label>
                        <input type="text" v-model="tags" id="" placeholder="AI" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deal Trends</label>
                        <input type="text" v-model="deal_trends" id="" placeholder="Hot" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <div v-if="deal_trends">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deal Images</label>
                        <input type="text" v-model="deal_image" id="" placeholder="https://dealcode.org/icons/icons8-lightning-24.png" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Discontinued Product</label>
                        <input type="text" v-model="discontinued_product" id="" placeholder="Deal Mirror" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Report Type</label>
                        <input type="text" v-model="report_type" id="" placeholder="Spam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 	Payment Methods</label>
                        <input type="text" v-model="payment_methods" id="" placeholder="Paypal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div>
                    <!-- <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Product Find</label>
                        <input type="text" v-model="product_find" id="" placeholder="Product Find" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    </div> -->
                </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">

                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit</button>

                </form>
            </div>
        </div>
    </div>

    </div>

    <div v-show="isOpens"  class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
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
              <label class="text-sm font-semibold"> Name</label>
              <input v-on:input="name = $event.target.value"  v-bind:value="name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Value </label>
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




  <!-- <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"> ID</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900"> Category</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900"> Deal Types</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Tags</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900"> Deal Trends</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900"> Deal Image</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Discontinued Product</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900"> Report Type</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">  Payment Methods</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Product Find</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(datas, index, i)  in combineTables" :key="index">
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ index+1 }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ datas.category }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ datas.deal_type }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.tags }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.deal_trend }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"><img v-if="datas.deal_image" :src="datas.deal_image" alt="" class="w-full h-10 w-10" /></td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.discontinued_product }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.report_type }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.payment_methods }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ datas.product_find }}</td>
                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                    <button class="icon" @click="editData(datas.id, datas.name, datas.url)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    </button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> -->





    </BreezeAuthenticatedLayout>
    </template>
