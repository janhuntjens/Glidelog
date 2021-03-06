<?php

class FlightsController extends AppController {

	var $name = 'Flights';
	var $components = array("RequestHandler");
	
	function dashboard()
	{
		if(!empty($this->data))
		{
			$this->data['Flight']['duration'] = ($this->data['Flight']['duration_h']*60) + $this->data['Flight']['duration_m'];
			unset($this->data['Flight']['duration_h']);
			unset($this->data['Flight']['duration_m']);
			
			
			$day_time = strtotime($this->data['Flight']['start_date']);
			$time_time = strtotime('01-01-1970 '.$this->data['Flight']['time'])+3600;
			
			$this->data['Flight']['start'] = date('Y-m-d H:i:s',$day_time+$time_time);
			unset($this->data['Flight']['start_date']);
			unset($this->data['Flight']['time']);
			
			$this->Flight->save($this->data);
			unset($this->Flight->id);
			$this->data = array();
		}
		
		$this->set('flights',$this->Flight->find('all',array('order'=>'Flight.start DESC','limit'=>12)));

		$this->set('gliders',$this->Flight->Glider->getList());
		$this->set('flighttypes',$this->Flight->Flighttype->find('list'));
		$this->set('locations',$this->Flight->Location->find('list'));
		$this->set('startmethods',$this->Flight->Startmethod->find('list'));
		
		if($this->RequestHandler->isMobile())
		{
			$this->layout = 'mobile';
			$this->render('dashboard_mobile');
		} else {
			$this->render();
		}
	}
	
	function index()
	{		
		$this->set('flights',$this->Flight->find('all',array('order'=>'Flight.start DESC')));		
	}
	
	function add()
	{
		if(!empty($this->data))
		{	
		
			$this->data['Flight']['duration'] = ($this->data['Flight']['duration_h']*60) + $this->data['Flight']['duration_m'];
			unset($this->data['Flight']['duration_h']);
			unset($this->data['Flight']['duration_m']);
			
			
			$day_time = strtotime($this->data['Flight']['start_date']);
			$time_time = strtotime('01-01-1970 '.$this->data['Flight']['time'])+3600;
			
			$this->data['Flight']['start'] = date('Y-m-d H:i:s',$day_time+$time_time);
			unset($this->data['Flight']['start_date']);
			unset($this->data['Flight']['time']);
			
			$this->Flight->save($this->data);
			
			foreach($_FILES['attachments']['tmp_name'] as $i => $tmpname)
			{
				$this->Flight->Attachment->upload($this->Flight->id,$tmpname,$_FILES['attachments']['name'][$i],$_FILES['attachments']['size'][$i]);
			}
			
			unset($this->Flight->id);
			$this->data = array();
		}
		
		$this->set('gliders',$this->Flight->Glider->getList());
		$this->set('flighttypes',$this->Flight->Flighttype->find('list'));
		$this->set('locations',$this->Flight->Location->find('list'));
		$this->set('startmethods',$this->Flight->Startmethod->find('list'));
	}
	
	function edit($id)
	{
		if(!empty($this->data))
		{
			$this->data['Flight']['duration'] = ($this->data['Flight']['duration_h']*60) + $this->data['Flight']['duration_m'];
			unset($this->data['Flight']['duration_h']);
			unset($this->data['Flight']['duration_m']);
			
			
			$day_time = strtotime($this->data['Flight']['start_date']);
			$time_time = strtotime('01-01-1970 '.$this->data['Flight']['time'])+3600;
			
			$this->data['Flight']['start'] = date('Y-m-d H:i:s',$day_time+$time_time);
			unset($this->data['Flight']['start_date']);
			unset($this->data['Flight']['time']);
			
			$this->Flight->save($this->data);
			unset($this->Flight->id);
			
			$this->redirect($this->data['Flight']['from']);
		}
		
		$this->Flight->id = $id;
		$this->data = $this->Flight->read();
		$this->set('from',$_SERVER['HTTP_REFERER']);
		$this->set('gliders',$this->Flight->Glider->getList());
		$this->set('flighttypes',$this->Flight->Flighttype->find('list'));
		$this->set('locations',$this->Flight->Location->find('list'));
		$this->set('startmethods',$this->Flight->Startmethod->find('list'));
	}
	
	function statistics()
	{	//Configure::write('debug', '0'); //TO KEEP NON-FILLED INDEXES FROM CREATING NOTICES
		$this->set('stats',$this->Flight->getStatistics());
	}

}

?>
