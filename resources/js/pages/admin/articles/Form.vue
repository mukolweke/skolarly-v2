<script setup>
import { defineAsyncComponent } from 'vue';

const InputField = defineAsyncComponent(() => import('../../../components/shared/InputField.vue'));
const TextareaField = defineAsyncComponent(() => import('../../../components/shared/TextareaField.vue'));
</script>

<template>
    <form>
        <input-field label="title"></input-field>
        <input-field label="author"></input-field>
        <textarea-field label="excerpt"></textarea-field>
        <input-field label="content"></input-field>
        <input-field label="published date" input-type="date"></input-field>
    </form>
</template>
