<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Swal from 'sweetalert2';
    // import DataTable from 'laravel-vue-datatable';

    // Vue.use(DataTable);

    export default {
        data(){
            return {
                isOpen: false,
                isOpens: false,
                fileX: '',
                product_name: '',
                name: '',
                area_of_expertise: '',
                contact_number: '',
                notes: '',
                website : '',
            }
        },
        components: {
          Head,
          Link,
          BreezeAuthenticatedLayout,
        },
        props: {
            serviceProvider: Array
        },
        methods: {
        saveData(){

            if(this.name == '' || this.area_of_expertise == '' || this.contact_email == '' || this.contact_number == '' || this.notes == ''){
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill all fields',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
            else{

                let formData = new FormData();
                formData.append('product_name', this.product_name ?? '');
                formData.append('name', this.name);
                formData.append('area_of_expertise', this.area_of_expertise);
                formData.append('contact_email', this.contact_email);
                formData.append('number', this.contact_number);
                formData.append('notes', this.notes);
                formData.append('website', this.website);
                this.$inertia.post(this.route('service.provider.store'), formData);

                Swal.fire({
                    title: 'Success',
                    text: 'SAAS services has been added',
                    type: 'success',
                    confirmButtonText: 'Ok'
                }).then(function(){
                    location.reload();
                },2000);
            }
        },
        editData(id, name, expertise,contact_email,contact_number,website,notes){
   
          this.isOpens = true;
          this.name = name;
          this.contact_number = contact_number;
          this.website = website;
          this.notes = notes;
          this.area_of_expertise = expertise;
          this.contact_email = contact_email;
          this.edit_id = id;

         
        },
        updateData(){
          this.$inertia.post(this.route('service.provider.update', {id: this.edit_id}), {
           name :  this.name,
         contact_number : this.contact_number,
         website :  this.website, 
          notes : this.notes,
          area_of_expertise : this.area_of_expertise ,
          contact_email : this.contact_email,
            });
            
            Swal.fire({
                    title: 'Success',
                    text: 'SAAS services has been added',
                    type: 'success',
                    confirmButtonText: 'Ok'
                }).then(function(){
                    location.reload();
                },2000);
        },
        deleteData(ids) {
            this.$inertia.post(this.route('service.provider.delete', {id: ids}));
        }
    }
      }

    </script>
    <template>
        <Head title="SAAS  services" />
        <BreezeAuthenticatedLayout>

     <div class="pt-6 px-4">
     <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4">
         <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                         <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">SAAS  service</h3>

                        <div class="flex items-center justify-between mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="isOpen = true">
                               Add
                            </button>
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
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                     Area of expertise
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Contact Email
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                         Number
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Website
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                        Notes
                                     </th>
                                     <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                        Actions
                                     </th>

                                  </tr>
                               </thead>
                               <tbody class="divide-y divide-gray-100">
                                <!-- <div v-for="user in latest_five_users" :key="user.id"> -->

                                  <tr class="text-gray-500" v-for="(product, index, i)  in serviceProvider" :key="index">
                           <!-- {{product}} -->
                          <!-- {{ product.report_types.name}} -->
                           <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ index+1 }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.name }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.expertise }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.contact_email }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.contact_number }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.website }}</td>
                                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ product.notes }}</td>
                                   <td>
                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <button class="icon"  @click="editData(product.id, product.name, product.expertise,product.contact_email,product.contact_number,product.website,product.notes) ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    </button> 
                                        <button @click="deleteData(`${product.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
                                          Delete </button>

                                    </td>
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

                  <div
        v-show="isOpen"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
        "
      >

      <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-2xl">SAAS  services</h3>
          <div class="sm:flex sm:items-start">

            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
             
                <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="justify-between">
              <label class="text-sm font-semibold">Name</label>
              <input type="text" v-model="name" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Area of Expertise</label>
              <input type="text" v-model="area_of_expertise" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Contact Email</label>
              <input type="email" v-model="contact_email" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Number</label>
              <input type="number" v-model="contact_number" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Notes</label>
              <input type="text" v-model="notes" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
            <div class="justify-between">
              <label class="text-sm font-semibold">Website</label>
              <input type="text" v-model="website" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
            </div>
                </div>

            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button   @click="saveData()"  type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
          <button @click="isOpen = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
        </div>
      </div>
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
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <input type="text" v-model="edit_id" hidden>
<div class="grid gap-6 mb-6 md:grid-cols-2">
<div class="justify-between">
<label class="text-sm font-semibold">Name</label>
<input type="text" v-model="name" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<div class="justify-between">
<label class="text-sm font-semibold">Area of Expertise</label>
<input type="text" v-model="area_of_expertise" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<div class="justify-between">
<label class="text-sm font-semibold">Contact Email</label>
<input type="email" v-model="contact_email" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<div class="justify-between">
<label class="text-sm font-semibold">Number</label>
<input type="number" v-model="number" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<div class="justify-between">
<label class="text-sm font-semibold">Notes</label>
<input type="text" v-model="notes" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<div class="justify-between">
<label class="text-sm font-semibold">Website</label>
<input type="text" v-model="website" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
</div>
<br />
            <div class="flex items-center justify-between mt-4">
            <button
              @click="isOpen = false"
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
        </BreezeAuthenticatedLayout>
        </template>
