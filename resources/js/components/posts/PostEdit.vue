<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>
    <form class="space-y-6" @submit.prevent="editPost">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Titre</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="post.title">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Contenu</label>
                <div class="mt-1">
                    <textarea  type="text" name="email" id="email"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="post.content">
                    </textarea>
                </div>
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Categorie</label>
                <select class="form-control" name="category_id" id="category_id" v-model="post.category_id">
                    <option v-for="item in categories" :value="item.id" :selected="item.id == post.category.id">
                        {{ item.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label
                for="formFile"
                class="mb-2 inline-block text-gray-700"
                >Image</label
            >
            <input
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                type="file"
                name="image" id="image" v-on:change="onChange" v-bind:src="post.image" />
        </div>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Modifier
        </button>
    </form>
</template>

<script setup>
import useCompanies from '@/composables/posts'
import useCategories from '../../composables/categories'
import { onMounted } from 'vue';

const { errors, post, updatePost, getPost } = useCompanies()
const { categories, getCategories } = useCategories()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => {
    getPost(props.id)
    getCategories()
})

const editPost = async () => {
    await updatePost(props.id)
}

const onChange = async (e) => {
    form.image = e.target.files[0];
}

</script>