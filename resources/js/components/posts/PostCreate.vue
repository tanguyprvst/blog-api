<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>
    <form class="space-y-6" @submit.prevent="savePost">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Titre</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.title">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Contenu</label>
                <div class="mt-1">
                    <textarea  type="text" name="email" id="email"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.content">
                    </textarea>
                </div>
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Categorie</label>
                <select class="form-control" name="category_id" id="category_id" v-model="form.category_id">
                    <option disabled value="">Choisissez une catégorie</option>
                    <option v-for="item in categories" :value="item.id">
                        {{ item.name }}
                    </option>
                </select>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Créer
        </button>
    </form>
</template>

<script setup>
import usePosts from '../../composables/posts'
import useCategories from '../../composables/categories'
import { onMounted, reactive, ref } from 'vue'

const form = reactive({
    title: '',
    content: '',
    category_id: '',
})

const { errors, storePost } = usePosts()
const { categories, getCategories } = useCategories()

const savePost = async () => {
    await storePost({ ...form })
}

onMounted(getCategories)
</script>