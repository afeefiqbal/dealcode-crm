<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import Bredcrumbs from '@/Components/Bredcrumbs.vue';
// import DataTable from 'laravel-vue-datatable';

// Vue.use(DataTable);

export default {
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
      Bredcrumbs,
    },
    data() {
        return {

            pages: [
                { name: 'Products', href: '#', current: true },
                { name: 'List', href: '#', current: false },
            ],
        };
        },

    props: {
     products: Object,
    },
    methods: {
    deleteData(ids) {
        // alert(ids)
        this.$inertia.post(this.route('products.delete', {id: ids}));
    },
    updateStatus(id, status) {

        this.$inertia.post(this.route('product-lists.update-status', {id: id, status: status}));
    },
    searchProducts(){
            let search = this.search;
            this.$inertia.get(
            "/product_listings",
            { search: search },
            {
            preserveState: true,
            }
            );
            // watch(search, (value) => {
            // });
          },
}
  }

</script>
<template>
    <Head title="Listing" />
    <BreezeAuthenticatedLayout>
    <Bredcrumbs :pages="pages"/>

  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <!-- <h1 class="text-xl font-semibold text-gray-900">Listing</h1> -->
      </div>
      <div class="mt-12 sm:mt-0 sm:ml-16 sm:flex-none">
        <input type=  "text" placeholder="Search listing..." v-model="search" name="search" @keyup="searchProducts" id="myInput" class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />

      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <!-- <Link :href="route('products.create')">
            <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                Add Listing
            </button>
        </Link> -->

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
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Product Title</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">User name</th>
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Actions</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
              </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr v-for="(product, key) in products.data" :key="product.id" class="divide-x divide-gray-200">
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{ key+1 }}</td>
                <td class=" p-4 text-sm text-gray-500">{{ product.product.title }}  <i v-if="product.product.is_user_listed" class="fa fa-flag" aria-hidden="true"></i></td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ product.category ? product.category.title : '' }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                  <img :src="product.product.image ?? 'https://media.istockphoto.com/vectors/no-image-available-sign-vector-id1138179183?k=20&m=1138179183&s=612x612&w=0&h=iJ9y-snV_RmXArY4bA-S4QSab0gxfAMXmXwn5Edko1M='" alt="" srcset="" width="80">
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">${{ product.price }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ product.user ? product.user.name : 'N/A' }}</td>
                  <td class="relative whitespace-nowrap py-4 pl-2 pr-2 text-center text-sm font-medium sm:pr-2 lg:pr-2">
                    <span v-if="product.status== '1'" class="inline-flex items-center rounded-full bg-red-100 px-3 py-0.5 text-sm font-medium text-red-800">Active</span>
                  <span v-else  class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-0.5 text-sm font-medium text-indigo-800">Inactive</span>

                    <Link :href="route('products.editList',`${product.id}`,`${product.status}`)" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">
                        <i class="fa fa-pencil-square-o"></i>
                    </Link>
                    <button @click="deleteData(`${product.id}`)"  class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"><i class="fa fa-trash"></i></button>

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



    </BreezeAuthenticatedLayout>
    </template>
