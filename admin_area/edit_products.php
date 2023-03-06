<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "Select * from products where product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
     

    $select_categories= "Select * from categories where category_id=$category_id";
    $res = mysqli_query($con, $select_categories);
    $row = mysqli_fetch_assoc($res);
    $category_title = $row['category_title'];

    $select_brands= "Select * from brands where brand_id= $brand_id";
    $res_brand = mysqli_query($con, $select_brands);
    $row_brand = mysqli_fetch_assoc($res_brand);
    $brand_title= $row_brand['brand_title'];

}
?>

<div class="container mt-5">
    <h1 class="text-center mb-3">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" value="<?php echo $product_title; ?>" id="product_title" name="product_title"
             class="form-control" required>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" id="product_description" value="<?php echo $product_description;?>"
            name="product_description" class="form-control" required>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_keyword" class="form-label">Product keyword</label>
            <input type="text" id="product_keyword" value="<?php echo $product_keywords;?>" 
            name="product_keyword" class="form-control" required>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
        <label for="product_category" class="form-label">Product categories</label>
           <select name="product_category" class="form-select">
            <option value="<?php echo $category_title;?>"><?php echo $category_title;?></option>

            <?php
$select_categories_all= "select * from categories";
$res_all = mysqli_query($con, $select_categories_all);
            while ($row_all = mysqli_fetch_assoc($res_all)) {
                $category_title_all = $row_all['category_title'];
                $category_id = $row_all['category_id'];
                echo "<option value='$category_id'> $category_title_all</option>";
          
            }
?>

           </select>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
        <label for="product_brands" class="form-label">Product brands</label>
           <select name="product_brands" class="form-select">
            <option value="<?php echo $brand_title;?>"><?php echo $brand_title;?></option>

            <?php
 $select_brands_all= "select * from brands";
 $res_brand_all = mysqli_query($con, $select_brands_all);
  
 while($row_brand_all= mysqli_fetch_assoc($res_brand_all)){
    $brand_title = $row_brand_all['brand_title'];
                $brand_id = $row_brand_all['brand_id'];
                echo "<option value='$brand_id'> $brand_title</option>";
 }
            ?>
                
          </select>
        </div>

      
        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $product_image1;?>" alt="" class="product_image">
            </div>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $product_image2;?>" alt="" class="product_image">
            </div>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $product_image3;?>" alt="" class="product_image">
            </div>
        </div>

        <div class="form-outline m-auto w-50 mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" value="<?php echo $product_price;?>" id="product_price" name="product_price" 
            class="form-control" required>
        </div>

        <div class="w-50 m-auto">
        <input type="submit"  name="edit_product" 
        value="Update Product" class="btn btn-info px-3 mb3" >
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];


    move_uploaded_file($temp_image1, "./product_images/$product_image1");
    move_uploaded_file($temp_image2, "./product_images/$product_image2");
    move_uploaded_file($temp_image3, "./product_images/$product_image3");

    $update = "Update products set product_title='$product_title',product_description='$product_description',
    product_keywords='$product_keyword',category_id='$product_category',brand_id='$product_brands',
    product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
    product_price='$product_price',date=NOW() where product_id=$edit_id";

    $result_update = mysqli_query($con,$update);
    if($result_update){
        echo "<script>alert('Update successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}
?>