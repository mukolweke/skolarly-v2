<script setup>
import { defineAsyncComponent, defineExpose, ref } from 'vue';

const InputField = defineAsyncComponent(() => import('../../../components/shared/InputField.vue'));
const TextareaField = defineAsyncComponent(() => import('../../../components/shared/TextareaField.vue'));
const ContentField = defineAsyncComponent(() => import('../../../components/shared/ContentField.vue'));

const manageForm = ref({
    title: '',
    author: '',
    excerpt: '',
    content: '<p>Hello World</p>',
    published_date: '',
})

const saveArticle = async () => {
    try {
        const response = await axios.post('/articles', manageForm.value);
        console.log('Article saved:', response.data);
    } catch (error) {
        console.error('Error saving article:', error);
    }
};

defineExpose({ saveArticle });
</script>

<template>
    <form @submit.prevent="saveArticle">
        <input-field label="title" v-model="manageForm.title" />
        <input-field label="author" v-model="manageForm.author"/>
        <textarea-field label="excerpt" v-model="manageForm.excerpt" />
        <content-field label="content" v-model="manageForm.content" />
        <input-field label="published date" v-model="manageForm.published_date" input-type="date"/>
    </form>
</template>
