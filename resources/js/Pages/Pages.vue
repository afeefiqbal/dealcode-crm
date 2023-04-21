<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Swal from 'sweetalert2'
    import { Inertia } from '@inertiajs/inertia';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data(){
        return {
            editor: ClassicEditor,
                editorData: '',
                editorConfig: {
                    // The configuration of the editor.
            },
            type: '',
            datas: true,
            form: false,
            is_edit: false,
            name: '',
            slug: '',
            imageP: '',
            description: '',
            img: '',
            email: '',
            contact_name: '',
            edit_id: '',
            title: '',
            keywords: '',
        }
    },
        components: {
          Head,
          Link,
          BreezeAuthenticatedLayout,
        },
        props: {
            pages: Array
        },
        methods: {
        clearInputs(){
            this.title = '';
            this.editorData = '';
            this.type = '';
            this.slug = '';
            this.is_edit = false;
            this.edit_id = '';
        },
        clearStates(){
            this.clearInputs();
            this.form = false;
            this.datas = true;
        },
        forms(data, id){
            // alert(JSON.stringify(data));
            this.editorData = data.content;
            this.type = data.type;
            this.title = data.name;
            this.slug =  data.slug;
            this.datas = false
            this.form = true
            this.is_edit = true
            this.edit_id = id
        },
        saveData(){

           if( this.title == ''  || this.editorData == ''){
                Swal.fire({
                    title: 'Error!',
                    text: 'Please fill all fields',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }else{


           if(this.is_edit){
            //valdate form
                let formData = new FormData();
                formData.append('type', this.type);
                formData.append('name', this.title);
                formData.append('slug', this.slug);
                formData.append('content', this.editorData);

                this.$inertia.post(route('pages.update', {id: this.edit_id}), formData)

            Swal.fire({
                    title: 'Success',
                    text: 'Pages updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
           }else{
            //image
            let formData = new FormData();
            formData.append('type', this.type);
            formData.append('name', this.title);
            formData.append('slug', this.slug);
            formData.append('content', this.editorData);

            console.log(formData);

            this.$inertia.post(this.route('pages.create'), formData);


            Swal.fire({
                    title: 'Success',
                    text: 'Pages created successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            this.clearInputs();
           }
            }
        },
        onFileChange(event){
        this.imageP = event.target.files[0];
        },
        aprove(id){
            this.$inertia.post(route('slider-status', {id: id}));
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
                   this.$inertia.post(this.route('pages.delete', {id: ids}));
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
        <Head title="Pages Lists" />
        <BreezeAuthenticatedLayout>

  <div class="px-4 sm:px-6 lg:px-8" v-if="datas">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Pages</h1>
      <!-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p> -->
    </div>
   <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <button type="button"  @click="datas = false, form = true" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Page</button>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <a href="#" class="group inline-flex">
                    Sl.no
                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <!-- Heroicon name: mini/chevron-down -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <a href="#" class="group inline-flex">
                    Title
                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <!-- Heroicon name: mini/chevron-down -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <a href="#" class="group inline-flex">
                    URL
                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <!-- Heroicon name: mini/chevron-down -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <a href="#" class="group inline-flex">
                    Actions
                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <!-- Heroicon name: mini/chevron-down -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(page,key) in pages" :key="page.id">
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ key+1 }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ page.name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ page.slug }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <button @click="forms(page, page.id)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-pencil-square-o">  </i>   Edit
                                            </button>
                                            <button @click="deleteData(`${page.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
                                              Delete </button>
                </td>


              </tr>

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



        <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40" v-if="form">
         <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">Edit/Create Pages</h3>
                            <div class="flex items-center">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  @click="clearStates">
                                    Back
                                </button>
                            </div>
                         </div>
            <br />
            <br />
        <div class="mb-4 grid gap-6 grid-cols-2">
          <div class="justify-between">
            <label for="text" class="mb-2 font-semibold">Title</label>
            <input  v-model="title" type="text" id="text" class="w-full rounded-lg border border-slate-200  hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
          </div>
          <div class="justify-between">
            <label for="text" class="mb-2 font-semibold">Url</label>
            <input  v-model="slug" type="text" id="text" class="w-full rounded-lg border border-slate-200  hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
          </div>
          <!-- <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Type</label>
            <select v-model="type" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option value="">Select Type</option>
              <option value="standard">Standard</option>
              <option value="terms">Terms</option>
              <option value="privacy">Privacy</option>
              <option value="tips">Tips</option>
            </select>
          </div> -->


           <div class="flex flex-col col-span-2">
            <br>
            <label for="text" class="mb-2 font-semibold">Content</label>
            <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
            </div>
        </div>





     <br />

          <div class="flex items-center">
           <button @click="saveData" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">Save Data</button>

        </div>

      </div>








        </BreezeAuthenticatedLayout>
        </template>
