<script setup>
import { defineAsyncComponent } from "vue";
import { ChatBubbleBottomCenterTextIcon } from "@heroicons/vue/24/outline";

const Breadcrumb = defineAsyncComponent(() =>
    import("../../../components/shared/Breadcrumb.vue")
);
</script>

<template>
    <breadcrumb
        name="Testimonials"
        :links="[
            { name: 'Home', to: '/' },
            { name: 'Testimonials', to: '/testimonials' },
        ]"
        :icon="ChatBubbleBottomCenterTextIcon"
    />

    <router-link to="/admin"> Go Home </router-link>
</template>
