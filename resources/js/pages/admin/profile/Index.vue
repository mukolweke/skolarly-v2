<script setup>
import {
    UserIcon,
    EnvelopeIcon,
    PhoneIcon,
    EyeIcon,
    EyeSlashIcon,
} from "@heroicons/vue/24/outline";
import { defineAsyncComponent, ref } from "vue";
const profileBanner = new URL(
    "@/assets/images/profile-banner.png",
    import.meta.url
).href;

const changePassword = () => {
    console.log("Change Password");
};

const passwordForm = ref({
    password: "",
    password_confirm: "",
});

const PasswordField = defineAsyncComponent(() =>
    import("../../../components/shared/PasswordField.vue")
);
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
        <div class="flex items-start gap-5">
            <!-- Details -->
            <div class="flex-1 border rounded-md p-5 h-full">
                <h4 class="text-xl font-medium mb-5">User Details</h4>

                <p class="mb-10 font-karla">
                    "Grateful to call this place home, embracing it with care."
                </p>

                <ul class="space-y-5">
                    <li class="flex items-center gap-5 font-karla">
                        <phone-icon class="size-6" /> +254-722-000000
                    </li>
                    <li class="flex items-center gap-5 font-karla">
                        <envelope-icon class="size-6" /> example@email.com
                    </li>
                </ul>
            </div>
            <!-- Password Form -->
            <div class="flex-1 border rounded-md p-5 h-full">
                <h4 class="text-xl font-medium mb-5">Change Password</h4>

                <form @submit.prevent="changePassword">
                    <PasswordField
                        label="Enter New Password"
                        v-model="passwordForm.password"
                    />

                    <PasswordField
                        label="Confirm New Password"
                        v-model="passwordForm.password_confirm"
                    />

                    <div class="">
                        <button
                            class="bg-primary hover:bg-opacity-80 transition-all text-white w-1/2 p-2.5 rounded-lg"
                        >
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
