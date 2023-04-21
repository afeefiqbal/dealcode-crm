<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { create } from 'filepond';
import { onMounted, ref, computed, watch} from 'vue';
import 'filepond/dist/filepond.css';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import SelectBoxVue from '@/Components/SelectBox.vue';
import Swal from 'sweetalert2';
const input = document.querySelector('input[type="file"]');
create(input, {
    storeAsFile: true,
});
export default {

        data() {

        return {
        editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
        },
        listing_id: this.productv.id,
        title : this.product.title,
        p_id : this.product.id,
        category_id : this.product.category_id,
        deal_url : this.product.url,
        product_url : this.product.product_url,
        imageP : '',
        description :  this.product.description,
        product_image : this.product.image,
        product_id: this.product.id,
        price: this.product.price,
        license1_tier_price: this.product.license1_tier_price,
        license1_tier_features: this.product.license1_tier_features,
        license2_tier_price: this.product.license2_tier_price,
        license2_tier_features: this.product.license2_tier_features,
        license3_tier_price: this.product.license3_tier_price,
        license3_tier_features: this.product.license3_tier_features,
        tldr: this.product.tldr,
        about_all: this.product.about_all,
        new_pb_id : '',
        is_new : false,
        // old_product_id: this.product.id,
        // name: this.product.title,
        }
    },
    watch: {
        // p_id new and old value
    p_id: function (newVal, oldVal) {
       if(newVal){
        // alert(JSON.stringify(newVal));
        this.product_image = newVal.image;
        this.deal_url = newVal.url ?? '';
        this.description = newVal.description ?? '';
        this.title = newVal.title ?? newVal;
        // this.product_id = newVal.id;
        this.category_id = newVal.category_id ?? 1;
        this.product_url = newVal.product_url ?? '';
        this.price = newVal.price ?? '';
        this.license1_tier_price = newVal.license1_tier_price ?? '';
        this.license1_tier_features = newVal.license1_tier_features ?? '';
        this.license2_tier_price = newVal.license2_tier_price ?? '';
        this.license2_tier_features = newVal.license2_tier_features ?? '';
        this.license3_tier_price = newVal.license3_tier_price ?? '';
        this.license3_tier_features = newVal.license3_tier_features ?? '';
        this.tldr = newVal.tldr ?? '';
        this.about_all = newVal.about_all ?? '';
        this.new_pb_id = newVal.id ?? '';
        this.is_new = newVal.title ? false : true;
       }
    },
    },
    components: {
      Head,
      Link,
      SelectBoxVue,
      BreezeAuthenticatedLayout,
    },
    props: {
    product: Array,
    types: Object,
    categories: Object,
    icons: Object,
    producttags: Object,
    paymentMode : Object,
    products: Object,
    productv: Object,
    },
    methods: {

        onFileChange(e) {
            const file = e.target.files[0];
            this.imageP = file;
        },

        updateProduct(){
            // alert(this.name)
            let formData = new FormData();
            formData.append('listing_id', this.listing_id);
            formData.append('title', this.title);
            formData.append('product_id', this.product_id);
            formData.append('category_id', this.category_id);
            formData.append('url', this.deal_url);
            formData.append('product_url', this.product_url);
            formData.append('description', this.description);
            formData.append('image', this.imageP);
            formData.append('price', this.price);
            formData.append('license1_tier_price', this.license1_tier_price);
            formData.append('license1_tier_features', this.license1_tier_features);
            formData.append('license2_tier_price', this.license2_tier_price);
            formData.append('license2_tier_features', this.license2_tier_features);
            formData.append('license3_tier_price', this.license3_tier_price);
            formData.append('license3_tier_features', this.license3_tier_features);
            formData.append('tldr', this.tldr);
            formData.append('about_all', this.about_all);
            formData.append('new_pb_id', this.new_pb_id);
            formData.append('is_new', this.is_new);


            this.$inertia.post(this.route('products.update', {id: this.product.id}), formData);

            Swal.fire({
                title: 'Success!',
                text: 'Product Updated Successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            })

        },

    },
      // components: {
      //       FilePond,
      //   },
  }


</script>


<template>
    <Head title="Products Edit" />
    <BreezeAuthenticatedLayout>
         <div class="pt-6 px-4">

            <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

        <div class="mb-4 grid grid-cols-4 gap-4">


          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Listing Name</label>
            <!-- <input v-model="title"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"> -->
            <SelectBoxVue :options="products" v-model="p_id" :name="title"  :disabled="true" />
           </div>

           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Select Product </label>
            <!-- <input v-model="title"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"> -->
            <SelectBoxVue :options="products" v-model="p_id" :name="title"   />
           </div>

          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Category </label>
            <select v-model="category_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
            <option v-for="(category, key) in categories"  :value="category.id">{{ category.title }}</option>
            </select>
          </div>



            <!-- <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Tags</label>

            <select v-model="tags" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="producttag in producttags" :value="producttag.id">{{ producttag.title }}</option>
            </select>
        </div> -->


            <!-- <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Price</label>
            <input v-model="price" type="number" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div> -->

         <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Deal URL</label>
            <input v-model="deal_url" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Product Url</label>
            <input v-model="product_url" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
            <div class="flex flex-col">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Product Image</label>

             <input @change="onFileChange" type="file" name="image" id="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help">

            </div>
            <div class="flex flex-col col-span-2">
                <img :src="product_image" alt="" class="w-full h-40 w-40" />
            </div>


        </div>
        <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-col">
                <label for="text" class="mb-2 font-semibold">Description</label>
                <ckeditor :editor="editor"  v-model="description" :config="editorConfig" rows="7" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" ></ckeditor>
                </div>
                <br> <br>
        </div>

            <div class="grid grid-cols-6 gap-4">
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License1 Tier Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="license1_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License1 Tier Features</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="license1_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">License2 Tier Price</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="text"  v-model="license2_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                  </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                  <div>
                      <label for="company-website" class="block text-sm font-medium text-gray-700">License2 Tier Features</label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                          <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                          <input type="text"  v-model="license2_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                      </div>
                      <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                  </div>
                  <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License3 Tier Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="license3_tier_price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">License3 Tier Features</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <input type="text"  v-model="license3_tier_features" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
              </div>

                <!-- tldr -->  <br/>

                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">TLDR</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <!-- <input type="text"  v-model="tldr" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                  <textarea id="about"  v-model="tldr" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />

                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>

                <br/>
                <!-- about_all -->

                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">About All</label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                  <textarea id="about"  v-model="about_all" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />

                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <!-- <input type="text"  v-model="about_all" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>

                <br/>

                <div class="text-center">
                     <button class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="updateProduct">Submit</button>
                     </div>

      </div>




         </div>
        </BreezeAuthenticatedLayout>
</template>
