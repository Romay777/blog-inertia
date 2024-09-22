<script setup>
import { reactive } from 'vue'
import { Link } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';


const props = defineProps({
    post: Object
});

const form = reactive({
    id: props.post.id,
    title: props.post.title,
    content: props.post.content
});

function submit() {
    router.patch(`/posts/${props.post.id}`, form)
}
</script>

<template>
        <div class="mb-4">
            <div class="mb-2">
                <h1 class="text-lg">Editing post</h1>
            </div>
            <Link :href="route('post.index')" class="text-emerald-400 text-sm">Back to posts</Link>
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <input v-model="form.title" class="w-full rounded-full border-gray-300" type="text" placeholder="title">
            </div>
            <div class="mb-2">
                <textarea v-model="form.content" class="w-full rounded-lg border-gray-300" placeholder="content"></textarea>
            </div>
            <div>
                <button class="mx-auto hover:bg-emerald-500 block p-2 w-32 bg-emerald-400 rounded-full text-center text-white" type="submit">Update</button>
            </div>
        </form>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<style scoped>

</style>
