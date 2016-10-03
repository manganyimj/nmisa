<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

  if(isset($_POST["submit"]))
  {
   
    foreach ($_SESSION["cart_item"] as $item){
		
		$name = "name";
		$code = "code";
		$quantity = "quantity";
		$price = 800.00;
		$image = "zz/sslk/isljfw/slsk";
		
		$sql = "INSERT INTO tblproduct(name,code,image,price) VALUES('$name','$code','$image','$price')";
		
		$db_handle->saveOrder($sql);
	}
	
	
	
   
  }
	
?>



<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right>
   <strong>Total:</strong> <?php echo "$".$item_total; ?>
   
   
    <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
	   <button type="submit" name="submit"  id="submit" >Submit Order</button>
	</form>
</td>

</tr>
</tbody>
</table>		
  <?php
}
?>
</div>
</HTML>