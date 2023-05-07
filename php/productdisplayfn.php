<?php
include_once "filter.php";//inlcuded for the values of the original array
$tempbrandnames=$brandnames;
$tempclockspeed=$clockspeed;
$tempinternalstorage=$internalstorage;
$tempnetwork_type=$network_type;
$tempcore=$core;
$tempos=$os;
$tempprocessor_brand=$processor_brand;
$tempram=$ram;
$tempbtcapacity=$btcapacity;
$tempprice=$price;
$tempprimarycam=$primarycam;
$tempsecondarycam=$secondarycam;
$tempscreensize=$screensize;
$checked_tempbrandnames="";
$checked_clockspeed="";
$checked_internalstorage="";
$checked_network_type="";
$checked_core="";
$checked_os="";
$checked_processor_brand="";
$checked_ram="";
$checked_btcapacity="";
$checked_price="";
$checked_primarycam="";
$checked_secondarycam="";
$checked_screensize="";

if (isset($_GET['filter_submit'])) {
	// print_r($_GET['network_type']);
	// print_r($_GET['netype']);
	// print_r($_GET[''])
if (isset($_GET['brandnames'])) {
	$checked_tempbrandnames=$_GET['brandnames'];
	$tempbrandnames=$checked_tempbrandnames;	
}
if (isset($_GET['clockspeed'])) {
	$checked_clockspeed=$_GET['clockspeed'];
	$tempclockspeed=$checked_clockspeed;
}
if (isset($_GET['internalstorage'])) {
	$checked_internalstorage=$_GET['internalstorage'];
	$tempinternalstorage=$checked_internalstorage;
}
if (isset($_GET['network_type'])) {
	$checked_network_type=$_GET['network_type'];
	$tempnetwork_type=$checked_network_type;
}
if (isset($_GET['core'])) {
	$checked_core=$_GET['core'];
	$tempcore=$checked_core;
}
if (isset($_GET['os'])) {
	$checked_os=$_GET['os'];
	$tempos=$checked_os;
}
if (isset($_GET['processor_brand'])) {
	$checked_processor_brand=$_GET['processor_brand'];
	$tempprocessor_brand=$checked_processor_brand;
}
if (isset($_GET['ram'])) {
	$checked_ram=$_GET['ram'];
	$tempram=$checked_ram;
}
if (isset($_GET['btcapacity'])) {
	$checked_btcapacity=$_GET['btcapacity'];
	$tempbtcapacity=$checked_btcapacity;
}
if (isset($_GET['price'])) {
	$checked_price=$_GET['price'];
	$tempprice=$checked_price;
}
if (isset($_GET['primarycam'])) {
	$checked_primarycam=$_GET['primarycam'];
	$tempprimarycam=$checked_primarycam;
}
if (isset($_GET['secondarycam'])) {
	$checked_secondarycam=$_GET['secondarycam'];
	$tempsecondarycam=$checked_secondarycam;
}
if (isset($_GET['screensize'])) {
	$checked_screensize=$_GET['screensize'];
	$tempscreensize=$checked_screensize;
}

}
//fix the error this fn written
function getready($arr){
	$ready="(";
	for ($j=1; $j <= count($arr); $j++) { 
		if ($j===count($arr)) {
			$ready=$ready."'".$arr[$j-1]."'";
		}
		else{
			$ready=$ready."'".$arr[$j-1]."',";
		}
	}
	$ready=$ready.")";
	return $ready;
}
$readytempcore=getready($tempcore);
$readytempbrandnames=getready($tempbrandnames);
$readytempnetwork_type=getready($tempnetwork_type);
$readytempos=getready($tempos);

$readytempprocessor_brand=getready($tempprocessor_brand);

//CHECK WHAT WIILLHAPPEN IF THE ARRAY IS EMTPY
$queries="SELECT * FROM products WHERE ram IN (" . implode(',', $tempram) . ") AND clockspeed IN (" . implode(',', $tempclockspeed) . ")  AND internal_storage IN (" . implode(',', $tempinternalstorage) . ") AND battery_capacity IN (" . implode(',', $tempbtcapacity) . ") AND primarycamera IN (" . implode(',', $tempprimarycam) . ") AND secondarycamera IN (" . implode(',', $tempsecondarycam) . ") AND screen_size IN (" . implode(',', $tempscreensize) . ") AND cores IN $readytempcore AND brand_name IN $readytempbrandnames AND nettype IN $readytempnetwork_type  AND os IN $readytempos AND processor_brand IN $readytempprocessor_brand ORDER BY price ASC";

if (isset($_GET['fororder'])) {
	if ($_GET['fororder'] =="desc") {
		$queries="SELECT * FROM products WHERE ram IN (" . implode(',', $tempram) . ") AND clockspeed IN (" . implode(',', $tempclockspeed) . ")  AND internal_storage IN (" . implode(',', $tempinternalstorage) . ") AND battery_capacity IN (" . implode(',', $tempbtcapacity) . ") AND primarycamera IN (" . implode(',', $tempprimarycam) . ") AND secondarycamera IN (" . implode(',', $tempsecondarycam) . ") AND screen_size IN (" . implode(',', $tempscreensize) . ") AND cores IN $readytempcore AND brand_name IN $readytempbrandnames AND nettype IN $readytempnetwork_type  AND os IN $readytempos AND processor_brand IN $readytempprocessor_brand ORDER BY price DESC ";
		$price_radio_select="checked";
		echo <<<_END
		<style>
		.rightside-box-tophead #lh{
			color:black;
			border-bottom: none;

		}
		.rightside-box-tophead #hl{
			color:steelblue;
			border-bottom: 2px solid #2874f0 ;
		}
		</style>
		_END;
		// code...
	}
	else{
		$price_radio_select="";
		echo <<<_END
		<style>
		.rightside-box-tophead #hl{
			color:black;
			border-bottom: none;

		}
		.rightside-box-tophead #lh{
			color:steelblue;
			border-bottom: 2px solid #2874f0 ;
		}
		</style>
		_END;
	}
	// code...
}
else{
		$price_radio_select="";
		echo <<<_END
		<style>
		.rightside-box-tophead #hl{
			color:black;
			border-bottom: none;

		}
		.rightside-box-tophead #lh{
			color:steelblue;
			border-bottom: 2px solid #2874f0 ;
		}
		</style>
		_END;
	}
$sql_getquery=mysqli_query($connection,$queries);
$fetch_all_arr=mysqli_fetch_all($sql_getquery,MYSQLI_ASSOC);
$assoc_eachdis=$fetch_all_arr;
?>