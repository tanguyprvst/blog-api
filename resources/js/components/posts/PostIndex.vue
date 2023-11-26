<template>
    <div class="flex mb-4 place-content-end">
        <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
            <router-link :to="{ name: 'posts.create' }" class="text-sm font-medium">Créer un post</router-link>
        </div>
    </div>

    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Titre</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Contenu</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Category</span>
                </th>
                <th class="bg-gray-50"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in posts" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.title }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.content }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.category.name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap">
                        <router-link :to="{ name: 'posts.edit', params: { id: item.id } }"
                            class="px-4 py-2 rounded-md text-white border border-transparent bg-indigo-600 cursor-pointer hover:bg-indigo-700">Editer</router-link> 
                        <button @click="deletePost(item.id)"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                                Delete
                        </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import usePosts from '@/composables/posts'
import { onMounted } from 'vue';

const { posts, getPosts, destroyPost  } = usePosts()

const deletePost = async (id) => {
    if (!window.confirm('Etes vous sur?')) {
        return
    }

    await destroyPost(id)
    await getPosts()
}

onMounted(getPosts)
</script>