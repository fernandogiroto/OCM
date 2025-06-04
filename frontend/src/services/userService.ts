import api from '@/services/api'

export const fetchUsers = async (search = '') => {
  try {
    const params = search ? { search } : {}

    const res = await api.get('/users', { params })

    return res.data.data
  } catch (err) {
    console.error('Error to search users:', err)
    throw err
  }
}
