
<!DOCTYPE html>
<html>

<head>

	<title>Transaction History</title>

	<link rel="stylesheet" type="text/css" href="fixed.css">

</head>

<body>
<div class="logo">
    <a href="index.html"><img src="bank.png"></a>
</div>
<div class="title">
                <h1>Transaction History</h1>
            </div>
<div class="table-box">
<table cellpadding="10">
    <thead>

	<tr>

		<th>Sender</th>
		<th>Receiver</th>
		<th>Amount</th>
		<th>Timestamp</th>

	</tr>
</thead>
<tbody>
<?php
$cn1 = $_GET['cn'];
$con = mysqli_connect('localhost','id17072119_root','%NTgG9}B!L/?n052','id17072119_banking');
// $con->exec('SET search_path TO public');

$query = "SELECT * FROM history WHERE sender ='$cn1' UNION SELECT * FROM history WHERE receiver ='$cn1' ";

$result = mysqli_query($con,$query);


while($res = mysqli_fetch_array($result)){

    ?>

    <tr>
    <td><?php echo $res['sender']; ?></td>
    <td><?php echo $res['receiver']; ?></td>
    <td><?php echo $res['amount']; ?></td>
    <td><?php echo $res['ttimestamp'];?></td>
</tr>

<?php
}

?>
</tbody>

</table>
</div>
</div>

</body>


</html>