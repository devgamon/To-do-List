<?php session_start();

    $user = 'root';
    $pass = '';
    $database = 'todolist';
    $server = 'localhost';

    $conn = new mysqli($server, $user, $pass, $database);
    if(!$conn){
        echo 'Error connection: '.$conn->error;
    }

    function RegisterTask($nm_task){
        $cmd = 'INSERT INTO tasks VALUES (null, "'.$nm_task.'")';
        $res = $GLOBALS['conn']->query($cmd);
        
        if($res){
            echo 'Successfully Registered';
        }else{
            echo 'Failed to Register';
        }
    }

    function DeleteTask($cd_task){
        $cmd = 'DELETE FROM tasks WHERE cd_task = '.$cd_task;
        $res = $GLOBALS['conn']->query($cmd);

        if($res){		
            echo 'Task Deleted';
        }else{
            echo 'Error deleting task';
        }

    }

    function ViewTask($cd_task){
        $cmd = 'SELECT * FROM tasks';
        $res = $GLOBALS['conn']->query($cmd);
        
        if($cd_task != ""){
            $cmd.= ' WHERE cd = '.$cd_task;
        }	
        return $res;
    }

?>