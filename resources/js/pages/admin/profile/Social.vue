<script setup>
import { PencilSquareIcon } from "@heroicons/vue/24/outline";
import { defineAsyncComponent, ref } from "vue";

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

const ButtonView = defineAsyncComponent(() =>
    import("../../../components/shared/Button.vue")
);

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
                <li
                    v-for="(social) in socialForm"
                    :key="social.label"
                    class="flex items-center gap-5 font-karla relative group"
                >
                    <span class="capitalize">icon: </span><span>{{ social.label }}</span>
                    <span class="capitalize">value: </span>
                    <span v-if="!isEditing">{{ social.link }}</span>

                    <!-- <input
                        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal leading-[2.15] text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none"
                        id="formFileLg"
                        type="file" /> -->

                    <input-field
                        v-if="isEditing"
                        v-model="social.link"
                        :error="errors.title ? errors.title[0] : ''"
                    />

                    <PencilSquareIcon
                        @click="toggleEditMode"
                        class="cursor-pointer size-5 text-secondary font-semibold hidden group-hover:block"
                    />
                </li>
            </ul>
        </div>
    </div>
</template>
