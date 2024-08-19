<script setup>
import { defineAsyncComponent, ref, watch } from 'vue'

const NavLink = defineAsyncComponent(() => import('./NavLink.vue'))
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/solid'
const logo = new URL('../../../assets/images/logo.png', import.meta.url).href

const routes = ref([
  { path: '/services', name: 'Services' },
  { path: '/works', name: 'Works' },
  { path: '/blogs', name: 'Blogs' },
  { path: '/contact', name: 'Contact' },
])

const isMenuVisible = ref(false)

const mobileMenuRef = ref(null)

const toggleMenu = () => {
  isMenuVisible.value = !isMenuVisible.value

  if (mobileMenuRef.value) {
    mobileMenuRef.value.classList.toggle('hidden', !isMenuVisible.value);
  }
}

// Watcher to add/remove 'fixed' class on body
watch(isMenuVisible, (newValue) => document.body.classList.toggle('fixed', newValue));
</script>

<template>
    <header>
        <div
          class="container lg:max-w-7xl w-full mx-auto flex items-center justify-between py-10 px-6 xl:px-0"
        >
          <router-link to="/">
            <div class="font-bold text-secondary-lighter text-4xl">
              <img :src="logo" class="w-48" alt="Skolarly">
            </div>
          </router-link>

          <ul class="hidden md:flex items-center gap-4">
            <li v-for="link in routes" :key="link.name">
              <nav-link :link="link" />
            </li>
          </ul>

          <button
            class="md:hidden focus:outline-none"
            aria-label="Toggle Menu"
            @click="toggleMenu"
          >
            <XMarkIcon v-if="isMenuVisible" class="size-10 text-white" />

            <Bars3Icon v-else class="size-10 text-white" />
          </button>

          <nav
            id="mobileMenuRef"
            ref="mobileMenuRef"
            class="md:hidden hidden fixed left-0 bottom-0 right-0 top-24 sm:top-20 bg-primary z-50"
            aria-label="Mobile Navigation"
          >
            <ol class="flex flex-col items-start gap-4 px-6 sm:px-14 py-8">
              <li v-for="link in routes" :key="link.name">
                <nav-link :link="link" mobile/>
              </li>
            </ol>
          </nav>
        </div>
      </header>
</template>
