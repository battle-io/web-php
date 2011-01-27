<?php
echo View::factory('common/header')
        ->set('title',$bot->name.' Bot')
        ->set('nosidebar',1)
        ->set('rgraph',1);
        
?>
<div id="botprofilepage">
<h3>Bot Profile for <?php echo html::chars($bot->name)?></h3>


<script>
    window.onload = function ()
    {
        var line1 = new RGraph.Line('perfchart', [20,25,13,14,16,18,21,32,12,15], [23,25,26,28,29,21,22,25,26,28]);
        line1.Set('chart.title', 'Bot Performance Chart');
        line1.Set('chart.colors', ['red', 'green']);
        line1.Set('chart.tickmarks', ['circle', 'square']);
        line1.Set('chart.linewidth', 1);
        line1.Set('chart.background.barcolor1', 'white');
        line1.Set('chart.background.barcolor2', 'white');
        line1.Set('chart.background.grid.autofit', true);
        line1.Set('chart.filled', 'true');
        line1.Set('chart.fillstyle', ['#fcc', '#cfc']);
        line1.Set('chart.tooltips', ['id:tooltip_00', 'id:tooltip_01', 'id:tooltip_02', 'id:tooltip_03', 'id:tooltip_04', 'id:tooltip_05', 'id:tooltip_06', 'id:tooltip_07', 'id:tooltip_08', 'id:tooltip_09', 'id:tooltip_10',
                                 	'id:tooltip_11', 'id:tooltip_12', 'id:tooltip_13', 'id:tooltip_14', 'id:tooltip_15', 'id:tooltip_16',
                                 	'id:tooltip_17', 'id:tooltip_18', 'id:tooltip_19']);
		line1.Set('chart.tooltips.effect', 'contract');

        if (!RGraph.isIE8()) {
            line1.Set('chart.contextmenu', [['Zoom in', RGraph.Zoom], ['Cancel', function () {}]]);
            line1.Set('chart.zoom.delay', 10);
            line1.Set('chart.zoom.frames', 25);
            line1.Set('chart.zoom.vdir', 'center');
        }

        line1.Set('chart.text.angle', 45);
        line1.Set('chart.gutter', 45);
        line1.Set('chart.units.post', '%');
        line1.Set('chart.labels.ingraph', [7,'Win against Xbot (104)']);
        line1.Set('chart.noaxes', true);
        line1.Set('chart.background.grid', true);
        line1.Set('chart.yaxispos', 'right');
        line1.Set('chart.ymax', 100);
        line1.Set('chart.title.xaxis', 'Games Played');
        line1.Set('chart.title.yaxis', 'Rating');
        line1.Set('chart.title.xaxis.pos', 0.5);
        line1.Set('chart.title.yaxis.pos', 0.5);
        line1.Draw();
    }
</script>
<!-- These are the tooltips for the Performance. --> 
    <div style="display: none"> 
    	<div id="tooltip_00"><b>Win</b><br /><a href="#"><a href="#">Game ID#12340</a></div> 
        <div id="tooltip_01"><b>Win</b><br /><a href="#"><a href="#">Game ID#12341</a></div> 
		<div id="tooltip_02"><b>Loss</b><br /><a href="#">Game ID#12342</a></div> 
		<div id="tooltip_03"><b>Win</b><br /><a href="#">Game ID#12343</a></div> 
		<div id="tooltip_04"><b>Win</b><br /><a href="#">Game ID#12344</a></div> 
		<div id="tooltip_05"><b>Loss</b><br /><a href="#">Game ID#12345</a></div> 
		<div id="tooltip_06"><b>Win</b><br /><a href="#">Game ID#12346</a></div> 
		<div id="tooltip_07"><b>Win</b><br /><a href="#">Game ID#12347</a></div> 
		<div id="tooltip_08"><b>Loss</b><br /><a href="#">Game ID#12348</a></div> 
		<div id="tooltip_09"><b>Win</b><br /><a href="#">Game ID#12349</a></div> 
		<div id="tooltip_10"><b>Win</b><br /><a href="#">Game ID#12350</a></div> 
		<div id="tooltip_11"><b>Win</b><br /><a href="#">Game ID#12351</a></div> 
		<div id="tooltip_12"><b>Win</b><br /><a href="#">Game ID#12352</a></div> 
		<div id="tooltip_13"><b>Win</b><br /><a href="#">Game ID#12353</a></div> 
		<div id="tooltip_14"><b>Win</b><br /><a href="#">Game ID#12354</a></div> 
		<div id="tooltip_15"><b>Loss</b><br /><a href="#">Game ID#12355</a></div> 
		<div id="tooltip_16"><b>Win</b><br /><a href="#">Game ID#12356</a></div> 
		<div id="tooltip_17"><b>Win</b><br /><a href="#">Game ID#12357</a></div> 
		<div id="tooltip_18"><b>Win</b><br /><a href="#">Game ID#12358</a></div> 
		<div id="tooltip_19"><b>Win</b><br /><a href="#">Game ID#12359</a></div>  
    </div> 

<div class="yui-gd">

<div id="botinfo" class="yui-gd first">
	<div class="yui-u first leftinfo">
		Bot Name:<br />
		Author:<br />
		Challenge:<br />
		Coding Lanuage:<br />
		Created on:<br />
		Last online:<br/>
		Author's Notes:<br />
	</div>
	<div class="yui-u rightinfo" >
		<?php echo html::chars($bot->name)?><br />
		<?php echo html::anchor($bot->user->uri(),$bot->user->name()); ?><br />
		$challenge<br />
		$language<br />
		$created_date<br />
		$last_login<br />
		$author_notes<br />
	</div>
</div>

<div id="chart" class="yui-u">
<canvas id="perfchart" width="600" height="250">Performance chart here.</canvas>
</div>

</div>
<ul>
<?php
	echo '<li>server ',html::anchor($bot->server->uri(),$bot->server->name),'</li>';
?>
</ul>

<?php if(isset($stats)) { ?>
<h3>Last <?php echo count($stats),
  ' ',
  ucfirst(Inflector::singular('games',count($stats)));
 ?> of <?php echo $game_count ?></h3>
<ol class="stats">
<?php
  foreach($stats as $game) {
    echo '<li>',$game->DatePlayed,' ',
      html::anchor($game->bot1->uri(),$game->bot1->name),', ',
      html::anchor($game->bot2->uri(),$game->bot2->name),', ',
      html::anchor($game->bot3->uri(),$game->bot3->name),', ',
      html::anchor($game->bot4->uri(),$game->bot4->name),
      ' Winner: ',
      html::anchor($game->winner->uri(),$game->winner->name),' ',
      '<span>Show History</span>',
      '<div class="history">',
      '<pre>',$game->GameHistory,'</pre>',
      '</div>',
      '</li>';
  }
?>
</ol>
<?php } ?>


<?php
if(isset($posted)) {
	if($posted) {
		'<h3>Thanks for your comment</h3>';
	}
	else {
		echo '<h3>Thanks for your comment it has gone into the moderation queue</h3>';
	}
}
echo View::factory('common/comments')
	->set('type','bot')
	->set('title',$bot->name)
	->set('parent_id',$bot->id)
	->bind('comments',$comments);
?>
</div>

<?php
echo View::factory('common/footer')
  ->set('scripts',array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js',
    'scripts/bot.js',
    'scripts/rgraph/RGraph.common.core.js',	
	'scripts/rgraph/RGraph.common.context.js',	
	'scripts/rgraph/RGraph.common.annotate.js',	
	'scripts/rgraph/RGraph.common.tooltips.js',	
	'scripts/rgraph/RGraph.common.zoom.js',	
	'scripts/rgraph/RGraph.common.resizing.js',	
	'scripts/rgraph/RGraph.line.js'
  ));
//echo View::factory('profiler/stats');
?>