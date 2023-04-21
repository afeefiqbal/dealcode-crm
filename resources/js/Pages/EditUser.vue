<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2'

export default {
        data() {
        return {
        username: this.user.username,
        name: this.user.name,
        email: this.user.email,
        phone: this.user.phone,
        permissons: this.permissionc ? this.permissionc : [],
        password:'',
        device_key: this.user.device_key,
        }
    },
    components: {
      Head,
      Link,
      BreezeAuthenticatedLayout,
    },
    props: {
     user: Array,
     roles: Array,
     permissionc: Array,
     current_user: Array,
    },
    methods: {
        addPermisson(){
        //    alert(this.permissons)
        this.$inertia.post(this.route('users.permission.upadate', {id: this.user.id}), {
              permissons: this.permissons,
            });
        },

        updateUser(){
            // alert(this.email)
            this.$inertia.post(this.route('users.update', {id: this.user.id}), {
                username: this.username,
                password: this.password,
                name: this.name,
                email: this.email,
                phone: this.phone,
            });

            Swal.fire({
                title: 'Success',
                text: 'User updated successfully',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        }
    }
  }

</script>


<template>
    <Head title="Users Edit" />
    <BreezeAuthenticatedLayout>
     <div class="pt-6 px-4">


  <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40">

    <div class="mb-4 grid grid-cols-2 gap-4">


      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Username</label>
        <input v-on:input="username = $event.target.value" v-bind:value="user.user_name  "  type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
      <div class="flex flex-col">
        <label for="text" class="mb-2 font-semibold">Name</label>
        <input v-on:input="name = $event.target.value" v-bind:value="user.name"  type="text" id="text" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>
    <div class="mb-4 flex flex-col">
      <label for="email" class="mb-2 font-semibold">Email address</label>
      <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-2 h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
        </svg>
        <input v-on:input="email = $event.target.value" v-bind:value="user.email" type="email" id="text" class="w-full rounded-lg border border-slate-200 px-2 py-1 pl-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
      </div>
    </div>

    <div class="mb-4 grid grid-cols-2 gap-4">
    <div class="mb-4 flex flex-col">
      <label for="age" class="mb-2 font-semibold">Device Key </label>
      <input  v-on:input="device_key = $event.target.value"  v-bind:value="user.device_key"  type="text" id="age" class="w-full max-w-[500px] rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
    </div>

    <div class="mb-4 flex flex-col">
      <label for="age" class="mb-2 font-semibold">IP </label>
      <input readonly v-bind:value="user.ip_addr"  type="text" id="age" class="w-full max-w-[500px] rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
    </div>
    </div>




      <div class="flex items-center">
       <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto" v-on:click="updateUser">Update</button>
       </div>

  </div>


  <br />
  <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-black/40" v-if="user.is_admin && current_user.id == 1">
    <h2> Permissions </h2> <br />
    <div class="mb-4 grid grid-cols-3 gap-4">


  <div class="relative flex items-start" v-for="role in roles" >
    <div class="flex h-5 items-center">
      <input v-model="permissons" :value="role.id" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
       >
    </div>
    <div class="ml-3 text-sm">
      <label for="{{ role.name }}" class="font-medium text-gray-700">{{ role.name }}</label>
      <!-- <p id="candidates-description" class="text-gray-500">Get notified when a candidate applies for a job.</p> -->
    </div>
  </div>

    </div>

       <br />
       <div class="flex items-center">
       <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto" v-on:click="addPermisson">Update</button>
       </div>

</div>




     </div>
    </BreezeAuthenticatedLayout>
</template>
