<h1>Dear Customer,</h1>
<p>Thank you for shopping with us.</p>
<p>Your order details are below:</p>
<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#e0d9d9">
	<tr bgcolor="#CCCCCC">
		<td>Order Id</td>
		<td>Product Name</td>
		<td>Order Total</td>
		<td>Order Status</td>

	</tr>
	<tr>
		<td>{{$order_id}}</td>
		<td>{{$product_name}}</td>
		<td>{{$order_total}}</td>
		<td>{{$order_status}}</td>

	</tr>
</table>