<script setup>
import { defineAsyncComponent } from 'vue';

const HomeBanner = defineAsyncComponent(() => import('./sections/Banner.vue'))
const Experience = defineAsyncComponent(() => import('./sections/Experience.vue'))
const Services = defineAsyncComponent(() => import('./sections/Services.vue'))
const Portfolio = defineAsyncComponent(() => import('./sections/Portfolio.vue'))
const BlogSection = defineAsyncComponent(() => import('./sections/Blog.vue'))
const Testimonials = defineAsyncComponent(() => import('./sections/Testimonials.vue'))
</script>

<template>
  <!-- Banner -->
  <HomeBanner />

  <!-- Experience -->
  <Experience />

  <!-- Services -->
  <Services class="my-20 md:-mt-40" />

  <!-- Portfolio -->
  <Portfolio />

  <!-- Blog Section -->
  <BlogSection />

  <!-- Testimonials -->
  <Testimonials />
</template>