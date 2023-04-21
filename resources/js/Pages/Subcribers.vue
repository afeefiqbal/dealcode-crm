<template>
    <Head title="Subcribers" />
    <BreezeAuthenticatedLayout>
        <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Subcribers</h1>
            <!-- <p class="mt-2 text-sm text-gray-700">Your team is on the <strong class="font-semibold text-gray-900">Startup</strong> plan. The next payment of $80 will be due on August 4, 2022.</p> -->
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button @click="downloadCsv" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Export
            </button>
          </div>
        </div>
        <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.no</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(contacts, planIdx) in contact" :key="contacts.id">
                <td :class="[planIdx === 0 ? '' : 'border-t border-transparent', 'relative py-4 pl-4 sm:pl-6 pr-3 text-sm']">
                  <div class="font-medium text-gray-900">
                    {{ planIdx+1 }}
                  </div>
                </td>



                <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                    <div class="font-medium text-gray-900">
                        {{ contacts.email }}
                    </div>
                </td>

                <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                    <div class="font-medium text-gray-900">
                        <a href="mailto:{{ contacts.email }}" class="text-indigo-600 hover:text-indigo-900">Reply</a>
                    </div>
                </td>



              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </BreezeAuthenticatedLayout>
    </template>

    <script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, usePage} from '@inertiajs/inertia-vue3';
    const contact = usePage().props.value.subcribers;

    function downloadCsv() {
        window.location.href =  route('subcribers.export');
    }
    </script>
