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
        try {
            $query = "UPDATE todos
            SET title = '$title',
            completed = '$completed'
            WHERE id = '$todoId'";
            self::$db->query($query);
            $result = self::$db->execute();
        
            return $result;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function deleteTodo($todoId)
    {
        // TODO: Implement me!
        // Delete a specific todo
        try {
            $query = "DELETE FROM todos WHERE id = $todoId";
            self::$db->query($query);
            $result = self::$db->execute();
            return $result;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
    
    // (Optional bonus methods below)

    
    public static function toggleTodos($todoId)
    {

        try {
            $query = "UPDATE todos SET completed= 'true'
            WHERE completed = 'false'";
            self::$db->query($query);
            $result = self::$db->execute();
            return $result;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
        // TODO: Implement me!
        // This is to toggle all todos either as completed or not completed
    }

    public static function clearCompletedTodos($todoId)
    {
        //     TODO: Implement me!
        //     This is to delete all the completed todos from the database
        try {
            $query = "DELETE FROM todos WHERE completed = 'true'";
            self::$db->query($query);
            $result = self::$db->execute();
            return $result;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
}
