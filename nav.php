<?php 
$active = "none";
if (isset($_GET['active']) && !empty($_GET['active']))  
{
	if ($_GET['active'] != "")
	{
		$active = $_GET['active'];
	}
}
?>	
<nav class="navbar brb" role="navigation">
    <div class="navbar-header">
		<a class="navbar-brand" href="index.php"><img src="img/logo.png"/></a> 
	</div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
		  <?php 
			switch($active)
			{
				case "about":
					echo '<li><a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li class="active"><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				case "scammers":
					echo '<li><a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li class="active"><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				case "shop":
					echo '<li><a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li class="active"><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				case "submitscammer":
					echo '<li> <a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li class="active"><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				case "becometrusted":
					echo '<li> <a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li class="active"><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				case "sellers":
					echo '<li> <a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li class="active"><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
				default:
					echo '<li class="active"> <a href="index.php"> <span class="icon-home"></span> Dashboard </a> </li>
            <li><a href="scammers.php"><span class="icon-frown"></span> Scammers</a></li>
			<li><a href="submit_scammer.php"><span class="icon-thumbs-up"></span> Submit a Scammer</a></li>
			<li><a href="sellers.php"><span class="icon-ok"></span> Trusted Sellers</a></li>
			<li><a href="become_trusted.php"><span class="icon-ok-circle"></span> Become A Trusted Seller</a></li>
			<li><a href="shop.php"><span class="icon-shopping-cart"></span> Shop</a></li>
			<li><a href="about.php"><span class="icon-puzzle-piece"></span> About</a></li>';
					break;
			}
		?>
		</ul>
    </div>
</nav>