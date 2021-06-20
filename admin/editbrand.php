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
                        <h4 class="page-title">Update Brands</h4>
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

                            <?php
                            if(isset($_POST['submit'])){

                                $id = $_POST['brand_id'];
                                
                                $query = "SELECT * from brand where brand_id='$id'";
                                $fire = mysqli_query($conn, $query);

                                foreach($fire as $row){
                                    ?>


                            <form class="row g-3 needs-validation"  action="validation/addbrandvalidation.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Brand name</label>
                                <input type="text" class="form-control" name="brand_name" id="validationCustom01" value="<?php echo $row['brand_name'];?>">
                            </div>
                            <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Brand Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="brand_description" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"><?php echo $row['brand_description'];?></textarea>
                                <!-- <label for="floatingTextarea2">Description</label> -->
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Brand Address</label>
                                <input type="text" class="form-control" name="brand_address" id="validationCustom01" value="<?php echo $row['brand_location']?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Brand Image</label><br>
                                <img src="../../<?php echo $row['brand_image'];?>" width="80px" height="60px" alt="">
                                <input type="file" class="form-control" name="brand_image" aria-label="file example">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" name="submit" type="submit">save</button>
                                <a href="brand.php" class="btn btn-secondary text-white">Close</a>
                            </div>
                            <?php } } ?>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php 
            include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/footer.php');
            ?>