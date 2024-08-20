<script setup>
import {
    EyeIcon,
    EyeSlashIcon,
    PencilSquareIcon,
} from "@heroicons/vue/24/outline";

import { defineAsyncComponent, onMounted, ref } from "vue";

const PasswordField = defineAsyncComponent(() =>
    import("../../../components/shared/PasswordField.vue")
);

const ButtonView = defineAsyncComponent(() =>
    import("../../../components/shared/Button.vue")
);

const changePassword = () => {
    console.log("Change Password");
};

const passwordForm = ref({
    password: "",
    password_confirm: "",
});

</script>

<template>
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
</template>
