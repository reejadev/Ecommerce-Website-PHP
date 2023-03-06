<?php

if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];

    $delete_query = "Delete from products where product_id=$delete_id";
    $result = mysqli_query($con, $delete_query);
    if($result){
        echo "<script>alert('Delete successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>