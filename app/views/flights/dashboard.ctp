<div class="clear" style="height:15px;"></div>
<div class="grid_8">
<div class="box">
<h2>Recent flights</h2>

<table style="margin-top:10px;">
<thead>
<tr>
	<th>#</th>
	<th>date</th>
	<th>time</th>
	<th>duration</th>
	<th>glider</th>
	<th>type</th>
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
		echo '<td style="text-align:right;">';
			echo $flight['Startmethod']['short'].' ';
			echo $html->image('icon/flighttype_'.Inflector::slug(strtolower($flight['Flighttype']['title'])).'.png',array('alt'=>$flight['Flighttype']['title'],'title'=>$flight['Flighttype']['title'],'style'=>'top:1px;'));
		echo '</td>';
		echo '<td>';
			echo substr($flight['Flight']['notes'],0,40);
			if(strlen($flight['Flight']['notes'])>40) { echo '...'; }
		echo '</td>';
		
		echo '<td style="text-align:right;">';
			echo $html->link($html->image('icon/basicset/pencil_16.png',array('alt'=>$flight['Flighttype']['title'],'title'=>$flight['Flighttype']['title'])),'/flights/edit/'.$flight['Flight']['id'],array('escape'=>false));
		echo '</td>';
		
	echo '</tr>';
	
	$flightindex = $flightindex-1;
}
?>
<tr>
<td class="tablefooter" colspan="8" style="height:20px;line-height:20px;"><a href="/flights/">more</a></td>
</tr>
</tbody>
</table>
</div>
</div>

<div class="grid_4">
<div class="box">
<h2>Add flight&nbsp;&nbsp;&nbsp;<a style="display:inline;margin:0;padding:0;" href="/flights/add/">Advanced form</a> <?= $html->image('icon/basicset/plus_16.png',array('style'=>'float:right;')); ?></h2>
<?php

echo $form->create('Flight',array('action'=>'dashboard'));
echo '<fieldset style="margin-top:10px;">';
?>

<?php
echo '<p>';
echo '<label>Start</label><br />';
echo $form->input('start_date',array('label'=>false,'value'=>'date','class'=>'required','div'=>false,'type'=>'text','style'=>'color:#aaa;display:inline;width:150px;','onFocus'=>"if (this.value=='date') this.value = '';this.style.color = 'black'",'onBlur'=>"if (this.value=='') this.value = 'date'; if (this.value=='date') this.style.color = '#aaa';",'onChange'=>"if (this.value!='date') this.style.color = '#000';"));
echo ' ';
echo $form->input('time',array('value'=>'time (hh:mm)','class'=>'required','div'=>false,'label'=>false,'type'=>'text','style'=>'color:#aaa;display:inline;width:100px;','onFocus'=>"if (this.value=='time (hh:mm)') this.value = '';this.style.color = 'black'",'onBlur'=>"if (this.value=='') this.value = 'time (hh:mm)'; if (this.value=='time (hh:mm)') this.style.color = '#aaa';"));
echo '</p>';
echo '<p>';
echo '<label>Duration</label><br />';
echo $form->input('duration_h',array('div'=>false,'style'=>'display:inline;width:30px;','label'=>false));
echo ' ';
echo $form->input('duration_m',array('class'=>'required','div'=>false,'style'=>'display:inline;width:30px;','label'=>false));
echo '</p>';
echo '<p>';
echo $form->input('glider_id',array('div'=>false,'type'=>'select','options'=>$gliders,'onChange'=>'filterFlighttypes(this.value);'));
echo '</p>';
echo '<p>';
echo $form->input('flighttype_id',array('div'=>false,'type'=>'select','options'=>$flighttypes));
echo '</p>';
echo '<p>';
echo $form->input('location_id',array('div'=>false,'type'=>'select','options'=>$locations));
echo '</p>';
echo '<p>';
echo $form->input('startmethod_id',array('label'=>'Start method','div'=>false,'type'=>'select','options'=>$startmethods));
echo '</p>';
echo '<p>';
echo $form->input('notes',array('div'=>false));
echo '</p>';

echo $form->end('submit');
echo '</fieldset>';

?>
</div>
</div>

<script type="text/javascript" src="/js/libs/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.validate.css" />

<script type="text/javascript">
	
	$(function() {
		$( "#FlightStartDate" ).datepicker();
	});
	
	$(function() {
		$("#FlightDashboardForm").validate();
	});

</script>