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
    xmlhttp.open("GET","api.php?q=2&usr="+ign+"&alts="+alts+"&scmtyp="+scmtyp+"&scamamt="+amtlst+"&server="+server+"&sslinks="+sslink+"&charnm="+charnm+"&notes="+notes+"&skype="+skype,true);
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
	<script type="text/javascript" src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/featherlight.min.css" title="Featherlight Styles" />
			<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#scammer-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"scammer-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".scammer-grid-error").html("");
							$("#scammer-grid").append('<tbody class="scammer-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#scammer-grid_processing").css("display","none");
							
						}
					}
				} );
			} 
			);
		</script>
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
						<a href="http://vindictusscamdb.com"><h1>Vindictus Scam DB</h1></a>
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
							<li><a class="show-4 blogbutton" href="#">Trusted Players</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Player</a></li>
							<li><a class="show-2 aboutbutton" href="#">FAQ</a></li>
						</ul>
					</nav>
					<nav class="main-navigation menu-responsive hidden-md hidden-lg">
						<ul class="main-menu">
							<li><a class="show-1 active homebutton" href="#">Home</a></li>
							<li><a class="show-3 projectbutton" href="#">Scammers</a></li>
							<li><a class="show-4 blogbutton" href="#">Trusted Players</a></li>
							<li><a class="show-5 contactbutton" href="#">Report a Player</a></li>
							<li><a class="show-2 aboutbutton" href="#">FAQ</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<p class="welcome-title animated fadeInRight text-center"><div id="randomPostAd" align="center"></div></p>
		</div>
	</header>

	
	<div id="menu-container">
		<div id="menu-1" class="homepage home-section container">
			<div class="home-intro text-center">
				<h2 class="welcome-title animated fadeInLeft">Welcome to Vindictus Scam DB!</h2>
				<p class="animated fadeInRight">Vindictus Scam DB is a free service dedicated to eradicating NX & Gold Scammers from Vindictus. <br />Please note that this service is still in beta so there will be bugs or incomplete information.</p>
				<p class="animated fadeInLeft">Feel free to check out our <a href="https://github.com/Gigawiz/VindictusScamDB" target="_blank">Github</a> page to see new changes to the script!</p>
				<p class="animated fadeInRight">Due to a change in Nexon America's Code of Conduct, Trusted Players will no longer be publicly listed, and the Beta version is now closed to the public.</p>
				<ul class="list-icons animated fadeInUp">
					<li><i class="icon-screen-tablet"></i></li>
					<li><i class="icon-screen-desktop"></i></li>
					<li><i class="icon-globe"></i></li>
					<li><i class="icon-shield"></i></li>
				</ul>
			</div>
		</div>

		<div id="menu-2" class="content about-section container">
			<div class="projects-header">
				<h2 class="animated fadeInRight">Frequently Asked Questions</h2>
				<p class="animated fadeInLeft"></p>
			</div>
			<div class="projects-holder">
				<div class="row">
					<!-- scammers main content-->
							<h2>About Us</h2>
							<p>Vindictus Scam DB is a free service provided by Vindictus Forums and The GodsOfLove guild to help prevent Vindictus Players from losing their gold or nx to known scammers in game, while ensuring that legitimate Sellers and Buyers can do business safely</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>Contacting Us</h2>
							<p>Have a problem with the site? Is your name in the scammer's list, but shouldnt be? Contact G1ga, Gigawiz or HarmfulMonk in game!</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>Can I be banned for selling or buying NX with gold?</h2>
							<p>Yes, according to Nexon America's new TOS, "You will not exploit our games or interactive services for any commercial purpose, including selling of accounts, NX or in-game items, the provision of "power leveling" services, etc.". So according to nexon, trading NX for gold is now a bannable offense.</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>What happens if I get scammed?</h2>
							<p>The first thing you should do is take screenshots for proof and report the player to Nexon. After you have reported them to Nexon, you should submit the player (and proof of scam) to us. If we confirm your claim, the offender will be added to the database.</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>Does VindictusScamDB or Nexon cover losses in the event of a scam?</h2>
							<p>Currently, neither Vindictus Scam DB or Nexon cover losses for being scammed. There are plans for an "insurance" run by Vindictus Scam DB, however nothing has been put into action yet.</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>What happens if a player I am doing business with is not in the database?</h2>
							<p>If the player you are conducting business with is not in the database, it simply means this person has not been reported as trusted or a scammer. Please use caution when dealing with these players. If you successfully conduct a transaction with said player, please add them to the Database by clicking the "Report a player" tab, include any proof of a successful transaction and they will be added to the appropriate list.</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>How do I conduct a sale?</h2>
							<p>Generally speaking, when you and your buyer/seller come to a pricing arrangement, the seller will COD the buyer for the amount agreed upon. When the buyer has paid the COD, the Seller sends the code to the buyer either via Mailbox, Whisper or on another Instant Messaging Service (such as skype, facebook, etc). The Item being COD'd does not need to be of high value as it is only a placeholder.</p>
				</div>
				<div class="row">
					<!-- scammers main content-->
							<h2>Average NX Pricing</h2>
							The Average Selling Price for NX is as follows:<br>
							<table>
								<tr>
									<th>Amount Of NX</th>
									<th>Value in Gold</th>
								</tr>
								<tr>
									<td>10k NX</td>
									<td>30-50 million</td>
								</tr>
								<tr>
									<td>25k NX</td>
									<td>60-80 Million</td>
							</table>
							<br>
							Please note that these are only guidelines, NX sellers are encouraged to follow them, however are entitled to name their own pricing.
				</div>
			</div>
			<br /><br />
		</div>

		<div id="menu-3" class="content project-section container">
			<div class="projects-header">
				<h2 class="animated fadeInRight">Vindictus Scammer List</h2>
				<p class="animated fadeInLeft">Here is a list of all known Vindictus scammers, their alts, servers they play on, overall amount scammed, type of scam and screenshots of admissions or characters.</p>
				<p class="animated fadeInRight">We currently have <?php echo file_get_contents("http://vindictusscamdb.com/api.php?q=1&statType=scammers"); ?> known scammers in our database, <?php echo file_get_contents("http://vindictusscamdb.com/api.php?q=1&statType=queue"); ?> of which are Under Investigation</p>
			</div>
			<div class="projects-holder">
				<div class="row">
					<!-- scammers main content-->
					<div class="block"> 
							<table id="scammer-grid"  cellpadding="0" cellspacing="0" border="0" width="100%"  class="table table-bordered sortable display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Character Name</th>
											<th>Alternate Characters</th>
											<th>Amount Scammed</th>
											<th>Violation</th>
											<th>Server</th>
											<th>Status</th>
											<th>Screenshots</th>
											<th>Notes</th>
										</tr>
									</thead>
							</table>
					</div> 
				</div>
			</div>
		</div>

		<div id="menu-4" class="content blog-section container">
			<div class="blog-header text-center">
				<h2 class="animated fadeInRight">Trusted Players</h2>
			</div>
			<div class="row blog-posts">
				<p>Recently, it has been brought to my attention that Nexon America now considers selling/trading NX in game to be a bannable offense. As seen in their code of conduct, "You will not exploit our games or interactive services for any commercial purpose, including selling of accounts, NX or in-game items, the provision of "power leveling" services, etc.". In light of this new discovery, the "Trusted Players" list has been removed from public view. When v2 is released, members of the site may request access to this information, however until then, the information will no longer be available on this site.</p>
			</div>
		</div>

		<div id="menu-5" class="content contact-section container">
			<div class="contact-header text-center">
				<h2 class="animated fadeInLeft">Report a Player</h2>
				<p class="animated fadeInRight">Get Scammed by someone or know of someone scamming? Did you successfully complete a transaction with a player not in our Database? Report it to us!</p>
			</div>
			<div class="contact-holder">
				<div class="row animated fadeInLeft" align="center">
						<form>
							<br />
							  <label for="ingamename">Character Name: </label><br />
							  <input type="text" name="ign" id="ingamename" style="color: black;" data-toggle="tooltip" title="The character of the person who scammed you goes here"><br /><br />
							  <label for="alts">Alternate Characters: </label><br />
							  <input type="text" name="alts" id="alts" style="color: black;" data-toggle="tooltip" title="The Scammer's Alternate Characters go here"><br /><br />
							  <label for="scamtype">What did they scam you for: </label><br />
							  <select id="scamtype" name="scamtype" style="color: black;" <!--onchange="showSubmitForm()"-->>
								  <option value="Scamming">Scammed NX, Gold or in-game item(s)</option>
								  <option value="Hacking">Hacked Account</option>
								  <option value="Mailbox Trolling">Mailbox Trolling</option>
								  <option value="Trusted Player">Trusted Player</option>
							  </select><br /><br />
							  <label for="amtlst">Amount Lost: </label><br />
							  <input type="text" name="lost" id="amtlost" style="color: black;" data-toggle="tooltip" title="ex: 20k NX - 20m Gold (leave blank if unknown amount)!"><br /><br />
							  <label for="server">What server are they on: </label><br />
							  <select id="server" name="server" style="color: black;">
								  <option value="US-East">US-East</option>
								  <option value="US-West">US-West</option>
								  <option value="AUS">AUS</option>
								  <option value="EU">EU</option>
								  <option value="KOR">KOR</option>
							  </select><br /><br />
							  <label for="screenshots">Screenshot Link (comma seperated if using multiple): </label><br />
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
						<li><a href="http://vindictusforums.com" target="_blank">Vindictus Forums</a></li>
					</ul>
					<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- vsdb_footer_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2670149076203231"
     data-ad-slot="6378730551"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 copyright">
				<p>Copyright &copy; 2015 <a href="http://vindictusforums.com">Vindictus Forums</a> & <a href="http://vindictusscamdb.com">Vindictus Scam DB</a></p>
			</div>
		</div>
	</footer>
	<script src="js/templatemo_custom.js"></script>
	<script src="js/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>