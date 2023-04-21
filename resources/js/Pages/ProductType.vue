<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
// import DataTable from 'laravel-vue-datatable';
import Swal from 'sweetalert2';
// Vue.use(DataTable);

export default {
    data(){
    return {
        datas: true,
        form: false,
        is_edit: false,
        title: '',
        active: 1,
        error: false,

    }
},
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     productTypes: Object
    },
    methods: {
    deleteData(ids) {
        // alert(ids)
        this.$inertia.post(this.route('delete.productType', {id: ids}));
    },
    clearStates(){
        this.is_edit = false;
        this.form = false;
        this.datas = true;
        this.title = '';
        this.active = 1;
    },
    saveData(){
        this.axios.post(this.route('type.create'), {
            title: this.title,
            active: this.active,
        }).catch(error => {
            this.error = true;
            // console.log(this.error);
            this.errors = error.response.data.errors;

            // console.log(this.errors);

        }).then((res) => {
            Swal.fire({
                title: 'Success',
                text: res.data.success,
                type: 'success',
                confirmButtonText: 'OK'
            })
            this.clearStates();
            // this.getData();
        // });
        });


    }
}
  }

</script>
<template>
    <Head title="Product Type" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4" v-if="datas">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Types</h3>
                        <div class="flex items-center">
                            <div class="relative">
                              <button @click="datas = false, form = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Product type
                                </button>
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
                                  Name
                                 </th>

                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th> -->

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                              <tr class="text-gray-500" v-for="productType in productTypes" :key="productType.id">
                               <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ productType.id }}</td>

                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ productType.title }}</td>

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <Link :href="route('productType.edit',`${productType.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-pencil-square-o">  </i>   Edit </Link>
                                        <button @click="deleteData(`${productType.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
                                          Delete </button>

                                    </td>
                                 </tr>
                              <!-- </div> -->

                           </tbody>
                        </table>
                         <!-- <pagination class="mt-6" :links="users.links" /> -->
                     </div>
                  </div>
                </div>


                <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40" v-if="form">
     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Edit/Create Type</h3>
                        <div class="flex items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  @click="clearStates">
                                Back
                            </button>
                        </div>
                     </div>
        <br />
        <br />
            <div class="mb-4 grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label for="text" class="mb-2 font-semibold">Title</label>
                <input  v-model="title" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                <br />
                 <div class="alert-danger" v-if="error" style="color: red">
                    {{ errors.title[0] }}
                </div>
              </div>
   
            </div>






 <br />

      <div class="flex items-center">
       <button @click="saveData" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="updateUser">Update</button>

    </div>

  </div>








              </div>





    </BreezeAuthenticatedLayout>
    </template>
