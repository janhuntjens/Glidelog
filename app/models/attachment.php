<?php

class Attachment extends AppModel
{
	var $name = 'Attachment';
	var $belongsTo = array('Flight');
}

?>