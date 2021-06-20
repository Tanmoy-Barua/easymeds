<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/side-nav.php'); 
    if(array_key_exists('error', $_SESSION)){
        // if(count($_SESSION['error']) > 0){
            $error = $_SESSION['error'];
    // } 
    }
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Product Table</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="index.php" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                         <!-- Error Message -->
                         <?php if(isset($error)){?>
                            <span>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>
                            
                            <?php foreach($error as $errors){ echo '<i class="fas fa-exclamation-triangle"></i>  '.$errors.'<br>'; unset($_SESSION['error']);}?>
                            </strong>
                            </div>
                            <?php } ?>
                            </span>
                        <form class="row g-3 needs-validation"  action="validation/addproductvalidation.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Product name</label>
                                <input type="text" class="form-control" name="product_name" id="validationCustom01" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Product Quantity</label>
                                <input type="text" class="form-control" name="product_quantity" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="product_price" id="validationCustomUsername"
                                        aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Brand Name</label>
                            <select class="form-select" name="brand_name" id="validationCustom04" required>
                                <option value="null">Choose...</option>
                                <?php
                                $query = "SELECT * from brand";
                                $fire = mysqli_query($conn, $query);
                                if(mysqli_num_rows($fire) > 0){
                                while($data = mysqli_fetch_array($fire)){   
                                ?>
                                <option value="<?php echo $data['brand_name'];?>"><?php echo $data['brand_name'];?></option>
                                <?php } }?>
                            </select>
                                
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            </div>
                            <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Prescription Need</label>
                            <select class="form-select" name="prescription_need" id="validationCustom04" required>
                                <option value="null">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="product_image" aria-label="file example" required>
                            </div>
                            <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Product Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="product_description" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" name="submit" type="submit">Save Product</button>
                                <a href="product.php" class="btn btn-secondary text-white">Close</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                </div>

            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php 
            include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/footer.php');
            ?>