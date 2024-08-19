<template>
    <div class="flex flex-col mb-5 w-full">
        <label :for="label" class="mb-2 text-sm capitalize">{{ label }}</label>
        <div class="w-full">
            <div id="editor" class=""></div>
        </div>
        <p
            v-if="helpText"
            class="text-xs mt-px text-gray-500 font-karla font-medium"
        >
            {{ helpText }}
        </p>
        <p v-if="error" class="text-xs mt-px text-red-500 font-karla font-medium">{{ error }}</p>
    </div>
</template>

<script setup>
import { onMounted, watch } from "vue";
import Quill from "quill";
import "quill/dist/quill.snow.css";

const props = defineProps({
    modelValue: String,
    label: {
        type: String,
        required: true,
    },
    inputType: {
        type: String,
        default: "text",
    },
    helpText: {
        type: String,
        default: "",
    },
    error: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["update:modelValue"]);

const options = {
    modules: {
        toolbar: [
            [
                { header: [1, 2, 3, 4, 5, 6, false] },
                { font: ["poppins", "montserrat", "karla", "sans-serif"] },
                { size: ['8px', false, '12px', '14px', '16px', '18px', '20px', '32px', '48px'] },
                "bold",
                "italic",
                "underline",
                "strike",
                "link",
                "blockquote",
                "code-block",
                "image",
                { list: "ordered" },
                { list: "bullet" },
                { color: [] },
                { background: [] },
                { align: [] },
                "clean",
            ],
        ],
    },
    placeholder: "Compose an article...",
    theme: "snow",
};

onMounted(() => {
    const FontAttributor = Quill.import("attributors/class/font");
    FontAttributor.whitelist = ["poppins", "montserrat", "karla", "sans-serif"];
    Quill.register(FontAttributor, true);

    let Size = Quill.import("attributors/style/size");
    Size.whitelist = ["8px", "12px", "14px", "16px", "18px", "20px", "32px", '48px'];
    Quill.register(Size, true);

    const quill = new Quill("#editor", options);

    // Set the initial value of the editor
    quill.root.innerHTML = props.modelValue;

    // Watch for changes in modelValue and update the editor content
    watch(
        () => props.modelValue,
        (newValue) => {
            if (newValue !== quill.root.innerHTML) {
                quill.root.innerHTML = newValue;
            }
        }
    );

    // Emit the content of the editor whenever it changes
    quill.on("text-change", () => {
        emit("update:modelValue", quill.root.innerHTML);
    });
});
</script>
