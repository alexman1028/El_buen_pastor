<?php

/**
 * Class Note
 * The note controller. Here we create, read, update and delete (CRUD) example data.
 */
class Familias extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /note/index in your app.
     * Gets all notes (of the user).
     */
    public function index()
    {
        $note_model = $this->loadModel('Familias');
        $this->view->familias = $note_model->getAllFamilia();
        $this->view->render('familias/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new note. This is usually the target of form submit actions.
     */
    public function create()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this note-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if (isset($_POST['nombre_joven']) AND !empty($_POST['nombre_joven'] ) AND isset($_POST['ciudad']) AND !empty($_POST['familia'] ) ) {
            $note_model = $this->loadModel('Familias');
            $note_model->create($_POST['nombre_joven'],$_POST['ciudad'], $_POST['familia']);
        }
        header('location: ' . URL . 'familias');
    }

    /**
     * This method controls what happens when you move to /note/edit(/XX) in your app.
     * Shows the current content of the note and an editing form.
     * @param $note_id int id of the note
     */
    public function edit($pkUsuario)
    {
        if (isset($pkUsuario)) {
            // get the note that you want to edit (to show the current content)
            $familias_model = $this->loadModel('Familias');
            $this->view->familia = $familias_model->getFamilia($pkUsuario);
            $this->view->render('familias/edit');
        } else {
            header('location: ' . URL . 'familias');
        }
    }

    /**
     * This method controls what happens when you move to /note/editsave(/XX) in your app.
     * Edits a note (performs the editing after form submit).
     * @param int $note_id id of the note
     */
    public function editSave($pkUsuario)
    {
        if (isset($_POST['nombre_joven']) && isset($pkUsuario) && isset($_POST['ciudad']) ) {
            // perform the update: pass note_id from URL and note_text from POST
            $familias_model = $this->loadModel('Familias');
            $familias_model->editSave($pkUsuario, $_POST['nombre_joven'], $_POST['ciudad'], $_POST['familia']);
        }
        header('location: ' . URL . 'familias/edit/'.$pkUsuario);
    }

    /**
     * This method controls what happens when you move to /note/delete(/XX) in your app.
     * Deletes a note. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $note_id id of the note
     */
    public function delete($pkUsuario)
    {
        if (isset($pkUsuario)) {
            $familias_model = $this->loadModel('Familias');
            $familias_model->delete($pkUsuario);
        }
        header('location: ' . URL . 'familias');
    }
}
