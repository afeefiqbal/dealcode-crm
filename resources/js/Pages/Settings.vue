    <script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';


    export default {
        data() {
        return {
        name: '',
        url: '',
        id: '',
        isOpen: false,
        isOpens: false,
        };
    },
        components: {
        Head,
        Link,
        BreezeAuthenticatedLayout,
        },
        props: {
        settings: Object,
        user: Array,
        fbs: Array
        },
        methods: {
            updateData(){
                this.$inertia.post(route('settings.update'), {
                    name: this.name,
                    url: this.url,
                    id: this.id,
                });
            }
        }
}
    </script>

    <template>
    <Head title="General Settings" />
    <BreezeAuthenticatedLayout>
     <div class="pt-6 px-4">


  <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

    <div class="mb-4 grid grid-cols-2 gap-4">


      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Website name</label>
        <input v-bind:value="settings.name" type="text" id="text"  readonly class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Website Slogan </label>
        <input v-bind:value="settings.slogan" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>
    <div class="mb-4 flex flex-col">
      <label for="email" class="mb-2 font-semibold">Email address</label>
      <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-2 h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
        </svg>
        <input readonly v-bind:value="user.email" type="email" id="text" class="w-full rounded-lg border border-slate-200 px-2 py-1 pl-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>

    <!-- <div class="mb-4 grid grid-cols-2 gap-4">
    <div class="mb-4 flex flex-col">
      <label for="logo" class="mb-2 font-semibold">Web Logo </label>
      <input  type="file" id="logo" class="w-full max-w-[500px] rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
    </div>

    <div class="mb-4 flex flex-col">
      <label for="fav" class="mb-2 font-semibold">Web Fav </label>
      <input  type="file" id="fav" class="w-full max-w-[500px] rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
    </div>
    </div> -->




      <div class="flex items-center">
       <button @click="updateData" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" v-on:click="updateUser">Update</button>

    </div>

  </div>


  <br />

  <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">
     <span class="text-gray-600 font-semibold">
            <h3>Social Media</h3>
            <p>
               Create a Facebook App here. The "OAuth redirect URI" is: (http:// or https://) yoursite.com/auth/facebook/callback or www.yoursite.com/auth/facebook/callback
            </p>
        </span>
        <br />
        <br />
    <div class="mb-4 grid grid-cols-2 gap-4">



      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Facebook Client ID</label>
        <input v-bind:value="fbs.facebook_client_id" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Google Tags</label>
        <input v-bind:value="fbs.google_tags" type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>



      <div class="flex items-center">
       <button @click="updateData" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" v-on:click="updateUser">Update</button>

    </div>

  </div>



     </div>
    </BreezeAuthenticatedLayout>
    </template>
