import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useUsers() {
    const user = ref([])

    const getUser = async () => {
        let response = await axios.get(`/api/user`)
        user.value = response.data.data
    }

    return {
        user,
        getUser,
    }
}