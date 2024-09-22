<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    post: Array
});
</script>

<template>
        <h1 class="text-lg mb-6">Post</h1>
        <div>
            <Link :href="route('post.index')" class="text-emerald-400 text-sm">Back to posts</Link>
        </div>
        <div v-if="post">
            <div class="mt-6 pt-6 border-t border-gray-300">
                <div class="font-semibold text-3xl">{{ post.title}}</div>
                <div class="text-gray-400">id: {{post.id}}</div>
                <div>{{ post.content}}</div>
                <div class="text-sm text-right text-gray-400">{{ post.date }}</div>
            </div>
        </div>
        <div v-else>
            <p>No posts available.</p>
        </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    layout: MainLayout
};
</script>

<style scoped>

</style>
