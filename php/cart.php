
<!DOCTYPE html>
<html lang="en">
<?php
// loginauthenticate();
session_start();

  if (!empty($_SESSION['id'])) {
    $username=$_SESSION['username'];
$userid=$_SESSION['id'];
$useremail=$_SESSION['usermail'];
// if (isset($_COOKIE['user'])) {
//                                 $_SESSION['cart']= unserialize($_COOKIE['user'], ["allowed_classes" => false]);;
//                                 print_r($_SESSION['cart']);
//     // code...
// }


    $btnchange=<<<_END
    <div class="topbarbutton "><a href="profile.php"  target="_blank" id="myBtn" >$username</a></div>

    _END;
    // code...
}
else{
    $btnchange=<<<_END
    <div class="topbarbutton in"><a href="../html/login.html"  >login/signup</a> </div>
    
    _END;
}

echo <<<_END

<head>
    <meta charset="utf-8">
    <title>MobiKart-cart</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="icon" href="../images/logo1.png" type="image/icontype">
      <link rel="stylesheet" type="text/css" href="../css/cart.css">



</head>
<body>
    <header>
        <div class="header-topbar">
            <div class="topbar">
                <div class="topbar-logo">
                <img src="../images/logo1.png" alt="MobiKart-LOGO" title="MobiKart">
                </div>

                <div>
                    <div class="topbar-search-box">
                        <form class="search" action="" method="post">
                            <input type="text" placeholder="Search for products,brands..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                </div>
                $btnchange
                 <div class="topbarbutton cart"><a href="../index.php">HOME</a></div>
                <div>
            </div>
        </div>
    </header>


_END;
// include_once 'index.html';                   

?>

<?php
include_once "dbconnection.php";
function getassocarraydata($code){
    global $connection;
    $sql_query="SELECT * FROM products WHERE product_code = '$code' ";
    $sql_execute=mysqli_query($connection,$sql_query);
    $assoc_arr=mysqli_fetch_all($sql_execute,MYSQLI_ASSOC);
    return $assoc_arr;

}
if (isset($_GET['code'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION["cart"],'code');
        if (!in_array($_GET["code"], $item_array_id)){
            $count= count($_SESSION["cart"]);
            $detailarr=getassocarraydata($_GET['code']);
            $pro_code=$detailarr[0]['product_code'];
            $name=$detailarr[0]['product_name'];
            $price=$detailarr[0]['price'];
            $frimg=$detailarr[0]['imgsrc'];
            $totaleach=$price;
            $product_array=array(
                'code'=>$pro_code,
                'product_name'=>$name,
                'price'=>$price,
                'quantity'=>1,
                'eachtotalprice'=>$totaleach,
                'pos'=>$count,
                'frontimg'=>$frimg,
                'plus'=>"cart.php?mat=plus&pos=$count",
                'minus'=>"cart.php?mat=minus&pos=$count"

            );
            $_SESSION['cart'][$count]=$product_array;
        }
        // code...
    }
    else{
        $detailarr=getassocarraydata($_GET['code']);
        $name=$detailarr[0]['product_name'];
        $pro_code=$detailarr[0]['product_code'];
        $price=$detailarr[0]['price'];
        $totaleach=$price;
        $frimg=$detailarr[0]['imgsrc'];
        $product_array=array(
                'code'=>$pro_code,
                'product_name'=>$name,
                'price'=>$price,
                'quantity'=>1,
                'eachtotalprice'=>$totaleach,
                'frontimg'=>$frimg,
                'pos'=>0,
                'plus'=>'cart.php?mat=plus&pos=0',
                'minus'=>'cart.php?mat=minus&pos=0'
            );
        $_SESSION['cart'][0]=$product_array;
    }
    // code...
}


?>
<?php
if (isset($_GET['mat'])) {
    if ($_GET['mat']=="plus"){
        $arr_key=$_GET['pos'];
        $update_quant=$_SESSION['cart'][$arr_key]['quantity']+1;
        $_SESSION['cart'][$arr_key]['quantity']=$update_quant;
        $update_totaleachprice=$_SESSION['cart'][$arr_key]['price']*$update_quant;
        $_SESSION['cart'][$arr_key]['eachtotalprice']=$update_totaleachprice;

    }
    if ($_GET['mat']=="minus"){
        $arr_key=$_GET['pos'];
        if ($_SESSION['cart'][$arr_key]['quantity']>1) {
            $update_quant=$_SESSION['cart'][$arr_key]['quantity']-1;
        $_SESSION['cart'][$arr_key]['quantity']=$update_quant;
        $update_totaleachprice=$_SESSION['cart'][$arr_key]['price']*$update_quant;
        $_SESSION['cart'][$arr_key]['eachtotalprice']=$update_totaleachprice;

        }
        
    }
}
if (isset($_GET['all'])) {
    if ($_GET['all']='deleteall') {
        unset($_SESSION['cart']);
        echo '<script>alert("Cart cleared")</script>';
        $_SESSION['cart']=array();


        // code...
    }

}
if (isset($_GET['remove'])) {
    // code...
    if ($_GET['remove']=="one") {
    foreach($_SESSION['cart'] as $keys=> $values){
      if ($values["code"] ==$_GET['id']) {
        unset($_SESSION['cart']["$keys"]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
        echo '<script>alert("item removed")</script>';
         echo '<script>window.location="cart.php"</script>';

        // code...
      }
    }
    // code...
}
}

?>
<div class="maincart-box">
        <div class="leftcart-box ">
            <?php
            if (count($_SESSION['cart'])>0) {
            for ($i=0; $i <count($_SESSION['cart']); $i++) {
                $onename=$_SESSION['cart'][$i]['product_name'];
                $onepro_code=$_SESSION['cart'][$i]['code'];
                $oneprice=$_SESSION['cart'][$i]['price'];
                $onefrimg=$_SESSION['cart'][$i]['frontimg'];
                $onequantity=$_SESSION['cart'][$i]['quantity'];
                $oneplus=$_SESSION['cart'][$i]['plus'];
                $oneminus=$_SESSION['cart'][$i]['minus'];
                echo <<<_END
                <div class="eachproduct-cart">
                    <div class="cart-eachimg">
                       <img src="../images/products/$onefrimg" alt="$onename">
                    </div>
                    <div cart-each content>
                       <h1 ><a href="productspecify.php?code=$onepro_code" id="rev" >$onename</a></h1>
                       <h3>&#8377; $oneprice</h3>
                       <p>
                       <a href="$oneplus" id="math-btn">+</a><span id="math-display">$onequantity</span><a href="$oneminus" id="math-btn">-</a></p>
                       <p>
                       <a href="cart.php?remove=one&id=$onepro_code" id="remove">Remove from cart</a>
                       </p>
                    </div>
                </div>
                _END;
            }
            
                $e=<<<_END
                <div class="plbtn-box">
                   <a class="plbtn" href="buyeach.php?order=all">Place order</a> 
                   <a class="clbtn" href="cart.php?all=deleteall">Clear all</a>
                </div>
                
                _END;
                echo "$e";
            }else{
                $othrs=<<<_END
                <div id="noitems">
                <h1>No items in the cart</h1>
                </div>
                _END;
                echo "$othrs";

            }
            ?>
        </div>
        
            
        <?php
        $quantityarrays=array_column($_SESSION['cart'],'quantity');
        $totalquantity=array_sum($quantityarrays);
        $costarrays=array_column($_SESSION['cart'], 'eachtotalprice');
        $totalcost=array_sum($costarrays);
        ?>
        <div class="rightcart-box">
            <table>
                <tr>
                    <th colspan="2" id="pricehead">Price details</th>
                </tr>
                <tr>
                    <td>No of items</td>
                    <td><?php echo $totalquantity; ?></td>
                </tr>
                <tr>
                    <td>Total amount</td>
                    <td>&#8377;<?php echo number_format($totalcost,2); ?></td>
                </tr>
            </table>
        </div>
    </div>
   