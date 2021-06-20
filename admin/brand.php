<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/side-nav.php'); 

    if(array_key_exists('success', $_SESSION)){
        // if(count($_SESSION['error']) > 0){
            $success = $_SESSION['success'];
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
                        <h4 class="page-title">Brands Table</h4>
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
                        <!-- Success Message -->
                    <?php if(isset($success)){?>
                    <span>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                    
                    <?php foreach($success as $successfull){ echo '<i class="fas fa-check-circle"></i>  '.$successfull.'<br>'; unset($_SESSION['success']);}?>
                    </strong>
                    </div>
                    <?php } 
                    ?>
                    </span>
                            <h3 class="box-title">Brands Table</h3>
                            <a href="addbrand.php"class="btn btn-primary">Add New Brands</a>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Brand Name</th>
                                            <th class="border-top-0">About Brand</th>
                                            <th class="border-top-0">About Address</th>
                                            <th class="border-top-0">Brand Image</th>
                                            <th colspan="2" class="border-top-0 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $n=1;
                                        $query = "SELECT * from brand";
                                        $fire = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($fire) > 0){
                                        while($data = mysqli_fetch_array($fire)){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $n++;?></td>
                                            <td><?php echo $data['brand_name'];?></td>
                                            <td><?php echo $data['brand_description'];?></td>
                                            <td><?php echo $data['brand_location'];?></td>
                                            <td><img src="../../<?php echo $data['brand_image'];?>" width="80px" height="60px" alt=""></td>
                                            

                                            <td>
                                            <form action="editbrand.php" method="post">
                                                <input type="text" name="brand_id" value="<?php echo $data['brand_id']?>" hidden>
                                                <button type="submit" name="submit" class="btn btn-info text-white">Update</button>
                                            </form>
                                            </td>
                                            <td><a href="" class="btn btn-danger text-white">Delete</a></td>
                                            
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
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