<?php

class Glider extends AppModel
{
	var $name = 'Glider';
	var $hasMany = array('Flight');
	
	function getList()
	{
		$gliders = $this->find('all',array('recursive'=>-1));
		$gliders_list = array();
			
			foreach($gliders as $glider)
			{
				$gliders_list[$glider['Glider']['id']] = $glider['Glider']['reg'].' - '.$glider['Glider']['type'];
			}
			
		return $gliders_list;			
	}
}

?>