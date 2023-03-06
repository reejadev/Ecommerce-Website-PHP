<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatibile" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ecommerce Website-Cart Details</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="style.css">

        <style>
        .cart_img{
    width: 80px;
 height: 80px;
 object-fit: contain;
        }
 </style>

</head>
<body>
<div class="container-fluid">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <img src ="./images/shopcart.jpeg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="display_all.php">Products</a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./users_area/user_registration.php">Register</a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php">
            <i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
</li>

      </ul>


    </div>
  </div>
</nav>

<?php
cart();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">


      <?php
if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link'  href='#'>Welcome Guest</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link'  href='#'>Welcome ".$_SESSION['username']."</a>
  </li>";
  }


      if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link'  href='./users_area/user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link'  href='./users_area/logout.php'>Logout</a>
</li>";
}
?>

</ul>
</nav>

<div class="bg-light">
<h3 class="text-center">Store</h3>
<p class="text-center">Communication is at the heart of e-commerce and community</p>

<div class="container">
    <div class="row">
        <form action=""method="post">
        <table class="table table-bordered text-center">
            
            <tbody>
                <?php
                 global $con;
                 $ip = getIPAddress();
                 $total=0;
             $cart_query = "Select * from cart_details where ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                $reuslt_count = mysqli_num_rows($result);
                if ($reuslt_count > 0) {

                    echo "<thead>
                    <tr>
                     <th>Product Title</th>
                     <th>Product Image</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                     <th>Remove</th>
                     <th colspan='2'>Operations</th>
                     
                    </tr>
                </thead>";
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_product = "Select * from products where product_id='$product_id'";
                        $result_products = mysqli_query($con, $select_product);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 = $row_product_price['product_image1'];
                            $price_table = $row_product_price['product_price'];
                            $product_values = array_sum($product_price);
                            $total += $product_values;
                            ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                    $ip = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                        $quantities = $_POST['qty'];
                        $update_cart = "update cart_details set quantity=$quantities where ip_address='$ip'";
                        $result_query = mysqli_query($con, $update_cart);
                        $total = $total * $quantities;
                    }
                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                       <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                       <input type="Submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                       <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                       <input type="Submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php
                        }
                    }
                }else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
        ?>
            </tbody>
        </table>
        <div class="d-flex mb-3">
        <?php
 $ip = getIPAddress();

$cart_query = "Select * from cart_details where ip_address='$ip'";
 $result=mysqli_query($con,$cart_query);
$reuslt_count = mysqli_num_rows($result);
        if ($reuslt_count > 0) {

            echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>  $total /-</strong> </h4>
            <input type='Submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
            <button class='bg-secondary p-3 border-0 py-2 mx-3'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
        
        }else{
            echo " <input type='Submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
        }
        if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
        }
        ?>
            
        </div>
    </div>
</div>
</form>


<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query = "Delete from cart_details where product_id=$remove_id";
            $run_delete = mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }

    } 
}

 
?>


<?php
include("./includes/footer.php");

remove_cart_item();
?>
</div>

</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
 crossorigin="anonymous"></script>


</body>

<html>
