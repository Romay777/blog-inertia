<script setup>
import {Link, router} from "@inertiajs/vue3";

defineProps({
    posts: Array
});

function deletePost(id) {
    router.delete(`/posts/${id}`)
}
</script>

<template>
        <h1 class="text-xl mb-3">Posts</h1>
        <div>
            <Link :href="route('post.create')" class="hover:bg-emerald-500 block p-2 w-auto bg-emerald-400 rounded-full text-center text-white">Add Post</Link>
        </div>
        <div v-if="posts && posts.length">
            <div class="mt-6 pt-6 border-t border-gray-300" v-for="post in posts">
                <div class="font-semibold text-lg mb-2">{{ post.title }}</div>
                <div>{{ post.content.length > 300 ? post.content.slice(0, 300) + '...' : post.content }}</div>
                <div class="text-sm text-right text-gray-400 flex justify-between">
                    <div>
                        id:{{ post.id }}
                    </div>
                    <div class="text-right">
                        {{ post.date }}
                    </div>
                </div>
                <div class="text-sm text-right text-emerald-500">
                    <Link :href="route('post.show', post.id)">Read</Link>
                </div>
                <div class="text-sm text-right text-emerald-500">
                    <Link :href="route('post.edit', post.id)">Edit</Link>
                </div>
                <div class="cursor-pointer text-sm text-right text-rose-500">
                    <p @click.prevent="deletePost(post.id)">Delete</p>
                </div>
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
