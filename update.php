<?php
    include 'database.php';
    $id=$_GET['id'];

    $todo = "SELECT * FROM todos WHERE id=$id";
    $todos=mysqli_query($conn, $todo);

    if($todos){
        $todo_row = mysqli_fetch_assoc($todos);
        $is_favourite = $todo_row['is_favourite'];

        if($is_favourite=='0'){
            $sql="UPDATE todos SET is_favourite='1' WHERE id=$id";
            $result=mysqli_query($conn, $sql);
            if($result){
                header("location: ./index.php");
            }
        }
        else{
            $sql="UPDATE todos SET is_favourite='0' WHERE id=$id";
            $result=mysqli_query($conn, $sql); 
            if($result){
                header("location: ./index.php");
            }
        }
    }

    // if($todos["is_favourite"]=='0'){
    //     $sql="UPDATE todos SET is_favourite='1' WHERE id=$id";
    //     $result=mysqli_query($conn, $sql);
    //     if($result){
    //         header("location: ./index.php");
    //     }
    // }
    // else{
    //     $sql="UPDATE todos SET is_favourite='0' WHERE id=$id";
    //     $result=mysqli_query($conn, $sql); 
    //     if($result){
    //         header("location: ./index.php");
    //     }
    // }



?>