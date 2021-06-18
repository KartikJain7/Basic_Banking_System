<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "banking";
// $cn1 = $_GET['cn'];
$con = mysqli_connect('localhost','id17072119_root','%NTgG9}B!L/?n052','id17072119_banking');
// $sn1 = $_GET['sn'];
$rn1 = $_GET['rn'];
$en1 = $_GET['en'];
$ab1 = $_GET['ab'];
// echo $rn1;

if(isset($_POST['Send'])){
    $sender = $_POST['Sender'];
    $receiver = $_POST['Receiver'];
    $amount = $_POST['Amount'];

    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/m/d H:i:s');

    $query = "INSERT INTO history (sender,receiver,amount,ttimestamp) VALUES('$sender','$receiver','$amount','$date')";
    $q = " SELECT balance FROM customer WHERE cust_name = '$sender'";
    $q1 = " SELECT balance FROM customer WHERE cust_name = '$receiver'";
    $r = mysqli_query($con,$q);
    $r12 = mysqli_query($con,$q1);
    $row = mysqli_fetch_row($r);
    $val = $row[0];
    $row1 = mysqli_fetch_row($r12);
    $val1 = $row1[0];
    $er=$val-$amount;
    $er1=$val1+$amount;
    if($er<0)
    {
      // echo "Insufficient Balance";
      header("location: list.php?status=Insufficient-Balance-Try-Again");
    }
    else{
    $query1 = "UPDATE customer Set balance=$er where cust_name='$sender'";
    $query2 = "UPDATE customer Set balance=$er1 where cust_name='$receiver'";
    $r1 = mysqli_query($con,$query1);
    $r2 = mysqli_query($con,$query2);

    $result = mysqli_query($con,$query);
    header("location: ttable.php?status=Transaction-Successful");
    }
}
mysqli_close($con);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Transaction Panel</title>
    <link rel="stylesheet" href="transf.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="logo">
    <a href="index.html"><img src="bank.png"></a>
</div>
  <div class="container">
    <div class="title">Transaction Menu</div>
    <div class="content">
      <form method="post" action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Sender Name</span>
            <input type="text" name="Sender" value='<?php echo "$rn1"?>' placeholder="Enter sender name" required>
          </div>
          <?php
$con = mysqli_connect('localhost','id17072119_root','%NTgG9}B!L/?n052','id17072119_banking');

$sql = "SELECT cust_name FROM customer ";

$result = mysqli_query($con,$sql);
// if ($result != 0) {
  // echo '<div class="select">';
    echo '<select class ="select" name="Receiver">';
    echo '<option value="">Receiver Name</option>';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['cust_name'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select>';
    echo '</label>';

?>
          <div class="input-box">
            <span class="details">Amount</span>
            <input type="text" name="Amount" placeholder="Enter amount" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="Email" value='<?php echo "$en1"?>' placeholder="Sender's Email" readonly>
          </div>
          <div class="input-box">
            <span class="details">Available Balance </span>
            <input type="text" name="Available" value='<?php echo "$ab1"?>' placeholder="Sender's Balance" readonly>
        <div class="button">
          <input type="submit" name="Send" value="Send Money">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
