<template>
    <div>
      <NavBar />

      <slot />

      <Footer />
    </div>
  </template>

  <script setup>
  import NavBar from '../components/layout/NavBar.vue'
  import Footer from '../components/layout/Footer.vue'
  </script>
