<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MobiKart-Payment</title>
  <link rel="stylesheet" type="text/css" href="../css/buy.css">
    <link rel="icon" href="../images/logo1.png" type="image/icontype">
  <meta name="author" content="Kanivan.S 2020115039">
</head>
<body>
  <header class="topbar" id="upper">
     <div class="logo"><img src="../images/logo1.png" alt="logo"></div>
      <h3 id="table-head">ORDER-DETAILS</h3>
     
  </header>

<div id="cart">
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th width="40%">Item Name</th>
          <th width="10%">Quantity</th>
          <th width="20%">Price</th>
          <th width="15%">Total</th>

        </tr>
        <?php
        session_start();
        include_once "dbconnection.php";
        function getdatas($query,$column_key){
    global $connection;
    $sql_getquery=mysqli_query($connection,$query);
    $fetch_all_arr=mysqli_fetch_all($sql_getquery,MYSQLI_ASSOC);
    // print_r($fetch_all_arr);
    $result_arr=array_column($fetch_all_arr,$column_key);
    return $result_arr;
}
function getassocdatas($query){
    global $connection;
    $sql_getquery=mysqli_query($connection,$query);
    $fetch_all_arr=mysqli_fetch_all($sql_getquery,MYSQLI_ASSOC);
    // print_r($fetch_all_arr);
    return $fetch_all_arr;

}
        if (isset($_GET['actionforbuy'])) {
          if (isset($_GET['buycode'])) {
            $buycode=$_GET['buycode']; 
            $name_arr=getassocdatas("SELECT * FROM products WHERE product_code=$buycode ");
            $code=$buycode;
            $name=$name_arr[0]['product_name'];
            $price=$name_arr[0]['price'];


            
          }
          $quantity=<<<_END
          <form name="quantity">
              <input id="increment" type="number" min="1" value="1" oninput="inc()">
          </form>
          _END;
          $costeach=0;
          $total=0;
          echo <<<_END
            <tr>
            <td>$name</td>
            <td>$quantity</td>
            <td>&#8377; $price</td>
            <td>&#8377; <input id="total" type="number" disabled value="$price"  ></td>
            
            </tr>
            _END;
        }
        elseif (isset($_GET['order'])) {
          if ($_GET['order']=="all") {
            $buyarray=$_SESSION['cart'];
            foreach ($buyarray as $key => $value) {
              $name=$value['product_name'];
              $price=$value['price'];
              $quantity=$value['quantity'];
              $total=$value['eachtotalprice'];
              echo <<<_END
              <tr>
                        <td>$name</td>
                        <td>$quantity</td>
                        <td>&#8377; $price</td>
                        <td>&#8377; $total</td>
            
                        </tr>
              _END;

              // code...
            }
            // code...
          }

        }
        ?>
        
        
      </table>
    </div>
  </div>
  <div>
    
    <!-- <form method="post"> 
      <div class="subhead"><h1>Pay using credit card</h1></div>
      <div class="payform">
      <label>NAME ON CREDIT CARD</label><br>
      <input type="text" name="cardname" required><br>
      <label>CARD NUMBER</label><br>
      <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"required>
      <br>
      <label>EXPIRY DATE ON CARD</label><br>
      <input type="month" name="cardmonthyr" required>
      <br>
      <label>CV NUMBER</label><br>
      <input type="number" minlength="4" maxlength="4" required name="cv number" placeholder="xxxx">
      <br>
      <input type="submit" name="buysubmit" value="PAY">
      </div>
      
    </form>
     -->
  </div>
  <div class="below">
    
  
  <div class="payoption">
    <h1>Choose Payment option </h1>
    <form  name="payoptionform">
      <input type="radio" name="pay" oninput="cashon()"><label>Cash on delivery</label><br>
      <input type="radio" name="pay" oninput="cardsfn()"><label>Credit/Debit card</label><br>
    </form>
  </div>
  <div id="cards">
    <form name="cardpay" action="" method="post">
      
      <label>NAME ON CREDIT CARD</label><br>
      <input type="text" name="cardname" required><br>
      <label>CARD NUMBER</label><br>
      <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"required>
      <br>
      <label>EXPIRY DATE ON CARD</label><br>
      <input type="month" name="cardmonthyr" required>
      <br>
      <label>CV NUMBER</label><br>
      <input type="number" minlength="4" maxlength="4" required name="cv number" placeholder="xxxx">
      <br>
      <input type="submit" name="buysubmit" value="PAY">
    </form>
  </div>
  <div id="cashon">
    <form name="cashondelivery" action="" method="post">
      
    <label>Name</label><br>
    <input type="text" name="username" required=""><br>
    <label>Address</label><br>
    <input type="text" name="address" id="add" required=""><br>
    <input type="submit" name="buysubmit" value="Order">

  </form>

  </div>
</div>
<?php
if (isset($_POST['buysubmit'])) {
  echo "<script>alert('Thanks for  placing the order')</script>";
    echo '<script>window.location="../index.php"</script>';
  // code...
}
?>
<script type="text/javascript">
  var a=document.querySelector("#increment");
  var b=document.querySelector("#total");
  function inc(){
    b.value=a.value*<?php echo "$price";?>;
  }
  function cashon(){
    var cash=document.querySelector('#cashon');
    var card=document.querySelector('#cards');
    card.style.display="none";
    cash.style.display="block";
  }
  function cardsfn(){
    var cash=document.querySelector('#cashon');
    var card=document.querySelector('#cards');
    var ds=document.querySelector('below');

    card.style.display="block";
    cash.style.display="none";
  }
</script>

</body>
</html>