<?php include('config.php'); ?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo $_SITE['title']; ?></title>
		<meta charset="utf-8" />
		<meta name="description" content="<?php echo $_SITE['description']; ?>">
		<meta name="keywords" content="<?php echo $_SITE['keywords']; ?>">
		<meta name="author" content="<?php echo $_SITE['author']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
		<link type="text/css" rel="stylesheet" href="assets/css/datatables.css" title="Datatables Styles" />
		<link href="assets/css/featherlight.min.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
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
			} );
		</script>
		<script type="text/javascript" language="javascript">
		$('a.gallery').featherlightGallery({
			openSpeed: 300
			previousIcon: '&#9664;',     /* Code that is used as previous icon */
			nextIcon: '&#9654;',         /* Code that is used as next icon */
			galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
			galleryFadeOut: 300          /* fadeOut speed before slide is loaded */
			openSpeed: 300
		});
		</script>
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
				xmlhttp.open("GET","submit.php?ign="+ign+"&alts="+alts+"&scmtyp="+scmtyp+"&scamamt="+amtlst+"&server="+server+"&sslinks="+sslink+"&charnm="+charnm+"&notes="+notes+"&skype="+skype,true);
				xmlhttp.send(); 
			}
		</script>
	</head>
	<body>
	<?php echo $_GOOGLE['analytics']; ?>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="<?php echo $_SITE['url']; ?>"><?php echo $_SITE['title']; ?></a></h1>
					<nav id="nav">
						<ul>
							<?php
								foreach ($_MENU as $key => $value)
								{
									echo '<li><a href="'.$value.'">'.$key.'</a></li>';
								}
							?>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header class="major">
							<h2>Welcome to Vindictus Scam DB!</h2>
							<p>Vindictus Scam DB is a free service dedicated to eradicating NX & Gold Scammers from Vindictus.</p>
							<p>Please note that this service is still in beta so there will be bugs or incomplete information.</p>
							<p>Feel free to check out our <a href="https://github.com/Gigawiz/VindictusScamDB" target="_blank">Github</a> page to see new changes to the script!</p>
							<p>Due to a change in Nexon America's Code of Conduct, Trusted Players will no longer be publicly listed, and the Beta version is now closed to the public.</p>
						</header>
						<?php get_ad_spot("header"); ?>
					</div>
					<a href="#scammers" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="scammers" class="wrapper style1 special fade-up">
					<div class="container">
						<div class="box alt">
							<div class="table-wrapper">
								<table id="scammer-grid"  cellpadding="0" cellspacing="0" border="0" width="100%"  class="table table-bordered sortable display">
										<thead>
											<tr>
												<th>ID</th>
												<th>Character Name</th>
												<th>Alternate Characters</th>
												<th>Amount Scammed</th>
												<th>Violation</th>
												<th>Server</th>
												<th>Reporting Group</th>
												<th>Status</th>
												<th>Screenshots</th>
												<th>Notes</th>
											</tr>
										</thead>
								</table>
							</div>
						</div>
					</div>
					<?php get_ad_spot("under_table"); ?>
				</section>

			<!-- Two -->
				<section id="report" class="wrapper style1">
					<div class="container">
						<div class="box alt">
						<h3>Report a Player</h3>
							<form>
								<div class="row uniform 50%">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="ign" id="ingamename" placeholder="Character Name" />
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="alts" id="alts" placeholder="Alternate Characters (comma seperated)"/>
									</div>
									<div class="6u 12u$(xsmall)">
										<input type="text" name="lost" id="amtlost" placeholder="Amount/value of items lost to scammer"/>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="screenshots" id="screenshots" placeholder="Screenshot Link (comma seperated if using multiple)"/>
									</div>
									<div class="6u 12u(xsmall)">
										<input type="text" name="submittedby" id="submittedby" placeholder="Your Character name"/>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="skype" id="skype" placeholder="Scammer's Skype Nickname (if known)"/>
									</div>
									<div class="6u 12u$(xsmall)">
										<div class="select-wrapper">
											<select name="scamtype" id="scamtype">
												<option value="Scamming">Scammed NX, Gold or in-game item(s)</option>
												<option value="Hacking">Hacked Account</option>
												<option value="Mailbox Trolling">Mailbox Trolling</option>
												<option value="Player Harassment">Player Harassment</option>
												<option value="Trusted Player">Trusted Player</option>
											</select>
										</div>
									</div>
									<div class="6u$ 12u$(xsmall)">
										<div class="select-wrapper">
											<select name="server" id="server">
												<option value="US-East">US-East</option>
												<option value="US-West">US-West</option>
												<option value="AUS">AUS</option>
												<option value="EU">EU</option>
												<option value="KOR">KOR</option>
											</select>
										</div>
									</div>
									<div class="12u$">
										<textarea name="notes" id="notes" placeholder="Enter your story of how you were scammed or any notes here." rows="6"></textarea>
									</div>
									<div class="12u$">
										<ul class="actions">
										 <a class="button special" data-featherlight="<p id='reportstatus' style='color: black;'></p>" style="color:black;" onclick="submitScammer(document.getElementById('ingamename').value, document.getElementById('alts').value, document.getElementById('scamtype').value, document.getElementById('amtlost').value, document.getElementById('server').value, document.getElementById('screenshots').value, document.getElementById('submittedby').value, document.getElementById('notes').value, document.getElementById('skype').value)">Submit Scammer</a>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php get_ad_spot("under_submit"); ?>
				</section>

			<!-- Three -->
				<section id="trusted" class="wrapper style1">
					<div class="container">
						<div class="box alt">
						<h2>Trusted Players</h2>
						<p>Recently, it has been brought to my attention that Nexon America now considers selling/trading NX in game to be a bannable offense. As seen in their code of conduct, "You will not exploit our games or interactive services for any commercial purpose, including selling of accounts, NX or in-game items, the provision of "power leveling" services, etc.". In light of this new discovery, the "Trusted Players" list has been removed from public view. When v2 is released, members of the site may request access to this information, however until then, the information will no longer be available on this site.</p>
						</div>
					</div>
					<?php get_ad_spot("under_trusted"); ?>
				</section>

			<!-- Four -->
				<section id="faq" class="wrapper style1">
					<div class="container">
						<div class="box alt">
						<h2>FAQ</h2>
						<?php
							foreach ($_FAQ as $key => $value)
							{
								echo '<h3>'.$key.'</h3>';
								echo '<p>'.$value.'</p>';
							}
						?>
							</div>
						</div>
						<?php get_ad_spot("under_faq"); ?>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://www.facebook.com/VindictusSDB" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://twitter.com/VindictusScamDB" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://github.com/Gigawiz/VindictusScamDB" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
					</ul>
					<?php get_ad_spot("footer"); ?>
					<ul class="copyright">
						<li>Copyright &copy; 2015-2016 <a href="http://vindictusscamdb.com">Vindictus Scam DB</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="//cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="//cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>