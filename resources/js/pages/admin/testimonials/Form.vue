<script setup>
import { defineAsyncComponent, ref } from 'vue';

const InputField = defineAsyncComponent(() =>
    import("../../../components/shared/InputField.vue")
);
const TextareaField = defineAsyncComponent(() =>
    import("../../../components/shared/TextareaField.vue")
);

const props = defineProps({
    testimonial: {
        type: Object,
        default: () => ({ })
    },
    methodType: {
        type: String,
        default: 'post',
    }
})

const emit = defineEmits(['success', 'error'])

const manageForm = ref({
    id: props.testimonial.id ? props.testimonial.id : null,
    name: props.testimonial ? props.testimonial.name : '',
    content: props.testimonial ? props.testimonial.content : '',
});


const errors = ref({});

const saveTestimonial = async () => {
    try {
        const response = await axios[props.methodType.toLowerCase()](
            props.methodType.toLowerCase() === 'put' ? `/testimonials/${manageForm.value.id}` : "/testimonials",
            manageForm.value
        );

        if (response.status == 201 || response.status == 200) {
            emit('success')
        }
        console.log("success message alert", response);
    } catch (error) {
        if (error.response && error.response.data.errors) {
            emit('error')
            errors.value = error.response.data.errors;
        }
    }
};

defineExpose({ saveTestimonial });
</script>

<template>
    <form @submit.prevent="saveTestimonial" class="min-w-[500px]">
        <input-field label="name" v-model="manageForm.name" :error="errors.name ? errors.name[0] : ''" />
        <textarea-field label="content" v-model="manageForm.content" :error="errors.content ? errors.content[0] : ''" />
    </form>
</template>
