<?php 

use App\Model\ToDoList; 

class TodoController 

{

    public function create()
    {
        // Crée un nouveau quiz
        $todo = new ToDoList;

        // Assigne le contenu du formulaire aux propriétés de l'objet
        $todo
            ->setDescription($_POST['title'])
            ->setDone($_POST['done'])
        ;

        // Sauvegarde le quiz en base de données
        $quiz->save();

        // Redirige vers la page "Création"
        header('Location: /create');
    }




}