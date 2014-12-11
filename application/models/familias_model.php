<?php

/**
 * NoteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class FamiliasModel
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
     * Getter for all notes (notes are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function getAllFamilia()
    {
        $sql = "SELECT pkUsuario, nombre_joven, ciudad, email FROM usuarios ";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single note
     * @param int $note_id id of the specific note
     * @return object a single object (the result)
     */
    public function getFamilia($pkUsuario)
    {
        $sql = "SELECT pkUsuario, nombre_joven, ciudad, familia FROM usuarios WHERE pkUsuario = :pkUsuario";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':pkUsuario' => $pkUsuario));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a note (create)
     * @param string $note_text note text that will be created
     * @return bool feedback (was the note created properly ?)
     */
    public function create($nombre_joven, $ciudad, $familia)
    {
        // clean the input to prevent for example javascript within the notes.
        $nombre_joven = strip_tags($nombre_joven);
        $ciudad = strip_tags($ciudad);
        $familia = strip_tags($familia);

        $sql = "INSERT INTO usuarios (nombre_joven, ciudad, familia) VALUES (:nombre_joven, :ciudad, :familia)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':nombre_joven' => $nombre_joven, ':ciudad' => $ciudad, ':familia'=>$familia ));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PASTOR_CREATION_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Setter for a note (update)
     * @param int $note_id id of the specific note
     * @param string $note_text new text of the specific note
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($pkUsuario, $nombre_joven, $ciudad, $familia)
    {
        // clean the input to prevent for example javascript within the notes.
        $nombre_joven = strip_tags($nombre_joven);
        $ciudad = strip_tags($ciudad);
        $familia = strip_tags($familia);


        $sql = "UPDATE usuarios SET nombre_joven = :nombre_joven, ciudad = :ciudad, familia = :familia WHERE pkUsuario = :pkUsuario";
        $query = $this->db->prepare($sql);
        $query->execute(array(':pkUsuario' => $pkUsuario, ':nombre_joven' => $nombre_joven, ':ciudad' => $ciudad, 'familia' => $familia));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PASTOR_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Deletes a specific note
     * @param int $note_id id of the note
     * @return bool feedback (was the note deleted properly ?)
     */
    public function delete($pkUsuario)
    {
        $sql = "DELETE FROM usuarios WHERE pkUsuario = :pkUsuario";
        $query = $this->db->prepare($sql);
        $query->execute(array(':pkUsuario' => $pkUsuario));

        $count =  $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PASTOR_DELETION_FAILED;
        }
        // default return
        return false;
    }
}
