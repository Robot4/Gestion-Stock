




	


<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];

$image_url='https://imgur.com/a/oBgXndO';

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);



echo ' <img src=""C:\xampp\htdocs\stock\php_action\logo.png"" alt="" border="3" height="100" width="100" />';
echo ' <br>';
echo '
	<center>

<h1> La Facture </h1>

</center>

';


 $table = '


<body>
 <table border="1" cellspacing="0" cellpadding="20" width="100%">
	<thead>
		<tr >
			<th colspan="5">

			<center>
			Date de commande: '.$orderDate.'
				<center>Nom du client: '.$clientName.'</center>
				Contact : '.$clientContact.'
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">



	<tbody>
		<tr>
			<th>S.no</th>
			<th>Produit</th>
			<th>Prix</th>
			<th>Quantité</th>
			<th>Total</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[4].'</th>
				<th>'.$row[1].' Dhs</th>
				<th>'.$row[2].'</th>
				<th>'.$row[3].' Dhs</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr>
			<th></th>
		</tr>

		<tr>
			<th></th>
		</tr>

		<tr>
			<th>Sous-montant</th>
			<th>'.$subTotal.' Dhs</th>			
		</tr>

		<tr>
			<th>VAT (13%)</th>
			<th>'.$vat.'</th>			
		</tr>

		<tr>
			<th>Montant total</th>
			<th>'.$totalAmount.' Dhs</th>			
		</tr>	

		<tr>
			<th>Remise</th>
			<th>'.$discount.' Dhs</th>			
		</tr>

		<tr>
			<th>Total </th>
			<th>'.$grandTotal.' Dhs</th>			
		</tr>

		<tr>
			<th>Montant payé</th>
			<th>'.$paid.' Dhs</th>			
		</tr>

		<tr>
			<th>Due Amount</th>
			<th>'.$due.'</th>			
		</tr>
	</tbody>
</table>

</body>
 ';

$connect->close();

echo $table;


