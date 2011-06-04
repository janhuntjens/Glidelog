<?php

class Flight extends AppModel
{
	var $name = 'Flight';
	var $belongsTo = array('Glider','Flighttype','Location');
	var $hasMany = array('Attachment');
}

?>