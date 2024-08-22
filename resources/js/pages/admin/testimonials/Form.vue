<script setup>
import { defineAsyncComponent, ref } from "vue";

const InputField = defineAsyncComponent(() =>
    import("../../../components/shared/InputField.vue")
);
const TextareaField = defineAsyncComponent(() =>
    import("../../../components/shared/TextareaField.vue")
);

const props = defineProps({
    testimonial: {
        type: Object,
        default: () => ({}),
    },
    methodType: {
        type: String,
        default: "post",
    },
});

const emit = defineEmits(["success", "error"]);

const manageForm = ref({
    name: props.testimonial ? props.testimonial.name : "",
    content: props.testimonial ? props.testimonial.content : "",
    image: null,
});

const imagePreview = ref(null);
const errors = ref({});

const saveTestimonial = async () => {
    const formData = new FormData();
    formData.append("name", manageForm.value.name);
    formData.append("content", manageForm.value.content);

    if (manageForm.value.image) {
        formData.append("image", manageForm.value.image);
    }

    try {
        const response = await axios[props.methodType.toLowerCase()](
            props.methodType.toLowerCase() === "put"
                ? `/testimonials/${manageForm.value.id}`
                : "/testimonials",
            formData, // form data
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }
        );

        if (response.status == 201 || response.status == 200) {
            emit("success");
        }
        console.log("success message alert", response);
    } catch (error) {
        if (error.response && error.response.data.errors) {
            emit("error");
            errors.value = error.response.data.errors;
        }
    }
};

const previewImage = (event) => {
    const file = event.target.files[0];
    manageForm.value.image = file;
    imagePreview.value = URL.createObjectURL(file);
};

defineExpose({ saveTestimonial });
</script>

<template>
    <form @submit.prevent="saveTestimonial" class="min-w-[500px]">
        <input-field
            label="name"
            v-model="manageForm.name"
            :error="errors.name ? errors.name[0] : ''"
        />

        <textarea-field
            label="content"
            v-model="manageForm.content"
            :error="errors.content ? errors.content[0] : ''"
        />

        <div class="mb-4">
            <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="image"
                >Image</label
            >
            <input
                @change="previewImage"
                id="image"
                type="file"
                accept="image/*"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
            />
            <div v-if="imagePreview" class="mt-4">
                <img
                    :src="imagePreview"
                    alt="User Preview"
                    class="w-32 h-32 object-cover rounded-lg"
                />
            </div>
        </div>
    </form>
</template>
