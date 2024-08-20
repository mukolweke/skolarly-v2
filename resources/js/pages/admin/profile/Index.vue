<script setup>
import {
    UserIcon,
    EnvelopeIcon,
    PhoneIcon,
    EyeIcon,
    EyeSlashIcon,
    MapPinIcon,
    PencilSquareIcon,
} from "@heroicons/vue/24/outline";

import { defineAsyncComponent, onMounted, ref } from "vue";

const profileBanner = new URL(
    "@/assets/images/profile-banner.png",
    import.meta.url
).href;

const PasswordField = defineAsyncComponent(() =>
    import("../../../components/shared/PasswordField.vue")
);

const ButtonView = defineAsyncComponent(() =>
    import("../../../components/shared/Button.vue")
);

const InputField = defineAsyncComponent(() =>
    import("../../../components/shared/InputField.vue")
);

const changePassword = () => {
    console.log("Change Password");
};

const passwordForm = ref({
    password: "",
    password_confirm: "",
});

// Profile Setting Values
const isEditing = ref(false);

const settingForm = ref({
    phone: "+254-722-000000",
    email: "example@email.com",
    location: "Nairobi, Kenya",
});

const errors = ref({});

const toggleEditMode = () => {
    isEditing.value = !isEditing.value;
};
const saveDetails = async () => {
    try {
        const res = await axios.post("/profile/contact", settingForm.value);

        if (res.status == 201) {
            toggleEditMode();
        }
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors;
        }
    }
};

const getContactDetails = async () => {
    try {
        const { status, data } = await axios.get("/profile/contact");

        if (status == 200) {
            data.forEach((item) => {
                if (item.key === "phone") {
                    settingForm.value.phone = item.value;
                } else if (item.key === "email") {
                    settingForm.value.email = item.value;
                } else if (item.key === "location") {
                    settingForm.value.location = item.value;
                }
            });
        }
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors;
        }
    }
};

onMounted(() => {
    getContactDetails();
});
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
                <div class="flex justify-between items-center mb-5">
                    <h4 class="text-xl font-medium">Contact Details</h4>
                    <PencilSquareIcon
                        v-if="!isEditing"
                        @click="toggleEditMode"
                        class="cursor-pointer size-6 text-primary-darker"
                    />
                </div>

                <div v-if="!isEditing">
                    <p class="mb-10 font-karla">
                        "Grateful to call this place home, embracing it with
                        care."
                    </p>
                    <ul class="space-y-5">
                        <li class="flex items-center gap-5 font-karla">
                            <phone-icon class="size-6" />
                            {{ settingForm.phone }}
                        </li>
                        <li class="flex items-center gap-5 font-karla">
                            <envelope-icon class="size-6" />
                            {{ settingForm.email }}
                        </li>
                        <li class="flex items-center gap-5 font-karla">
                            <map-pin-icon class="size-6" />
                            {{ settingForm.location }}
                        </li>
                    </ul>
                </div>

                <div v-else>
                    <ul class="space-y-5">
                        <li class="flex items-center gap-5 font-karla">
                            <phone-icon class="size-6" />
                            <input-field
                                v-model="settingForm.phone"
                                :error="errors.title ? errors.title[0] : ''"
                            />
                        </li>
                        <li class="flex items-center gap-5 font-karla">
                            <envelope-icon class="size-6" />
                            <input-field
                                v-model="settingForm.email"
                                :error="errors.email ? errors.email[0] : ''"
                            />
                        </li>
                        <li class="flex items-center gap-5 font-karla">
                            <map-pin-icon class="size-6" />
                            <input-field
                                v-model="settingForm.location"
                                :error="
                                    errors.location ? errors.location[0] : ''
                                "
                            />
                        </li>
                        <li class="flex justify-end gap-5">
                            <button-view
                                @click="toggleEditMode"
                                class="bg-transparent !text-primary hover:bg-primary hover:!bg-opacity-10"
                                label="Cancel"
                            />
                            <button-view @click="saveDetails" label="Update Details" />
                        </li>
                    </ul>
                </div>
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

                    <div class="flex justify-end">
                        <button-view label="Update Password" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
