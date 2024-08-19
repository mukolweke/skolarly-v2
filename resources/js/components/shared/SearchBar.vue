<template>
    <div class="w-1/3">
        <label for="search" class="block text-sm font-medium text-gray-700 capitalize">
            {{ label }}
        </label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input
                type="search"
                name="search"
                id="search"
                :placeholder="label"
                v-model="searchQuery"
                @input="handleInput"
                class="block border h-12 px-5 rounded-lg w-full pr-10 sm:text-sm border-gray-300 focus:outline-none focus:border-secondary"
            />
            <div class="absolute top-1 right-0 rounded-r-md p-2">
                <MagnifyingGlassIcon class="size-6" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
import { debounce } from 'lodash';

defineProps({
    label: String,
});

const searchQuery = ref('');

const emit = defineEmits(['search']);

const handleInput = debounce(() => {
    emit('search', searchQuery.value);
}, 300);  // 300ms debounce delay
</script>
