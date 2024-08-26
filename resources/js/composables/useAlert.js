import { ref } from "vue";

export function useAlert() {
    const alert = ref({
        type: "success",
        message: "",
        visible: false,
    });

    function showAlert(type, message) {
        alert.value.type = type;
        alert.value.message = message;
        alert.value.visible = true;

        setTimeout(() => {
            alert.value.visible = false;
        }, 6000000); // Automatically hide after 6 seconds
    }

    return {
        alert,
        showAlert,
    };
}
