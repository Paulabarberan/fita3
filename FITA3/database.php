<?php
include('Database.php');
include('Tasca.php');

class GestorTasques {
    private $username;
    private $baseDeDatos;

    public function __construct($username) {
        $this->username = $username;
        $this->baseDeDatos = new Database(); // Inicializar la clase Database
    }

    public function obtenerTareas() {
        // Obtener las tareas del usuario desde la base de datos
        $datosTareas = $this->baseDeDatos->obtenerTareasPorUsuario($this->username);

        $tareas = [];
        foreach ($datosTareas as $datosTarea) {
            $tareas[] = new Tasca(
                $datosTarea['id'],
                $datosTarea['titulo'],
                $datosTarea['descripcion'],
                $datosTarea['fecha_vencimiento'],
                $datosTarea['prioridad'],
                $datosTarea['estado']
            );
        }

        return $tareas;
    }

    public function agregarTarea($titulo, $descripcion, $fechaVencimiento, $prioridad) {
        // Añadir una nueva tarea para el usuario actual
        $nuevaTarea = new Tasca(null, $titulo, $descripcion, $fechaVencimiento, $prioridad, 'Pendiente');
        $this->baseDeDatos->agregarTarea($this->username, $nuevaTarea);
    }

    // Otros métodos de gestión de tareas
}

class Tasca {
    public $id;
    public $titol;
    public $descripcio;
    public $dataVenciment;
    public $prioritat;
    public $estat;

    public function __construct($id, $titol, $descripcio, $dataVenciment, $prioritat, $estat) {
        $this->id = $id;
        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataVenciment = $dataVenciment;
        $this->prioritat = $prioritat;
        $this->estat = $estat;
    }
}
?>
