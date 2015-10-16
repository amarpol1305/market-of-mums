<?php
//session_start();
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php"; 
$msg='';
if($_POST['submit'] == 'Submit')
{
	if($u->authenticate($_POST['username'],$_POST['password']))
	{
		$_SESSION['user_id']=$u->user_id;
		//$m_profile=$u->user_profile;
		if($u->isUser())
		{  	
			$msg = "<span class=\"error\">You have logged in successfullly.</span>";				
			//header('Location:./signup.php');   
		}else{
			$msg = "<span class=\"error\">Sorry You are not Member User.</span>";				
			header('Location:/login.php');
		}
		
	}else{
		header('Location:./signup.php');   
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/user_html_header.php"; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

<script src="/js/angular.min.js"></script>
<script>
var app =  angular.module('loginapp', []);
app.controller('validationCtrl', function($scope) 
{
   	$scope.uname = '';
   	$scope.pass = '';
}
);
</script>
</head>
<body>
<?php if(!$msg==''){ echo $msg; }?>
	

<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/user_navigation.php"; ?>

<div class="container">
	 <div class="input_form">
             	<h2>Login</h2>
                <form name="login" action="login.php" method="post" ng-app="loginapp" ng-controller="validationCtrl" ng-init="submitSwitch=false" novalidate>
			
                	<ul>
                        <li>
                        	<label>Username:</label>
                            <input name="username" id="username" type="text" ng-model="uname" required >
								<span style="color:red" ng-show="login.username.$dirty">
							    	<span class="error" ng-show="login.username.$error.required">Required!</span>
    							</span>
						</li>
                        <li>
                        	<label>Password:</label>
                            <input name="password" id="password" type="password" ng-model="pass" required >
								<span style="color:red" ng-show="login.password.$dirty">
							    	<span class="error" ng-show="login.password.$error.required">Required!</span>
    							</span>
						</li>
			 
                        <li>
							<input type="submit"  name="submit" value="Submit" ng-disabled="login.password.$dirty && login.username.$invalid ||  login.password.$dirty && login.password.$invalid">
                            &nbsp;&nbsp;<input name="cancel" type="reset" value="Cancel" class="btn_cancel">
                    	</li>
	
					</ul>
		
               </form>
     </div>
</div>
<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/user_footer.php"; ?>
</body>
</html>
