<script setup>
import { defineAsyncComponent } from 'vue';

const Socials = defineAsyncComponent(() => import('../../../components/layout/Socials.vue'))
const RedirectLink = defineAsyncComponent(() => import('../../../components/layout/RedirectLink.vue'))
</script>

<template>
  <section class="lx-container">
    <div class="flex flex-col md:flex-row item-start py-10 md:py-40">
      <div class="flex-1">
        <h1
          class="text-white text-4xl lg:text-6xl xl:text-8xl font-bold leading-tight w-full md:w-1/2 mb-8 none-select"
        >
          Alex Christopher.
        </h1>
        <div class="block bg-secondary w-20 h-2 md:h-3"></div>

        <Socials class="mt-8 lg:mt-20 mb-20 md:mb-0 -ml-2 !justify-start"/>

      </div>

      <div class="w-full md:w-1/2 xl:w-1/3">
        <p class="font-karla text-gray-400 flex items-center gap-2 mb-8">
          <span class="font-bold">-</span> <span>Introduction</span>
        </p>

        <p class="mb-10 text-white text-3xl">
          Academic and Content writer, based in Nairobi Kenya.
        </p>

        <p class="text-gray-400 font-karla mb-10">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
          dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit
          amet, consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing
          elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
          ipsum dolor sit amet, consectetur.
        </p>

      </div>
    </div>
  </section>
</template>