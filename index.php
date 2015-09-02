<!DOCTYPE html>
<html lang=en>
<head>
<title>Taurus</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=icon type="image/ico" href="favicon.html"/>
<link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/globalize.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/knob/jquery.knob.js"></script>
<script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body class="bg-img-num1">
<div class="container">
<?php echo file_get_contents("http://vindictusscamdb.com/completed/nav.php"); ?>
  <div class=row>
    <div class=col-md-5>
      <div class="block block-drop-shadow">
        <div class="head bg-default bg-light-ltr">
          <h2>Total sales</h2>
          <div class="head-panel nm">
            <div class=left_abs_100 style=margin-top:20px>
              <div class=knob>
                <input type=text data-fgColor=#FFFFFF data-min=0 data-max=200 data-width=100 data-height=100 value=155 data-readOnly="true"/>
              </div>
            </div>
            <div class=chart id=dash_chart_1 style=height:150px></div>
          </div>
          <div class="head-panel nm">
            <div class="hp-info pull-left">
              <div class=hp-icon> <span class=icon-thumbs-up-alt></span> </div>
              <span class=hp-main>155</span> <span class=hp-sm>Sales</span> </div>
            <div class="hp-info pull-left">
              <div class=hp-icon> <span class=icon-thumbs-down-alt></span> </div>
              <span class=hp-main>23</span> <span class=hp-sm>Cancelled</span> </div>
            <div class="hp-info pull-right">
              <div class=hp-icon> <span class=icon-usd></span> </div>
              <span class=hp-main>19,215.23</span> <span class=hp-sm>Total Income</span> </div>
          </div>
        </div>
        <div class="content list">
          <div class=list-title> Previous months </div>
          <div class=list-item>
            <div class=list-text> <strong>May 2013</strong>
              <div class="progress progress-small">
                <div class="progress-bar progress-bar-info" role=progressbar aria-valuenow=75 aria-valuemin=0 aria-valuemax=100 style=width:75%></div>
              </div>
            </div>
          </div>
          <div class=list-item>
            <div class=list-text> <strong>April 2013</strong>
              <div class="progress progress-small">
                <div class="progress-bar progress-bar-info" role=progressbar aria-valuenow=64 aria-valuemin=0 aria-valuemax=100 style=width:64%></div>
              </div>
            </div>
          </div>
          <div class=list-item>
            <div class=list-text> <strong>March 2013</strong>
              <div class="progress progress-small">
                <div class="progress-bar progress-bar-info" role=progressbar aria-valuenow=58 aria-valuemin=0 aria-valuemax=100 style=width:58%></div>
              </div>
            </div>
          </div>
          <div class=list-item>
            <div class=list-text> <strong>February 2013</strong>
              <div class="progress progress-small">
                <div class="progress-bar progress-bar-info" role=progressbar aria-valuenow=72 aria-valuemin=0 aria-valuemax=100 style=width:72%></div>
              </div>
            </div>
          </div>
          <div class=list-item>
            <div class=list-text> <strong>January 2013</strong>
              <div class="progress progress-small">
                <div class="progress-bar progress-bar-info" role=progressbar aria-valuenow=83 aria-valuemin=0 aria-valuemax=100 style=width:83%></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>