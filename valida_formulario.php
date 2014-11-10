<meta charset="UTF-8">
<?php
    function validaNome($name, $minLength = 5) {
        if(strlen($name) < $minLength) {
            echo "Nome deve conter no mínimo $minLength caracteres";
            return false;
        }
        return true;
    }
    
    validaNome($_POST['nome'], 5);
?>