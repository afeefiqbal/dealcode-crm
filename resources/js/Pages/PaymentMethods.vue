<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
// import DataTable from 'laravel-vue-datatable';

// Vue.use(DataTable);

export default {
    data(){
        return {
            title: '',
            isOpen: false,
        }
    },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     paymentMethods: Object
    },
    methods: {
    deleteData(ids) {
        // alert(ids)
        this.$inertia.post(this.route('payment.delete', {id: ids}));
    },
    save(){
        this.$inertia.post(this.route('payment.create'), {
            title: this.title,
        });
        this.title = '';
        this.isOpen = false;
    }
}
  }

</script>
<template>
    <Head title="Payments Methods" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Payment Methods</h3>
                        <button  @click="isOpen = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add
                        </button>
                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name
                                 </th>
                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                  Display Name
                                 </th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                   Contries
                                 </th> -->

                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                              <tr class="text-gray-500" v-for="paymentMethod in paymentMethods" :key="paymentMethod.id">

                                 <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ paymentMethod.title }}</td>
                                 <!-- <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ paymentMethod.display_name }}</td> -->
                                 <!-- <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ paymentMethod.countries}}</td> -->

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                        <!-- <a href="#" class="text-blue-500 hover:text-blue-600 mr-4">Edit</a> -->
                                        <a href="#" @click="deleteData(paymentMethod.id)" class="text-red-500 hover:text-red-600">Delete</a>
                                        </div>
                                    </td>

                              </tr>
                              <!-- </div> -->

                           </tbody>
                        </table>
                         <!-- <pagination class="mt-6" :links="users.links" /> -->
                     </div>
                  </div>
                </div>
              </div>

              <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="isOpen">
  <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
        <div>

          <div class="mt-3 text-center sm:mt-5">
            <div class="mt-2">
                <div class="col-span-3 sm:col-span-2">
                <label for="company-website" class="block text-sm font-medium text-gray-700">Website</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">#</span>
                  <input v-model="title" type="text" name="company-website" id="company-website" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Paypal">
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-6">
          <button @click="save" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">
            Submit </button>
           <br />
           <br />
           <button @click="isOpen = false" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>




    </BreezeAuthenticatedLayout>
    </template>
