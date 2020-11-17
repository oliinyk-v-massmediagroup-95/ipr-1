// TODO: export validation rules;

export const required = (value,
    message = 'Field is required'
) => (!!value || value === 0 ) || message;

export const number = (value, message ='Field should be number') => !isNaN(value) || message

export const minNumber = (
    value,
    minNumber = 0,
    message = 'Field value should be a number > '
) => parseFloat(value) > minNumber || message + minNumber;

export const size = (value, message = 'Value should be (number)x(number)') => {
    const valueArray = value.toString().split('x');
    return valueArray.length === 2
            && !valueArray.some((elem) => required(elem) !== true || number(elem) !== true)
        || message
}

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
