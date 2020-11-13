import axios from './../../plugins/axios'

export default {

    getUsersList: () => axios.get('/api/admin/users')

}
