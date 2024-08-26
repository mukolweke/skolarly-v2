<script setup>
import { defineAsyncComponent, ref } from 'vue';

const InputField = defineAsyncComponent(() =>
    import("../../../components/shared/InputField.vue")
);
const TextareaField = defineAsyncComponent(() =>
    import("../../../components/shared/TextareaField.vue")
);

import AlertView from '../../../components/shared/Alert.vue';
import { useAlert } from '../../../composables/useAlert';

const { alert, showAlert } = useAlert();

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

            showAlert('success', 'This is a success alert!');
        } else {
            showAlert('warning', 'This is a warning alert!');
        }
    } catch (error) {
        if (error.response && error.response.data.errors) {
            emit('error')
            showAlert('danger', 'This is a danger alert!');
            errors.value = error.response.data.errors;
        }
    }
};

defineExpose({ saveTestimonial });
</script>

<template>
    <AlertView v-if="alert.visible" :type="alert.type" :message="alert.message" />

    <form @submit.prevent="saveTestimonial" class="min-w-[500px]">
        <input-field label="name" v-model="manageForm.name" :error="errors.name ? errors.name[0] : ''" />
        <textarea-field label="content" v-model="manageForm.content" :error="errors.content ? errors.content[0] : ''" />
    </form>
</template>
