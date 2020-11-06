export default {

    arrayToObject(data) {
        return Array.isArray(data) ? Object.assign({}, data) : data;
    }
}
