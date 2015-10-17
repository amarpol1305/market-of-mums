<?php
/*
* File name: add_content.php
* Display form for add page content using tinymce editor 
*
*/
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php"; 
if(!($u->isAdmin())){
header('Location:/admin.php');
}
$msg="";
if($_POST['submit'] == 'ADD')
{
	if($u->addContent($_POST))
	{
		$msg = "<span class=\"message\">Page Content Addedd Successfully.</span>";
	}else{
		$msg = "<span class=\"error\">Unable to add Page Content .</span>";
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
<title>Admin </title>
<?php include('top.php');?>
<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/html_header2.php";?>
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
/* add "media" to enable  video */
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap  preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime  nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: " forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
</head>
<?php //include $_SERVER['DOCUMENT_ROOT']."/includes/newbigtemplate.php";?>
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<?php include("header.php");?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include("sidebar.php");?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-head">
				<div class="page-title">
					<h1>Content Management</h1>
				</div>
			</div>
            <?php if($msg!=''){ ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<?php echo $msg;?>
			</div>
            <?php } ?>
<div class="row">
<form action="add_content.php" method="post">
	<div id="category_form"> 
    	<div class="col-lg-12" >
        	<div class="form-group">
            	<label for="usr">Page Name <span style="color:red">*</span></label>
                <input  type="text" name="pagename" class="form-control" id="pagename" value="" required>
            </div>
        	<div class="form-group">
            	<label for="usr">Page Title <span style="color:red">*</span></label>
                <input  type="text" name="pagetitle" class="form-control" id="pagetitle" value="" required>
            </div>
            <div class="form-group">
            	<label for="usr">Content for page <span style="color:red">*</span></label>
                <textarea name="content"  id="content"></textarea>
            </div>
            <div class="form-group">
            	<label for="status">Isactive</label>
            	<select  name="isactive" id="isactive" class="form-control" required style="width:200px;">
                	<option value="">--Select--</option>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
                </select>
            </div>
			<div class="form-group">
            	<input type="submit" name="submit" class="btn btn-default " value="ADD">
				<input type="hidden" name="submit"  value="ADD">
				<button type="button" id="back-btn" class="btn btn-default"onclick="window.location.href='all_contents.php'">Back</button>
            </div>
		</div>
	</div>            
<form>
</div>
	</div>
		</div>
			</div>
					
<?php include("footer.php");?>
</body>
</html>
