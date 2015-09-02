<!DOCTYPE html>
<html lang=en> 
<head> 
<title>Vindictus Scam DB | Submit a Scammer</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="icon" type="image/ico" href="favicon.html"/> 
<link href="css/stylesheets.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/jquery-migrate.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/globalize.js"></script> 
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/plugins/uniform/jquery.uniform.min.js"></script> 
<script type="text/javascript" src="js/plugins/select2/select2.min.js"></script> 
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquery/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript" src="js/plugins/ibutton/jquery.ibutton.js"></script> 
<script type="text/javascript" src="js/plugins/validationengine/languages/jquery.validationEngine-en.js"></script> 
<script type="text/javascript" src="js/plugins/validationengine/jquery.validationEngine.js"></script> 
<script type="text/javascript" src="js/plugins/maskedinput/jquery.maskedinput.min.js"></script> 
<script type="text/javascript" src="js/plugins/stepy/jquery.stepy.min.js"></script> 
<script type="text/javascript" src="js/js.js"></script> 
</head> 
<body class=bg-img-num1> 
<div class=container> 
<div class=row> 
<div class=col-md-12> 
<?php echo file_get_contents("http://vindictusscamdb.com/completed/nav.php?active=submitscammer");
?>
<div class=row> <div class=col-md-12> <ol class=breadcrumb> <li><a href="index.php">Home</a></li> <li class="active">Submit a Scammer</li> </ol> </div> </div>
 <div class=row> 
 <div class=col-md-12> 
 <div class=block> 
 <div class=header> <h2>Submit a Scammer</h2> </div> 
 <div class="content controls"> 
 <form action="javascript:alert('Form #wizard_validate submited')" method=POST id=wizard_validate> 
 <fieldset title="Step 1"> 
 <legend>Scammer Info</legend> 
 <div class=form-row> 
 <div class=col-md-3>Scammer's Character Name:</div> 
 <div class=col-md-9> 
 <input type="text" name="scammernick" class="validate[required,minSize[4], maxSize[14]]"/> 
 <span class=help-inline>Required, minSize = 4, maxSize = 14</span> 
 </div> 
 </div> 
  
 <div class=form-row> 
 <div class=col-md-3>Alternate Characters (comma seperated):</div> 
 <div class=col-md-9> 
 <input type="text" name="altchrs" class=""/>
 <span class=help-inline>Not Required</span> 
 </div> 
 </div> 
 
 
 <div class=form-row> 
 <div class=col-md-3>Server:</div> 
 <div class=col-md-9> <select name=s_example class="validate[required] form-control"> <option value></option> <option value=1>US-East</option> <option value=2>US-West</option> <option value=3>AUS</option> <option value=3>KOR</option> <option value=3>EU</option></select> 
 <span class=help-inline>Required</span>
 </div> 
 </div> 
 
 <div class=form-row> 
 <div class=col-md-3>Offense:</div> 
 <div class=col-md-9> <select name=s_example class="validate[required] form-control"> <option value></option> <option value=1>Scamming</option> <option value=2>Hacking</option> <option value=3>Mailbox Trolling</option> </select> 
 <span class=help-inline>Required</span>
 </div> 
 </div> 
 
 <div class=form-row> 
 <div class=col-md-3>Amount Lost:</div> 
 <div class=col-md-9> 
 <input type="text" name="amtlst" class="validate[required]"/>
 <span class=help-inline>Required</span> 
 </div> 
 </div> 
 
 <div class=form-row> 
 <div class=col-md-3>Scammer's Skype Handle (if known):</div> 
 <div class=col-md-9> 
 <input type="text" name="skype" />
 <span class=help-inline>Not Required</span> 
 </div> 
 </div> 
 
 
 
 </fieldset> 
 
 <fieldset title="Step 2">
 <legend>Your Info</legend> 
 <div class=form-row> 
 <div class=col-md-3>Your Character Name (this info is never public):</div> 
 <div class=col-md-9> 
 <input type="text" name="scammernick" class="validate[required,minSize[4], maxSize[14]]"/> 
 <span class=help-inline>Required, minSize = 4, maxSize = 14</span> 
 </div> 
 </div> 
 </fieldset> 
 
   <fieldset title="Step 3">
 <legend>Screenshots</legend> 
  <div class=form-row> 
 <div class=col-md-3>Screenshot Link (comma seperated):</div> 
 <div class=col-md-9> 
<div class="input-group file"> <input type=text class="form-control"/> <input type=file name="file"/> <span class=input-group-btn> <button class=btn type=button>Browse</button> </span> </div>
 <span class=help-inline>Not Required</span> 
 </div> 
 </div> 
  </fieldset> 
 
  <fieldset title="Step 4">
 <legend>Notes</legend> 
 <div class=form-row>
 <div class=col-md-3>Any notes about the Scammer and/or Transaction:</div> 
 <div class=col-md-9> 
 <textarea name=about class=validate[minSize[5],maxSize[3000]]></textarea> 
 <span class=help-inline>Required, minSize = 5, maxSize = 3000</span> 
 </div> 
 </div> 
 </fieldset> 
 
 <button type=submit class="btn btn-primary finish">Submit</button> 
 </form> 
 </div>
 </div> 
 </div> 
 </div> 
 </div> 
 </body> 
 </html>