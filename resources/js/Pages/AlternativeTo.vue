
<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Head title="Alternative To" />
    <BreezeAuthenticatedLayout>



        <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Alternative To</h1>
        <!-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p> -->
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button @click="isOpen = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add</button>
        <div
        v-show="isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50"
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Add </h3>

          </div>
          <div class="mt-4">

            <div class="justify-between">
              <label class="text-sm font-semibold">Title</label>
              <input v-model="formData.title" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Url</label>
              <input  v-model="formData.url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Hashtags</label>
              <input   v-model="formData.hashtag" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <!-- <div class="justify-between">
              <label class="text-sm font-semibold">Please Attach Your file (CSV,XL)</label>
              <input @change="onFileChange"  type="file" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div> -->

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
            <h3 class="text-2xl">Edit </h3>

          </div>
          <div class="mt-4">

            <input v-model="formData.id" type="hidden">
            <div class="justify-between">
              <label class="text-sm font-semibold">Title</label>
              <input v-model="formData.title" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Url</label>
              <input  v-model="formData.url" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Hashtags</label>
              <input   v-model="formData.hashtag" type="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <!-- <div class="justify-between">
              <label class="text-sm font-semibold">Please Attach Your file (CSV,XL)</label>
              <input @change="onFileChange"  type="file" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />

            </div> -->

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
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <!-- <div v-if="selectedPeople.length > 0" class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
              <button type="button" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Bulk edit</button>
              <button type="button" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Delete all</button>
            </div> -->
            <table class="min-w-full table-fixed divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    ID  <!-- <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6" :checked="indeterminate || selectedPeople.length === people.length" :indeterminate="indeterminate" @change="selectedPeople = $event.target.checked ? people.map((p) => p.email) : []" /> -->
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Url</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Hashtags</th>

                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="(person,index) in people" :key="person.email" :class="[selectedPeople.includes(person.email) && 'bg-gray-50']">
                  <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ index+1 }}
                  </td>
                  <td :class="['whitespace-nowrap py-4 pr-3 text-sm font-medium', selectedPeople.includes(person.email) ? 'text-indigo-600' : 'text-gray-900']">
                    {{ person.title }}
                  </td>
                  <td :class="['whitespace-nowrap py-4 pr-3 text-sm font-medium', selectedPeople.includes(person.email) ? 'text-indigo-600' : 'text-gray-900']">
                    {{ person.link }}
                  </td>
                  <td :class="['whitespace-nowrap py-4 pr-3 text-sm font-medium', selectedPeople.includes(person.email) ? 'text-indigo-600' : 'text-gray-900']">
                    {{ person.hashtag }}
                  </td>
                  <td>
                     <button class="icon"  @click="editData(person.id, person.title, person.link,person.hashtag)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    </button> 
                    <button @click="deleteData(`${person.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button>

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
    const people = usePage().props.value.alternatives;
    const file = ref(null);
    // alert(JSON.stringify(people))
    const isOpen = ref(false);
    const isOpens = ref(false);
    function onFileChange(e) {
      file.value = e.target.files[0];
    }
    const formData = useForm({
      title: '',
      url: '',
      hashtag: '',

    });
    function saveData(){
    
        
        Inertia.post(route('import_alertnative_to', formData), formData, {
            preserveState: true,
            onSuccess: () => {
                isOpen.value = false;
                timeOut = setTimeout(() => {
                        Inertia.visit('alternative_tos', { preserveScroll: true });
                    }, 1000);
            },
        });
    }

function  editData(id, name, url,hashtag){
  isOpens.value = true;
            // alert(id)
            formData.title = name;
            formData.url = url;
            formData.id = id;
            formData.hashtag = hashtag;
        }
    const selectedPeople = ref([])
    function updateData(){
    
        
    Inertia.post(route('update_alertnative_to', formData), formData, {
        preserveState: true,
        onSuccess: () => {
            isOpens.value = false;
            timeOut = setTimeout(() => {
                    Inertia.visit('alternative_tos', { preserveScroll: true });
                }, 1000);
        },
    });
}
function deleteData(ids) {
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
               Inertia.get(route('delete_alternative_to', {id: ids}));
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
