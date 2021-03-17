<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'crud');
   

    $name="";
    $stock="";
    $amount="";
    $id=0;
    $update= false;

    if(isset($_POST['save'])){
        if(!empty($_POST['name'])){
            $name= $_POST['name'];
        }else{
            $_SESSION['msg'] = "field can't be empty";
        }
        if(!empty($_POST['stock'])){
            $stock= $_POST['stock'];
        }else{
            $_SESSION['msg'] = "field can't be empty";
        }
        if(!empty($_POST['amount'])){
            $amount= $_POST['amount'];
        }else{
            $_SESSION['msg'] = "field can't be empty";
        }
        mysqli_query($conn,"INSERT INTO info(name, stock, amount) VALUES('$name', '$stock', '$amount')");
        $_SESSION['msg'] = "Saved Successfully";
        header('location: index.php');
    }

    if(isset($_POST['update'])){
       $id= $_POST['id'];
       $name = $_POST['name'];
       $stock = $_POST['stock'];
       $amount = $_POST['amount'];
       mysqli_query($conn,"UPDATE info SET name='$name', stock='$stock', amount='$amount' WHERE id= $id");
        $_SESSION['msg'] = "Saved Successfully";
        header('location: index.php');
    }
    if(isset($_GET['del'])){
        $id = $_GET['del'];

        mysqli_query($conn, "DELETE FROM info WHERE id=$id");
        $_SESSION['msg']= "Record Deleted";
        header('location: index.php');
    }
?>