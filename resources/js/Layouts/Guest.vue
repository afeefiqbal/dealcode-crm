<script setup>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>



  <div class="min-h-screen  sm:flex sm:flex-row  justify-center bg-gray-900 p-5 sm:p-20 shadow-xl">
      <div class="flex-col flex  self-center lg:p-10 sm:max-w-5xl xl:max-w-lg  z-10">
        <div class="self-start hidden lg:flex flex-col  text-white">
         <div class="flex items-center mb-5">
            <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
                </div>
         </div>

          <h1 class="my-3 font-semibold text-4xl">Welcome back to Dealcode </h1>
          <p class="pr-3 text-sm opacity-75">Find the Best SAAS deals </p>
        </div>
      </div>


        <div class="flex justify-center self-center  z-10">
        <div class="p-12 bg-white mx-auto rounded-3xl w-96 ">
            <div class="mb-7">
              <h3 class="font-semibold text-2xl text-black-100">Sign In </h3>
              <!-- <p class="text-gray-500">Don'thave an account?  <a href="#" class="text-sm text-purple-700 hover:text-purple-600">Sign Up</a></p> -->
            </div>
            <slot />
        </div>
        </div>

    </div>

</template>
