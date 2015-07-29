<!doctype html>
<html lang="en">
<head>
<script type="text/javascript">
function submitScammer(ign, alts, scmtyp, amtlst, server, sslink, charnm, notes, skype)
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
    xmlhttp.open("GET","submitscammer.php?usr="+ign+"&alts="+alts+"&scmtyp="+scmtyp+"&scamamt="+amtlst+"&server="+server+"&sslinks="+sslink+"&charnm="+charnm+"&notes="+notes+"&skype="+skype,true);
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
        xmlhttp.open("GET","livesearch.php",true);
        xmlhttp.send();
}
function showVerifiedSellers() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("verifiedsellersgrid").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","verifiedsellers.php",true);
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
	<link type="text/css" rel="stylesheet" href="css/featherlight.min.css" title="Featherlight Styles" />
	<link type="text/css" rel="stylesheet" href="css/featherlight.gallery.min.css" title="Featherlight Styles" />
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65133317-1', 'auto');
  ga('send', 'pageview');

</script>
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
							<li><a class="show-3 projectbutton" href="#" onclick="showAllUsers();">Scammers</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Scammer</a></li>
							<li><a class="show-4 blogbutton" href="#" onclick="showVerifiedSellers();">Verified Sellers</a></li>
							<li><a class="show-2 aboutbutton" href="#">About Us</a></li>
						</ul>
					</nav>
					<nav class="main-navigation menu-responsive hidden-md hidden-lg">
						<ul class="main-menu">
							<li><a class="show-1 active homebutton" href="#">Home</a></li>
							<li><a class="show-3 projectbutton" href="#" onclick="showAllUsers();">Scammers</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Scammer</a></li>
							<li><a class="show-4 blogbutton" href="#" onclick="showVerifiedSellers();">Verified Sellers</a></li>
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
				<p class="animated fadeInLeft">Feel free to check out our <a href="https://github.com/Gigawiz/VindictusScamDB" target="_blank">Github</a> page to see new changes to the script!</p>
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
						<br /><br />
						<div align="center">NX Scamming = Recieved NX but did not pay gold./Gold Scammimg = Recieved Gold but did not pay NX./Hacker = Hacked Accounts</div>
					</form>
				</div>
			</div>
		</div>

		<div id="menu-4" class="content blog-section container">
			<div class="blog-header text-center">
				<h2 class="animated fadeInRight">Buying/Selling Gold or NX with Vindictus Scam DB</h2>
				<p class="animated fadeInLeft">Currently our representatives can trade in-game gold for NX. You can contact the following people for transactions like this:</p>
			</div>
			<div class="row blog-posts">
				<div id="verifiedsellersgrid"></div>
						<br /><br />
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
							<br />
							  <label for="ingamename">Character Name: </label><br />
							  <input type="text" name="ign" id="ingamename" style="color: black;"><br /><br />
							  <label for="alts">Alternate Characters: </label><br />
							  <input type="text" name="alts" id="alts" style="color: black;"><br /><br />
							  <label for="scamtype">What did they scam you for: </label><br />
							  <select id="scamtype" name="scamtype" style="color: black;">
								  <option value="NX Scamming">Scammed NX</option>
								  <option value="Gold Scamming">Scammed Gold</option>
								  <option value="Item Scamming">Scammed Items</option>
								  <option value="Hacking">Hacked Account</option>
							  </select><br /><br />
							  <label for="amtlst">Amount Lost (ex: 20k NX - 20m Gold): </label><br />
							  <input type="text" name="lost" id="amtlost" style="color: black;"><br /><br />
							  <label for="server">What server are they on: </label><br />
							  <select id="server" name="server" style="color: black;">
								  <option value="US-East">US-East</option>
								  <option value="US-West">US-West</option>
								  <option value="AUS">AUS</option>
								  <option value="EU">EU</option>
								  <option value="KOR">KOR</option>
							  </select><br /><br />
							  <label for="screenshots">Screenshot Link (Only One is Allowed at the moment): </label><br />
							  <input type="text" name="screenshots" id="screenshots" style="color: black;"><br /><br />
							  <label for="submittedby">Your Character name:</label><br />
							  <input type="text" name="submittedby" id="submittedby" style="color: black;"><br /><br />
							  <label for="notes">Notes:</label><br />
							  <textarea rows="4" cols="50" name="notes" id="notes" style="color: black;">Enter your story of how you were scammed or any notes here.</textarea>
							  <br /><br />
							  <label for="skype">Scammer's Skype Nickname (if known):</label><br />
							  <input type="text" name="skype" id="skype" style="color: black;"><br /><br />

							  <a class="btn btn-default" href="#" data-featherlight="<p id='reportstatus' style='color: black;'></p>" style="color:black;" onclick="submitScammer(document.getElementById('ingamename').value, document.getElementById('alts').value, document.getElementById('scamtype').value, document.getElementById('amtlost').value, document.getElementById('server').value, document.getElementById('screenshots').value, document.getElementById('submittedby').value, document.getElementById('notes').value, document.getElementById('skype').value)">Submit Scammer</a>
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
						<li><a href="https://www.facebook.com/VindictusSDB" target="_blank">Facebook</a></li>
						<li><a href="https://twitter.com/VindictusScamDB" target="_blank">Twitter</a></li>
						<li><a href="http://vindictusforums.com" target="_blank">VindictusForums</a></li>
						<li><a href="http://webmaster1.com" target="_blank">Webmaster1 Network</a></li> 
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

	<script src="js/jquery.min.js"></script>
	<script src="js/templatemo_custom.js"></script>
	<script src="js/jquery-1.7.0.min.js"></script>
	<script src="js/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>

		<script>
			$(document).ready(function(){
				$('.gallery').featherlightGallery({
					gallery: {
						fadeIn: 300,
						fadeOut: 300
					},
					openSpeed:    300,
					closeSpeed:   300
				});
				$('.gallery2').featherlightGallery({
					gallery: {
						next: 'next »',
						previous: '« previous'
					},
					variant: 'featherlight-gallery2'
				});
			});
		</script>
</body>
</html>