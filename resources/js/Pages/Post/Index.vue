<script setup>
import {Link, router} from "@inertiajs/vue3";

const props = defineProps({
    posts: Object
});

console.log(props.posts)

function deletePost(id) {
    router.delete(`/posts/${id}`)
}
</script>

<template>
        <h1 class="text-xl mb-3">Posts</h1>
        <div>
            <Link :href="route('post.create')" class="hover:bg-emerald-500 block p-2 w-1/2 mx-auto bg-emerald-400 rounded-full text-center text-white">Add Post</Link>
        </div>
        <div v-if="props.posts.data && props.posts.data.data.length">
            <div class="mt-6 pt-6 border-t border-gray-300" v-for="post in props.posts.data.data">
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
                <div class="text-sm text-right text-emerald-500 flex justify-end">
                    <div class="mr-1">
                        <Link :href="route('post.show', post.id)">Read </Link>
                    </div>
                    <div >
                        <Link :href="route('post.edit', post.id)">Edit </Link>
                    </div>
                </div>
                <div class="cursor-pointer text-sm text-right text-rose-500">
                    <p @click.prevent="deletePost(post.id)">Delete</p>
                </div>
            </div>
        </div>
        <div v-else>
            <p>No posts available.</p>
        </div>

        <!-- Пагинация -->
        <div class="">
            <Link v-if="posts.prev_page_url" :href="posts.prev_page_url" class="mx-2">Previous</Link>
            <Link v-if="posts.next_page_url" :href="posts.next_page_url" class="mx-2">Next</Link>
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
