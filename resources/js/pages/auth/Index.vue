<script setup>
import { defineAsyncComponent } from "vue";
const siteLogo = new URL("../../../assets/images/logo.png", import.meta.url)
    .href;
const googleLogo = new URL("../../../assets/icons/google.svg", import.meta.url)
    .href;

const TextInput = defineAsyncComponent(() =>
    import("../../components/shared/InputField.vue")
);
const PasswordInput = defineAsyncComponent(() =>
    import("../../components/shared/PasswordField.vue")
);
const SubmitButton = defineAsyncComponent(() =>
    import("../../components/shared/Button.vue")
);
</script>

<template>
    <div
        class="min-h-dvh bg-[#f0f8ff] h-full w-full flex flex-col items-center justify-center"
    >
        <router-link to="/" class="mb-16">
            <div class="font-bold text-secondary-lighter text-4xl">
                <img :src="siteLogo" class="w-60" alt="Skolarly" />
            </div>
        </router-link>

        <div class="bg-white max-w-md mx-auto w-full border p-10 space-y-8">
            <div class="flex items-center gap-4">
                <div class="h-px w-full bg-primary bg-opacity-50"></div>
                <p class="w-full text-center text-gray-400 text-sm">Sign in with</p>
                <div class="h-px w-full bg-primary bg-opacity-50"></div>
            </div>

            <form class="space-y-8">
                <!-- Email or Username Field -->
                <TextInput label="email" placeholder="Email or Username" />

                <!-- Password Field -->
                <PasswordInput label="password" />

                <div class="flex items-center justify-between">
                    <!-- remember this device checkbox -->
                    <div class="flex items-center gap-2">
                        <input
                            id="remember"
                            type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-primary-lighter focus:ring-secondary"
                        />
                        <label
                            for="remember"
                            class="text-primary-lighter text-sm cursor-pointer"
                            >Remember this device</label
                        >
                    </div>
                    <!-- forgot password link -->
                    <router-link
                        to="/forgot-password"
                        class="text-primary-lighter font-semibold text-sm hover:text-secondary transition duration-300 ease-in-out"
                    >
                        Forgot Password?
                    </router-link>
                </div>

                <!-- Submit Button -->
                <SubmitButton label="Sign In" class="w-full bg-primary-lighter" />
            </form>

            <div class="flex items-center gap-4 mb-8">
                <div class="h-px w-full bg-primary bg-opacity-50"></div>
                <p class="w-full text-center text-gray-400 text-sm">Or</p>
                <div class="h-px w-full bg-primary bg-opacity-50"></div>
            </div>

            <router-link
                to="/"
                class="mt-20 flex items-center hover:bg-gray-100 transition-all justify-center gap-3 border-2 p-2.5 px-5 rounded-lg border-primary border-opacity-50"
            >
                <img :src="googleLogo" class="w-4" alt="Google Skolarly" />

                <div class="font-medium font-karla">
                    Sign in with Google
                </div>
            </router-link>
        </div>
    </div>
</template>
