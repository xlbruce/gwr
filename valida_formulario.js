function ucfirst(str) {
    return str[0].toUpperCase() + str.substring(1);
}

function validaLength(field, value, minLength) {    
    if(value.length < minLength || value.length == 0) {
            document.getElementById(field).innerHTML = " mínimo " + minLength + " caracteres";
            return false;
    }
    document.getElementById(field).innerHTML = "";
    return true;
}