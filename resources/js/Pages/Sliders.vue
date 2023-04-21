<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2'
import { Inertia } from '@inertiajs/inertia';
import VueCropper from 'vue-cropperjs'
import 'cropperjs/dist/cropper.css'

export default {
    data(){
    return {
        datas: true,
        form: false,
        is_edit: false,
        name: '',
        imageP: '',
        description: '',
        img: '',
        email: '',
        contact_name: '',
        edit_id: '',
        title: '',
        keywords: '',
        mime_type: '',
        cropedImage: '',
        autoCrop: false,
        selectedFile: '',
        image: '',
        dialog: false,
        files: '',
    }
},
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
      VueCropper,
    },
    props: {
     sliders: Object
    },
    methods: {
    clearInputs(){
        this.title = '';
        this.link = '';
        this.image = '';
        this.is_edit = false;
        this.edit_id = '';
    },
    onFileSelect(e) {
      const file = e.target.files[0]
      this.mime_type = file.type
      console.log(this.mime_type)
      if (typeof FileReader === 'function') {
        this.dialog = true
        const reader = new FileReader()
        reader.onload = (event) => {
          this.selectedFile = event.target.result
        //   alert(this.selectedFile)
          this.$refs.cropper.replace(this.selectedFile)
        }
        reader.readAsDataURL(file)
      } else {
        alert('Sorry, FileReader API not supported')
      }
    },
    clearStates(){
        this.clearInputs();
        this.form = false;
        this.datas = true;
    },
    forms(data, id){
        this.link = data.link;
        this.title = data.title;
        this.img = data.image;
        this.datas = false
        this.form = true
        this.is_edit = true
        this.edit_id = id
    },
    saveData(){

       if(this.url == ''){
            Swal.fire({
                title: 'Error!',
                text: 'Please fill all fields',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        }else{


       if(this.is_edit){
        //valdate form
            this.$refs.cropper.getCroppedCanvas().toBlob((blob) => {
            let formData = new FormData();
            formData.append('image', blob);
            // formData.append('title', this.title);
            formData.append('link', this.link);
            this.$inertia.post(route('update.slider', {id: this.edit_id}), formData);
        }, this.mime_type);

        Swal.fire({
                title: 'Success',
                text: 'Provider updated successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
       }else{
        //image
    //    alert(this.title)

        // this.cropedImage = this.$refs.cropper.getCroppedCanvas().toDataURL();
        this.$refs.cropper.getCroppedCanvas().toBlob((blob) => {
            let formData = new FormData();
            formData.append('image', blob);
            formData.append('link', this.link);
        this.$inertia.post(route('sliders-create'), formData)
        }, this.mime_type);


        // alert(this.cropedImage)

        // let formData = new FormData();
        // formData.append('image', this.cropedImage);
        // formData.append('title', this.title);
        // formData.append('url', this.url);

        // console.log(formData);

        // this.$inertia.post(this.route('sliders-create'), formData);


        Swal.fire({
                title: 'Success',
                text: 'Provider created successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        // this.clearInputs();
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
               this.$inertia.post(this.route('delete.slider', {id: ids}));
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
    <Head title="Sliders Lists" />
    <BreezeAuthenticatedLayout>

 <div class="pt-6 px-4">
 <div class="grid grid-cols-1 3xl:grid-cols-2 xl:gap-4 my-4"  v-if="datas">
     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">All Sliders</h3>
                        <div class="flex items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="datas = false, form = true">
                                Add Sliders
                            </button>
                        </div>
                     </div>
                     <div class="flow-root">
                       <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Title</th> -->
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Image Priview
                                 </th>
                                  <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Url
                                 </th> -->
                                  <!-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Active/ Deactive
                                 </th> -->
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    Actions
                                 </th>

                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                            <!-- <div v-for="user in latest_five_users" :key="user.id"> -->
                              <tr class="text-gray-500" v-for="slider in sliders" :key="slider.id">
                                 <!-- <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ slider.title }}</td> -->
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    <img :src="slider.image" alt="" class="w-full h-20 w-20" />

                                 </td>
                                 <!-- <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ slider.link }}</td> -->
                                 <!-- <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">



                                    <label class="switch">
                                    <input @click="aprove(slider.id)" type="checkbox" :checked="slider.status == 1">
                                    <span class="slider round"></span>
                                    </label>

                                 </td> -->

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <button @click="forms(slider, slider.id)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-pencil-square-o">  </i>   Edit
                                        </button>
                                        <button @click="deleteData(`${slider.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash">  </i>
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
                        <h3 class="text-xl font-bold leading-none text-gray-900">Edit/Create Sliders</h3>
                        <div class="flex items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  @click="clearStates">
                                Back
                            </button>
                        </div>
                     </div>
        <br />
        <br />
    <div class="mb-4 grid grid-cols-2 gap-4">
      <!-- <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Title</label>
        <input  v-model="title" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div> -->
       <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Url</label>
        <input v-model="link"  type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
        </div>
    </div>

   <div class="mb-4 grid grid-cols-2 gap-4">
        <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Image</label>
        <input @change="onFileSelect" type="file" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"/>
        <VueCropper v-show="selectedFile" ref="cropper" :src="selectedFile" alt="Source Image"></VueCropper>
         <div v-if="is_edit">
         <img :src="img" alt="" class="w-full h-30 w-40" />
         </div>
      </div>
    </div>



 <br />

      <div class="flex items-center">
       <button @click="saveData(), (dialog = false)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="updateUser">Update</button>

    </div>

  </div>




              </div>




    </BreezeAuthenticatedLayout>
    </template>

<style scoped>
    .user {
      width: 140px;
      height: 140px;
      border-radius: 100%;
      border: 3px solid #2e7d32;
      position: relative;
    }
    .profile-img {
      height: 100%;
      width: 100%;
      border-radius: 50%;
    }
    .icon {
      position: absolute;
      top: 10px;
      right: 0;
      background: #e2e2e2;
      border-radius: 100%;
      width: 30px;
      height: 30px;
      line-height: 30px;
      vertical-align: middle;
      text-align: center;
      color: #0000ff;
      font-size: 14px;
      cursor: pointer;
    }
    </style>
