<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { create } from 'filepond';
    import 'filepond/dist/filepond.css';
    import Swal from 'sweetalert2';
import { toHandlers } from 'vue';

    const input = document.querySelector('input[type="file"]');
    create(input, {
        storeAsFile: true,
    });

    export default {

            data() {

            return {
             title: '',
           category_id :'',
          type: '',
          tags: '',
           trend_id: '',
           price: '',
           email: '', 
           notes: '',
           payment: '',
           deal_url : '',
           url: '',
           imageP: '',
           description: '',
           a_description: '',

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
          producttags: Object,
         paymentMode : Object,
         products : Object
        },
        cleanInputs(){
            this.title = '';
            this.category_id = "";
            this.type = '';
            this.tags = '';
            this.trend_id = "";
            this.price = '';
            this.email = '';  
            this.notes = '';
            this.payment = '';
            this.deal_url = '';
            this.url = '';
            this.imageP = '';
            this.description = '';
            this.a_description = '';
            this.error = false;

        },
        methods: {
            saveData(){
                // alert(this.type)
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('category_id', this.category_id);
                formData.append('type', this.type);
                formData.append('tags', this.tags);
                formData.append('trend_id', this.trend_id);
                formData.append('price', this.price);
                formData.append('email', this.email);
                formData.append('notes', this.notes);
                formData.append('payment', this.payment);
                formData.append('deal_url', this.deal_url);
                formData.append('url', this.url);
                formData.append('image', this.imageP);
                formData.append('description', this.description);
                formData.append('a_description', this.a_description);
                this.$inertia.post(this.route('products.store'), formData);
                // this.cleanInputs();
                Swal.fire({
                    title: 'Success',
                    text: 'Product has been created',
                    type: 'success',
                    confirmButtonText: 'OK'
                })
                this.$inertia.visit(this.route('products'));
            },
            updateProduct(){
                // alert(this.name)
                this.$inertia.post(this.route('products.update', {id: this.product.id}), {
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
        <Head title="Products Create" />
        <BreezeAuthenticatedLayout>
         <div class="pt-6 px-4">


            <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

        <div class="mb-4 grid grid-cols-3 gap-4">


          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Product Name</label>
            <input v-model="title"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
      
           </div>

          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Category</label>
            <select v-model="category_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="category in categories" :value="category.id">{{ category.category }}</option>
            </select>
          </div>

          <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Product listed For</label>
    
        <div class="space-y-1 sm:flex sm:items-center sm:space-y-0 sm:space-x-3">
          <div v-for="typec in types" :key="typec.id"  class="flex r">
            <input :id="typec.id" name="type"  type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
            <label :for="typec.id" class="ml-2 block text-sm font-medium text-gray-700">{{ typec.deal_type }}</label>
          </div>
        </div>
          </div>

            <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Tags</label>
         
            <select v-model="tags" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="producttag in producttags" :value="producttag.id">{{ producttag.tags }}</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Deal Trend</label>
            <div class="space-y-1 sm:flex sm:items-center sm:space-y-0 sm:space-x-3">
            <div v-for="icon in icons" :value="icon.id" class="flex r">
            <input :id="icon.id" name="trend_id" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
            <label :for="icon.id" class="ml-2 block text-sm font-medium text-gray-700"><img :src="icon.deal_image" alt="" class="w-full h-5 w-4" />{{ icon.deal_trend  }}</label>
          </div>
        </div>
            <!-- <select v-model="trend_id" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="icon in icons" :value="icon.id">{{ icon.deal_trend }}</option>
            </select> -->
          </div>
            <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Price</label>
            <input v-model="price" type="number" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>

           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Email</label>
            <input v-model="email" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Notes</label>
            <input v-model="notes" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Payemnt Mode</label>
         
            <select v-model="payment" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
              <option v-for="payment in paymentMode" :value="payment.id">{{ payment.name }}</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Deal URL</label>
            <input v-model="deal_url" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
           <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Product Website Link</label>
            <input v-model="url" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
           </div>
            <div class="flex flex-col">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Product Cover Image</label>
             <input @change="onFileChange"  class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            </div>
            <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Description</label>
            <textarea  v-model="description" id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            </div>

            <div class="flex flex-col">
            <label for="text" class="mb-2 font-semibold">Additional Description</label>
            <textarea  v-model="a_description" id="message" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            </div>


            
          </div>
          
                    <div class="flex items-center">
                     <button class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="saveData">Submit</button>

      </div>
      </div>




         </div>
        </BreezeAuthenticatedLayout>
    </template>
