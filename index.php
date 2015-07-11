<!doctype html>
<html lang="en">
<head>
<script type="text/javascript">
function submitScammer(ign, alts, scmtyp, amtlst, server, sslink)
{
	if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("reportstatus").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","submitscammer.php?usr="+ign+"&alts="+alts+"&scmtyp="+scmtyp+"&scamamt="+amtlst+"&server="+server+"sslinks="+sslink,true);
    xmlhttp.send();
}
function showResult(str) {
  if (str.length==0) { 
    showAllUsers();
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
function showAllUsers() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getallusers.php",true);
        xmlhttp.send();
}
</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
	<title>Vindictus Scam DB</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/templatemo_style.css">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body onload="showAllUsers();">
	<header class="site-header container animated fadeInDown">
		<div class="header-wrapper">
			<div class="row">
				<div class="col-md-4">
					<div class="site-branding">
						<a href="#"><h1>Vindictus Scam DB</h1></a>
					</div>
				</div>
				<a href="#" class="toggle-nav hidden-md hidden-lg">
					<i class="fa fa-bars"></i>
				</a>
				<div class="col-md-8">
					<nav id="nav" class="main-navigation hidden-xs hidden-sm">
						<ul class="main-menu">
							<li><a class="show-1 active homebutton" href="#">Home</a></li>
							<li><a class="show-3 projectbutton" href="#">Scammers</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Scammer</a></li>
							<li><a class="show-4 blogbutton" href="#">Buy NX or Gold</a></li>
							<li><a class="show-2 aboutbutton" href="#">About Us</a></li>
						</ul>
					</nav>
					<nav class="main-navigation menu-responsive hidden-md hidden-lg">
						<ul class="main-menu">
							<li><a class="show-1 active homebutton" href="#">Home</a></li>
							<li><a class="show-3 projectbutton" href="#">Scammers</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Scammer</a></li>
							<li><a class="show-4 blogbutton" href="#">Buy NX or Gold</a></li>
							<li><a class="show-2 aboutbutton" href="#">About Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

	
	<div id="menu-container">
		<div id="menu-1" class="homepage home-section container">
			<div class="home-intro text-center">
				<h2 class="welcome-title animated fadeInLeft">Welcome to Vindictus Scam DB!</h2>
				<p class="animated fadeInRight">Vindictus Scam DB is a free service dedicated to eradicating NX & Gold Scammers from Vindictus. <br />Please note that this service is still in beta so there will be bugs or incomplete information.</p>
				<ul class="list-icons animated fadeInUp">
					<li><i class="icon-screen-tablet"></i></li>
					<li><i class="icon-screen-desktop"></i></li>
					<li><i class="icon-globe"></i></li>
					<li><i class="icon-shield"></i></li>
				</ul>
			</div>
		</div>

		<div id="menu-2" class="content about-section container">
			<div class="our-story">
				<div class="story-bg animated fadeIn"></div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="inner-story animated fadeInRight text-center">
							<h2>ABOUT US</h2>
							<p>Vindictus Scam DB is a free service provided by VindictusForums.com and the PirateKings guild to help prevent Vindictus Players from losing their gold or nx to known scammers in game.</p>
						</div>
					</div>
				</div>
			</div>
			<br /><br />
		</div>

		<div id="menu-3" class="content project-section container">
			<div class="projects-header">
				<h2 class="animated fadeInRight">Vindictus Scammer List</h2>
				<p class="animated fadeInLeft">Here is a list of all known Vindictus scammers, their alts, servers they play on, overall amount scammed, type of scam and screenshots of admissions or characters.</p>
			</div>
			<div class="projects-holder">
				<div class="row">
					<!-- scammers main content-->
					<form>
						Search for a user: <input type="text" size="30" onkeyup="showResult(this.value)">
						<br /><br />
						<div id="livesearch"></div>
					</form>
				</div>
			</div>
		</div>

		<div id="menu-4" class="content blog-section container">
			<div class="blog-header text-center">
				<h2 class="animated fadeInRight">Buying/Selling Gold or NX with Vindictus Scam DB</h2>
				<p class="animated fadeInLeft">Currently our representatives can trade in-game gold for NX. We currently ask 150% gold-to-nx conversion (ex: $10 nx will be 25m gold in game). You can contact the following people for transactions like this:</p>
			</div>
			<div class="row blog-posts">
				<div class="col-md-4 col-sm-12">
					<div class="blog-item post-1 animated zoomIn">
						<div class="blog-bg blog-pink"></div>
						<div class="blog-content">
							<h3>Dubbs</h3>
							<span class="solid-line"></span>
							<p>Dubbs is our Resident NX Provider. He will trade items or gold for NX cards (up to $ per week). You can contact him via:</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="blog-item post-2 animated zoomIn">
						<div class="blog-bg blog-blue"></div>
						<div class="blog-content">
							<h3>Gigawiz</h3>
							<span class="solid-line"></span>
							<p>Gigawiz is our Resident NX Buyer/Seller. He will trade items or gold for NX (and vice versa). You can contact him via: <br />Vindictus: Gigawiz <br /> Or <a href="http://www.vindictusforums.com/conversations/add?to=HarmfulMonk">Send him a message on the forums</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="blog-item post-3 animated zoomIn">
						<div class="blog-bg blog-green"></div>
						<div class="blog-content">
							<h3>Third Seller Here</h3>
							<span class="solid-line"></span>
							<p>Etiam aliquam sem vel velit tempus, quis porttitor nunc rutrum. Ut a tempus arcu. Sed velit felis, pretium a lacus in, cursus scelerisque ex.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="menu-5" class="content contact-section container">
			<div class="contact-header text-center">
				<h2 class="animated fadeInLeft">Report a Scammer</h2>
				<p class="animated fadeInRight">Get Scammed by someone or know of someone scamming? Report it to us!</p>
			</div>
			<div class="contact-holder">
				<div class="row animated fadeInLeft" align="center">
						<form>
							<div id="reportstatus"></div>
							<br />
							  <label for="ingamename">Character Name: </label><br />
							  <input type="text" name="ign" id="ingamename" style="color: black;"><br /><br />
							  <label for="alts">Alternate Characters: </label><br />
							  <input type="text" name="alts" id="alts" style="color: black;"><br /><br />
							  <label for="scamtype">What did they scam you for: </label><br />
							  <select id="scamtype" name="scamtype" style="color: black;">
								  <option value="nx">NX</option>
								  <option value="gold">Gold</option>
							  </select><br /><br />
							  <label for="amtlst">Amount Lost: </label><br />
							  <input type="text" name="lost" id="amtlost" style="color: black;"><br /><br />
							  <label for="server">What server are they on: </label><br />
							  <select id="server" name="server" style="color: black;">
								  <option value="useast">US-East</option>
								  <option value="uswest">US-West</option>
								  <option value="aus">AUS</option>
								  <option value="eu">EU</option>
								  <option value="kor">KOR</option>
							  </select><br /><br />
							  <label for="screenshots">Screenshot Links (Comma Seperated): </label><br />
							  <input type="text" name="screenshots" id="screenshots" style="color: black;"><br /><br />
							  <div class="g-recaptcha" data-sitekey="6LePfQkTAAAAAERboJW1pf8Kq_Sv-oIw1S2KHT22"></div>
							  <br />
							  <button type='button' style="color: black;" onclick="submitScammer(document.getElementById('ingamename').value, document.getElementById('alts').value, document.getElementById('scamtype').value, document.getElementById('amtlost').value, document.getElementById('server').value, document.getElementById('screenshots').value)">Submit Scammer</button>
							  <br /><br />
						</form>
				</div>
			</div>
		</div>
	</div>


	<footer class="site-footer container text-center">
		<div class="row">
			<div class="col-md-12">
				<div class="main-footer">
					<ul class="social">
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 copyright">
				<p>Copyright &copy; 2015 <a href="http://vindictusforums.com">VindictusForums</a> & <a href="http://vindictusscamdb.com">VindictusScamDB</a></p>
			</div>
		</div>
	</footer>
	<!-- templatemo 421 raleway -->
	<span class="border-top"></span>
	<span class="border-left"></span>
	<span class="border-right"></span>
	<span class="border-bottom"></span>
	<span class="shape-1"></span>
	<span class="shape-2"></span>

	<script src="js/jquery.min.js"></script>
	<script src="js/templatemo_custom.js"></script>
</body>
</html>