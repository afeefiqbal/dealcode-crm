<template>
<Head title="Known Issues" />
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
        <div class="col-span-3 justify-between">
          <label class="text-sm w-full font-semibold">Product Name</label>
          <br>
          <input type="text" v-model="formData.product_name" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Issues</label>
          <textarea name="comments" id="comments"  v-model="formData.issues" cols="30" rows="4" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>
        
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Comments</label>
          <textarea name="comments" id="comments"  v-model="formData.comments" cols="30" rows="4" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>
        
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
        <input type="hidden" readonly v-model="formData.edit_id" name="" id="">
        <h3 class="text-2xl">update Data</h3>
        <svg  @click="isOpens = false" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-900 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
          <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2"  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="col-span-3 justify-between">
          <label class="text-sm w-full font-semibold">Product Name</label>
          <br>
          <input type="text" v-model="formData.editproduct_name" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Issues</label>
          <textarea name="comments" id="comments"  v-model="formData.editissues" cols="30" rows="4" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>
        
        </div>
        <div class="justify-between">
          <label class="text-sm font-semibold">Comments</label>
          <textarea name="comments" id="comments"  v-model="formData.editcomments" cols="30" rows="4" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>
        
        </div>
        <br />
        <div class="flex items-center justify-between mt-4">
          <button @click="isOpens = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
            <button @click="updateData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">Update </button>
        </div>
      </div>
    </div>
  </div>
  <!-- <div v-show="isImport"  class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
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
  </div> -->
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Known Issues</h1>
      
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <!-- <button type="button" @click="isImport = true" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
          Import Datas
        </button> &nbsp; -->
        <button type="button" @click="isOpen = true" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
          Add Datas
        </button>
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
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Issue</th>
                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Comments</th>
                  <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="(data, key) in knownIssues" :key="data.id" class="divide-x divide-gray-200">
                  <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ key+1}}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ data.product_name }}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ data.issues }}</td>
                  <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ data.comments }}</td>
                  <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                    <a @click="editData(data.id,data.product_name, data.issues, data.comments)" class="text-indigo-600 hover:text-indigo-900" >
                      Edit
                    </a> &nbsp;
                    <a  @click="deleteData(data.id)" href="#" class="text-red-600 hover:text-red-900" >
                      Delete
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
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
import { usePage } from '@inertiajs/inertia-vue3';
import { ref, computed } from 'vue'
import { Inertia } from '@inertiajs/inertia';
import {useForm} from "@inertiajs/inertia-vue3";
import Swal from 'sweetalert2';
    const file = ref(null);
    const isOpens = ref(false);
    const isOpen = ref(false);
    const props = defineProps({
      knownIssues: Object,
        isOpen : false,
        isOpens : false,
        isImport : false,
      
       
    });
    const formData = useForm({
      edit_id : '',
      product_name: '',
      issues: '',
      comments: '',
      editproduct_name: '',
      editissues: '',
      editcomments: '',
    });
 
     function saveData(){
      if(formData.product_name == '' ){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill all fields',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else{

              formData.post(route('known_issues.create'), {
              preserveScroll: true,
              onSuccess: () => {
                    Swal.fire({
                              title: 'Success',
                              text: 'Data has been created',
                              type: 'success',
                              confirmButtonText: 'OK'
                          });
                        setTimeout(() => {
                                  Inertia.visit('known_issues', { preserveScroll: true });
                              }, 1000);
                    
                  }
              });
            }
     }
     function updateData(){
      if(formData.editproduct_name == '' ){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill all fields',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else{

              formData.post(route('known_issues.update'), {
              preserveScroll: true,
              onSuccess: () => {
                    Swal.fire({
                              title: 'Success',
                              text: 'Data has been created',
                              type: 'success',
                              confirmButtonText: 'OK'
                          });
                        setTimeout(() => {
                                  Inertia.visit('known_issues', { preserveScroll: true });
                              }, 1000);
                    
                  }
              });
            }
     }
     function editData(id,product_name,issues,comments){
       isOpens.value = true;
       formData.edit_id = id;
       formData.editproduct_name = product_name;
       formData.editissues = issues;
       formData.editcomments = comments;
        }
        function deleteData(ids) {
            // alert(ids)
            Inertia.post(route('known_issues.delete', {id: ids}));
        }
</script>
