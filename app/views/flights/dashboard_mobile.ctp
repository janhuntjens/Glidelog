<!-- Start of first page -->
<div data-role="page" id="add">

<div data-role="header" data-backbtn="false">
    <h1>GlideLog</h1>
	<div data-role="navbar">
		<ul>
			<li><a href="#add" data-transition="fade" class="ui-btn-active">Add flight</a></li>
			<li><a href="#recent" data-transition="fade">View recent</a></li>
		</ul>
	</div><!-- /navbar -->
</div><!-- /header -->

    <div data-role="content">
        <?php 
        echo $form->create('Flight',array('action'=>'dashboard'));

echo '<p>';
echo '<label>Start date (dd/mm/yyyy)</label>';
echo $form->input('start_date',array('value'=>date('d-m-Y'),'label'=>false,'div'=>false,'type'=>'text'));
echo '</p>';
echo '<p>';
echo '<label>Start time (hh:mm)</label>';
echo $form->input('time',array('value'=>date('H:i'),'div'=>false,'label'=>false,'type'=>'text'));
echo '</p>';
echo '<p>';
echo '<label>Duration</label><br />';
echo $form->input('duration_h',array('value'=>'hours','onFocus'=>'if(this.value=="hours") this.value = ""','div'=>false,'style'=>'display:inline;width:43%;','label'=>false));
echo ' ';
echo $form->input('duration_m',array('value'=>'minutes','onFocus'=>'if(this.value=="minutes") this.value = ""','class'=>'required','div'=>false,'style'=>'display:inline;width:43%;','label'=>false));
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
echo $form->input('startmethod_id',array('div'=>false,'type'=>'select','options'=>$startmethods));
echo '</p>';
echo '<p>';
echo $form->input('notes',array('div'=>false));
echo '</p>';

echo $form->end('submit');
        ?>
        
        <!--
<form method="post" action="/flights/dashboard/">
        	
        	<label>Startdate (mm/dd/yyyy)</label>
        	<input name="data[Flight][start_mobile]" id="FlightStartMobile" type="" value="<?= date('m-d-Y'); ?>" />
        	<label>Starttime (hh:mm)</label>
        	<input name="data[Flight][start_mobile]" id="FlightStartMobile" type="" value="<?= date('H:i'); ?>" />
        	<label>Notes</label>
        	<textarea name="data[Flight][notes]" id="FlightNotes"></textarea>
        	<input type="submit" value="Save" />
  
        </form>
-->
    </div><!-- /content -->

    <div data-role="footer">
        <h4>&copy; eyetractive</h4>
    </div><!-- /footer -->
</div><!-- /page -->

<!-- Start of second page -->
<div data-role="page" id="recent">

    <div data-role="header" data-backbtn="false">
    <h1>GlideLog</h1>
	<div data-role="navbar">
		<ul>
			<li><a href="#add" data-transition="fade">Add flight</a></li>
			<li><a href="#recent" data-transition="fade" class="ui-btn-active">View recent</a></li>
		</ul>
	</div><!-- /navbar -->
</div><!-- /header -->

    <div data-role="content">
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<?php
		$prev_date = false;
	foreach($flights as $i => $flight)
		{
			if(date('d-m-Y',strtotime($flight['Flight']['start']))!=$prev_date)
			{
				echo '<li data-role="list-divider">'.date('d-m-Y',strtotime($flight['Flight']['start'])).'</li>';
				$prev_date = date('d-m-Y',strtotime($flight['Flight']['start']));
			}
			
			echo '<li style="text-align:left;padding-right:10px;">';
				echo date('H:i',strtotime($flight['Flight']['start']));
				echo '&nbsp;&nbsp;';
				echo $flight['Glider']['reg'].' ';
				echo '&nbsp;&nbsp;';
				echo $flight['Flighttype']['title'];
				echo '<span style="float:right;">';
					$hours = floor($flight['Flight']['duration']/60);
					$minutes =  $flight['Flight']['duration']%60;
					echo $hours.'h '.$minutes.'m';
				echo '</span>';
			echo '</li>';
		}
	?>
		</ul>
		
    </div><!-- /content -->

    <div data-role="footer">
        <h4>&copy; eyetractive</h4>
    </div><!-- /footer -->
</div><!-- /page -->