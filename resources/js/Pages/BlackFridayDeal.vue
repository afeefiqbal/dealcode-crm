<template>
    <Head title="Black Friday Deals" />
    <BreezeAuthenticatedLayout>   
        <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Black Friday Deals</h1>
        <!-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p> -->
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none" >
        <button @click="showAdd()" v-show="addButton" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add</button>&nbsp;&nbsp;
        <button type="button" @click="isImport = true" v-show="importButton" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
          Import Deals
        </button> &nbsp;
        <div v-show="isOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Add </h3>
          </div>
        
        </div>
      </div>
    </div>
    </div>
    <div class="mt-8 flex flex-col" v-show="isShow">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr class="divide-x divide-gray-200">
                  <th scope="col" class=" divide-y divide-x divide-gray-200">
                    ID 
                  </th>
                  <th scope="col" class="divide-y divide-x divide-gray-300  text-center text-sm font-bold text-gray-900">Deal Name</th>
                  <!-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Url</th> -->
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">From Date</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">To Date</th>
                  <th scope="col" class=" text-left text-sm font-semibold text-gray-900">Year</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Discount</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">CouponCode</th>
               
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="(data,index) in datas.data" :key="data.id" class="divide-x divide-gray-200">
                  <td class=" text-sm text-gray-500 sm:pl-6">
                    {{ index+1 }}
                  </td>
                  <td class=" py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ data.deal_name }}
                  </td>
                  <!-- <td class="py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                  
               {{ data.url }} 
                  </td> -->
                  <td class="py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ data.from_date }}
                  </td>
                  <td class="py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                   {{ data.to_date }}
                  </td>
               
              
                  <td class=" py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ data.year }}
                  </td>
                  <td class=" py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ data.discount }}
                  </td>
                  <td class=" py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ data.coupon_code }}
                  </td>
               
                  <td>
                    <button  @click="editData(data.id,data.deal_name, data.url, data.from_date,data.to_date,data.year,data.discount, data.coupon_code,data.deal_details, data.tier_1,data.tier_2,data.tier_3)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-pencil"></i></button>
                    <button @click="deleteData(`${data.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button>

                  </td>


                </tr>
              </tbody>
            </table>
          </div>
          <pagination class="mt-6" :links="datas.links" />
        </div>
      </div>
    </div>
    <div class="md:grid md:grid-cols-1 md:gap-6" v-show="isAdd">
        <div class="mt-4 md:col-span-2 md:mt-0" >
             <button @click="showTable()" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Back</button>
        </div>
        <div class="pt-6 px-4">
            <div class="w-full rounded-xl  ">
                <div class="mt-4 md:col-span-2 md:mt-0">
                  
                    <form v-if="saveButton" @submit.prevent="saveData" >
                    
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-4 gap-6">
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Deal Name</label>
                                        <input v-model="formData.deal_name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

                                    </div>
                                    <input  v-model="formData.id">
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Url</label>
                                         <input  v-model="formData.url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">From Date</label>
                                        <input   v-model="formData.from_date" type="date" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">To Date</label>
                                        <input   v-model="formData.to_date" type="date" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Year</label>
                                        <input   v-model="formData.year" type="year" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Discount</label>
                                        <input   v-model="formData.discount" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Coupon code</label>
                                        <input   v-model="formData.coupon_code" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Deal Details</label>
                                        <input   v-model="formData.deal_details" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                 
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Tier 1</label>
                                        <input   v-model="formData.tier_1" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Tier 2</label>
                                        <input   v-model="formData.tier_2" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <div class="justify-between">
                                        <label class="text-sm font-semibold">Tier 3</label>
                                        <input   v-model="formData.tier_3" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                    </div>
                                    <br />
                                    <div class="flex items-center justify-between mt-4">
                                        <button @click="showTable()" type="button"  class="px-6 py-2 text-blue-800 border border-blue-600 rounded" > Cancel </button>
                                        <button @click="saveData()"  v-show="saveButton" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">  Save </button>
                                        <button   @click="updateData()"  v-show="updateButton"  class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">  Update </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form v-else @submit.prevent="updateData" >
                    
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-4 gap-6">
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Deal Name</label>
                                    <input v-model="formData.deal_name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

                                </div>
                                <input  v-model="formData.id" readonly hidden>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Url</label>
                                     <input  v-model="formData.url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">From Date</label>
                                    <input   v-model="formData.from_date" type="date" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">To Date</label>
                                    <input   v-model="formData.to_date" type="date" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Year</label>
                                    <input   v-model="formData.year" type="year" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Discount</label>
                                    <input   v-model="formData.discount" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Coupon code</label>
                                    <input   v-model="formData.coupon_code" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Deal Details</label>
                                    <input   v-model="formData.deal_details" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                             
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Tier 1</label>
                                    <input   v-model="formData.tier_1" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Tier 2</label>
                                    <input   v-model="formData.tier_2" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <div class="justify-between">
                                    <label class="text-sm font-semibold">Tier 3</label>
                                    <input   v-model="formData.tier_3" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                                </div>
                                <br />
                                <div class="flex items-center justify-between mt-4">
                                    <button @click="showTable()" type="button" class="px-6 py-2 text-blue-800 border border-blue-600 rounded" > Cancel </button>
                                    <button @click="saveData()"  v-show="saveButton" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">  Save </button>
                                    <button   @click="updateData()"  v-show="updateButton"  class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">  Update </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
          <button @click="isImport = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"  type="button"> Cancel </button>
          <button @click="importData()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Save </button>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
    </BreezeAuthenticatedLayout>


  </template>

  <script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { usePage } from '@inertiajs/inertia-vue3';
    import { ref, computed,defineProps } from 'vue'
    import { Inertia } from '@inertiajs/inertia';
    import {useForm} from "@inertiajs/inertia-vue3";
    import Swal from 'sweetalert2';
    import Pagination from '@/Components/Pagination.vue';
    const isAdd = ref(false);
    const isShow = ref(true);
    const isImport = ref(false);
    const addButton = ref(true);
    const saveButton = ref(false);
    const importButton = ref(true);
    const updateButton = ref(false);
    const props = defineProps({
        datas: Object,
        isOpen : false,
        isOpens : false,
        isImport : false,
      
       
    });

    const formData = useForm({
      id : '',
        deal_name:'',
        url:'',
        from_date:'',
        to_date:'',
        year:'',
        discount:'',
        coupon_code : '',
        deal_details : '',
        tier_1 : '',
        tier_2 : '',
        tier_3 : '',
        fileX : '',
    });
    function showAdd(){
        isAdd.value = true;
        isShow.value = false;
        addButton.value = false;
        updateButton.value = false;
        updateButton.value = false;
        saveButton.value = true;
    }
    function showTable(){
        isAdd.value = false;
        isShow.value = true;
        addButton.value = true;
        updateButton.value = false;
        
    }
    function editData(id,deal_name,url,from_date,to_date,year,discount,coupon_code,deal_details,tier_1,tier_2,tier_3){
      formData.deal_name = deal_name;
      formData.id = id;
      formData.url = url;
      formData.from_date = from_date;
      formData.to_date = to_date;
      formData.year = year;
      formData.discount = discount;
      formData.coupon_code = coupon_code;
      formData.deal_details = deal_details;
      formData.tier_1 = tier_1;
      formData.tier_2 = tier_2;
      formData.tier_3 = tier_3;
      isAdd.value = true;
     isShow.value = false;
     addButton.value = false;
     updateButton.value = true;
     saveButton.value = false;
        
    }
    function onFileChange(event){
      formData.fileX = event.target.files[0];
    
   
        }
    function importData(){
     
          formData.post(route('black_friday_deals.import'), {
          preserveScroll: true,
          onSuccess: () => {
                Swal.fire({
                          title: 'Success',
                          text: 'Products has been imported',
                          type: 'success',
                          confirmButtonText: 'OK'
                      });
                    setTimeout(() => {
                              Inertia.visit('black_friday_deals', { preserveScroll: true });
                          }, 1000);
                
              }
          });
     }
    function saveData() {

      formData.post(route('blackFriday.store'), {
        preserveScroll: true,
        onSuccess: () => {
          Swal.fire({
                    title: 'Success',
                    text: 'Deals has been created',
                    type: 'success',
                    confirmButtonText: 'OK'
                });
               setTimeout(() => {
                        Inertia.visit('/black_friday_deals', { preserveScroll: true });
                    }, 1000);
           
        }
    });
}
function updateData() {
      formData.post(route('black_friday_update.update'), {
        preserveScroll: true,
        onSuccess: () => {
          Swal.fire({
                    title: 'Success',
                    text: 'Deals has been updated',
                    type: 'success',
                    confirmButtonText: 'OK'
                });
               setTimeout(() => {
                        Inertia.visit('/black_friday_deals', { preserveScroll: true });
                    }, 1000);
           
        }
    });
}
function deleteData(ids) {
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
               Inertia.post(route('black_friday_deals.delete', {id: ids}));
               Swal.fire({
                title: 'Success',
                text: 'dataa deleted successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
            }
          });

}
  </script>