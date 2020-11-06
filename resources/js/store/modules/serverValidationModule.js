import objectFilters from '../../data/filters/objectFilters'

export default {
    state: {
        errors: {

        }
    },

    getters: {
        getServerValidationErrors: (state) => state.errors,
    },

    mutations: {
        setServerValidationErrors: (state, data) => {
            state.errors = objectFilters.arrayToObject(data)

            //clear backend errors after 4 sec
            setTimeout(() => state.errors = {}, 4000);
        },
    },
}
