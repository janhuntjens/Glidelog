<?php

class Flight extends AppModel
{
	var $name = 'Flight';
	var $belongsTo = array('Glider','Flighttype','Location');
	var $hasMany = array('Attachment');
	
	function getStatistics()
	{	
		//get stats for locations, gliders and types
		
		$this->recursive = 1;
		$flights = $this->find('all');
		
		$stats = array();
		
		foreach($flights as $i => $flight)
		{
				$stats['Flighttypes'][$flight['Flighttype']['title']]['numbers'] = $stats['Flighttypes'][$flight['Flighttype']['title']]['numbers']+1;
				$stats['Flighttypes'][$flight['Flighttype']['title']]['duration'] = $stats['Flighttypes'][$flight['Flighttype']['title']]['duration']+$flight['Flight']['duration'];
				
				$stats['Locations'][$flight['Location']['title']]['numbers'] = $stats['Locations'][$flight['Location']['title']]['numbers']+1;
				$stats['Locations'][$flight['Location']['title']]['duration'] = $stats['Locations'][$flight['Location']['title']]['duration']+$flight['Flight']['duration'];
				
				$stats['Gliders'][$flight['Glider']['reg'].' - '.$flight['Glider']['type']]['numbers'] = $stats['Gliders'][$flight['Glider']['reg'].' - '.$flight['Glider']['type']]['numbers']+1;
				$stats['Gliders'][$flight['Glider']['reg'].' - '.$flight['Glider']['type']]['duration'] = $stats['Gliders'][$flight['Glider']['reg'].' - '.$flight['Glider']['type']]['duration']+$flight['Flight']['duration'];
				
				$stats['Glidertypes'][$flight['Glider']['type']]['numbers'] = $stats['Gliders'][$flight['Glider']['type']]['numbers']+1;
				$stats['Glidertypes'][$flight['Glider']['type']]['duration'] = $stats['Gliders'][$flight['Glider']['type']]['duration']+$flight['Flight']['duration'];

		}
		
		return $stats;
	}
}

?>