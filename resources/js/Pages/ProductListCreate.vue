<!-- <script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { create } from 'filepond';
    import 'filepond/dist/filepond.css';
    import Swal from 'sweetalert2';

    const input = document.querySelector('input[type="file"]');
    create(input, {
        storeAsFile: true,
    });

    export default {

            data() {
              return {
              errors:[],
               title: '' ,
             category_id: "",
             description: '',
             type: "",
             a_description: '',
             trend_id: "",
             price: '',
             imageP: '',
             error: false,
             tags: '',
             url: '',
            }
        },
        components: {
          Head,
          Link,
          BreezeAuthenticatedLayout,
        },
        props: {
          types: Object,
          categories: Object,
          icons: Object,
         products: Array,
         tag_data: Array,
         providerMaster: Array

        },
        cleanInputs(){
          
        },
        methods: {
            saveData(){
           
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('category_id',   this.category_id);
                formData.append('image',  this.image);
                formData.append('description',  this.description);
                formData.append('deal_provider_id',  this.deal_provider_id);
                formData.append('tag_id',   this.tag_id);
                formData.append('price',   this.price);
                formData.append('product_url',   this.product_url);
                formData.append('slug',   this.slug);
                formData.append('uuid',  this.uuid);
                formData.append('thumbnail',   this.thumbnail);
                formData.append('url',   this.url);
                formData.append('license1_tier_price',  this.license1_tier_price);
                formData.append('license1_tier_features',   this.license1_tier_features);
                formData.append('license2_tier_price',   this.license2_tier_price);
                formData.append('license2_tier_features',   this.license2_tier_features);
                formData.append('license3_tier_price',   this.license3_tier_price);
                formData.append('license3_tier_features',  this.license3_tier_features);
                formData.append('tldr',   this.tldr);
                formData.append('about_all',   this.about_all);
                // alert(formData);
                this.$inertia.post(this.route('productList.store'), formData);
            
                Swal.fire({
                    title: 'Success',
                    text: 'Product has been created',
                    type: 'success',
                    confirmButtonText: 'OK'
                })
                this.$inertia.visit(this.route('product-lists'));
            },
            updateProduct(){
                // alert(this.name)
                this.$inertia.post(this.route('productList.update', {id: this.product.id}), {
                    title: this.title,
                    description: this.description,
                    price : this.price,
                });
            },
            onFileChange(event){
            this.imageP = event.target.files[0];
            },

        },
          // components: {
          //       FilePond,
          //   },
      }

    </script> -->


<template>
    <Head title="Products" />
  <BreezeAuthenticatedLayout>
    <div class="pt-6 px-4">

        <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">
          <div class="mt-4 md:col-span-2 md:mt-0">
        <form @submit.prevent="saveData">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-4 gap-6">
                <div class="col-span-3 sm:col-span-1">
                    <label for="about" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text"  v-model="formData.title" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                  <!-- <textarea id="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com" /> -->
                </div>
              </div>
              
                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Category id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                                  <!-- <input type="number"  v-model="formData.category_id" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                                  <select id="location" name="location" v-model="formData.category_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value ="">Select Option</option>
                                    <option v-for="(category, key) in categories"  :value="category.id"  >{{category.title}}</option>
                                  </select>
                                </div>
                              <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                            </div>
                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Deal Provider id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                                  <!-- <input type="number"  v-model="formData.deal_provider_id" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                                  <select id="location" name="location" v-model="formData.deal_provider_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option selected>Select Option</option>
                                    <option v-for="(deal, key) in providerMaster"  :value="deal.id"  >{{deal.title}}</option>
                                  </select>
                                
                              </div>
                              <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                            </div>
                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Tag id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                                  <!-- <input type="number"  v-model="formData.tag_id" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                                  <select id="tag_id" name="tag_id" v-model="formData.tag_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option selected>Select Option</option>
                                    <option v-for="(tag, key) in tag_data"  :value="tag.id"  >{{tag.title}}</option>
                                  </select>
                                
                                </div>
                              <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
              
                            </div>
              </div>
              <div class="grid grid-cols-3 gap-6">
                <div>
  
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="text"  v-model="formData.price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
  
  
                </div>
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Img URL</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="file"   @change="onFileChange"  id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <br />
                   
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                  <label for="about" class="block text-sm font-medium text-gray-700">Description</label>
                  <div class="mt-1">
                    <ckeditor :editor="editor"  v-model="description" :config="editorConfig" rows="7" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" ></ckeditor>
                  
                    <!-- <textarea id="about"  v-model="formData.description" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" /> -->
                  </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
              </div>
              <div class="grid grid-cols-2 gap-6">
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Product Url</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                      <input type="text" v-model="formData.product_url" id="company-website" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />
                    </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700"> Url</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                      <input type="text" v-model="formData.url" id="company-website" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />
                    </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
              </div>
              <div class="grid grid-cols-6 gap-4">
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License1 Tier Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="formData.license1_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License1 Tier Features</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="formData.license1_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">License2 Tier Price</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="text"  v-model="formData.license2_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                  </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                  <div>
                      <label for="company-website" class="block text-sm font-medium text-gray-700">License2 Tier Features</label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                          <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                          <input type="text"  v-model="formData.license2_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                      </div>
                      <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                  </div>
                  <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License3 Tier Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="formData.license3_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License3 Tier Features</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="formData.license3_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
              </div>

                <!-- tldr -->

                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">TLDR</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <!-- <input type="text"  v-model="formData.tldr" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                  <textarea id="about"  v-model="formData.tldr" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />

                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>


                <!-- about_all -->

                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">About All</label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                  <textarea id="about"  v-model="formData.about_all" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />

                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <!-- <input type="text"  v-model="formData.about_all" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>





              <!-- <div>
                <label class="block text-sm font-medium text-gray-700">Cover photo</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" @click="saveData" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
        </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link ,usePage} from '@inertiajs/inertia-vue3';
import { create } from 'filepond';
import 'filepond/dist/filepond.css';
import Swal from 'sweetalert2';
import { toHandlers } from 'vue';
import {useForm} from "@inertiajs/inertia-vue3";
// import Badge from '@/Components/Badge.vue';
import {computed,defineProps ,ref} from "vue";
import Lightning from "@/Components/Icons/Lightning.vue";
import VeryHot from "@/Components/Icons/VeryHot.vue";
import Hot from "@/Components/Icons/Hot.vue";
import AtCost from "@/Components/Icons/AtCost.vue";
import { Inertia } from "@inertiajs/inertia";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
const input = document.querySelector('input[type="file"]');
    create(input, {
        storeAsFile: true,
    });
    const props = defineProps({
      types: Object,
          categories: Object,
          icons: Object,
         products: Array,
         tag_data: Array,
         providerMaster: Array,
         editor: ClasicEditor,
});
const formData = useForm({
  title:'',
            category_id :'',
            image :'',
           description :'',
           deal_provider_id :'',
           tag_id:'',
           price :'',
            product_url:'',
            slug:'',
            uuid:'',
            thumbnail:'',
            url:'',
            image: '',
            license1_tier_price :'',
           license1_tier_features:'',
            license2_tier_price:'',
            license2_tier_features:'',
           license3_tier_price :'',
            license3_tier_features:'',
         tldr :'',
         fileX : '',
            about_all:'',
           

});
function onFileChange(event){
  formData.fileX = event.target.files[0];
        }
function saveData() {
  
  formData.post(route('productList.store'), {
        preserveScroll: true,
        onSuccess: () => {
          Swal.fire({
                    title: 'Success',
                    text: 'Product has been created',
                    type: 'success',
                    confirmButtonText: 'OK'
                });
               setTimeout(() => {
                        Inertia.visit('/products', { preserveScroll: true });
                    }, 1000);
           
        }
    });
    // form.post(route('add.subscription'));

}
</script>