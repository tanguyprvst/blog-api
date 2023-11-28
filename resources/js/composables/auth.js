import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useAuth() {
    const errors = ref('')
    const router = useRouter()

    const login = async (data) => {
        errors.value = ''
        try {
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('api/login', data)
            let response = await axios.get('/api/user')
            console.log(response); 
            await router.push({ name: 'posts.index' })
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
        login
    }
}