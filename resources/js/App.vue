<template>
  <div>
    <NavBar />

    <router-view></router-view>

    <Footer />
  </div>
</template>

<script setup>
import { defineAsyncComponent} from 'vue'

const NavBar = defineAsyncComponent(() => import('./components/layout/NavBar.vue'))
const Footer = defineAsyncComponent(() => import('./components/layout/Footer.vue'))
</script>
