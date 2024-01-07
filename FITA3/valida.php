<?php
// Incloure l'arxiu de connexió
include('conect.php');

class Validator
{
    public function validateName($name)
    {
        if (preg_match('/^[a-zA-Z\s]*$/', $name)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validatePassword($password)
    {
        if (preg_match('/^[a-zA-Z0-9]{8,}$/', $password)) {
            return true;
        } else {
            return false;
        }
    }
}
?>

<?php
require_once 'Validator.php';

$validator = new Validator();

if ($validator->validateName($_POST['name']) && $validator->validateEmail($_POST['email']) && $validator->validatePassword($_POST['password'])) {
    // Els continguts s'han validat correctament, podeu procedir amb el registre del nou usuari
} else {
    // Hi ha hagut un error en la validació, s'ha d'informar l'usuari i demanar-li que torni a introduir els continguts correctament
}
?>

