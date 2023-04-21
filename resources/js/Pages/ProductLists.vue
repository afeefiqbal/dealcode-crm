<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Pagination from '@/Components/Pagination.vue';
    import Swal from 'sweetalert2'
    import { ref, watch} from "vue";
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/inertia-vue3';
    import Bredcrumbs from '@/Components/Bredcrumbs.vue';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    // Vue.use(DataTable);
    // import ComboBox from "@/Components/ComboBox.vue";
    import SelectBoxVue from '@/Components/SelectBox.vue';
    // const products = usePage().props.value.products;

    export default {
        data(){
            return {
              pages: [
                { name: 'Products', href: route('product-lists'), current: true },

            ],
                isOpen: false,
                fileX: '',
                search : '',
                table: true,
                edit: false,
                title: '',
                category_id: '',
                image: '',
                description: '',
                deal_provider_id: '',
                tag_id: '',
                price: '',
                product_url: '',
                slug: '',
                uuid: '',
                thumbnail: '',
                url: '',
                license1_tier_price: '',
                license1_tier_features: '',
                license2_tier_price: '',
                license2_tier_features: '',
                license3_tier_price: '',
                license3_tier_features: '',
                tldr: '',
                about_all: '',
                edit_id: '',
                  editor: ClassicEditor,

                  editorConfig: {

                    resize_enabled: false,
                    height: '200px',
                  },

            }
        },
        components: {
          Head,
          Link,
          BreezeAuthenticatedLayout,
          Pagination,
          SelectBoxVue,
          // ComboBox,
          Bredcrumbs,
        },
        props: {
            products: Array,
            categories : Array,
            dealProviders : Array,
            tags : Array,
            // filters: Object,
        },
        methods: {
          scrollToTop() {

  },
          searchProducts(){
            let search = this.search;
            this.$inertia.get(
            "/products/",
            { search: search },
            {
            preserveState: true,
            }
            );
            // watch(search, (value) => {
            // });
          },
       onFileChange(event){
        this.image = event.target.files[0];
        // alert(this.image)
        },
        ImportCsv(){
            let formData = new FormData();
            formData.append('file', this.image);
            this.$inertia.post(this.route('product-lists.import'), formData);
        },
        form (form){


            this.edit_id = form.id;
            this.title = form.title;
            this.category_id = form.category_id;
            this.image = form.image;
            this.description = form.description;
            this.deal_provider_id = form.deal_provider_id;
            this.tag_id = form.tag_id;
            this.price = form.price;
            this.product_url = form.product_url;
            this.slug = form.slug;
            this.uuid = form.uuid;
            this.thumbnail = form.thumbnail;
            this.url = form.url;
            this.license1_tier_price = form.license1_tier_price;
            this.license1_tier_features = form.license1_tier_features;
            this.license2_tier_price = form.license2_tier_price;
            this.license2_tier_features = form.license2_tier_features;
            this.license3_tier_price = form.license3_tier_price;
            this.license3_tier_features = form.license3_tier_features;
            this.tldr = form.tldr;
            this.about_all = form.about_all;

        window.scrollTo(0,0);
        },
        // ImportCsv(){
        //     // product-lists.import
        // },
        saveData(){
            const data = {
                title: this.title,
                category_id: this.category_id,
                image: this.image,
                description: this.description,
                deal_provider_id: this.deal_provider_id,
                tag_id: this.tag_id,
                price: this.price,
                product_url: this.product_url,
                slug: this.slug,
                uuid: this.uuid,
                thumbnail: this.thumbnail,
                url: this.url,
                license1_tier_price: this.license1_tier_price,
                license1_tier_features: this.license1_tier_features,
                license2_tier_price: this.license2_tier_price,
                license2_tier_features: this.license2_tier_features,
                license3_tier_price: this.license3_tier_price,
                license3_tier_features: this.license3_tier_features,
                tldr: this.tldr,
                about_all: this.about_all,
            }
            this.$inertia.post(this.route('product.edit.new', {id: this.edit_id}),{
                data: data,
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {
                },

              });
              Swal.fire({
                  icon: 'success',
                  title: 'Product has been updated successfully',
                  showConfirmButton: false,
                  timer: 1400
              });
              setTimeout(() => {
                                  this.$inertia.visit('products', { preserveScroll: true });
                              }, 1000);
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
                this.$inertia.post(this.route('product-lists.delete', {id: ids}));
                Swal.fire({
                    title: 'Success',
                    text: 'Product deleted successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            }
          });

        }

    }
  }

  // alert(this.products)


    </script>

    <template>
        <Head title="Product Listing" />
        <BreezeAuthenticatedLayout>
          <Bredcrumbs :pages="pages" />
            <div class="px-12 sm:px-12 lg:px-12" v-if="table">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <!-- <h1 class="text-xl font-semibold text-gray-900">All Products</h1> -->
      </div>
      <div class="mt-12 sm:mt-0 sm:ml-16 sm:flex-none">
        <input type=  "text" placeholder="Search product names..." v-model="search" name="search" @keyup="searchProducts" id="myInput" class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />

      </div>
      <div class="mt-12 sm:mt-0 sm:ml-16 sm:flex-none">
        <button  class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto" @click="isOpen = true">
                                Bulk Import
                            </button>  &nbsp; &nbsp; &nbsp;
        <Link :href="route('productList.create')">
            <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                Add Product
            </button> &nbsp; &nbsp; &nbsp;
        </Link>
        <a :href="route('productList.export')">
            <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                               Export
            </button>
          </a>
      </div>
    </div>

    <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr class="divide-x divide-gray-200">
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.no</th>
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Seller Code</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                <!-- <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Tag</th> -->
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Actions</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
              </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(product, key) in products.data" :key="product.id" class="divide-x divide-gray-200">
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ key+1 }}</td>
                <td class=" p-4 text-sm text-gray-500">{{ product.deal_provider ? product.deal_provider.code : 'N/A' }}</td>
                <td class=" p-4 text-sm text-gray-500">{{ product.title }} <i v-if="product.is_user_listed" class="fa fa-flag" aria-hidden="true"></i> </td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ product.category ? product.category.title : '' }}</td>
                <!-- <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ product.tags ? product.tags.title : '' }}</td> -->
                <td class=" p-4 text-sm text-gray-500">{{ product.price }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6"><img width="70" height="20" :src="product.image ?? 'https://staging.dealcode.org/storage/app/default/picture.jpg'" alt="" srcset="" /></td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">

                  <button @click="table = false, edit = true, form(product)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-edit"></i></button>
                  <button @click="deleteData(`${product.id}`)" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button>

                </td>
              </tr>

              <!-- More people... -->
            </tbody>
          </table>
        </div>
        <pagination class="mt-6" :links="products.links" />
      </div>
    </div>
  </div>
  </div>

     <div
        v-show="isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity flex items-center justify-center z-50"
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">Import Product</h3>

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
            <button @click="ImportCsv()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded">
              Save
            </button>
            </div>
          </div>
        </div>
      </div>



      <div class="md:grid md:grid-cols-1 md:gap-6" v-if="edit">
      <div class="mt-4 md:col-span-2 md:mt-0">
        <form @submit.prevent="saveData">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-4 gap-6">
                <div class="col-span-3 sm:col-span-1">
                    <label for="about" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text"  v-model="title" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                  <!-- <textarea id="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com" /> -->
                </div>
              </div>

                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Category id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <select id="location" name="location" v-model="category_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option selected>Select Option</option>
                                    <option v-for="(category, key) in categories"  :value="category.id"  >{{category.title}}</option>
                                  </select>
                                </div>
                              <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                            </div>
                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Deal Provider id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                                  <!-- <input type="number"  v-model="deal_provider_id" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                                  <select id="location" name="location" v-model="deal_provider_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option selected>Select Option</option>
                                    <option v-for="(deal, key) in dealProviders"  :value="deal.id"  >{{deal.title}}</option>
                                  </select>


                              </div>
                              <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                            </div>
                            <div>
                              <label for="company-website" class="block text-sm font-medium text-gray-700">Tag id</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                 <select id="tag_id" name="tag_id" v-model="tag_id" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option selected>Select Option</option>
                                    <option v-for="(tag, key) in tags"  :value="tag.id"  >{{tag.title}}</option>
                                  </select>

                                </div>

                            </div>
                            <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->


                          </div>

                        <div class="grid grid-cols-3 gap-6">
                <div>

                  <label for="company-website" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="text"  v-model="price" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                  </div>
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Img URL</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                      <input type="file"   @change="onFileChange"  id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>

                      <!-- <input type="text"  v-model="image" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                    </div>
                  </div>
                    <div>
                      <img :src="image" alt="" class="w-full h-43 w-24" />
                    </div>
                    </div>

                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->

              <div class="grid grid-cols-2 gap-6">
                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Product Url</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                      <input type="text" v-model="product_url" id="company-website" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />
                    </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>

                <div>
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Deal  Url</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                      <input type="text" v-model="url" id="company-website" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />
                    </div>
                  <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>
              </div>
              <div class="grid grid-cols-1 gap-6">
              <label for="about" class="block text-sm font-medium text-gray-700 scroll-smooth ">Description</label>
              <ckeditor :editor="editor"  v-model="description" :config="editorConfig" rows="7" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" ></ckeditor>
           <br>
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

                <!-- tldr -->

                <div>
                    <label for="company-website" class="block text-sm font-medium text-gray-700">TLDR</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <!-- <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span> -->
                        <!-- <input type="text"  v-model="tldr" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/> -->
                  <textarea id="about"  v-model="tldr" rows="7" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" />

                    </div>
                    <!-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> -->
                </div>


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
              <button
              @click="table = true, edit =false"
              class="px-6 py-2 text-blue-800 border border-blue-600 rounded"
            >
              Cancel
            </button> &nbsp;
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>





        </BreezeAuthenticatedLayout>
        </template>
