<?php require_once 'includes/header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
      $totalRevenue = $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}


	body {
     background-image: url('images/backround.png');
	 background-repeat: no-repeat;
 	 background-attachment: fixed;
  	 background-size: cover;
}

</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<link rel="icon" href="/logo.ico" type="image/x-icon">

<body>
<div class="row">
	


		




	<div class="col-md-4">
		
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php echo $countProduct; ?></h1>
		  </div>

		  <a href="product.php">

		  <div class="cardContainer">
		    <p style="font-size:150%;    font-family:  Times, serif; color:#1e191a;">Total Product</p>
		  </div>
		</div> 

	</div>

	</a>


	<div class="col-md-4">
		
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php echo $countLowStock; ?></h1>
		  </div>

		  <a href="product.php">

		  <div class="cardContainer">
		   <p style="font-size:150%;    font-family:  Times, serif; color:#1e191a;"> Low Stock</p>
		  </div>
		</div> 

	</div>

	</a>



	<div class="col-md-4">
		
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php echo $countOrder; ?></h1>
		  </div>

		  <a href="orders.php?o=manord">

		  <div class="cardContainer">
		    <p style="font-size:150%;    font-family:  Times, serif; color:#1e191a;">  Total Orders</p>
		  </div>
		</div> 

	</div>

	</a>



	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>


</body>