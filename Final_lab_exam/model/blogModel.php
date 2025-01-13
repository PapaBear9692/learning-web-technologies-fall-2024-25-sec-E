<?php
    require_once ('connection.php');
    
    function getBlog($id) {
        $con = getConnection();
        $sql = "select * from blog where id='$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getAllBlog() {
        $con = getConnection();
        $sql = "select * from blog";
        $result = mysqli_query($con, $sql);
        $blogs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($blogs, $row);
        }
        return $blogs;
    }

    function insertBlog($title, $description, $category) {
        $con = getConnection();
        $sql = "insert into blog values('', '$title', '$description', '$category')";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function updateBlog($id, $title, $description, $category) {
        $con = getConnection();
        $sql = "update blog set title='$title', description='$description', category='$category' where id='$id'";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function deleteBlog($id) {
        $con = getConnection();
        $sql = "delete from blog where id='$id'";
        $result = mysqli_query($con, $sql);
        return $result;
    }
?>