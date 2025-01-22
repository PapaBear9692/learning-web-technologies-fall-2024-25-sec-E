<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'finman');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function login($email, $password) {
    $con = getConnection();
    $sql = $con->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $result = $sql->get_result();
    $count = $result->num_rows;

    $sql->close();
    //mysqli_close($con);

    return $count === 1;
}

function addUser($username, $password, $email, $gender, $dob, $address, $phone, $role) {
    $con = getConnection();
    $sql = $con->prepare("INSERT INTO users (username, password, email, gender, dob, address, phone, role) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssss", $username, $password, $email, $gender, $dob, $address, $phone, $role);
    $status = $sql->execute();

    $sql->close();
    //mysqli_close($con);

    return $status;
}

function getUser($id) {
    $con = getConnection();
    $sql = $con->prepare("SELECT * FROM users WHERE id=?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();

    $sql->close();
    //mysqli_close($con);

    return $user;
}

function getUserId($username, $password){
    $con = getConnection();
    $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    //mysqli_close($con);
    return $user["id"];
}

function getAllUsers() {
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    //mysqli_close($con);
    return $users;
}

function deleteUser($id) {
    $con = getConnection();
    $sql = $con->prepare("DELETE FROM users WHERE id=?");
    $sql->bind_param("i", $id);
    $status = $sql->execute();

    $sql->close();
    //mysqli_close($con);

    return $status;
}

function updateUser($id, $username, $email, $gender, $dob, $address, $phone, $role, $password) {
    $con = getConnection();
    $sql = $con->prepare("UPDATE users SET username=?, email=?, gender=?, dob=?, address=?, phone=?, role=?, password=? WHERE id=?");
    $sql->bind_param("ssssssssi", $username, $email, $gender, $dob, $address, $phone, $role, $password, $id);
    $status = $sql->execute();

    $sql->close();
    //mysqli_close($con);

    return $status;
}

function getPassword($email) {
    $con = getConnection();
    $sql = $con->prepare("SELECT password FROM users WHERE email=?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

    $sql->close();
    //mysqli_close($con);

    return $row ? $row["password"] : null;
}

function updatePassword($email, $newPassword) {
    $con = getConnection();
    $sql = $con->prepare("UPDATE users SET password=? WHERE email=?");
    $sql->bind_param("ss", $newPassword, $email);
    $status = $sql->execute();

    $sql->close();
    //mysqli_close($con);

    return $status;
}

?>
