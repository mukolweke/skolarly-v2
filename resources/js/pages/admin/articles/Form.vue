<script setup>
import { defineAsyncComponent, ref } from "vue";
import { format } from "date-fns";

const InputField = defineAsyncComponent(() =>
    import("../../../components/shared/InputField.vue")
);
const TextareaField = defineAsyncComponent(() =>
    import("../../../components/shared/TextareaField.vue")
);
const ContentField = defineAsyncComponent(() =>
    import("../../../components/shared/ContentField.vue")
);

const props = defineProps({
    article: {
        type: Object,
        default: () => {}
    },
    methodType: {
        type: String,
        default: 'post',
    }
})

const emit = defineEmits(['success', 'error'])

const manageForm = ref({
    slug: props.article ? props.article.slug : '',
    title: props.article ? props.article.title : '',
    author: props.article ? props.article.author : '',
    excerpt: props.article ? props.article.excerpt : '',
    content: props.article ? props.article.content : '',
    published_date: format(props.article ? props.article.published_date : new Date(), "yyyy-MM-dd"),
});

const errors = ref({});

const saveArticle = async () => {
    try {
        const response = await axios[props.methodType.toLowerCase()](
            props.methodType.toLowerCase() === 'put' ? `/articles/${manageForm.value.slug}` : "/articles",
            manageForm.value
        );

        if (response.status == 201 || response.status == 200) {
            emit('success')
        }
        console.log("success message alert", response);
    } catch (error) {
        if (error.response && error.response.data.errors) {
            emit('error')
            errors.value = error.response.data.errors;
        }
    }
};

defineExpose({ saveArticle });
</script>

<template>
    <form @submit.prevent="saveArticle">
        <input-field
            label="title"
            v-model="manageForm.title"
            :error="errors.title ? errors.title[0] : ''"
        />
        <input-field
            label="author"
            v-model="manageForm.author"
            :error="errors.author ? errors.author[0] : ''"
        />
        <textarea-field
            label="excerpt"
            v-model="manageForm.excerpt"
            :error="errors.excerpt ? errors.excerpt[0] : ''"
        />
        <content-field
            label="content"
            v-model="manageForm.content"
            :error="errors.content ? errors.content[0] : ''"
        />
        <input-field
            label="published date"
            v-model="manageForm.published_date"
            input-type="date"
            :error="errors.published_date ? errors.published_date[0] : ''"
        />
    </form>
</template>
