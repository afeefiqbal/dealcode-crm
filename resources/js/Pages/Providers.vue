<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2'
import { Inertia } from '@inertiajs/inertia';

export default {
    data(){
    return {
        datas: true,
        form: false,
        is_edit: false,
        name: '',
        url: '',
        description: '',
        email: '',
        contact_name: '',
        edit_id: '',
        code: '',
    }
},
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     providers: Object
    },
    methods: {
    clearInputs(){
        this.name = '';
        this.url = '';
        this.description = '';
        this.email = '';
        this.contact_name = '';
    },
    forms(data, id){
        this.name = data.title;
        this.url = data.link;
        this.code = data.code;
        this.description = data.short_description;

        this.datas = false
        this.form = true
        this.is_edit = true
        this.edit_id = id
    },
    saveData(){
       if(this.is_edit){
        this.$inertia.post(this.route('update.provider', {id: this.edit_id}), {
            name: this.name,
            link: this.url,
            code: this.code,
            description: this.description,
            // email: this.email,
            // contactname: this.contact_name,
        });

        Swal.fire({
                title: 'Success',
                text: 'Provider updated successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
       }else{
        this.$inertia.post(this.route('create.provider'), {
            name: this.name,
            link: this.url,
            code: this.code,
            description: this.description,


        });
        Swal.fire({
                title: 'Success',
                text: 'Provider created successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        this.clearInputs();
       }
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
               this.$inertia.post(this.route('delete.provider', {id: ids}));
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
    <Head title="Provider Lists" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4"  v-if="datas">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Provider</h3>
                        <div class="flex items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="datas = false, form = true">
                                Add Provider
                            </button>
                        </div>
                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Code</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name</th>
                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Email
                                 </th> -->
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    link
                                 </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Description
                                 </th>

                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->
                              <tr class="text-gray-500" v-for="provider in providers" :key="provider.id">
                                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ provider.code }}</td>
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ provider.title }}</td>
                                 <!-- <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ provider.email }}</td> -->
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ provider.link }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ provider.short_description }}</td>
                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <button @click="forms(provider, provider.id)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-pencil-square-o">  </i>   Edit
                                        </button>
                                        <button @click="deleteData(`${provider.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
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
     <span class="text-gray-600 font-semibold">
            <h3>Edit/Create Provider</h3>

        </span>
        <br />
        <br />
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Name</label>
        <input v-model="name" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Code</label>
        <input  v-model="code"  type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>

   <div class="mb-4 grid grid-cols-2 gap-4">
    <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Description</label>
        <textarea  v-model="description" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>

        </div>
        <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Link</label>
        <input  v-model="url" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
    </div>

     <div class="mb-4 grid grid-cols-2 gap-4">
        <!-- <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Contact Name</label>
        <input  v-model="contact_name" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div> -->

     </div>



      <div class="flex items-center">
       <button @click="saveData" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="updateUser">Update</button>

    </div>

  </div>




              </div>




    </BreezeAuthenticatedLayout>
    </template>
