<?php 
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php"; 
$msg ='';
if($_POST['submit']=='Signup' )  
{
    $uid=$u->addUser($_POST);
	if($uid > 0){
            
            
            
		 $msg = "Registration successfull";
// send email validation code
 $email_code = $u->generateRandomDigit(6);

//$data=array();
//$data['email_valid_code']=$email_code;
//$data['uid']=$uid;


$u->setvalidcode($email_code,$uid);
 $details = $u->getUserbyId($uid);
 //var_dump($details);


}
else{
		 $msg = "Registration Not Completed.";
	}
 
/// send mail

//$to = $details['email'];
//$subject = "Activate your account(Market of mums)";
//
//$message = "
//<html>
//<head>
//<title>Market of Mums</title>
//</head>
//<body>
//<p>Activate your account</p>
//
//
//</body>
//</html>
//";
//
//// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
//// More headers
//$headers .= 'From: <webmaster@example.com>' . "\r\n";
////$headers .= 'Cc: myboss@example.com' . "\r\n";
//
//mail($to,$subject,$message,$headers);

//
// require_once "Mail.php";
// 
//                $from = "Admin <priyajadhav1981@gmail.com>";
//                $to = "Username <kalesourabh01@gmail.com>";// to whom admin sends email
//                $subject = "Test email \r\n\r\n";
//                $body = '<a href="test.php?id=">click to activate</a>';
// 
//                $host = "smtp.gmail.com";
//                $port="587";
//                $username = "priya@gmail.com"; // senders e-mail id
//                $password = "param";
// 
//                $headers = array ('From' => $from,
//                                  'To' => $to,
//                                  'Subject' => $subject);
//                $smtp = Mail::factory('smtp',
//                        array ('host' => $host,
//                        'auth' => true,
//                        'username' => $username,
//                        'password' => $password));
// 
//                $mail = $smtp->send($to, $headers, $body);
// 
//                if (PEAR::isError($mail)) {
//                    echo("<p>" . $mail->getMessage() . "</p>");
//                } else {
//                    echo("<p>Message successfully sent!</p>");
//                }
//                
//                header("Location:signup.php");
//            
              
        


//till hereeee

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
					<label><span>*</span> Name:</label>
                                        <input name="fname" id="fname" type="text" required ng-model="fname" >
                                        <span style="color:red" ng-show="myForm.fname.$dirty && myForm.fname.$invalid">
                                        <span ng-show="myForm.fname.$error.required">Name is required.</span>
                                                        
			    </li>
                            
                            
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
					       <input name="cemail" id="cemail" type="email" ng-model="cemail" required  match-validator="email">
                                               <span style="color:red" ng-show="myForm.cemail.$dirty && myForm.cemail.$invalid">
                                                 <span ng-show="myForm.cemail.$error.required">Email is required.</span>
                                                
                                                <span ng-show="myForm.cemail..$error.match">Email does not match.</span>
                                                
				        </li>
                                        
                                     <li>
							<label><span>*</span>User Name:</label>
							<input name="username" id="username" type="text" required ng-model="username" >
                                                        <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
                                                <span ng-show="myForm.username.$error.required">username is required.</span>
			    		</li>

				        <li>
					        <label><span>*</span>Password:</label>
							<input name="password" id="password" type="password" ng-model="password"  required >
                                                        <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
                                                        <span ng-show="myForm.password.$error.required">Password is required.</span>
				        </li>

	  			        <li>
			       			<label><span>*</span>Confirm Password:</label>
			       			<input name="cpassword" id="cpassword" type="password" ng-model="cpassword" required match-validator="password" >
                                                <span style="color:red" ng-show="myForm.cpassword.$dirty && myForm.cpassword.$invalid">
                                                <span ng-show="myForm.password.$error.required">confirm Password is required.</span>
                                                <span ng-show="myForm.cpassword.$error.match">password does not match.</span>
			      	    </li>

			    		

			    		
                                        
                                       


						

						

<!--						<li>
							<label><span>*</span>Country:</label>
						 	<select name="country" id="country" required >
						 		<option value="select" >Select </option>
						 		<option value="india"  >India </option>
						 	</select>
						</li>-->

						

						<li>
							<input name="submit" type="submit" value="Signup"  ng-disabled="myForm.$invalid" class="btn_submit">
						    &nbsp;&nbsp;<input name="cancel" type="reset" value="Cancel" class="btn_cancel">
						</li>

					</ul>
				</form>
                  
                  <script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    
});

//confirm email
angular.module('myApp').directive('matchValidator', [function() {
        return {
            require: 'ngModel',
            link: function(scope, elm, attr, ctrl) {
                var pwdWidget = elm.inheritedData('$formController')[attr.matchValidator];

                ctrl.$parsers.push(function(value) {
                    if (value === pwdWidget.$viewValue) {
                        ctrl.$setValidity('match', true);                            
                        return value;
                    }                        

                    if (value && pwdWidget.$viewValue) {
                        ctrl.$setValidity('match', false);
                    }

                });

                pwdWidget.$parsers.push(function(value) {
                    if (value && ctrl.$viewValue) {
                        ctrl.$setValidity('match', value === ctrl.$viewValue);
                    }
                    return value;
                });
            }
        };
    }])


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
