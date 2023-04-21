<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { ComboboxOptions } from '@headlessui/vue';
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
    };
  },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     data: Object
    },
    methods: {
      myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;

      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
},
        saveData(){
            //validate
             this.$inertia.post(this.route('create.table'), {
                name: this.name,
                url: this.url,
            });
            this.isOpen = false;
        },
        editData(id, name, url){
            // alert(id)
            this.name = name;
            this.url = url;
            this.isOpens = true;
            this.id = id;
        },
        updateData(){
            // alert(this.id)
            this.$inertia.post(this.route('update.table', {id: this.id}), {
                name: this.name,
                url: this.url,
            });
            this.isOpens = false;
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
    <Head title="Database Lists" />
    <BreezeAuthenticatedLayout>

        <div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Database Table</h1>
      <!-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p> -->
    </div>
    <div class="relative mt-1 flex items-center">
      <input type="text" placeholder="Search table name..."  name="search" @keyup="myFunction()" id="myInput" class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
      <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
        <kbd class="inline-flex items-center rounded border border-gray-200 px-2 font-sans text-sm font-medium text-gray-400">Search</kbd>
      </div>
    </div>

    <!-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <button  @click="isOpen = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        Add New Table</button>

    </div> -->
                        <!-- <div class="flex items-center justify-between mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="isOpen = true">
                                Add New Table
                            </button>
                        </div> -->



      <div v-show="isOpen"  class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Add Database</h3>
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
              <label class="text-sm font-semibold">Table Name</label>
              <input v-on:input="name = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Table Url</label>
              <input   v-on:input="url = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
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
              <label class="text-sm font-semibold">Table Name</label>
              <input v-on:input="name = $event.target.value"  v-bind:value="name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Table Url</label>
              <input readonly  v-on:input="url = $event.target.value"  v-bind:value="url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <br />
            <div class="flex items-center justify-between mt-4">
            <button
              @click="isOpens = false"
              class="px-6 py-2 text-blue-800 border border-blue-600 rounded"
            >
              Cancel
            </button>
            <button @click="updateData()" class="p+!x-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">
              Save
            </button>
            </div>
          </div>
        </div>
      </div>

</div>



  </div>

   <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300" id="myTable">
            <thead class="bg-gray-50">
              <tr class="divide-x divide-gray-200">
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl No.</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                <!-- <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Path</th> -->
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr class="divide-x divide-gray-200" v-for="(datas, index, i)  in data" :key="index">
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ i+1}}</td>
                <td id="dataName" class="whitespace-nowrap p-4 text-sm text-gray-500">{{ datas.name }}</td>
                <!-- <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ datas.name }}</td> -->
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                    <button class="icon">
                                        <Link :href="datas.name" target="_new" class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                     </Link>
                    </button>
                    <!-- <button class="icon" @click="editData(datas.id, datas.name, datas.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    </button> -->
                    <!-- <button @click="deleteData(`${datas.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button> -->

                </td>
              </tr>

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





    </BreezeAuthenticatedLayout>
    </template>
