

export const minLength = (value = '', min, message) => value.length >= min || (message ?? `Minimo de ${min} caracteres.`);

export const maxLength = (value = '', max, message) => value.length <= max || (message ?? `Maximo de ${max} caracteres.`);

export const required = (value, message)  => !!value || (message ?? 'Campo obrigat�rio.');

export const number = (value, message) => !isNaN(value) || (message ?? 'Apenas numeros.')


export const validate = (validations = []) => {
    for (let validation of validations){
        if (validation  !== true)
        return validation;
    }
    return true;
}
