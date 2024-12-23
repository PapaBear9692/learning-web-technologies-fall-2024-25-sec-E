<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $password, $email){
        $con = getConnection();
        $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";
        if(mysqli_query($con, $sql)){
            return true;
        } 
        else{
            return false;
        }
    }

    function getAllUser(){
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }

    function updateUser($id, $username, $password, $email){
        $con = getConnection();
        $sql = "UPDATE users SET username = $username, password = $password, email = $email WHERE id = $id";
        if(mysqli_query($con, $sql)){
            return true;
        } 
        else{
            return false;
        }
    }

    function deleteUser($username){
        $con = getConnection();
        $sql = "delete from users where username='{$username}'";
        if(mysqli_query($con, $sql)){
            return true;
        } 
        else{
            return false;
        }
    }


    function getUserByUsername($username){
        $con = getConnection();
        $sql = "select * from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getUserByEmail($email){
        $con = getConnection();
        $sql = "select * from users where email='{$email}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getUserById($id){
        $con = getConnection();
        $sql = "select * from users where id='{$id}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

?>