<script setup>
import { defineAsyncComponent } from "vue";
import { ListBulletIcon } from "@heroicons/vue/24/outline";

const Breadcrumb = defineAsyncComponent(() =>
    import("../../../components/shared/Breadcrumb.vue")
);
</script>

<template>
    <breadcrumb
        name="Articles"
        :links="[
            { name: 'Home', to: '/' },
            { name: 'Articles', to: '/articles' },
        ]"
        :icon="ListBulletIcon"
    />

    <router-link to="/admin"> Go Home </router-link>
</template>
