<div class="clear" style="height:15px;"></div>
<div class="grid_5">
<div class="box">
<h2>Properties</h2>
<?php

echo $form->create('Flight',array('action'=>'add'));
echo '<fieldset style="margin-top:10px;">';
?>

<?php
echo '<p>';
echo '<label>Start</label><br />';
echo $form->input('start_date',array('label'=>false,'value'=>'date','class'=>'required','div'=>false,'type'=>'text','style'=>'color:#aaa;display:inline;width:190px;','onFocus'=>"if (this.value=='date') this.value = '';this.style.color = 'black'",'onBlur'=>"if (this.value=='') this.value = 'date'; if (this.value=='date') this.style.color = '#aaa';",'onChange'=>"if (this.value!='date') this.style.color = '#000';"));
echo ' ';
echo $form->input('time',array('value'=>'time (hh:mm)','class'=>'required','div'=>false,'label'=>false,'type'=>'text','style'=>'color:#aaa;display:inline;width:130px;','onFocus'=>"if (this.value=='time (hh:mm)') this.value = '';this.style.color = 'black'",'onBlur'=>"if (this.value=='') this.value = 'time (hh:mm)'; if (this.value=='time (hh:mm)') this.style.color = '#aaa';"));
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
echo $form->submit('save flight',array('div'=>false,'style'=>'width:auto;float:right;'));
echo '</p>';

echo '</fieldset>';

?>
</div>
</div>

<div class="grid_7">
<div class="box"  style="height:331px;">
<h2>Other</h2>
<?php

echo '<fieldset style="margin-top:10px;">';
echo $form->input('notes',array('div'=>false,'style'=>'width:490px;'));
echo '</fieldset>';
echo '</form>';
?>attachments...
</div>
</div>

<div class="clear"></div>


<script type="text/javascript">
	
	$(function() {
		$( "#FlightStartDate" ).datepicker();
	});
	
</script>