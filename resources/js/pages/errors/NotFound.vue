<template>
    <div class="not-found h-[50.7vh] flex items-center justify-center">
        <div class="text-white flex flex-col items-center">
            <h1 class="font-semibold text-4xl mb-5 font-karla">404 - Page Not Found</h1>
            <p class="text-lg font-karla mb-10">Sorry, the page you're looking for doesn't exist.</p>
            <router-link to="/" class="font-karla cursor-pointer text-secondary flex items-center gap-4 text-center">
                <ArrowLeftIcon class="size-6 text-secondary-lighter"/>

                <span>Go back to Home</span>
            </router-link>
        </div>
    </div>
</template>

<script setup>
import { ArrowLeftIcon } from '@heroicons/vue/24/outline';
</script>

