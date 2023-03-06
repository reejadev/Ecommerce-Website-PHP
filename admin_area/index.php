<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
         crossorigin="anonymous">

        <link rel="stylesheet" href="../style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>

.admin_image {
    width: 100px;
    object-fit: contain;
}

.footer{
 position: absolute;
 bottom: 0;

}

body{
    overflow-x:hidden;
}

.product_image{
    width:100px;
    object-fit: contain;   
}
        </style>

  </head>
  <body>
  <div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<div class="container-fluid">
<img src="../images/admin.jpg" alt="" class="logo">
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="" class="nav-link">Welcome Guest</a>
        </li>
    </ul>

</nav>

</div>
</nav>

<!--2nd child -->
<div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>

</div>
<!-- -->
<div class="row">
<div class="col-md-12 bg-secondary p-2 d-flex align-items-center">

<div class="p-3">
<a href="#"><img src="../images/admlog.png" class="admin_image" alt=""></a>
<p class="text-light text-center">Admin name</p>
</div>

<div class="button text-center">
<button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
<button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
<button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
<button class="my-3"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
<button class="my-3"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
<button class="my-3"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
<button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
<button class="my-3"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
<button class="my-3"><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
<button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>

</div>

</div>

</div>

<div class="container my-3">
<?php 
if(isset($_GET['insert_category'])){
 include('insert_categories.php');
}

if(isset($_GET['insert_brand'])){
    include('insert_brands.php');
   }

   if(isset($_GET['view_products'])){
    include('view_products.php');
   }

   if(isset($_GET['edit_products'])){
    include('edit_products.php');
   }

   if(isset($_GET['delete_product'])){
    include('delete_product.php');
   }

   if(isset($_GET['view_categories'])){
    include('view_categories.php');
   }

   if(isset($_GET['view_brands'])){
    include('view_brands.php');
   }

   if(isset($_GET['edit_category'])){
    include('edit_category.php');
   }

   if(isset($_GET['edit_brands'])){
    include('edit_brands.php');
   }

   if(isset($_GET['delete_category'])){
    include('delete_category.php');
   }

   if(isset($_GET['delete_brand'])){
    include('delete_brand.php');
   }

   if(isset($_GET['list_orders'])){
    include('list_orders.php');
   }

   if(isset($_GET['list_payments'])){
    include('list_payments.php');
   }


?>

</div>

<?php
include("../includes/footer.php");


?>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
 crossorigin="anonymous"></script>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>

  </body>
</html>