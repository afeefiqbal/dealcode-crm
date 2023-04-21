<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Head title="User Types" />
    <BreezeAuthenticatedLayout>



        <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">User Types</h1>
        <!-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p> -->
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button @click="isOpen = true" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Import</button>
        <div
        v-show="isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50"
      >
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
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>

                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="(person,index) in people" :key="person.email" :class="[selectedPeople.includes(person.email) && 'bg-gray-50']">
                  <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    {{ index+1 }}
                  </td>
                  <td :class="['whitespace-nowrap py-4 pr-3 text-sm font-medium', selectedPeople.includes(person.email) ? 'text-indigo-600' : 'text-gray-900']">
                    {{ person.name }}
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

    const people = usePage().props.value.types;
    const file = ref(null);
    // alert(JSON.stringify(people))
    const isOpen = ref(false);

    function onFileChange(e) {
      file.value = e.target.files[0];
    }

    function saveData(){
        const formData = new FormData();
        formData.append('file', file.value);
        Inertia.post(route('import_user_type', formData), formData, {
            preserveState: true,
            onSuccess: () => {
                isOpen.value = false;
            },
        });
    }


    const selectedPeople = ref([])

  </script>
