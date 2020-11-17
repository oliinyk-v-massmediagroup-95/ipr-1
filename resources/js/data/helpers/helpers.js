export function objectToFormData(object) {
    const formData = new FormData();

    for (const key in object) {
        if (Array.isArray((object[key]))) {
            object[key] = JSON.stringify(object[key]);
        } else if (typeof object[key] === 'object' && !(object[key] instanceof File)) {
            object[key] = JSON.stringify(object[key]);
        }

        formData.append(key, object[key]);
    }

    return formData;
}
