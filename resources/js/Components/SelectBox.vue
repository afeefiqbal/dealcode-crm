<script setup>
import { onMounted, ref, computed, watch} from 'vue';
const props = defineProps(['options', 'name','disabled']);
const filterOption = ref(props.disabled ?props.name : '');
const showOptions = ref(false);
const valueId = ref('');


watch(filterOption, (newValue, oldValue) => {
    if(filterOption.value){
        showOptions.value = true;
    }
});



const filteredOptions = computed(() => {
   return props.options.filter(function(option) {
      //limit 30 data
      return option.title.toLowerCase().includes(filterOption.value.toLowerCase());
   });
});

const emit = defineEmits(['update:modelValue'])
function addValue(id, value, data){
    filterOption.value = value;
    showOptions.value = false;
    emit('update:modelValue', data);
}






</script>

<template>
     <div class="relative">
      <div class="h-10 bg-white flex border border-gray-200 rounded items-center">
        <input v-model="filterOption" :disabled="disabled" id="select" class="px-4 appearance-none outline-none text-gray-800 w-full" checked placeholder="Select Product"/>

        <button v-if="!disabled" @click="filterOption = ''" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-gray-600">
          <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <label  v-if="!disabled" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-gray-600">
          <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
          </svg>
        </label>
      </div>


      <input type="checkbox" name="show_more" id="show_more" class="hidden peer" checked />
      <div class="absolute rounded shadow bg-white overflow-hidden hidden peer-checked:flex flex-col w-full mt-1 border border-gray-200" v-show="showOptions">
        <div class="cursor-pointer group" v-for="filteredOption in filteredOptions">
          <a @click="addValue(filteredOption.id, filteredOption.title, filteredOption)" class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">{{ filteredOption.title }}</a>
        </div>

        <div class="cursor-pointer group" v-if="!filteredOptions.length > 0">
          <a @click="addValue('', filterOption, filterOption)" class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">Add  {{ filterOption }}</a>
        </div>





      </div>
    </div>
</template>
