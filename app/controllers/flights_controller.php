<?php

class FlightsController extends AppController {

	var $name = 'Flights';
	
	function dashboard()
	{
		$this->set('flights',$this->Flight->find('all',array('order'=>'Flight.start DESC')));
			
			$this->set('gliders',$this->Flight->Glider->getList());
			$this->set('flighttypes',$this->Flight->Flighttype->find('list'));
			$this->set('locations',$this->Flight->Location->find('list'));
		
	}

}

?>
