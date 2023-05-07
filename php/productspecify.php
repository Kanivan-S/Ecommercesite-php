<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    .main-container{
    display: flex;
    flex-direction: row;
    margin-left: 3em;
    background-color: #ffff;

}
 .left-container{
    flex-basis: 40%;
    display: flex;
    flex-direction: row;
    align-content: space-between;
    border: 2px solid #8d918e;

}
 .left-container .inner-left{
    flex-basis: 10%;
    display: inline-flex;
    padding: 0em 1em; 
    border-right: 2px solid #8d918e;
    margin-left: .5em;
    flex-direction: column;
}

.main-container .left-container .inner-left img{
    width: 50px;
    padding: 5px;
    height: auto;
    margin: 10% 0;
    border: 1px solid #8d918e;
}
.left-container .inner-left img:hover{
    border: 2px solid blue;
    transform: scale(1.1);
}
.left-container .inner-right{
    flex-basis: 90%;
    align-self: center;

}
 .left-container .inner-right img{
/*    width: 240px;
*/    padding:.5em 1em 2em 3em;
/*    height: 416px;
*/    align-self: center;
    /*padding-top:8% ;
    padding-left: 20%;
    padding-right: 0;*/
}
.eachproductbtns a{
    display: inline-block;
    text-decoration: none;
    color: #ffff;
    padding: .5em 2em;
    margin:0 0.5em .3em 1em ;
    border-radius: 3px;
/*  display: flex;
*/}
 #addcart{
    background-color: #fb641b;

}

.eachproductbtns #buynow{
    background-color: #fb641b;

}
.eachproductbtns a:hover{
    transform: scale(1.1);
}
.rightt-container{
    flex-basis: 60%;
    display: flex;
    flex-direction: column;
    border: none;
    align-content: space-between;
}
table,tr,td,th{
    padding-left: .3em;
    border: 2px solid #172fe6;
    border-collapse: collapse;
    margin: 2em;
}
#Specifications{
    border-bottom: 2px solid #8d918e;
    text-align: center;
}
tr,th,td{

    text-align: left;
    padding:.5em 2em;
}
th{
    color: #2e6b70;
}
*{
  font-family:cursive;
}
#namehead{
    text-align: center;
}
h1[id="namehead"]{
    color: #fc7208;
}
</style>
<?php
include_once 'dbconnection.php';
session_start();
// loginauthenticate();
// signup_authenicate();
if (!empty($_SESSION['id'])) {
    $username=$_SESSION['username'];


    $btnchange=<<<_END
    <div class="topbarbutton in"><a href="profile.php" id="myBtn">$username</a></div>
    _END;
    // code...
}
else{
    $btnchange=<<<_END
    <div class="topbarbutton in"><a href="../html/login.html">login/signup</a> </div>
    _END;
}


echo <<<_END

<head>
    <meta charset="utf-8">
    <title>MobiKart-Product Specifications</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/eachproductdisplay.css">
          <link rel="icon" href="../images/logo1.png" type="image/icontype">
    <style>
    #gocart{
    background-color: red;
}
    </style>

    

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
                <div class="topbarbutton cart"><a href="cart.php">cart</a></div>
            </div>
        </div>
    </header>
_END;
?>
<?php
if (isset($_GET['code'])) {
    $code=$_GET['code'];
    $sql_productspec="SELECT * FROM PRODUCTS WHERE product_code = $code";
    $sql_connspec=mysqli_query($connection,$sql_productspec);
    $spec_assoc_arr=mysqli_fetch_all($sql_connspec,MYSQLI_ASSOC);
    $m=0;
    $spec_brand=$spec_assoc_arr[$m]['brand_name'];
    $spec_code=$spec_assoc_arr[$m]['product_code'];
    $spec_name=$spec_assoc_arr[$m]['product_name'];
    $spec_ram=$spec_assoc_arr[$m]['ram'];
    $spec_rom= $spec_assoc_arr[$m]['internal_storage'];
    $spec_scsize=$spec_assoc_arr[$m]['screen_size'] ;
    $spec_pricam=$spec_assoc_arr[$m]['primarycamera'] ;
    $spec_seccam=$spec_assoc_arr[$m]['secondarycamera'];
    $spec_bt=$spec_assoc_arr[$m]['battery_capacity'];
    $spec_proces=$spec_assoc_arr[$m]['processor_brand'];   
    $spec_price=number_format($spec_assoc_arr[$m]['price'],2); 
    $spec_clockspeed=$spec_assoc_arr[$m]['clockspeed'];
    $spec_cores=$spec_assoc_arr[$m]['cores'];
    $spec_os=$spec_assoc_arr[$m]['os'];
    $spec_nettype=$spec_assoc_arr[$m]['nettype'];
    $spec_img1=$spec_assoc_arr[$m]['spec1'];
    $spec_img2=$spec_assoc_arr[$m]['spec2'];
    $spec_img3=$spec_assoc_arr[$m]['spec3'];
    $spec_img4=$spec_assoc_arr[$m]['spec4'];
    $spec_img5=$spec_assoc_arr[$m]['spec5'];

}
?>
<main>
    <?php
    $item_array_id = array_column($_SESSION["cart"],'code');
    if (in_array($spec_code, $item_array_id)) {
        $addtocartbtn=<<<_END
        <a href="cart.php" id="gocart" target="_blank" >Go to cart</a>
        _END;
        // code...
    }
    else{
        $addtocartbtn=<<<_END
        <a href="cart.php?code=$spec_code" id="addcart" target="_blank">Add to cart</a>
        _END;
    }
    echo <<<_END
    <div class="main-container">
            <div class="left-container">
                <div class="inner-left">
                    <img src="../images/$spec_brand/$spec_img1" alt="$spec_name" onclick="bigimgfn(this)" onmouseover="bigimgfn(this)">
                    <img src="../images/$spec_brand/$spec_img2" alt="$spec_name" onclick="bigimgfn(this)" onmouseover="bigimgfn(this)">
                    <img src="../images/$spec_brand/$spec_img3" alt="$spec_name" onclick="bigimgfn(this)" onmouseover="bigimgfn(this)">
                    <img src="../images/$spec_brand/$spec_img4" alt="$spec_name" onclik="bigimgfn(this)" onmouseover="bigimgfn(this)">
                    <img src="../images/$spec_brand/$spec_img5" alt="$spec_name" onclick="bigimgfn(this)" onmouseover="bigimgfn(this)">
                </div>
                <div class="inner-right">
                    <img src="../images/$spec_brand/$spec_img1" alt="$spec_name" id="bigimg">
                    <div class="eachproductbtns">
                     $addtocartbtn
                    <a href="buyeach.php?actionforbuy=single&buycode='$spec_code'" target="_blank" id="buynow">Buy now </a>
                    </div>
                </div>
            </div>
            <div class="rightt-container">
                <div>
                    <h1 id="namehead">$spec_name</h1>
                    <h4 id="namehead">Price - &#8377; $spec_price</h4>
                </div>
                <table>
                    <tr>
                        <th colspan="2" id="Specifications">
                            Specifications
                        </th>
                        
                    </tr>
                    <tr>
                        <th>
                            &#9758; Brand name
                        </th>
                        <td>
                            $spec_brand
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; RAM
                        </th>
                        <td>
                           $spec_ram
                        </td>
                    </tr><tr>
                        <th>
                           &#9758;  ROM
                        </th>
                        <td>
                            $spec_rom
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; BATTERY CAPACITY 
                        </th>
                        <td>
                            $spec_bt
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; CLOCK SPEED
                        </th>
                        <td>
                            $spec_clockspeed
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; NUMBER OF CORES
                        </th>
                        <td>
                            $spec_cores
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            &#9758; PRIMARY CAMERA
                        </th>
                        <td>
                            $spec_pricam
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; SECONDARY CAMERA
                        </th>
                        <td>
                            $spec_seccam
                        </td>
                    </tr><tr>
                        <th>
                            &#9758; SCREEN SIZE
                        </th>
                        <td>
                            $spec_scsize
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; OS
                        </th>
                        <td>
                            $spec_os
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; PROCESSOR BRAND
                        </th>
                        <td>
                            $spec_proces
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &#9758; NETWORK TYPE
                        </th>
                        <td>
                            $spec_nettype
                        </td>
                    </tr>


                </table>
            </div>
            
        </div>
        
    _END;

    ?>
        </main>
        <script type="text/javascript">
            function bigimgfn(th){
                var bigimage=document.querySelector('#bigimg');
                bigimage.src = th.src;
            }
        </script>
    <footer class="contact" id="contact">
 
        <div class="company"><h3>MobiKart </h3>
            <p>CopyRight&#169;2021.<br>All Rights Reserved &reg;.</p>
        </div>
        <div class="location">
            <h3>Address</h3>
            <p>MobiKart<br>
                Mobile shop<br>
                Sector-2<br>
            Chennai-02</p>
            
        </div>
        <div class="phone">
            <h3>Contact us</h3>
            <p>Contact number <span style="color: #2249a3;">+91123444</span></p>
            <a href="../html/termspolicy.html" target="_blank">Terms and Privacy Policy</a>
        </div>
        <div class="mail">
            <h3>Mail</h3>
            <p>Any queries<br>mail us!</p>
            <a href="mailto:223953@student.annauniv.edu">223953@student.annauniv.edu</a>
        </div>
  

</footer class="contact" id="contact">
</body>
</html>
