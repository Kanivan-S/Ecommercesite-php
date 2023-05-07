<?php
include_once "dbconnection.php";
//written the fn for the get unique datas from the db datas 
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

$brandnames=getdatas("SELECT brand_name FROM brands",'brand_name');
$clockspeed=getdatas("SELECT clockspeed FROM clockspeedtable",'clockspeed');
$internalstorage=getdatas("SELECT internalstorage FROM internalstoragetable",'internalstorage');
$network_type=getdatas("SELECT network_type FROM network_typetable",'network_type');
$core=getdatas("SELECT core FROM corestable",'core');
$os=getdatas("SELECT os FROM ostable",'os');
$processor_brand=getdatas("SELECT processor_brand FROM processor_brandtable",'processor_brand');
$ram=getdatas("SELECT ram FROM ram",'ram');
$btcapacity=getdatas("SELECT DISTINCT battery_capacity FROM products",'battery_capacity');
$price=getdatas("SELECT DISTINCT price FROM products",'price');
$primarycam=getdatas("SELECT DISTINCT primarycamera FROM products",'primarycamera');
$secondarycam=getdatas("SELECT DISTINCT secondarycamera FROM products",'secondarycamera');
$screensize=getdatas("SELECT DISTINCT screen_size FROM products",'screen_size');

function checkboxfn($param1,$param2,$param3,$param4){
    for ($i=0; $i <count($param1) ; $i++) { 
        $a=$param2."[]";
        $tempvalue=$param1[$i];
        if (!empty($param4)) {
            $x=in_array($tempvalue,$param4)? "Checked":"";
        }
        else{
            $x="";
        }
       echo <<<_END
          <input type="checkbox" name="$a" value="$tempvalue"  $x>
          <label>$tempvalue $param3</label><br>
       _END;
    }
}

?>