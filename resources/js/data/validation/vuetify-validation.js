// TODO: export validation rules;

export const required = (value,
    message = 'Field is required'
) => !!value || message;

export const email = (
    value,
    message = 'Invalid email'
) => value && (new RegExp("\\S+@\\S+\\.\\S+")).test(value) || message;

export const min = (
    value,
    minLength = 3,
    message = 'Min field length is ' + minLength
) =>  value.length > minLength || message


export const max = (
    value,
    maxLength = 150,
    message='Max field length is ' + maxLength
) => value.toString().length < maxLength || message
