<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="excanvas.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="/js/libs/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.jqplot.css" />

<div class="clear" style="height:15px;"></div>

<div class="grid_12">
<div class="box">
<div id="chart"></div>
</div>
</div>

<div class="clear"></div>
<div class="grid_4">
<div class="box">
<h2>Types</h2>
<table style="margin-top:10px;">
<thead>
<tr>
	<th>type</th>
	<th>flights</th>
	<th>duration</th>
</tr>
</thead>
<tbody>
<?php
foreach($stats['Flighttypes'] as $title => $stat)
{
	echo '<tr>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$stat['numbers'].'</td>';
	echo '<td>';
	
	$hours = floor($stat['duration']/60);
	$minutes =  $stat['duration']%60;
	echo $hours.'h '.$minutes.'m';
	
	echo '</td>';
	echo '</tr>';
}
?>
</tbody>
</table>
</div>
</div>

<div class="grid_4">
<div class="box">
<h2>Gliders</h2>
<h3 style="font-size:13px;margin-top:10px;">Types</h3>
<table style="margin-top:10px;">
<thead>
<tr>
	<th>type</th>
	<th>flights</th>
	<th>duration</th>
</tr>
</thead>
<tbody>
<?php
foreach($stats['Glidertypes'] as $title => $stat)
{
	echo '<tr>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$stat['numbers'].'</td>';
	echo '<td>';
	
	$hours = floor($stat['duration']/60);
	$minutes =  $stat['duration']%60;
	echo $hours.'h '.$minutes.'m';
	
	echo '</td>';
	echo '</tr>';
}
?>
</tbody>
</table>

<h3 style="font-size:13px;">Gliders</h3>
<table style="margin-top:10px;">
<thead>
<tr>
	<th>type</th>
	<th>flights</th>
	<th>duration</th>
</tr>
</thead>
<tbody>
<?php
foreach($stats['Gliders'] as $title => $stat)
{
	echo '<tr>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$stat['numbers'].'</td>';
	echo '<td>';
	
	$hours = floor($stat['duration']/60);
	$minutes =  $stat['duration']%60;
	echo $hours.'h '.$minutes.'m';
	
	echo '</td>';
	echo '</tr>';
}
?>
</tbody>
</table>
</div>
</div>

<div class="grid_4">
<div class="box">
<h2>Locations</h2>
<table style="margin-top:10px;">
<thead>
<tr>
	<th>type</th>
	<th>flights</th>
	<th>duration</th>
</tr>
</thead>
<tbody>
<?php
foreach($stats['Locations'] as $title => $stat)
{
	echo '<tr>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$stat['numbers'].'</td>';
	echo '<td>';
	
	$hours = floor($stat['duration']/60);
	$minutes =  $stat['duration']%60;
	echo $hours.'h '.$minutes.'m';
	
	echo '</td>';
	echo '</tr>';
}
?>
</tbody>
</table>
</div>
</div>

<script type="text/javascript">

$.jqplot('chart',  
[
	[
		[0,0],
		<?php
		$i = 0;
		foreach($stats['Months'] as $title => $stat)
		{	$i++;
			echo '['.$i.','.$stat['duration'].']';
			if($i!=count($stats['Months']))
			{
			echo ',';
			}
		}
		
		?>
	],
	[
		[0,0],
		[1,10]
	]
]
, 
 {
   series:[{color:'#5f5'},{color:'#55f'}]
 });

</script>