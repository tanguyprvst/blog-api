import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
export default function usePosts() {
    const category = ref([])
    const categories = ref([])

    const errors = ref('')
    const router = useRouter()

    const getCategories = async () => {
        let response = await axios.get('/api/categories')
        categories.value = response.data.data
    }

    const getCategory = async (id) => {
        let response = await axios.get(`/api/categories/${id}`)
        category.value = response.data.data
    }

    const storeCategory = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/categories', data)
            await router.push({ name: 'categories.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyCategory = async (id) => {
        await axios.delete(`/api/categories/${id}`)
    }

    const updateCategory = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/categories/${id}`, post.value)
            await router.push({ name: 'categories.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    return {
        errors,
        category,
        categories,
        getCategory,
        getCategories,
        storeCategory,
        updateCategory,
        destroyCategory
    }
}