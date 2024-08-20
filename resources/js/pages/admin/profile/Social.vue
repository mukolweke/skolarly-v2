<script setup>
import {
    PencilSquareIcon,
} from "@heroicons/vue/24/outline";
import { ref } from "vue";

const isEditing = ref(false);

const socialForm = ref([
    {
        label: 'instagram',
        icon: '',
        link: 'https://skolarly-v2.test/admin/profile',
    },
    {
        label: 'facebook',
        icon: '',
        link: 'https://skolarly-v2.test/admin/profile',
    }
]);

const errors = ref({});

const toggleEditMode = () => {
    isEditing.value = !isEditing.value;
};

</script>

<template>
    <div class="flex-1 border rounded-md p-5 h-full">
        <div class="flex justify-between items-center mb-5">
            <h4 class="text-xl font-medium">Socials Details</h4>
        </div>

        <div>
            <ul class="space-y-5">
                <li v-for="social in socialForm" :key="social.label" class="flex items-center gap-5 font-karla">
                    <span class="capitalize">icon: </span><span>{{ social.label }}</span>
                    <span class="capitalize">value: </span><span>{{ social.link }}</span>
                    <PencilSquareIcon
                        v-if="!isEditing"
                        @click="toggleEditMode"
                        class="cursor-pointer size-6 text-primary-darker"
                    />
                </li>
            </ul>
        </div>
    </div>
</template>
