<?php
function getreadydes($arr){
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
session_start();
include_once "dbconnection.php";
$sql_usernames="SELECT username FROM register";
$sqlusers_query=mysqli_query($connection,$sql_usernames);
$users_arr=mysqli_fetch_all($sqlusers_query,MYSQLI_ASSOC);
$allusers=array_column($users_arr,'username');
$sql_emails="SELECT mail FROM register";
$sqlemails_query=mysqli_query($connection,$sql_emails);
$emails_arr=mysqli_fetch_all($sqlemails_query,MYSQLI_ASSOC);
$allemails=array_column($emails_arr,'mail');

// function signup_authenicate(){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
	if (isset($_POST['signup_submit'])) {
		$entered_username=$_POST['username'];
		$entered_email=$_POST['useremail'];
		$entered_pswd=$_POST['userpassword'];
		// $hashed_pswd=password_hash($entered_pswd,PASSWORD_DEFAULT);//hashing the pswd to store the pswd in a secure manner
		global $allusers;
		global $allemails;
		if ($_POST['userpassword'] !==$_POST['retypeuserpassword']) {
			echo "<script type='text/javascript'>alert('Password and Retype password mismatched')</script>";
			echo "<script type='text/javascript'>window.location='html/signup.html'</script>";
			// return false;			
		}
		elseif (in_array($entered_username, $allusers) && in_array($entered_email, $allemails)) {
			echo "<script type='text/javascript'>alert('Sorry username or email already exists')</script>";
			echo "<script type='text/javascript'>window.location='html/signup.html'</script>";

			// return false;
		}
		else{
			$sql_insert_query="INSERT INTO register (username,mail,password)
			VALUES ('$entered_username','$entered_email','$entered_pswd')";
			global $connection;
			if (mysqli_query($connection,$sql_insert_query)) {
				$sql_oneusrname="SELECT username,userid FROM register WHERE mail='$entered_email' ";
		        		$usrname_query=mysqli_query($connection,$sql_oneusrname);
		        		$oneusrname=mysqli_fetch_all($usrname_query,MYSQLI_ASSOC);
		        		$_SESSION['id']=$oneusrname[0]['userid'];
		        		$_SESSION['username']=$oneusrname[0]['username'];
		        		$_SESSION['usermail']=$entered_email;
		        		$_SESSION['cart']=array();
		        		$_SESSION['compare']=array();
				echo "<script type='text/javascript'>alert('Welcome to MobiKart!')</script>";

			    // return true;
			}
			else{
				$ee= "Error: " . $sql_insert_query . "<br>" . mysqli_error($connection);
				echo "<script type='text/javascript'>alert('$ee')</script>";

				echo "<script type='text/javascript'>alert('Sorry for incovience Please register again')</script>";
				echo "<script type='text/javascript'>window.location='html/signup.html'</script>";
				// return false;

			}
			
		}


	}
}
// }
// function loginauthenticate(){
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			if (isset($_POST['login_submit'])) {
				$login_email="";
				$login_pswd="";
				$login_email=$_POST['loginemail'];
				$login_pswd=$_POST['loginpassword'];
				// $hashed_loginpswd=hash('ripemd128',$login_pswd);
				global $allusers;
		        global $allemails;
		        global $connection;
		       
		        if (in_array($login_email,$allemails)===false) {
			        echo "<script type='text/javascript'>alert('Email id doesnot exists')</script>";
			    	echo "<script type='text/javascript'>window.location='html/login.html'</script>";
			        // return false;
		        }
		        else{
		        	$sqloneuser_query="SELECT password FROM register WHERE mail='$login_email'";//query for the erespective email's pswd

		        	$sqloneuser_executequery=mysqli_query($connection,$sqloneuser_query);
		        	$oneuse_pswdarr=mysqli_fetch_all($sqloneuser_executequery,MYSQLI_ASSOC);
		        	$dbpswd=$oneuse_pswdarr[0]['password'];//stores the matched email pswd from the database
		        	//$hashed_loginpswd===$hashed_dbpswd
		        	if($dbpswd===$login_pswd){
		        		$sql_oneusrname="SELECT cartcode,cartname,cartprice,cartquantity,carttotal,cartfimg,cartpos,cartplus,cartminus FROM register WHERE mail='$login_email' ";
		        		if (mysqli_query($connection,$sql_oneusrname)) {
		        			// code...
		        			$usrname_query=mysqli_query($connection,$sql_oneusrname);
		        		    $c=mysqli_fetch_all($usrname_query,MYSQLI_ASSOC);
		        		    
		        		    $gt_code=unserialize(array_column($c,'cartcode')[0]);
		        		    print_r($gt_code);
						    $gt_name=unserialize(array_column($c,'cartname')[0]);
						    $gt_price=unserialize(array_column($c,'cartprice')[0]);
						    $gt_quantity=unserialize(array_column($c,'cartquantity')[0]);

						    $gt_toprice=unserialize(array_column($c,'carttotal')[0]);
						    $gt_fimg=unserialize(array_column($c,'cartfimg')[0]);
						    $gt_pos=unserialize(array_column($c,'cartpos')[0]);
						    $gt_plus=unserialize(array_column($c,'cartplus')[0]);
						    $gt_minus=unserialize(array_column($c,'cartminus')[0]);
						    for ($s=0; $s <count($gt_code) ; $s++){ 
						    	$_SESSION['cart'][$s]=array(
								'code'=>$gt_code[$s],
								'product_name'=>$gt_name[$s],
							    'price'=>$gt_price[$s],
							    'quantity'=>$gt_quantity[$s],
							    'eachtotalprice'=>$gt_toprice[$s],
							    'frontimg'=>$gt_fimg[$s],
							    'pos'=>$gt_pos[$s],
							    'plus'=>$gt_plus[$s],
							    'minus'=>$gt_minus[$s] );}
					    }
						
						else{
							$_SESSION['cart']=array();
						}
						
						$sql_oneusrname="SELECT username,userid FROM register WHERE mail='$login_email' ";
						$usrname_query=mysqli_query($connection,$sql_oneusrname);
		        		$oneusrname=mysqli_fetch_all($usrname_query,MYSQLI_ASSOC);

		        		// $sql_cart="SELECT cart FROM register WHERE mail='$login_email'";
		        		// $cartex_query=mysqli_query($connection,$sql_cart);
		        		// $cartres=mysqli_fetch_all($cartex_query,MYSQLI_ASSOC);
		        		// $demos=$cartres[0]['cart'];
		        		// $er=unserialize($demos);
		        			
		        		// if (!isset($er)) {
		        			
		        		// 	$_SESSION['cart']=$er;
		        		// }
		        		// else{
		        		// 	$_SESSION['cart']=array();
		        			
		        		// }
		        		$_SESSION['id']=$oneusrname[0]['userid'];
		        		$_SESSION['username']=$oneusrname[0]['username'];
		        		$_SESSION['usermail']=$login_email;
			        // echo "<script type='text/javascript'>alert('Successfully logged in  your account')</script>";
			        // return true;

		        	}
		        	else{
		        		echo "<script type='text/javascript'>alert('Entered Password is invalid')</script>";
			    	    echo "<script type='text/javascript'>window.location='html/login.html'</script>";
			            // return false;

		        	}

		        }
			}

		}

// }
		
		if ($_SERVER['REQUEST_METHOD']==="GET") {
			if (isset($_GET['logout'])) {
				if ($_GET['logout']=="true") {
					$upid=$_SESSION['id'];
					if (isset($_SESSION['cart'])) {
						$store_code=serialize(array_column($_SESSION['cart'],'code'));
						$st_name=serialize(array_column($_SESSION['cart'],'product_name'));
						$st_price=serialize(array_column($_SESSION['cart'],'price'));
						$st_quantity=serialize(array_column($_SESSION['cart'],'quantity'));

						$st_toprice=serialize(array_column($_SESSION['cart'],'eachtotalprice'));
						$st_fimg=serialize(array_column($_SESSION['cart'],'frontimg'));
						$st_pos=serialize(array_column($_SESSION['cart'],'pos'));
						$st_plus=serialize(array_column($_SESSION['cart'],'plus'));
						$st_minus=serialize(array_column($_SESSION['cart'],'minus'));

						$sql_stcode="UPDATE  register SET cartcode='$store_code' WHERE userid='$upid'";
						$sql_st_name="UPDATE  register SET cartname='$st_name' WHERE userid='$upid'";
						$sql_st_price="UPDATE  register SET cartprice='$st_price' WHERE userid='$upid'";
						$sql_st_quantity="UPDATE  register SET cartquantity='$st_quantity' WHERE userid='$upid'";
						$sql_st_toprice="UPDATE  register SET carttotal='$st_toprice' WHERE userid='$upid'";
						$sql_st_fimg="UPDATE  register SET cartfimg='$st_fimg' WHERE userid='$upid'";
						$sql_st_pos="UPDATE  register SET cartpos='$st_pos' WHERE userid='$upid'";
						$sql_st_plus="UPDATE  register SET cartplus='$st_plus' WHERE userid='$upid'";
						$sql_st_minus="UPDATE  register SET cartminus='$st_minus' WHERE userid='$upid'";
						if (mysqli_query($connection,$sql_stcode) and mysqli_query($connection,$sql_st_name) and mysqli_query($connection,$sql_st_price) and mysqli_query($connection,$sql_st_quantity) and mysqli_query($connection,$sql_st_toprice) and mysqli_query($connection,$sql_st_fimg) and mysqli_query($connection,$sql_st_pos) and mysqli_query($connection,$sql_st_plus) and mysqli_query($connection,$sql_st_minus) ) {
							session_destroy();

						echo "<script type='text/javascript'>alert('Logged of your account')</script>";
						// setcookie('user', serialize($_SESSION['cart']),time()+3600,'/');
						header("Location:http://localhost/project/index.php");
						}
						else{
						echo mysqli_error($connection);
						echo "<script type='text/javascript'>alert('Please log out again')</script>";
					}
					}
					else{
						session_destroy();
						echo "<script type='text/javascript'>alert('Logged of your account')</script>";
						// setcookie('user', serialize($_SESSION['cart']),time()+3600,'/');
						header("Location:http://localhost/project/index.php");

					}
					
					print_r($_SESSION['cart']);
					// $updatecart=getreadydes($_SESSION['cart']);
					$edrf=$_SESSION['cart'];
					$columns = implode("', '",array_keys($edrf));
$escaped_values = array_map('mysqli_real_escape_string', array_values($edrf));
$values  = implode("', '", $escaped_values);
					$upid=$_SESSION['id'];
					$sql_update="UPDATE  register SET cart='$values' WHERE userid='$upid'";

					if (mysqli_query($connection,$sql_update)) {
						
					}
					else{
						echo mysqli_error($connection);
						echo "<script type='text/javascript'>alert('Please log out again')</script>";
					}

					


				}
			}
		}


?>
