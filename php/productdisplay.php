<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    #adcm{
        color: #ffff;
        background-color: #eb6a07;
        text-decoration: none;
        padding: .5em 1em;
    }
</style>
<style type="text/css">
    .gotocompare{
        
        background-color:#ed5909 ;
        padding: .5em 2em;
        position: fixed;
        bottom: 3%;
        right: 5%;
        left: 80%;
        top: 90%;
    }
    .gotocompare a{
        text-decoration: none;
        color: #fff;

    }
    .gotocompare a:hover{
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

echo <<<_END

<head>
    <meta charset="utf-8">
    <title>MobiKart-Mobiles</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../images/logo1.png" type="image/icontype">
    <meta name="author" content="Kanivan.S 2020115039">


    


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
                <div class="topbarbutton cart"><a href="cart.php" >cart</a></div>
            </div>
        </div>
    </header>


_END;
// include_once 'index.html';                   

?>
    <div class="main-box">
        <div class="leftside-box">
            <div class="filtershead"><h3>Filters</h3></div>
            <form action="" method="get">
            <?php include_once 'productdisplayfn.php'; ?>
                <?php include_once "filter.php"; ?>
                <div>
                    <input type="submit" name="filter_submit" value="FILTER" id="filter-btn"> 
                    <input type="reset" name="filter_reset" value="Reset" id="filter-btn">
                </div>
                <div>
                    <div>
                        <h3>Price</h3>
                        <input type="radio" name="fororder" value="asc" checked=""><label>Low to High</label><br>
                         <input type="radio" name="fororder" value="desc" <?php echo "$price_radio_select";?>><label>High to Low</label>
                    </div>
                    <div><h3>BRAND</h3></div>
                    <div>
                        <?php checkboxfn($brandnames,'brandnames','',$checked_tempbrandnames); ?>
                    </div>
                    <div>
                        <div><h3>INTERNAL STORAGE</h3></div>
                        <?php checkboxfn($internalstorage,'internalstorage','GB',$checked_internalstorage); ?>               
                    </div>
                    <div>
                        <div><h3>RAM </h3></div>
                        <?php checkboxfn($ram,'ram','GB',$checked_ram); ?>               
                    </div>
                    <div>
                        <div><h3>BATTERY CAPACITY </h3></div>
                        <?php checkboxfn($btcapacity,'btcapacity','mAh',$checked_btcapacity); ?>            
                    </div>
                    <div>
                        <div><h3>OPERATING SYSTEM </h3></div>
                        <?php checkboxfn($os,'os','',$checked_os); ?>           
                    </div>
                    <div>
                        <div><h3>NETWORK TYPE</h3></div>
                        <?php checkboxfn($network_type,'network_type','',$checked_network_type); ?>           
                    </div>
                    <div>
                        <div><h3>SCREEN SIZE</h3></div>
                        <?php checkboxfn($screensize,'screensize','cm',$checked_screensize); ?>         
                    </div>
                    <div>
                        <div><h3>PRIMARY CAMERA</h3></div>
                        <?php checkboxfn($primarycam,'primarycam','MP',$checked_primarycam); ?>         
                    </div>
                    <div>
                        <div><h3>SECONDARY CAMERA</h3></div>
                        <?php checkboxfn($secondarycam,'secondarycam','MP',$checked_secondarycam); ?>         
                    </div>
                    <div>
                        <div><h3>PROCESSOR BRAND</h3></div>
                        <?php checkboxfn($processor_brand,'processor_brand','',$checked_processor_brand); ?>         
                    </div>
                    <div>
                        <div><h3>CLOCK SPEED</h3></div>
                        <?php checkboxfn($clockspeed,'clockspeed','GHz',$checked_clockspeed); ?>            
                    </div>
                    <div>
                        <div><h3>NUMBER OF CORES</h3></div>
                        <?php checkboxfn($core,'core','',$checked_core); ?>           
                    </div>
                </div>
                
                
            </form>
        </div>
        <div class="rightside-box">
            <?php

            if (count($assoc_eachdis)===0) {
                $totalresults=0;
                // code...
            }
            else{
                $totalresults=count($assoc_eachdis);
            }
            // if (count($demovar)!==0) {
            //     $totalresults=count($demovar);
            // if (isset($_GET['action'])) {
            //     if ($_GET['action'] == "asc") {
            //         $readydisplay=getready($demovar);
            //         $query_eachdisplay="SELECT * FROM PRODUCTS WHERE product_code IN $readydisplay ORDER BY price ASC";
            //         $assoc_eachdis=getassocdatas($query_eachdisplay);
            //     }
            //     elseif ($_GET['action'] == "desc") {
            //         $readydisplay=getready($demovar);
            //         $query_eachdisplay="SELECT * FROM PRODUCTS WHERE product_code IN $readydisplay ORDER BY price DESC";
            //         $assoc_eachdis=getassocdatas($query_eachdisplay);
            //     }
                
            // }
            // else{
            //          $readydisplay=getready($demovar);
            //         $query_eachdisplay="SELECT * FROM PRODUCTS WHERE product_code IN $readydisplay ORDER BY price ASC";
            //         $assoc_eachdis=getassocdatas($query_eachdisplay);
            //     }
            // }
            
            ?>

            <div class="results-no">
                <p>Mobiles<span> ( Total results - <?php echo "$totalresults" ?> )</span><p>
            </div>
            <div class="rightside-box-tophead">Sort by
            <a id="lh">Lowest to highest</a> 
            <a id="hl">Highest to lowest</a></div>
            <?php
            for ($m=0; $m <$totalresults ; $m++) { 
                $pro_code=$assoc_eachdis[$m]['product_code'];
                $pro_name=$assoc_eachdis[$m]['product_name'];
                $pro_img=$assoc_eachdis[$m]['imgsrc'];
                $pro_ram=$assoc_eachdis[$m]['ram'];
                $pro_rom= $assoc_eachdis[$m]['internal_storage'];
                $pro_scsize=$assoc_eachdis[$m]['screen_size'] ;
                $pro_pricam=$assoc_eachdis[$m]['primarycamera'] ;
                $pro_seccam=$assoc_eachdis[$m]['secondarycamera'];
                $pro_bt=$assoc_eachdis[$m]['battery_capacity'];
                $pro_proces=$assoc_eachdis[$m]['processor_brand'];   
                $pro_price=number_format($assoc_eachdis[$m]['price'],2); 
                echo <<<_END
                <div class="rightside-main-boxes">
                <a href="productspecify.php?code=$pro_code" target="_blank" class="rightside-inner-boxes">
                <div class="productimg">
                    <img src="../images/products/$pro_img" alt="$pro_name" >
                </div>
                <div class="inner-each-box">
                    <h1>
                       $pro_name
                    </h1>
                        <ul>
                            <li> $pro_ram  RAM | $pro_rom ROM</li>
                            <li>$pro_scsize Display</li>
                            <li>$pro_pricam MP BACK CAMERA | $pro_seccam MP FRONT CAMERA</li>
                            <li> Li-ion Polymer Battery</li>
                            <li>$pro_proces Processor</li>
                            <li> 1 year Warranty on Handset</li>
                        </ul>
                    
                </div>
                <div class="inner-each-price-box"><h1>Rs. $pro_price </h1>
                
                </div>
                <div>
                <a href="compare.php?action=compare&comparecode=$pro_code" id="adcm">Add to compare</a>
                </div>
                  </a>
                </div>

                _END;
                // code...
            }
            if ($totalresults === 0) {
                echo <<<_END
                <div>
                <h1>Oops! No results found...</h1>
                </div>
                _END;
                // code...
            }
            ?>

        </div>
    </div>
    <?php
    if (isset($_SESSION['compare'])) {
        $countinompare=count($_SESSION['compare']);
        // code...
    }
    else{
        $countinompare=0;
    }
    if ($countinompare>0) {
        echo <<<_END
        <style>
        .gotocompare{
            display:block;
        }
        </style>
        _END;
        // code...
    }
    else{
         echo <<<_END
        <style>
        .gotocompare{
            display:none;
        }
        </style>
        _END;
    }   
    
    ?>
    <div class="gotocompare">
        <a href="compare.php">Go to compare(<?php echo "$countinompare"; ?>)</a>
    </div>
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
  

</footer >

</body>
</html>
</body>
</html>
<!-- <script type="text/javascript">
    
    function b(k){
        k.style.width="105%";
    }
    function out(j){
        j.style.width="100%";
    }
</script> -->
