<div class="clear" style="height:15px;"></div>
<div class="grid_12">
<div class="box">
<h2>All flights</h2>

<table style="margin-top:10px;">
<thead>
<tr>
	<th>#</th>
	<th>date</th>
	<th>time</th>
	<th>duration</th>
	<th>glider</th>
	<th>type</th>
	<th>location</th>
	<th>notes</th>
	<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php
$flightindex = count($flights);

foreach($flights as $i => $flight)
{
	echo '<tr>';
		echo '<td>';
			echo '<strong>'.$flightindex.'</strong>';
		echo '</td>';
		echo '<td>';
			echo date('d-m-Y',strtotime($flight['Flight']['start']));
		echo '</td>';
		echo '<td>';
			echo date('H:i',strtotime($flight['Flight']['start']));
		echo '</td>';
		echo '<td>';
			$hours = floor($flight['Flight']['duration']/60);
			$minutes =  $flight['Flight']['duration']%60;
			echo $hours.'h '.$minutes.'m';
		echo '</td>';
		echo '<td>';
			echo $flight['Glider']['reg'].' - '.$flight['Glider']['type'];
		echo '</td>';
		echo '<td style="text-align:left;">';
			echo $html->image('icon/flighttype_'.Inflector::slug(strtolower($flight['Flighttype']['title'])).'.png',array('alt'=>$flight['Flighttype']['title'],'title'=>$flight['Flighttype']['title'],'style'=>'top:1px;'));
			echo ' '.$flight['Flighttype']['title'];
		echo '</td>';
		echo '<td>';
			echo $flight['Location']['title'];
		echo '</td>';
		echo '<td style="width:300px;">';
			echo $flight['Flight']['notes'];
		echo '</td>';
		
		echo '<td style="text-align:right;">';
			echo $html->link($html->image('icon/basicset/pencil_16.png',array('alt'=>$flight['Flighttype']['title'],'title'=>$flight['Flighttype']['title'])),'/flights/edit/'.$flight['Flight']['id'],array('escape'=>false));
		echo '</td>';
		
	echo '</tr>';
	
	$flightindex = $flightindex-1;
}
?>
</tbody>
</table>
</div>
</div>