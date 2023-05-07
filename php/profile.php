<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MobiKart-Login page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo1.png" type="image/icontype">
    <meta name="description" content="Login-MobiKart">
    <meta name="keywords" content="html, css ,javascript , php amd mysql">
    <meta name="author" content="Kanivan.S 2020115039">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="icon" href="../images/logo1.png" type="image/icontype">
        <style type="text/css">
        *{
          font-family: cursive;
        }
          #profiledata{
            border: 2px solid #b8b6b6;
            width: 50%;
            padding: .5em;
          }
          #profile{
            color: #cf4c36;
          }
          #logoutbtn{
            float: right;
            margin-right: 50%;
            color: #ffff;
            background-color:#f5500a ;
            padding: .5em 2em;
            text-decoration: none;
          }
          #logoutbtn:hover{
            transform: scale(1.1);
            opacity: 0.8;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);

          }
        </style>

</head>
<body>
  <?php
  session_start();
    if (!empty($_SESSION['id']) and !empty($_SESSION['usermail']) and !empty($_SESSION['username'])) {
      $datamail=$_SESSION['usermail'];
      $dataaname=$_SESSION['username'];
      $dataid=$_SESSION['id']; 

    }
    else{
      $datamail="nil";
      $dataaname="nil";
      $dataid="nil"; 
    }
  ?>
  <div class="whole-box">

    <div class="side-box">
      <div class="side-box-text">
        <h1 id="profile">USER PROFILE</h1>
        <h4>Get access to your Orders, Wishlist and Recommendations</h4>
      </div>
      <div class="side-box-img"><img src="../images/logo.png" alt="MobiKart's-logo"> </div>
    </div>
    <div class="login-box">
      
      <h3 id="profile">Email</h3>
      <p id="profiledata"><?php echo "$datamail"; ?></p>
       <h3 id="profile">Name</h3>
      <p id="profiledata"><?php echo "$dataaname"; ?></p>
      <h3 id="profile">User id</h3>
      <p  id="profiledata"><?php echo "$dataid"; ?></p>
      <a href="formvalidate.php?logout=true" id="logoutbtn">Logout</a>
      </form>
    </div>
  </div>
</body>
</html>