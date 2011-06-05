<?php

class Attachment extends AppModel
{
	var $name = 'Attachment';
	var $belongsTo = array('Flight');
	
	function upload($flight_id,$tmpname,$filename,$size)
	{
		$resource = fopen($tmpname,'r');
		$file = fread($resource, $size);
	
		$save = array(
			'flight_id'=>$flight_id,
			'filename'=>$filename,
			'file_store'=>$file
		);
		
		$this->save($save);
	}
}

?>