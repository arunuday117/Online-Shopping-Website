<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="index.php" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="search.php"method="post">
							<input type="text" placeholder="Search on E-MART ...."name="text">
							<button name="search"><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5" align="right">
						<div class="user-panel">
							<div class="up-item">
									<a href="contact.php">Contact Us</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									
								</div>
								<a href="cart.php">Shopping Cart</a>
							</div>
							<div class="up-item">
								<i class="flaticon-profile"></i>
									<?php if (!empty($_SESSION['username'])) { ?>
										<a href="account.php"><?php echo$_SESSION['username'];?>
										<?php } else { ?>
										<a href="login.php">Sign In</a>
										<?php } ?>
							</div>
							<div class="up-item">
								<?php if (!empty($_SESSION['username'])) { ?>
							</div>
							<div class="up-item">
									<a href="logout.php">Log Out</a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="main-navbar">
				<div class="container">
					<ul class="main-menu">
						<li>
							<a href="index.php" >Home</a>
							
						</li>
						<?php $sql=mysqli_query($mysqli,"SELECT cid,cname  FROM categories");
							while($row=mysqli_fetch_array($sql))
							{
						?>
						<li >
							  <a href="category.php?cid=<?php echo $row['cid'];?>"> <?php echo $row['cname'];?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</header>