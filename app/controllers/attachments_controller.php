<?php

class AttachmentsController extends AppController {

	var $name = 'Attachments';
	
	function get($id)
	{
		$this->layout = false;
	
		$this->set('attachment',$this->Attachment->find('first',array('recursive'=>-1,'conditions'=>array('Attachment.id'=>$id))));
	}

}

?>