<!DOCTYPE html>
<html>

<head>

	<title>Customer List</title>

	<link rel="stylesheet" type="text/css" href="fixed.css">

</head>

<body>
<div class="logo">
    <a href="index.html"><img src="bank.png"></a>
</div>
<div class="title">
                <h1>Customer List</h1>
</div>
            <div class="table-box">
<table cellpadding="10">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>E-Mail</th>
      <th>Balance</th>
      <th>Send Funds</th>
      <th>Tranactions</th>
      <!-- <th>Receiver</th> -->
    </tr>
  </thead>
  <tbody>
  <?php
$con = mysqli_connect('localhost','id17072119_root','%NTgG9}B!L/?n052','id17072119_banking');
// $con->exec('SET search_path TO public');

$query = "select * from customer";

$result = mysqli_query($con,$query);


while($res = mysqli_fetch_array($result)){

    echo "
    <tr>
    <td> ".$res['cust_id']."</td>
    <td>".$res['cust_name']."</td>
    <td>".$res['email']."</td>
    <td>".$res['balance']."</td>
    <td><a href = 'money.php?rn=$res[cust_name]&en=$res[email]&ab=$res[balance]'>Select</td>
    <td><a href = 'hist.php?cn=$res[cust_name]'>History</td>
</tr>
";

// <?php
}

?>
</tbody>


</table>

</body>


</html>

<!-- <td><a href = '#?sn2=$res[cust_name]'>Select</td> -->