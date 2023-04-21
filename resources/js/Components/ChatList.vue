<template>
    <div class="!h-full relative mb-11">
        <div class="relative  top-0 border-b border-stroke">
            <div class="absolute h-full flex items-center pl-4 ">
                <Search class="h-4 w-4 text-primary-light"/>
            </div>
            <Input v-model="searchKeyword" placeholder="Search"
                   class="w-full border-none focus:ring-0 pl-12 focus:outline-none bg-body !py-3"/>
        </div>
        <div style="height: calc(100% - 44px)" class="divide-y divide-stroke overflow-auto scrollbar shrink-0 bg-body">
            <span class="hidden">{{ resultList }}</span>
            <List v-for="list in userData" :key="list.id" @click="$emit('getList',list)"
                  @previewImage="showImage" :src="list.src"
                  :name="list.name" :message="list.message"
                  :notifications="list.notifications" :time="list.time"></List>

        </div>
    </div>

</template>
<script setup>
import List from "@/Components/ChatPlugin/List.vue";
import Input from "@/Components/Input.vue";
import Search from "@/Components/Icons/Search.vue";
import {computed, ref, watch} from "vue";
import axios from "axios";

const props = defineProps({
    userLists: {
        type: Object,
        default: []
    }
})

const emit = defineEmits(['getList', 'previewImage']);

function showImage(src) {
    emit('previewImage', src);
}

const userData = ref(props.userLists);

const searchKeyword = ref('');

const resultList = computed(() => {
    userData.value = props.userLists
});

watch(searchKeyword, (_new, _old) => {
    if (_new) {
        axios.post(route('search_users', {search: searchKeyword.value}))
            .then((response) => {
                userData.value = response.data;
                // results.value = response.data;
            })
    } else {
        userData.value = props.userLists
    }
})
</script>
