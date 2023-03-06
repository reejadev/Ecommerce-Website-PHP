<?php

if(isset($_GET['delete_brand'])){
    $delete_category=$_GET['delete_brand'];
    $delete_query="Delete from brands where brand_id=$delete_category";
    $result = mysqli_query($con, $delete_query);
    if($result){
        echo "<script>alert('Delete successful')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>