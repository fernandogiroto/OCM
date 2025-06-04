import api from '@/services/api'

export const fetchUsers = async (search = '') => {
  try {
    const res = await api.get('/users', {
      params: { search }
    })

    return res.data
  } catch (err) {
    console.error('Erro ao buscar usuários:', err)
    throw err
  }
}
