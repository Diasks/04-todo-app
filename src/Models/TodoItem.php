<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        try {
            $query = "INSERT INTO todos(title, created)
       VALUES ('$title', now());";
            self::$db->query($query);
            $result = self::$db->execute();
            return $result;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        // TODO: Implement me!
        // Update a specific todo
        try {
            $query = "UPDATE todos
            SET title = '$title',
            completed = '$completed'
            WHERE id = '$todoId'";
            self::$db->query($query);
            $result = self::$db->execute();
        
           return $result;
}catch (PDOException $err) {
            return $err->getMessage();
        }
    
    }

    public static function deleteTodo($todoId)
    {
        // TODO: Implement me!
        // Delete a specific todo
        try {}catch (PDOException $err) {
            return $err->getMessage();
        }
     
    }
    
    // (Optional bonus methods below)

    
    public static function toggleTodos()
    { 
  // TODO: Implement me!
        // This is to toggle all todos either as completed or not completed
        try {}catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function clearCompletedTodos()
    {
    //     TODO: Implement me!
    //     This is to delete all the completed todos from the database
    try {}catch (PDOException $err) {
        return $err->getMessage();
    }
    }

}
