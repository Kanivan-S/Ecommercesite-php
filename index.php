<!DOCTYPE html>
<html lang="en">

<?php
include_once 'php/formvalidate.php';
// loginauthenticate();

  if (!empty($_SESSION['id'])) {
	$username=$_SESSION['username'];
$userid=$_SESSION['id'];
$useremail=$_SESSION['usermail'];

	$btnchange=<<<_END
	<div class="topbarbutton "><a href="php/profile.php" target="_blank" id="myBtn" >$username</a></div>

	_END;
	// code...
}
else{
	$_SESSION['cart']=array();
	$btnchange=<<<_END
	<div class="topbarbutton in"><a href="html/login.html" >login/signup</a> </div>
	
	_END;
}

echo <<<_END

<head>
	<meta charset="utf-8">
	<title>MobiKart-Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="icon" href="images/logo1.png" type="image/icontype">
	  <style>
	  .rightside-box img:hover{
  transform: scale(1.1);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);

}
	  </style>


</head>
<body>
	<header>
		<div class="header-topbar">
			<div class="topbar">
				<div class="topbar-logo">
				<img src="images/logo1.png" alt="MobiKart-LOGO" title="MobiKart">
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
				<div class="topbarbutton cart"><a href="php/cart.php">cart</a></div>
			</div>
		</div>
	</header>


_END;
// include_once 'index.html';					

?>

<div class="main-head">
	<div class="main-head-text">
		<h1>Mobiles</h1>
	</div>
</div>
<div class="subhead-text">
		<h3>Top brands</h3>
	</div>
	<div class="top-brands">
		<?php
		$brand_query="SELECT * FROM brands";
$sql_getquery=mysqli_query($connection,$brand_query);
$fetch_all_arr=mysqli_fetch_all($sql_getquery,MYSQLI_ASSOC);
for ($k=0; $k <count($fetch_all_arr); $k++){
	$eachbrandname=$fetch_all_arr[$k]['brand_name'];
	$eachbrandimgsrc=$fetch_all_arr[$k]['brandimgsrc'];
	$link="php/productdisplay.php?filter_submit=FILTER&fororder=asc&brandnames[]=";
	$display=<<<_END
	<a href="$link$eachbrandname" class="imglink">
		<figure>
			<img src="images/brands/$eachbrandimgsrc" alt="$eachbrandname"  >
			<figcaption>$eachbrandname</figcaption>
		</figure>
	</a>
	_END;
	print_r($display);
};
		?>
	
					
	</div>
	<div class="main-box">
		<div class="leftside-box">
			 <div class="filtershead"><h3>Filters</h3></div>
            <form action="php/productdisplay.php" method="get">
            <?php include_once 'php/productdisplayfn.php'; ?>
                <?php include_once "php/filter.php"; ?>
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
			<div class="up-launch-box">
				<h1 class="inner-head">Upcoming Launch</h1>	
			    <a href="php/productspecify.php?code=2025"><img src="images/brands/oppo.jpg" alt="oppo-newlaunch"></a>
			</div>
			<div class="inspot-box">
				<h1 class="inner-head">In spotlight</h1>
				<div class="inner-image-orient">
                <a href="http://localhost/project/php/productdisplay.php?filter_submit=FILTER&fororder=asc&brandnames%5B%5D=realme"><img src="images/brands/realmec20.png" ></a>
                <a href="php/productspecify.php?code=2000"><img src="images/brands/pocom3.png" ></a>
			    <a href="php/productspecify.php?code=2016"><img src="images/brands/realmenarzo30a.png"></a>
				</div>	

			</div>
			<div class="trendnow-box">
				<h1 class="inner-head">Trending now</h1>	
			    <a id="redm"  href="php/productdisplay.php?filter_submit=FILTER&fororder=asc&brandnames%5B%5D=xiaomi"><img src="images/brands/redminote10.png" alt="newlaunch" style="width: 100%;" ></a>
			    <div class="trendnow-box-sideimgs">
			    	<a href="php/productdisplay.php?filter_submit=FILTER&fororder=asc&brandnames%5B%5D=apple"><img src="images/brands/iphones.png" alt="newlaunch" id="big-img"></a>
			    	<a href="php/productdisplay.php?filter_submit=FILTER&fororder=asc&brandnames%5B%5D=samsung"><img src="images/brands/galaxym32.png" alt="newlaunch" id="big-img"></a>
			    	
			    </div>
			   
			</div>

			

		</div>
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
  			<a href="html/termspolicy.html" target="_blank">Terms and Privacy Policy</a>
  		</div>
  		<div class="mail">
  			<h3>Mail</h3>
  			<p>Any queries<br>mail us!</p>
  			<a href="mailto:223953@student.annauniv.edu">223953@student.annauniv.edu</a>
  		</div>
  

</footer class="contact" id="contact">

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
