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
        };
    },
    components: {
        Head,
        Link,
        BreezeAuthenticatedLayout,
    },
    props: {
        datas: Object
    },
    methods: {
        saveData() {
            //validate
            var data = this.$inertia.post(this.route('blacklist-words.create'), {
                type: this.name,
                word: this.url,
            });

            Swal.fire({
                title: 'Success',
                text: 'Category Created successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });

            // console.log(data);
            this.isOpen = false;
        },
        editData(id, name, slug) {
            // alert(id)
            this.name = name;
            this.url = slug;
            this.isOpens = true;
            this.id = id;
        },
        updateData() {
            // alert(this.id)
            this.$inertia.post(this.route('blacklist-words.update', {id: this.id}), {
                type: this.name,
                word: this.url,
            });
            Swal.fire({
                title: 'Success',
                text: 'Blacklist Updated successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
            this.isOpens = false;
        },
        deleteData(id) {
            // this.$inertia.post(this.route('delete.category', {id: id}));
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    this.$inertia.post(this.route('blacklist-words.delete', {id: id}));
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
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
    <Head title="Blacklist Lists" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Blacklist</h3>

                        <div class="flex items-center justify-between mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="isOpen = true">
                                Add Blacklist Word
                            </button>
                        </div>



      <div
        v-show="isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50"
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Add Blacklist</h3>
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
              <label class="text-sm font-semibold">Type </label>
              <select class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" v-on:input="name = $event.target.value">
                <option value="">Select Type</option>
                <option value="domain">Domain</option>
                <option value="word">Word</option>
                <option value="ip">Ip</option>
               </select>

              <!-- <input v-on:input="name = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" /> -->

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Word</label>
              <input  v-on:input="url = $event.target.value" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
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
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50"
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Edit Blacklist</h3>
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
              <label class="text-sm font-semibold"> Type</label>

              <select class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"  v-on:input="name = $event.target.value"  v-bind:value="name">
                <option value="">Select Type</option>
                <option value="domain">Domain</option>
                <option value="word">Word</option>
                <option value="ip">Ip</option>
               </select>



              <!-- <input v-on:input="name = $event.target.value"  v-bind:value="name" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" /> -->

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Word  </label>
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
                                    Type</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Word
                                 </th>

                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->
                              <tr class="text-gray-500" v-for="data in datas" :key="data.id">
                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ data.type }}</td>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ data.entry }}</td>

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">

                                            <button @click="editData(data.id, data.type, data.entry)" class="px-4 py-2 text-blue-100 bg-blue-600 rounded">
                                                Edit
                                            </button> 	&nbsp;

                                            <button @click="deleteData(`${data.id}`)"  class="px-4 py-2 text-blue-100 bg-red-600 rounded"><i class="fa fa-trash">  </i>
                                            Delete </button>

                                    </td>
                                 </tr>
                              <!-- </div> -->

                           </tbody>
                        </table>


                     </div>
                  </div>
                </div>
              </div>




    </BreezeAuthenticatedLayout>
    </template>
