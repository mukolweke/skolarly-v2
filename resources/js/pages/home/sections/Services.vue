<script setup>
const boxIcon = new URL('../../../../assets/icons/box-icon.svg', import.meta.url).href
const computerIcon = new URL('../../../../assets/icons/computer-icon.svg', import.meta.url).href
const penIcon = new URL('../../../../assets/icons/pen-icon.svg', import.meta.url).href

import RedirectLink from '../../../components/layout/RedirectLink.vue';

const services = [
  {
    title: 'Business Consulting Services.',
    projectCount: '20',
    icon: boxIcon,
  },
  {
    title: 'Research Services.',
    projectCount: '20',
    icon: penIcon,
  },
  {
    title: 'Design & Registration Services.',
    projectCount: '20',
    icon: computerIcon,
  }
]

</script>

<template>
  <section class="lx-container">
    <div class="flex flex-col md:flex-row items-center gap-10">
      <div
        v-for="(service, index) in services"
        :key="index"
        :class="{
          'bg-secondary': index === 0,
          'bg-primary-lighter': index !== 0,
        }"
        class="flex-1 w-full h-96 px-6 shadow-lg rounded-md flex flex-col justify-end py-28 items-center"
      >
        <div class="flex flex-col items-start gap-2 md:flex-row lg:gap-4">
          <img :src="service.icon" class="w-10 h-10" alt="" />
          <div>
            <h4
              class="text-white text-lg md:text-xl lg:text-2xl text-center md:text-left"
            >
              {{ service.title }}
            </h4>
            <p
              class="font-semibold text-gray-100 text-sm md:text-base lg:text-lg mt-4 font-karla capitalize"
            >
              {{ service.projectCount }} projects
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="flex items-center justify-center mt-10">
      <RedirectLink title="View More" href="/services" />
    </div>
  </section>
</template>
