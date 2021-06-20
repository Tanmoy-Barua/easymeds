<?php require_once('header.php'); ?>




<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['full_name'])) {
        $valid = 0;
        $error_message .= "Full name can not be empty<br>";
    }

    if(empty($_POST['email_address'])) {
        $valid = 0;
        $error_message .= "Email Address can not be empty<br>";
    }

    if(empty($_POST['phone_number'])) {
        $valid = 0;
        $error_message .= "Phone Number can not be empty<br>";
    }
    if(empty($_POST['password'])) {
        $valid = 0;
        $error_message .= "Password can not be empty<br>";
    }

    


    if($valid == 1) {

		//Saving data into the main table tbl_product
		$statement = $pdo->prepare("INSERT INTO tbl_user(
										full_name,
										email,
										phone,
										password,
										role,
                                        photo,
										status
									) VALUES (?,?,?,?,?,?,?)");
		$statement->execute(array(
										$_POST['full_name'],
										$_POST['email_address'],
										$_POST['phone_number'],
										md5($_POST['password']),
										$_POST['role'],
                                        '',
										$_POST['p_is_active']
									));

		
	
    	$success_message = 'Pharmasist is added successfully.';
    }
}
?>





<section class="content-header">
	<div class="content-header-left">
		<h1>Add Pharmasist</h1>
	</div>
	<div class="content-header-right">
		<a href="pharmasist.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Full Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="full_name" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Email Address *</label>
							<div class="col-sm-4">
								<input type="text" name="email_address" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Phone Number <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="phone_number" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Password <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="password" class="form-control">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-3 control-label">Role <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="role" class="form-control" value="Pharmacists" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Active?</label>
							<div class="col-sm-8">
								<select name="p_is_active" class="form-control" style="width:auto;">
									<option value="Active">Yes</option>
									<!-- <option value="Inactive">No</option> -->
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>


<?php require_once('footer.php'); ?>