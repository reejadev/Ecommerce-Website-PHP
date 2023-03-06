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
        <title>Ecommerce Website</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="style.css">
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
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
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
</li>
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Total Price: Rs.<?php total_price();  ?>/-</a>
</li>
      </ul>

      <form method="get" action="search_product.php" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
      
      </form>

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

<div class="row">
<div class="col-md-10">

<div class="row">

<?php
search_product();
get_unique_categories();
get_unique_brands();
?>
     
<!-- row end -->
</div>
<!-- col end -->
</div>


<div class="col-md-2 bg-secondary p-0">
<ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
  <a href="#" class="nav-link  text-light"><h4>Delivery Brands</h4></a>
  </li>

<?php
getbrands();

?>



</ul>

<ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-info">
  <a href="#" class="nav-link  text-light"><h4>Categories</h4></a>
  </li>
  
  <?php
  getcategories();
?>
  

</ul>
</div>


<div class="p-3 mb-2 bg-info text-white text-center">
<p>All rights reserved @ Designed by Reeja</p>
</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
 crossorigin="anonymous"></script>

</body>
<html>