<?php require_once('header.php'); ?>

<?php
 if(isset($_POST['submit'])){
     $id = $_POST['id'];
     // image processing
    $brand_image = $_FILES['brand_image']['name'];
    $brand_temp_name = $_FILES['brand_image']['tmp_name'];
    $brand_image_size = $_FILES['brand_image']['size'];

    $imageextpicker = explode('.', $brand_image);
    $image_ext = strtolower(end($imageextpicker));

    $allowed_extention = array('png', 'jpg', 'jpeg');
    if(in_array($image_ext, $allowed_extention)){
        $destination = 'assets/uploads/prescription/'.$brand_image;
        move_uploaded_file($brand_temp_name, $destination);

    $statement = $pdo->prepare("UPDATE tbl_payment SET prescription_image=?,need_prescription=? WHERE id=?");
	$statement->execute(array($destination,3,$id));

        header('location: customer-order.php');

    }
 }
?>