<template>
<Head title="Pricing" />
<BreezeAuthenticatedLayout>
  <div v-show="isOpen"  class="  absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
      <div class="flex items-center justify-between">
        <h3 class="text-2xl">Add Data</h3>
        <svg  @click="isOpen = false" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-900 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
          <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2"  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="justify-between">
          <label class="text-sm font-semibold">Name</label>
          <input type="text" v-model="formData.name" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Link</label>
  
          <input type="text" name="link" id="link"  v-model="formData.link"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">FB User Profile</label>
  
          <input type="text" name="link" id="link"  v-model="formData.fb_user_profule"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">FB Group (if any)</label>
  
          <input type="text" name="link" id="link"  v-model="formData.fb_group"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>
        <br />
        <div class="flex items-center justify-between mt-4">
          <button @click="isOpen = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
            <button @click="saveData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">Save </button>
        </div>
      </div>
    </div>
  </div>
  <div v-show="isOpens"  class="  absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
      <div class="flex items-center justify-between">
        <input type="=" readonly v-model="formData.edit_id" name="" id="">
        <h3 class="text-2xl">update Data</h3>
        <svg  @click="isOpens = false" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-900 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
          <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2"  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <div  class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="justify-between">
          <label class="text-sm font-semibold">Product Name</label>
          <input type="text" v-model="formData.editname" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Category</label>
    
          <select v-model="formData.category_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
            <option v-for="(category, key) in categories"  :value="category.id">{{ category.title }}</option>
            </select>
          <!-- <input type="text" name="link" id="link"  v-model="formData.editlink"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  /> -->
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Price</label>
  
          <input type="text" name="link" id="link"  v-model="formData.editprice"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Reseller</label>
  
          <input type="text" name="link" id="link"  v-model="formData.editreseller"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>  
        <div class="justify-between">
          <label class="text-sm font-semibold">Tier</label>
  
          <input type="text" readonly name="link" id="link"  v-model="formData.edittier"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  />
        </div>
        <div class="justify-between">
          <label for="text" class="mb-2 font-semibold">Description</label>
          <textarea id="about"  v-model="formData.description" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />
  
        </div>
        <br />
        <div class="flex items-center justify-between mt-4">
          <button @click="isOpens = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
            <button @click="updateData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">Update </button>
        </div>
      </div>
    </div>
  </div>
  <div v-show="isImport"  class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
    <form @submit.prevent="importData">
    <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
      <div class="flex items-center justify-between">
        <h3 class="text-2xl">Import </h3>
      </div>
      <div class="mt-4">
        <div class="justify-between">
          <label class="text-sm font-semibold">Please Attach Your file (CSV,XL)</label>
          <input @change="onFileChange"  type="file" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
        <br />
        <div class="flex items-center justify-between mt-4">
          <button @click="isImport = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"  > Cancel </button>
          <button @click="importData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Save </button>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Pricing</h1>
      
      </div>
      <div class="justify-between sm:flex sm:items-center">

        <div class="rounded-md shadow-sm text-center ">
            <div class="pointer-events-n one absolute top-47  flex items-center mt-2 ml-2">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input id="search" v-model="search" name="search" class="block w-full rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:border-indigo-500 focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search" type="search">
         
          </div>
          &nbsp;&nbsp;<button type="button" @click="isImport = true" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
          Import Datas
        </button> &nbsp;
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <!-- <button type="button" @click="isOpen = true" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add Datas
          </button> -->
        </div>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr class="divide-x divide-gray-200">
                  <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Product Name</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Reseller</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Tier</th>
                  <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
              
                <tr v-for="(data, key) in pricings.data" :key="data.id" class="divide-x divide-gray-200">
                  <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ key+1}}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                     <span>{{data.product_name}}</span>
                  </td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">  {{ data.price}}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">  {{ data.reseller}}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                    <span>{{ data.tier}}</span>
                  </td>
                  <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                    <a  v-if="!data.product_id" @click="editData(data.id,data.product_name, data.price, data.reseller, data.tier)" class="text-indigo-600 hover:text-indigo-900" >
                      Add To Product
                    </a> &nbsp;
                    <a  @click="deleteData(data.id)" href="#" class="text-red-600 hover:text-red-900" >
                      Delete
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <pagination class="mt-6" :links="pricings.links" />
        </div>
      </div>
    </div>
  </div>
</BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';
import { ref, computed , watch} from 'vue'
import { Inertia } from '@inertiajs/inertia';
import {useForm} from "@inertiajs/inertia-vue3";
import Pagination from '@/Components/Pagination.vue';
import Swal from 'sweetalert2';
    const file = ref(null);
    const isOpens = ref(false);
    const isOpen = ref(false);
    const props = defineProps({
      pricings: Object,
      categories : Object,
        isOpen : false,
        isOpens : false,
        isImport : false,
        filters : Object,
       
    });
    const formData = useForm({
      edit_id : '',
      name: '',
      link: '',
      fb_user_profule: '',
      fb_group: '',
      editname: '',
      editreseller: '',
      category_id : '',
      description : '',
      editprice: '',
      edittier: '',

      fileX: '',
      
    });
    function onFileChange(event){
      formData.fileX = event.target.files[0];
   
        }
    function importData(){
          formData.post(route('pricing.import'), {
          preserveScroll: true,
          onSuccess: () => {
                Swal.fire({
                          title: 'Success',
                          text: 'Products has been imported',
                          type: 'success',
                          confirmButtonText: 'OK'
                      });
                    setTimeout(() => {
                              Inertia.visit('pricings', { preserveScroll: true });
                          }, 1000);
                
              }
          });
     }
     function saveData(){
      if(formData.name == '' ){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill all fields',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else{

              formData.post(route('pricing.create'), {
              preserveScroll: true,
              onSuccess: () => {
                    Swal.fire({
                              title: 'Success',
                              text: 'Data has been created',
                              type: 'success',
                              confirmButtonText: 'OK'
                          });
                        setTimeout(() => {
                                  Inertia.visit('pricings', { preserveScroll: true });
                              }, 1000);
                    
                  }
              });
            }
     }
     function updateData(){
      if(formData.editname == '' ){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill all fields',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else{

              formData.post(route('pricing.update'), {
              preserveScroll: true,
              onSuccess: () => {
                    Swal.fire({
                              title: 'Success',
                              text: 'Data has been updated',
                              type: 'success',
                              confirmButtonText: 'OK'
                          });
                        setTimeout(() => {
                                  Inertia.visit('pricings', { preserveScroll: true });
                              }, 1000);
                    
                  }
              });
            }
     }
     function editData(id,name,price,reseller,tier){
       isOpens.value = true;
       formData.edit_id = id;
       formData.editname = name;
       formData.editprice = price;
       formData.editreseller = reseller;
       formData.edittier = tier;
        }
        function deleteData(ids) {
            // alert(ids)
            Inertia.post(route('pricing.delete', {id: ids}));
        }
        const search = ref(props.filters.search);
        watch(search, value => {
    Inertia.get(route('pricings'), {search: value}, {preserveState: true, replace: true})
})

</script>
