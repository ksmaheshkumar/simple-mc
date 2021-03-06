<?php

    include_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.ini.php');	
    include_once('verify.php');
    
    $user  = new User();
    
    if(isset($_POST['uUsername']) && isset($_POST['uPassword1']) && isset($_POST['uPassword2']) && isset($_POST['roleId'])) {
        try {
            $username = $_POST['uUsername'];
            $pass1 = $_POST['uPassword1'];
            $pass2 = $_POST['uPassword2'];
            $role_id = $_POST['roleId'];
            
            if($user->userExists($username)) {
                echo "{success : false, msg : 'Username already exists.'}";
            } else if($pass1 == $pass2) {
                $user->create($username, $pass1, (int)$role_id);
                echo "{success : true}" ;
            } else {
                echo "{success : false, msg : 'Passwords do not match.'}";
            }
        } catch (Exception $e) {
            echo "{success : false}";
        }
    } else {
        echo "{success : false, msg : 'One or more fields have not been properly filled out.'}";
    }