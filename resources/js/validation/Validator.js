

export const minLength = (value = '', min, message) => value.length >= min || (message ?? `Minimo de ${min} caracteres.`);

export const maxLength = (value = '', max, message) => value.length <= max || (message ?? `Maximo de ${max} caracteres.`);

export const required = (value, message)  => !!value || (message ?? 'Campo obrigatório.');

export const number = (value, message) => !isNaN(value) || (message ?? 'Apenas numeros.');

export const equals = (value, value2, message) => value === value2 || (message ?? 'Valores não iguais.');

export const email = (value, message) => {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(value) || (message ?? 'Email inválido');
};



export const validate = (validations = []) => {
    for (let validation of validations){
        if (validation  !== true)
        return validation;
    }
    return true;
}
