<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller
{
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
            $this->redirect('/');
        }
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $title = $body['title'];
        // whether or not the todo has been checked or not
        $completed = isset($body['status']) ? 1 : 0;
        if ($completed == 0) {
            $completed = "false";
        } else {
            $completed = "true";
        }
        $result = TodoItem::updateTodo($todoId, $title, $completed);
        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Error occured when trying to update to-do!");
        }
    }
   
    

    public function delete($urlParams)
    {
        // TODO: Implement me!
        $todoId = $urlParams['id'];
        $result = TodoItem::deleteTodo($todoId);

        if ($result) {
            $this->redirect('/');
        }
    }
    

    /**
     * OPTIONAL Bonus round!
     *
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */

    public function toggle($todoId)
    {
        $result = TodoItem::toggleTodos($todoId);

        if ($result) {
            $this->redirect('/');
        }
        // (OPTIONAL) TODO: This action should toggle all todos to completed, or not completed.
    }
            
    

    public function clear($todoId)
    {
        // (OPTIONAL) TODO: This action should remove all completed todos from the table.
       
        
        $result = TodoItem::clearCompletedTodos($todoId);

        if ($result) {
            $this->redirect('/');
        }
    }
}
