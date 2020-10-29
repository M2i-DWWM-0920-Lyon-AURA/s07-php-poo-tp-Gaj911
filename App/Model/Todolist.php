<?php 

namespace App\Model;
use App\Model\DatabaseHandler;

final class ToDoList 
{
    protected $id;
    protected $description; 
    protected $done;

    public function __construc(

        int $id = null,
        string $description = '',
        int $done = null
    )

    {
        $this->id = $id;
        $this->description = $description;
        $this->done = $done;

    }


    public function save()
    {
        if (is_null($this->id)) {
            $this->create();
        } else {
            $this->update();
        }
    }


    protected function create()
    {
        

        $statement = DatabaseHandler::prepare('
            INSERT INTO `todos` (
                `description`,
                `done`
              
            )
            VALUES (
                :description,
                :done
            )
        ');
        $statement->execute([
            ':description' => $this->description,
            ':done' => $this->done,
        ]);

        $this->id = DatabaseHandler::lastInsertId();
    }

    protected function update()
    {

        $statement = DatabaseHandler::prepare('
            UPDATE `todos`
            SET
                `description` = :description,
                `done` = :done
                 WHERE `id` = :id;
        ');
        $statement->execute([
            ':id' => $this->id,
            ':descrption' => $this->description,
            ':done' => $this->done,
        ]);
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of done
     */ 
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set the value of done
     *
     * @return  self
     */ 
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    function createTodolist($id, $description, $done) {
        return new games($id, $description, $done);
    }
    
    

    static public function fetchAll() : array {

    
        $statement = DatabaseHandler::query('SELECT * FROM `todos` ORDER BY `id`');
        return $statement->fetchAll();
    
    }







}