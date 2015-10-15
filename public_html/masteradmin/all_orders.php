<?php include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php";
//$charity = $u->getCharities();
$orders =$u->getAllOrders();


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>All Orders</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<?php include('top.php');?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
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
					<h1>All Orders</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			</div>
			
				<div class="col-md-6">
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title pull-right">
<!--                                    <div class="addbanhead"><a href="add_charity.php"><img src="img/addnew_btn.png"></a></div>-->
				</div>
				<!-- END PAGE TITLE -->
			</div>
			</div>
			</div>
			<!-- END PAGE HEAD -->
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                     
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-doc"></i>All Orders Detail
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
									name
								</th>
                                                                <th>
									Date
								</th>
                                                                <th>
									Order Id
								</th>
                                                                <th>
									Total Amount
								</th>
                                                                <th>
									Payable Amount
								</th>
                                                                <th>
									Status
								</th>
								<th data-hide="phone,tablet">
									Action
								</th>
							</tr>
							</thead>
							<tbody>
						<?php foreach ($orders as $key => $value) {
    
     

                                                            ?>	
							<tr>
								<td>
									<?php echo $value[0]['name'];?>
								</td>
                                                                <td>
									<?php echo $value[0]['order_date'];?>
								</td>
                                                                <td>
									<?php echo $value[0]['order_id']; ?>
								</td>
                                                                <td>
									<?php echo $value[0]['total_amount'];?>
								</td>
                                                                <td>
									<?php echo $value[0]['final_amount'];?>
								</td>
                                                                <td>
									<?php echo $value[0]['status'];  ?>
								</td>
								<td>
									 <a href="view_order.php?oid=<?php  echo $value[0]['status'];s?>"><img src="img/editgrid.png"></a> 
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
		location = "all_categories.php?del=del&co="+j;
	} else {
		return;
	}
}  
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
