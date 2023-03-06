<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-view product</title>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

<?php
$get_products = "Select * from products";
$result = mysqli_query($con,$get_products);
$number = 0;
while ($row_data = mysqli_fetch_assoc($result)) {
    $product_id = $row_data['product_id'];
    $product_title = $row_data['product_title'];
    $product_image1 = $row_data['product_image1'];
    $product_price = $row_data['product_price'];
    $status = $row_data['status'];
    $number++;
    ?>
     <tr class="text-center">
<td><?php echo $number; ?></td>
<td><?php echo $product_title; ?></td>
<td><img src='./product_images/<?php echo $product_image1; ?>' class='product_image'/></td>
<td><?php echo $product_price; ?>/-</td>

<td><?php
$get_count="Select * from orders_pending where product_id=$product_id";
$res = mysqli_query($con,$get_count);
$rows_count=mysqli_num_rows($res);
echo $rows_count;?></td>

<td><?php echo $status; ?></td>
<td><a href='index.php?edit_products=<?php echo $product_id;?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_product=<?php echo $product_id;?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
</tr>

<?php
}
?>
           
        </tbody>
    </table>
</body>
</html>
