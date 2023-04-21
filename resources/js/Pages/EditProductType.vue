<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
  import { create } from 'filepond'; 
import 'filepond/dist/filepond.css';
const input = document.querySelector('input[type="file"]');
create(input, {
    storeAsFile: true,
});
export default {
  
        data() {
          
        return {
        //  title: '' ,
        title: this.productType.title,
        }
    },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     productType: Array
    },
    methods: {
        updateProductType(){
          title = this.title;
            this.$inertia.post(this.route('productType.update', {id: this.productType.id}), {
                title: this.title,
               
            });
        },

    },
      // components: {
      //       FilePond,
      //   },
  }

</script>


<template>
    <Head title="Product Type Edit" />
    <BreezeAuthenticatedLayout>
     <div class="pt-6 px-4">


        <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

    <div class="mb-4 grid grid-cols-2 gap-4">

      
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Title</label>
        <input  v-on:input="name = $event.target.value" v-bind:value="productType.title"  type="text" id="title" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
</div>

      <div class="flex items-center">
       <button class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3" v-on:click="updateProductType">Submit</button>

    </div>

  </div>




     </div>
    </BreezeAuthenticatedLayout>
</template>
