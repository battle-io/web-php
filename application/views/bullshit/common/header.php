<!DOCTYPE HTML>
<html>
  <head>
    <title>
      <?= $title ?>
    </title>
    <?php
	    $style = array
	    (
	    'css/bscss.css'
	    );
	    if(isset($css)) {
		    $style = array_merge($style,$css);
	    }
	    foreach($style as $sheet) {
		    echo html::style($sheet);
	    }
    ?>
    <script>
			onload = function(){
			  // make sure that the columns are the same height.
				var a = document.getElementById("contentPane");
				var b = document.getElementById("sidebar");
				var nh = Math.max(parseInt(a.offsetHeight), parseInt(a.clientHeight));
				var ch = Math.max(parseInt(b.offsetHeight), parseInt(b.clientHeight))
				if(nh > ch){
  				document.getElementById("menu_last").style.height = (nh-ch)+"px";
				}
			}
		</script>
  </head>
  <body>
    <div id="bigContainer">
      <div id="container">
        <div class="leftSidebar" id="sidebar">
          <ul class="menu">
            <li>
              <h2>
                <a href="/">
                  CodeWars.com
                </a>
              </h2>
            </li>
            <li class="link<?= ($title == "Bullshit Home" ? " active" : "") ?>">
              <a href="/bullshit/">
                Home
              </a>
            </li>
            <li class="link<?= ($title == "Bullshit Wrappers" ? " active" : "") ?>">
              <a href="/bullshit/wrappers/">
                Code Wrappers
              </a>
            </li>
            <li class="link">
              Scoreboard
            </li>
            <li class="link">
              Recent Games
            </li>
            <li id="menu_last">
            </li>
          </ul>
        </div>
        <div class="content" id="contentPane">
