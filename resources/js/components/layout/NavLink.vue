<script setup>
import { useRoute } from "vue-router";

const route = useRoute();

const props = defineProps({
  link: Object,
  mobile: Boolean,
})

const isActive = (path) => {
  return route.path === path;
};

</script>

<template>
  <router-link v-if="!mobile" :to="link.path" class="nav-link" active-class="active" exact>
    <p class="flex items-center gap-4 md:flex-col md:gap-px">
      <span
        :class="isActive(link.path) ? 'text-gray-200' : 'text-gray-500'"
        class="text-2xl block hover:text-secondary transition-all mt-px"
      >
        {{ link.name }}
      </span>
      <span
        :class="isActive(link.path) ? 'block' : 'hidden'"
        class="h-1 w-1 mt-2 bg-secondary-lighter rounded-full mx-auto transition-all"
      ></span>
    </p>
  </router-link>
  <a v-else class="block" :href="link.path">
    <p class="flex items-center gap-4 md:flex-col md:gap-px">
      <span
        :class="isActive(link.path) ? 'text-gray-200' : 'text-gray-500'"
        class="text-2xl block hover:text-secondary transition-all mt-px"
      >
        {{ link.name }}
      </span>
      <span
        :class="isActive(link.path) ? 'block' : 'hidden'"
        class="h-1 w-1 bg-secondary-lighter rounded-full mx-auto transition-all"
      ></span>
    </p>
  </a>
</template>

<style scoped>
.nav-link.active span {
  color: #e5e7eb; /* Equivalent to text-gray-200 */
}

.nav-link span {
  color: #6b7280; /* Equivalent to text-gray-500 */
}
</style>
