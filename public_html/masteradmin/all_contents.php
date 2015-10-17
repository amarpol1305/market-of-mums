<?php 
include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php";


if($_GET['del'] =='delete')
{
	if($u ->removeContent($_GET['id']))
	{
		$msg = "<span class=\"message\">Page Content Deleted Successfully.</span>";
	}else{
		$msg = "<span class=\"error\">Unable to Delete Page Content.</span>";
	}
}
$contents = $u->getContent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>All Pages</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<?php include('top.php');?>
</head>
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
			<div class="row">
			<div class="col-md-6">
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>All Pages</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			</div>
			
				<div class="col-md-6">
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title pull-right">
					<div class="addbanhead"><a href="add_content.php"><img src="img/addnew_btn.png"></a></div>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			</div>
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
				<div class="col-md-12">
                     
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-doc"></i>All Pages
							</div>
						</div>
						<div class="portlet-body">
							 <form class="form-inline pull-right">
								<div class="form-group">
								Search: <input id="filter" type="text" class="form-control"/>
								</div>
							</form>
							<div class="clearfix"></div>
							<br>
							
							<!-- <table class="footable table table-striped table-bordered table-hover" id="sample_a"> -->
							<table class="table table-striped table-bordered table-hover" data-filter="#filter" data-page-size="5">
							<thead>
							<tr>
								<th>
									Page Content
								</th>
								<th data-hide="phone,tablet">
									Action
								</th>
							</tr>
							</thead>
							<tbody>
						<?php foreach($contents as $cont){ ?>	
							<tr>
								<td>
									<?php echo $cont['page_name'];?>
								</td>
								<td>
								<a href="edit_content.php?cont_id=<?php  echo $cont['id'];?>"><img src="img/editgrid.png"></a> | 
								<a href="javascript:confirmChoice('<?php echo $cont['id'];?>')"><img src="img/deletegrid.png"></a>
								</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot class="hide-if-no-paging">
								<tr>
									<td colspan="3">
										<div class="pagination pull-right"></div>
										<div class="clearfix"></div>
									</td>
								</tr>
							</tfoot>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
                       
                    
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
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
}); 

function confirmChoice(j) {
	msgQuestion = "Confirm delete!";
	userResponse = confirm(msgQuestion);
	if (userResponse == 1) {
		location = "all_contents.php?del=delete&id="+j;
	} else {
		return;
	}
}  
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
