<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php";
$msg='';
// Display LoggedIn Admin Information
$user = $u->getUserbyId($_SESSION['user_id']);
$user_type = $u->getUserType();

//if(!isset($_SESSION['user_id']))
//{
//	header("Location:admin.php");
//}
if($_POST['Submit'] == "Publish")
{
		if($u->updateMyProfile($_POST))
		{
			$msg = "<span class=\"message\">Profile Updated Successfully.</span>";
		}else{
			$msg = "<span class=\"error\">Unable to Update Profile.</span>";
		}
}

?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>My Profile</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  	$('#Submit').click(function(event){
	 	    if($('#password').val() != $('#conpassword').val()) {
            alert("Password and Confirm Password don't match");
            // Prevent form submission
            event.preventDefault();
        }
	});
});
</script>

<?php include('top.php');?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<?php include("header.php");?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include("sidebar.php");?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>My Profile</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->

			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
                        <?php if($msg!=''){ ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<?php echo $msg;?>
			</div>
                        <?php } ?>
			<div class="row">
			<form action="myprofile.php" method="post" id="myprofileform">
				<div class="col-md-12">
				
					<!-- BEGIN EXTRAS PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
                                                            <i class="icon-doc"></i> Profile 
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-bordered">	
								<div class="form-body">
								
								
								
									<div class="form-group">
										<label class="control-label col-md-2">Name <span class="require"> * </span></label>
										<div class="col-md-10">
                                                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $user['name']; ?>" required>
										</div>
									</div>

											<div class="form-group">
												<label class="control-label col-md-2">User Type <span class="require"> * </span> </label>
												<div class="col-md-10">
  <input type="text" id="usertype" name="usertype" class="form-control" placeholder="UserType" value="<?php echo $user_type; ?>" disabled>
												</div>
											</div>



									<div class="form-group">
										<label class="control-label col-md-2">Email <span class="require"> * </span> </label>
										<div class="col-md-10">
                                                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" disabled>
										</div>
									</div>										
																		

											
									<div class="form-group">
										<label class="control-label col-md-2">UserName <span class="require"> * </span></label>
										<div class="col-md-10">
                                                                                    <input type="text" id="username" name="username" class="form-control" placeholder="UserName" value="<?php echo $user['username']; ?>" disabled>
										</div>
									</div>									
								
									<div class="form-group">
										<label class="control-label col-md-2">Password <span class="require"> * </span></label>
										<div class="col-md-10">
											<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Confirm Password <span class="require"> * </span></label>
										<div class="col-md-10">
											<input type="password" id="conpassword" name="conpassword" class="form-control" placeholder="Confirm Password" value="" required>
										</div>
									</div>																	

								</div>

							</div>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END EXTRAS PORTLET-->
					
									<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-2 col-md-10">
												
													<button type="submit" class="btn green" id="Submit"><i class="fa fa-check"></i> Publish</button>
													<input type="hidden" name="Submit"  value="Publish" id="Submit">
													<button type="button" id="back-btn" class="btn btn-default" onclick="window.location.href='all_charities.php'">Back</button> 
													
												</div>
											</div>
										</div>
									</div>
									<!-- END FORM-->
								</div>
							</div>
							<!-- END EXTRAS PORTLET-->
						</div>
					</div>
					<!-- END PAGE CONTENT-->
		</div>
		</form>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include("footer.php");?>
<script>
$(function () {
	   $('table').footable({ bookmarkable: { enabled: true }}).bind({
		'footable_filtering': function (e) {
			var selected = $('.filter-status').find(':selected').text();
			if (selected && selected.length > 0) {
				e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
				e.clear = !e.filter;
			}
		},
		'footable_filtered': function() {
			var count = $('table.demo tbody tr:not(.footable-filtered)').length;
			$('.row-count').html(count + ' rows found');
		}
	});

	$('.clear-filter').click(function (e) {
		e.preventDefault();
		$('.filter-status').val('');
		$('table.demo').trigger('footable_clear_filter');
		$('.row-count').html('');
	});

	$('.filter-status').change(function (e) {
		e.preventDefault();
		$('table.demo').data('footable-filter').filter( $('#filter').val() );
	});
});
jQuery(document).ready(function() {       
	// initiate layout and plugins
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	ComponentsPickers.init();
	TableAdvanced.init(); // Advanced table
	ComponentsEditors.init(); // HTML5 editor
	jQuery("#emailtemplateform").validate({
		rules: {
			email_subject: "required",
			email_body: "required",
		},
		messages: {
			email_subject: "Required",
			email_body: "Required",
		}
	});
});   
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>













