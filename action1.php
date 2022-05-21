<?php 
    session_start();
    include 'config1.php';

        if(isset($_POST['add'])){
            $name = $_POST['name'];
            $userid = $_POST['userid'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password'];

            $query="INSERT INTO users(name,userid,email,phone,password)VALUES(?,?,?,?)";
            $stmt=$conn->prepare($query);
            $stmt->bind_param("ssss",$name,$userid,$email,$phone,$pass);
            $stmt->execute();

            header('location:userdetails.php');
            $_SESSION['response']="Successfully Inserted to the database!";
            $_SESSION['res_type']="success";
        }
    if(isset($_GET['delete'])){
        $id=$_GET['delete']; 

        $query="DELETE FROM users WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        header('location:userdetails.php');
            $_SESSION['response']="Successfully Deleted";
            $_SESSION['res_type']="danger";
    }
?>