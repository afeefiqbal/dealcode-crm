<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { create } from 'filepond';
    import 'filepond/dist/filepond.css';
    import Swal from 'sweetalert2';
    import { onMounted, ref, computed, watch} from 'vue';
    import SelectBoxVue from '@/Components/SelectBox.vue';
    import CombMultiSelect from "@/Components/ComboBoxMultiselect.vue";
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
            props: {
              product: Array,
              types: Object,
              categories: Array,
              icons: Object,
              producttags: Object,
              paymentMode : Object,
              products: Object,
              tiers : Object,
              productv: Object,
              tags: Array,
            },
            data() {
             return {
             errors:[],
             listing_id: this.productv.id,
             title : this.product.title,
            p_id : this.product.id,
            editor: ClassicEditor,
            product_id : '',
            newVal : '',
            deal_trend_id:  this.productv.deal_trend_id,
             category_id: this.productv.category_id,
             product_image: this.product.image,
             product_url : '',
             deal_url : '',
             deal_type_id: this.productv.deal_type_id,
             description: this.productv.card_description,
             tier_id:  this.productv.tier_id,
             additional_description: this.productv.additional_description,
            price: this.productv.price,
            payment_methods : this.paymentMode,
            producttags : this.producttags,
             error: false,
             url: this.productv.url,
             product_type: this.productv.product_type,
             provider_id: this.productv.provider_id,
          
            }
        },
        watch: {
        // p_id new and old value
          p_id: function (newVal, oldVal) {
            if(newVal){
              console.log(newVal);
              this.product_id = newVal.id;
           this.category_id = newVal.category_id;
           this.description = newVal.description;
           this.product_url = newVal.product_url;
           this.price = newVal.price;
           this.deal_url = newVal.url;
           this.product_image = newVal.thumbnail;
            }
          },
          },
        components: {
          Head,
          Link,
          SelectBoxVue,
          BreezeAuthenticatedLayout,
          CombMultiSelect
        },

        cleanInputs(){
          this.product_type = '';
          this.provider_id = '';
          this.category_id = '';
          this.tier_id = '';
          
          this.url = '';
          this.title = '';
          this.tags = '';
          this.tags1 = '';
          this.tags2 = '';
          this.price = '';
          this.media_url = '';
          this.imageP = '';
          this.description = '';
        },
        methods: {
            saveData(e){
                // alert(this.type)
                let formData = new FormData();
                formData.append('listing_id', this.listing_id);
                formData.append('title', this.title);
                formData.append('p_id', this.p_id);
                formData.append('product_url', this.product_url);
                formData.append('product_id', this.product_id);
                formData.append('deal_url', this.deal_url);
                formData.append('deal_type_id', this.deal_type_id);
                formData.append('deal_trend_id', this.deal_trend_id);
                formData.append('price', this.price);
                formData.append('product_type', this.product_type);
                formData.append('category_id', this.category_id);
                formData.append('tags', this.tag_id);
                formData.append('payment_method_id', this.payment_method_id);
                formData.append('image', this.imageP);
                formData.append('description', this.description);
                formData.append('additional_description', this.additional_description);
                this.$inertia.post(this.route('productList.update2', {id: this.productv.id}), formData);
                // this.cleanInputs();
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

    </script>


    <template>
        <Head title="Products" />
        <BreezeAuthenticatedLayout>
         <div class="pt-6 px-4">


            <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

        <div class="mb-6 grid grid-cols-3 gap-5">
          <div class="flex flex-col">
           <label for="text" class="mb-2 font-semibold">Select Product <span class="text-red-700">*</span></label>
           <!-- <input v-model="title"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"> -->
           <SelectBoxVue :options="products" v-model="p_id" :name="title"   />
          </div>
          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Listing Name <span class="text-red-700">*</span></label>
            <SelectBoxVue :options="products" v-model="product_id" :name="title"  :disabled="true" />
           </div>

           <div class="flex flex-col">
            
              <label for="text" class="mb-2 font-semibold">Product Listed For  <span class="text-red-700">*</span></label>
              <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                <div v-for="deal_type in types" :key="deal_type.id" class="flex items-center">
                  <input :id="deal_type.id" v-model="deal_type_id" :value="deal_type.id" name="notification-method" type="radio" :checked="deal_type.id === productv.deal_type_id" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                  <label :for="deal_type.id" class="ml-3 block text-sm font-medium text-gray-700">{{ deal_type.title }}</label>
                </div>
              </div>
          </div>
          
          <div class="flex flex-col">
           <label for="text" class="mb-2 font-semibold">Price <span class="text-red-700">*</span></label>
           <input v-model="price" type="number" id="price" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
          </div>
          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Deal Pricing  <span class="text-red-700">*</span></label>
           
            <select v-model="deal_trend_id" id="deal_trend_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="(icon, key) in icons"  :value="icon.id">{{ icon.title }}</option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Tier <span class="text-red-700">*</span></label>
           
            <select v-model="tier_id" id="product_type" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="(tier, key) in tiers"  :value="tier.id">{{ tier.name }}</option>
            </select>
          </div>

          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Category </label>
            <select v-model="category_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
            <option v-for="(category, key) in categories"  :value="category.id">{{ category.title }}</option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Tags </label>
            <CombMultiSelect returnKey="id" :returnArray="true" v-model="tag_id" name="tag_id" :displayList="3" :options="producttags"/>
          </div>
          <div class="flex flex-col">
            <Label class="mb-2" for="" value="( Please select multiple options) ">Payment Mode </Label>
            <CombMultiSelect returnKey="id" :returnArray="true" v-model="payment_method_id"  :displayList="3" :options="payment_methods"/>
          </div>
        
          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Product Cover Image </label>
            <img :src="product_image" alt="" class="w-full h-43 w-24" />
             <input @change="onFileChange" type="file" name="image" id="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help">
          </div>
            <div class="flex flex-col">
              <label for="text" class="mb-2 font-semibold">Description</label>
              <ckeditor :editor="editor" v-model="description" :config="editorConfig"></ckeditor>
             <!-- <textarea  v-model="description" id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea> -->
            </div>
            
            <div class="flex flex-col">
             
              <label for="text" class="mb-2 font-semibold">Additional description / Notes</label>
              <ckeditor :editor="editor" v-model="additional_description" :config="editorConfig"></ckeditor>
             <!-- <textarea  v-model="additional_description" id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea> -->
            </div>
          </div>
          <div class="flex items-center">
           <button class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="saveData">Submit</button>

        </div>
      </div>




         </div>
        </BreezeAuthenticatedLayout>
    </template>
