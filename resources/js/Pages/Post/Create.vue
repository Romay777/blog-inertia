<script setup>
import { reactive } from 'vue'
import { Link } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object
});

const form = reactive({
    title: null,
    content: null,
    image: null
})

function submit() {
    router.post('/posts', form)
}
</script>

<template>
        <div class="mb-4">
            <div class="mb-2">
                <h1 class="text-lg">Create new post</h1>
            </div>
            <Link :href="route('post.index')" class="text-emerald-400 text-sm">Back to posts</Link>
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <input v-model="form.title" class="w-full rounded-full border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" type="text" placeholder="title">
                <div v-if="props.errors.title" class="text-rose-500 text-sm">{{ props.errors.title}}</div>
            </div>
            <div class="mb-4">
                <input v-model="form.image" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" type="text" placeholder="image url">
                <div v-if="props.errors.image" class="text-rose-500 text-sm">{{ props.errors.image}}</div>
            </div>
            <div class="mb-2">
                <textarea v-model="form.content" class="w-full rounded-lg border-gray-300 h-96 focus:border-emerald-500 focus:ring-emerald-500" placeholder="content"></textarea>
                <div v-if="props.errors.content" class="text-rose-500 text-sm">{{ props.errors.content}}</div>
            </div>
            <div>
                <button class="mx-auto hover:bg-emerald-500 block p-2 w-32 bg-emerald-400 rounded-full text-center text-white" type="submit">Store</button>
            </div>
        </form>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    layout: MainLayout
};
</script>

<style scoped>

</style>
