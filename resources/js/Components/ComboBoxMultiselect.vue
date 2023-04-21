<template>
    <Combobox v-model="selectedPeople" multiple v-slot="open">
        <div :class="customeClass" class="bg-white   border relative h-auto w-full ">
            <div class=" !overflow-hidden"
                 :class="[((selectedPeople.length && displayList >=selectedPeople.length))?' h-full':'py-[20px]']">
                <div class="flex-wrap flex mr-10 px-3 py-0.5 relative "
                     @click="openDropdown"
                     v-if="(selectedPeople.length && displayList >=selectedPeople.length)">
                    <div style="z-index: 2"
                         class="bg-blue-100 text-blue-800 mr-2 rounded-sm px-2.5 p-1.5  flex items-center "
                         v-for="(person,index) in selectedPeople"
                         :key="index">
                        {{ person.title }}
                        <Xicon @click="removerList(index)"
                               class="h-4 w-4 ml-2 text-blue-500 hover:text-blue-500 ease-in-out duration-100 cursor-pointer"/>
                    </div>
                </div>
                <ComboboxButton ref="button" class="h-full w-full flex items-center">
                    <div style="z-index: 1"
                         class="flex top-3  items-center justify-between w-full absolute !overflow-hidden">
                        <ComboboxInput
                            class="w-full  !border-none !py-0  pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
                            @change="query = $event.target.value"
                            autocomplete="off"
                            :placeholder="(displayList >=selectedPeople.length)?(selectedPeople.length?'':'Select Options'):`${selectedPeople.length} Option Selected`"
                        />
                        <div class="flex items-center">
                            <Xicon v-if="selectedPeople.length" @click="removerList(selectedPeople=[])"
                                   class="h-4 w-4 ml-2 text-primary-light hover:text-error-light ease-in-out duration-100 cursor-pointer"/>
                            <ChevronDownIcon class="h-5 w-5 text-primary-light mr-2 ease-in-out duration-500"
                                             :class="[open.open&&'rotate-180']"/>
                        </div>
                    </div>
                </ComboboxButton>
            </div>
            <div class="absolute w-full shadow z-10">
                <ComboboxOptions class="overflow-auto mt-2 max-h-60">
                    <ComboboxOption
                        v-for="person in filteredPeople"
                        as="template"
                        :disabled="person.disable"
                        :key="person.id"
                        :value="person"
                        v-slot="{ selected, active }"
                        class="bg-white  relative"
                    >
                        <li class="relative cursor-default select-none py-2 pl-10 pr-4"
                            :class="{ 'bg-body text-primary-light': active, 'text-gray-900': !active, }">
                            <span class="block truncate "
                                  :class="{ 'font-medium ': selected, 'font-normal ': !selected }">
                              {{ person.title }}
                            </span>
                            <span v-if="selected"
                                  class="absolute inset-y-0 left-0 flex items-center pl-3"
                                  :class="{ 'text-primary-hover': active, 'text-primary-light': !active }">
                              <CheckIcon class="h-5 w-5 " aria-hidden="true"/>
                            </span>
                        </li>
                    </ComboboxOption>
                </ComboboxOptions>
            </div>
        </div>
    </Combobox>
</template>

<script setup>
import {computed, onBeforeMount, ref, watch} from 'vue'
import {Combobox, ComboboxButton, ComboboxInput, ComboboxOption, ComboboxOptions,} from '@headlessui/vue'
import Xicon from '@/Components/Icons/Xicon.vue';
import {CheckIcon, ChevronDownIcon} from '@heroicons/vue/20/solid'

const props = defineProps({
    options: {
        type: Object,
        default: [],
    },
    modelValue: {
        type: [Object, String, Number], default: []
    },
    displayList: {
        type: Number,
        default: 0
    },
    minSelect: {
        type: Number,
        default: 0
    },
    customeClass: {
        type: String,
        default: ''
    },
    returnKey: {
        type: String,
        default: 'id'
    },
    returnArray: {
        type: Boolean,
        default: false
    },

});

const selectedPeople = ref([]);
const emit = defineEmits(["update:modelValue", "change"]);
let query = ref([]);
let button = ref('')
const filteredPeople = computed(() =>
    query.value === ''
        ? props.options
        : props.options.filter((person) =>
            person.title
                .toLowerCase()
                .replace(/\s+/g, '')
                .includes(query.value.toLowerCase().replace(/\s+/g, ''))
        )
)
onBeforeMount(() => {
    let data = [];
    props.modelValue.forEach((item) => {
        props.options.map((option) => {
            if (option.id === (item?.id ? item.id : item)) {
                data.push(option)
            }
        });
    });
    selectedPeople.value = data;
})


watch(selectedPeople, (n, o) => {
    if (props.minSelect) {
        if (props.minSelect >= n.length) {
            emitModel(n);
        } else {
            n.splice((n.length - 1), 1)
            emitModel(n);
        }
    } else {
        emitModel(n);
    }
})

function removerList(index) {
    selectedPeople.value.splice(index, 1);
}

function emitModel(n) {
    if (props.returnArray) {
        const data = [];
        n.forEach((item) => {
            data.push(item[props.returnKey]);
        })
        emit('update:modelValue', data);
    } else {
        emit('update:modelValue', n);
    }
}

function openDropdown() {
    button.value.$el.click()
}
</script>
