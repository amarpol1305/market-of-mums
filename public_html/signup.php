<?php 
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php"; 
$msg ='';
if($_POST['submit']=='Signup' )  
{
	if($u->adduser($_POST)){
		 $msg = "Registration successfuli.";
	}else{
		 $msg = "Registration Not Completed.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>::Mums::</title>
	<?php include $_SERVER['DOCUMENT_ROOT']."/includes/html_index_header.php"; 
	if($msg !='')
	{
		echo "<script>alert('".$msg."');</script>";
	}
	?>    
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   </head>
  
  <body>

	<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/user_navigate.php"; ?>
 <div class="inner_content">
	<div class="container">
    	<div class="row">
			  <div class="col-lg-12 col-sm-12">
			  		<h2 class="pagehead">Registration</h2>
			  </div>
              <div class="col-lg-3 col-sm-12">
			  		<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/left_menu.php"; ?>
              </div>
              <div class="col-lg-9 col-sm-12">
              <div class="register_form">
                <form action="signup.php" method="post" ng-app="myApp"  ng-controller="validateCtrl" name="myForm" novalidate>
                	<ul>
                    	<li>
                        	<label><span>*</span>Email:</label>
                            <input name="email" id="email" type="email" ng-model="email" required  >
                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
                        <span ng-show="myForm.email.$error.required">Email is required.</span>
                        <span ng-show="myForm.email.$error.email">Invalid email address.</span>
  </span>
						</li>

				        <li>
                           <label><span>*</span>Confirm Email:</label>
					       <input name="cemail" id="cemail" type="email" ng-model="cemail" required  ng-match="email">
                                               <span style="color:red" ng-show="myForm.cemail.$dirty && myForm.cemail.$invalid">
                                                 <span ng-show="myForm.cemail.$error.required">Email is required.</span>
                                                <span ng-show="myForm.cemail.$error.email">Invalid email address.</span>
                                                <span ng-show="$scope.email!==$scope.cemail">Emails have to match!</span>
				        </li>

				        <li>
					        <label><span>*</span>Password:</label>
							<input name="password" id="password" type="password" ng-model="password" required >
                                                        <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
                                                        <span ng-show="myForm.password.$error.required">Password is required.</span>
				        </li>

	  			        <li>
			       			<label><span>*</span>Confirm Password:</label>
			       			<input name="cpassword" id="cpassword" type="password" ng-model="cpassword" required >
                                                <span style="color:red" ng-show="myForm.cpassword.$dirty && myForm.cpassword.$invalid">
                                                <span ng-show="myForm.password.$error.required">confirm Password is required.</span>
			      	    </li>

			    		<li>
							<label><span>*</span>User Name:</label>
							<input name="username" id="username" type="text" required ng-model="username" >
                                                        <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
                                                <span ng-show="myForm.username.$error.required">username is required.</span>
			    		</li>

			    		<li>
							<label><span>*</span>Name:</label>
                                                        <input name="name" id="name" type="text" required ng-model="name" >
                                                        <span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
                                                <span ng-show="myForm.name.$error.required">Name is required.</span>
                                                        
			    		</li>

						<li>
							<label><span>*</span>Address:</label>
                                                        <input name="address" id="address" type="text" required ng-model="address" >
                                                        <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
                                                <span ng-show="myForm.address.$error.required">Address is required.</span>
						</li>

						<li>
			       			<label><span>*</span>City:</label>					            
			       			<input name="city" id="city" type="text" required ng-model="city" >
                                                <span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
                                                <span ng-show="myForm.city.$error.required">City is required.</span>
                        </li>

						<li>
							<label><span></span>State:</label>
                                                        <input name="state" id="state" type="text" ng-model="state" required>
                                                     
						</li>

						<li>
							<label><span>*</span>Country:</label>
						 	<select name="country" id="country" required >
						 		<option value="select" >Select </option>
						 		<option value="Nigeria"  >India </option>
						 	</select>
						</li>

						<li>
							<label><span>*</span>Pincode:</label>
                                                        <input name="pincode" id="pincode" type="text" required ng-model="" >
						</li>

						<li>
							<label><span>*</span>Mobile Number:</label>
							<input name="mobile" id="mobile" type="mobile" required >
						</li>

						<li>
							<label><span>*</span>User Type:</label>
						 	<select name="usertype" id="usertype" required >
						 		<option value="select" >Select </option>
						 		<option value="1"  >Buyer </option>
								<option value="2"  >Seller </option>
						 	</select>
						</li>

						<li>
							<input name="submit" type="button" value="Signup" ng-click="add()" class="btn_submit">
						    &nbsp;&nbsp;<input name="cancel" type="reset" value="Cancel" class="btn_cancel">
						</li>

					</ul>
				</form>
                  
                  <script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    
});


</script>
                  
	            </div>
		        </div>    	
	    </div>
	    </div>
	    </div>
<br>
<br>
<br>
<?php // include $_SERVER['DOCUMENT_ROOT']."/includes/index_footer.php";?>
  </body>
</html>
