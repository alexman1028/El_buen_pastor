<?php

/**
 * NoteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class DashboardModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }


    /**
     * Setter for a registar joven (create)
     * @param string $note_text note text that will be created
     * @return bool feedback (was the note created properly ?)
     */
    public function create($nombre_joven, $apellido, $sexo, $edad, $email, $auto, $encargado, $iglesia, $ciudad, $telefono, $familia)
    {
        // clean the input to prevent for example javascript within the notes.
        $nombre_joven = strip_tags($nombre_joven);
        $apellido = strip_tags($apellido);
        $sexo = strip_tags($sexo);
        $edad = strip_tags($edad);
        $email = strip_tags($email);
        $auto = strip_tags($auto);
        $encargado = strip_tags($encargado);
        $iglesia = strip_tags($iglesia);
        $ciudad = strip_tags($ciudad);
        $telefono = strip_tags($telefono);
        $familia = strip_tags($familia);

        $sql = "INSERT INTO usuarios (nombre_joven, apellido, sexo, edad, email, auto, encargado, iglesia, ciudad, telefono, familia ) VALUES (:nombre_joven, :apellido, :sexo, :edad, :email, :auto, :encargado, :iglesia, :ciudad, :telefono, :familia)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':nombre_joven' => $nombre_joven, ':apellido' => $apellido, ':sexo' => $sexo, ':edad' => $edad,  ':email' => $email, ':auto' => $auto, ':encargado' => $encargado, ':iglesia' => $iglesia, ':ciudad' => $ciudad, ':telefono' => $telefono, ':familia' => $familia));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
        }
        // default return
        return false;
    }

}
