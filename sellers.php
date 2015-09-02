<!DOCTYPE html> 
<html lang="en"> 
<head> 
<title>Vindictus Scam DB | seller List</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="icon" type="image/ico" href="favicon.html"/> 
<link href="css/stylesheets.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/jquery-migrate.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/globalize.js"></script> 
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/plugins/uniform/jquery.uniform.min.js"></script> 
<link type="text/css" rel="stylesheet" href="css/featherlight.min.css" title="Featherlight Styles" />
<link type="text/css" rel="stylesheet" href="css/featherlight.gallery.min.css" title="Featherlight Styles" />
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#seller-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"seller-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".seller-grid-error").html("");
							$("#seller-grid").append('<tbody class="seller-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#seller-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
</head> 
	<body class="bg-img-num1">
	 <div class="container">
	 <!-- nav goes here -->
	 <?php echo file_get_contents('http://vindictusscamdb.com/completed/nav.php?active=sellers'); ?>
	<div class="row"> 
		<div class="col-md-12"> 
			<ol class="breadcrumb"> 
				<li><a href="index.php">Home</a></li> 
				<li class=active>Trusted Sellers</li> 
			</ol> 
		</div> 
	</div> 
		<div class="row"> 
			<div class="col-md-12"> 
				<div class="block"> 
					<div class="header"> 
					<h2>sellers</h2> 
					</div> 
					<div class="content"> 
						<table id="seller-grid"  cellpadding="0" cellspacing="0" border="0" width="100%"  class="table table-bordered table-striped sortable display">
								<thead>
									<tr>
										<th>ID</th>
										<th>Character Name</th>
										<th>Overall Amount Sold</th>
										<th>Accepts Trades</th>
										<th>Sale Types</th>
										<th>Has Stock</th>
										<th>Time Selling</th>
										<th>Server</th>
										<th>Conversion Rate</th>
									</tr>
								</thead>
						</table>
					</div> 
				</div> 
			</div>
		</div>
	</div> 
	<script src="js/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</body> 
</html>