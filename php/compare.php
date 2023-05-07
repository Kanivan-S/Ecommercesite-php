<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    #linktoremove{
        background-color: #eb6a07;
        padding: .5em 1em;

    }
    #linktoremove a{
        text-decoration: none;
        color: #ffff;

    }
    #linktoremove a:hover{
        transform: scale(1.2);
    }
</style>
<?php
session_start();
// loginauthenticate();
// signup_authenicate();
if (!empty($_SESSION['id'])) {
    $username=$_SESSION['username'];

    $btnchange=<<<_END
    <div class="topbarbutton in"><a href="profile.php" target="_blank" id="myBtn">$username</a></div>

    _END;
    // code...
}
else{
    $btnchange=<<<_END
    <div class="topbarbutton in"><a href="../html/login.html">login/signup</a> </div>
    
    _END;
}
if (!isset($_SESSION['compare'])) {
    $_SESSION['compare']=array();
    // code...
}
echo <<<_END

<head>
    <meta charset="utf-8">
    <title>MobiKart-Mobiles</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../images/logo1.png" type="image/icontype">
    <meta name="author" content="Kanivan.S 2020115039">
    <style type="text/css">
        .container {
    /* Content is centered horizontally */
    align-items: center;
    display: flex;
    justify-content: center;
}

.container__column {
    /* Content is centered vertically */
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;

    /* Make all columns have the same width */
    flex: 1;

    /* OPTIONAL: Space between columns */
    margin: 0 8px;

    /* OPTIONAL: Border */
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 4px;
}
body{overflow-x:none}
    </style>
}


    


</head>
<body>
    <header>
        <div class="header-topbar">
            <div class="topbar">
                <div class="topbar-logo">
                <img src="../images/logo1.png" alt="MobiKart-LOGO" title="MobiKart">
                </div>
                <div class="topbarbutton cart"><a href="../index.php">HOME</a></div>
                <div>
                    <div class="topbar-search-box">
                        <form class="search" action="/action_page.php">
                            <input type="text" placeholder="Search for products,brands..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                </div>
                $btnchange
                <div class="topbarbutton cart"><a href="cart.php" target="_blank">cart</a></div>
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
if (isset($_GET['action'])) {
    // code...

if ($_GET['action']=="remove") {

            $removecode=$_GET['removecode'];
            foreach ($_SESSION['compare'] as $key => $value) {
                if ($value['product_code']==$removecode) {
                     unset($_SESSION['compare']["$key"]);
                     $_SESSION['compare']=array_values($_SESSION['compare']);
                      echo '<script>alert("item removed")</script>';
                      echo '<script>window.location="compare.php"</script>';
                    // code...
                }
                // code...
            }

            // code...
        }

}
if (isset($_SESSION['compare']) ) {
    if (count($_SESSION['compare'])>4) {
        echo "<script>alert('You can add only 5 items in compare')</script>";
        // code...
    }
    
    else{

        if (isset($_GET['comparecode'])) {
    if (isset($_SESSION['compare'])) {
        $item_array_id = array_column($_SESSION["compare"],'product_code');
        if (!in_array($_GET["comparecode"], $item_array_id)){
            $count= count($_SESSION["compare"]);
            $detailarr=getassocarraydata($_GET['comparecode']);
            
            $_SESSION['compare'][$count]=$detailarr[0];
        }
        // code...
    }
    else{
        $_r=$_GET['comparecode'];
        $detailarr=getassocarraydata($_r);
        $_SESSION['compare'][0]=$detailarr[0];
       
    // code...
}


}}}

?>
<body>
    <div class="container">
        <?php
        if (count($_SESSION['compare'])>0) {
        for ($m=0; $m <count($_SESSION['compare']) ; $m++) { 
            $pro_code=$_SESSION['compare'][$m]['product_code'];
            $name=$_SESSION['compare'][$m]['product_name'];
            $price=number_format($_SESSION['compare'][$m]['price'],2);
            $frimg=$_SESSION['compare'][$m]['imgsrc'];
            $brandnames=$_SESSION['compare'][$m]['brand_name'];
            $clockspeed=$_SESSION['compare'][$m]['clockspeed'];
            $internal_storage=$_SESSION['compare'][$m]['internal_storage'];
            $network_type=$_SESSION['compare'][$m]['nettype'];
            $core=$_SESSION['compare'][$m]['cores'];
            $os=$_SESSION['compare'][$m]['os'];
            $processor_brand=$_SESSION['compare'][$m]['processor_brand'];
            $ram=$_SESSION['compare'][$m]['ram'];
            $btcapacity=$_SESSION['compare'][$m]['battery_capacity'];
            $primarycam=$_SESSION['compare'][$m]['primarycamera'];
            $secondarycam=$_SESSION['compare'][$m]['secondarycamera'];
            $screensize=$_SESSION['compare'][$m]['screen_size'];
            $reer= <<<_END

        <div class="container__column">
        <p><img src="../images/products/$frimg" alt="$name"></p>
        <h1>PRODUCT NAME - $name</h1>
        <h2>COST - &#8377; $price</h2>
        <h2>BRAND - $brandnames</h2>
        <h3>CLOCK SPEED - $clockspeed</h3>
        <h3>RAM - $ram</h3>
        <h3>INTERNAL STORAGE - $internal_storage</h3>
        <h3>NETWORK TYPE - $network_type</h3>
         <h3>NUMBER OF CORES - $core</h3>
        <h3>OS - $os</h3>
        <h3>PROCESSOR - $processor_brand</h3>
        <h3>BATTERY CAPACITY - $btcapacity</h3>
        <h3>PRIMARY CAMERA - $primarycam</h3>
        <h3>SECONDARY CAMERA - $secondarycam</h3>
        <h3>SCREEN SIZE - $screensize</h3>
        <p id="linktoremove"><a  href="compare.php?action=remove&removecode=$pro_code">Remove</a></p>
        </div>
        _END;
        echo "$reer";
        }}
        else{
            if (count($_SESSION['compare'])===0) {
        echo '<script>alert("No items in compare!")</script>';
        echo '<script>window.location="productdisplay.php"</script>';

        // code...
    }
        }
        
        ?>

   
</div>
</body>