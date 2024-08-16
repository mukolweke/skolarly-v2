<template>
    <component :is="layout">
        <router-view />
    </component>
</template>

<script setup>
import { computed, defineAsyncComponent } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const layout = computed(() => {
    return route.meta.layout
        ? defineAsyncComponent(() =>
              import(`./layouts/${route.meta.layout}.vue`)
          )
        : defineAsyncComponent(() => import("./layouts/DefaultLayout.vue"));
});
</script>
