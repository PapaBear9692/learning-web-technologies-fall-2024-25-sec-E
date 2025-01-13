<?php
    require_once ('connection.php');
    
    function getAdmin($username, $password) {
        $con = getConnection();
        $sql = "select * from users where username='$username' and password='$password' and usertype='admin'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getUser($username, $password) {
        $con = getConnection();
        $sql = "select * from users where username='$username' and password='$password' and usertype='user'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function insertUser($username, $password, $type) {
        $con = getConnection();
        $sql = "insert into users values('', '$username', '$password', '$type')";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function updateUser($id, $username, $password, $type) {
        $con = getConnection();
        $sql = "update users set username='$username', password='$password', usertype='$type' where id='$id'";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function deleteUser($id) {
        $con = getConnection();
        $sql = "delete from users where id='$id'";
        $result = mysqli_query($con, $sql);
        return $result;
    }
?>