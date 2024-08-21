<script setup>
import {
    UserIcon,
} from "@heroicons/vue/24/outline";

const profileBanner = new URL(
    "../../../../assets/images/profile-banner.png",
    import.meta.url
).href;

import ContactSection from "./Contact.vue";
import PasswordSection from "./Password.vue";
import SocialSection from "./Social.vue";
</script>

<template>
    <div
        class="w-full h-96 relative rounded-lg overflow-hidden shadow-xl mb-10"
    >
        <img :src="profileBanner" class="h-full w-full" alt="Profile Section" />
        <div class="absolute inset-0 bg-black bg-opacity-70">
            <div class="flex items-center justify-center h-full z-10">
                <div class="flex flex-col items-center">
                    <div
                        class="border-4 rounded-full p-5 border-secondary mb-5"
                    >
                        <user-icon class="size-20 text-secondary" />
                    </div>
                    <h2 class="text-4xl text-secondary">Johnny Bravo</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="grid grid-cols-2 gap-5">
            <!-- Details -->
            <contact-section />

            <!-- Password Form -->
            <password-section />

            <!-- Socials Section -->
             <social-section />
        </div>
    </div>
</template>
