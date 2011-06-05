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
	<th>notes</th>
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
		echo '<td>';
			echo substr($flight['Flight']['notes'],0,40);
			if(strlen($flight['Flight']['notes'])>40) { echo '...'; }
		echo '</td>';
		
	echo '</tr>';
	
	$flightindex = $flightindex-1;
}
?>
</tbody>
</table>
</div>
</div>

<div class="grid_4">
<div class="box">
<h2>Add flight</h2>
<?php

echo $form->create('Flight',array('action'=>'dashboard'));
echo '<fieldset style="margin-top:10px;">';
?>

<?php
echo '<p>';
echo $form->input('start',array('class'=>'required','div'=>false,'type'=>'text'));
echo '</p>';
echo '<p>';
echo '<label>Duration</label><br />';
echo $form->input('duration_h',array('class'=>'required','div'=>false,'style'=>'display:inline;width:30px;','label'=>false));
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
echo $form->input('notes',array('div'=>false));
echo '</p>';

echo $form->end('submit');
echo '</fieldset>';

?>
</div>
</div>

<script type="text/javascript" src="/js/libs/jquery.validate.min.js"></script>

<script type="text/javascript">
	
	$(function() {
		$( "#FlightStart" ).datepicker();
	});
	
	$(function() {
		$("#FlightDashboardForm").validate();
	});
	
	function filterFlighttypes(val)
	{
		alert(val);
	}

</script>