<?php
// Incloure l'arxiu de connexió
include('conect.php');

// Connexió a la base de dades utilitzant les variables del fitxer de connexió
$conn = new mysqli($serverename, $username, $password, $dbname);

// Verificar la connexió
if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}

// Consulta a la base de dades
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

// Definir la classe User
class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function isValidUser() {
        global $conn;

        // Preparar la consulta SQL per verificar si l'usuari existeix
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $this->username);
        $stmt->execute();

        // Obtindre el resultat de la consulta
        $result = $stmt->get_result();

        // Retornar true si l'usuari existeix i false en cas contrari
        return $result->num_rows > 0;
    }

    public function isValidPasswd($inputPasswd) {
        global $conn;
    
        // Preparar la consulta SQL per obtenir la contrasenya de l'usuari
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
    
        // Obtindre el resultat de la consulta
        $result = $stmt->get_result();
    
        // Verificar si s'ha obtingut un resultat
        if ($result->num_rows > 0) {
            // Obtindre la contrasenya emmagatzemada a la base de dades
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
    
            // Comparar la contrasenya introduïda amb la contrasenya emmagatzemada
            if (password_verify($inputPasswd, $storedPassword)) {
                // Les contrasenyes coincideixen
                return true;
            }
        }
    
        // Retornar false si les contrasenyes no coincideixen o si no s'ha obtingut cap resultat
        return false;
    }
    
}

// Tanquem la connexió a la base de dades
$conn->close();
?>
