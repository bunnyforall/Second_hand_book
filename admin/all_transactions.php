<?php
    include("../templates/database_conn.php");
    include("../templates/functions.php");
    $aid=$_SESSION['ADMIN_ID'];
    if ($_SESSION['ADMIN_LOGIN']!='yes' or $_SESSION['ADMIN_ID']=="")
    {
        header("location:admin_logout.php");
    }
    $sql="SELECT * FROM `admin` where `admin_id`='$aid'";
    $res=mysqli_query($con,$sql);
    $arow = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $sql1="SELECT * FROM `transactions` order by `timestamp` desc";
    $res1=mysqli_query($con,$sql1);
    $rows1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin | All Donations </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../templates/stylesheet.css">
    <style>
        form{
			max-width: 800px;
			margin: 100px;
			padding: 20px;
		}
        .dp{
            border-radius: 50%;
        }
    </style>
</head>
<body style="background-color:#2b2e4a;" >
<nav style="padding-right: 30px;padding-left: 80px; background-color:black;">
		<div>
			<a href="#" class="brand-logo brand-text hide-on-med-and-down">SecondPage</a>
            <ul id="nav-mobile" class="right">
                <li><a href="adminpage.php">Home</a></li>
                <li><a href="admin_categories.php">Categories</a></li>
                <li  class="active"><a href="all_transactions.php">All Donations</a></li>
                <li><a href="All_sellers.php">All Donors</a></li>
				<li><a href="admin_logout.php" class="btn brand z-depth-0">Logout</a></li>
		    </ul>

		</div>
        <br>
</nav>
<div class="blackbgbg">
    <div class="container">
    <section>
    <div class="row">
        <h1 class="white-text center">All Donations</h1>
        
            <?php foreach($rows1 as $c){ ?>
                <div class="col s12 md6">
  				    <div class="card grey lighten-3">
                        <div class="card-content">
                        <div class="right">
                            <h5> Receipient ID: <?php echo htmlspecialchars($c['cust_id']); ?></h5>
                            <h5> Donor ID <?php echo htmlspecialchars($c['seller_id']); ?></h5>
                            <h5> Timestamp: <?php echo htmlspecialchars($c['timestamp']);?></h5>
                        </div>
                            <h5> Donation id: <?php echo htmlspecialchars($c['trans_id']);?></h5>
                            <h5> Product ID: <?php echo htmlspecialchars($c['product_id']);?></h5>
                            <h5> pagePoint: <?php echo htmlspecialchars($c['Total']);?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>