<script setup>
import { defineAsyncComponent, ref } from 'vue';

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
</script>

<template>
    <form>
        <input-field label="title" v-model="manageForm.title"></input-field>
        <input-field label="author" v-model="manageForm.author"></input-field>
        <textarea-field label="excerpt" v-model="manageForm.excerpt"></textarea-field>
        <content-field label="content" v-model="manageForm.content" />
        <input-field label="published date" v-model="manageForm.published_date" input-type="date"></input-field>
    </form>
</template>
