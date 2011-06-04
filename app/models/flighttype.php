<?php

class Flighttype extends AppModel
{
	var $name = 'Flighttype';
	var $hasMany = array('Flight');
}

?>