<?php

class Slidecaption extends CI_Model {

	private $filepath;
    private $json;

	function __construct($filepath)
    {
			$this->load->helper('file');
			
            parent::__construct();
			$this->filepath = $filepath;
			
			$slideInfo = read_file($filepath);
			if ($slideInfo === false || $slideInfo == ""){ $slideInfo = '{}';}
			$this->json = json_decode($slideInfo,true);
		
    }

    function insert($key,$val)
    {
		$this->load->helper('file');
        $this->json[$key] = $val;
		$bytes = write_file($this->filepath,json_encode($this->json),'w+');		
        return;
    }

    function get_value($key)
    {
        return $this->json[$key];
    }

    function get_object_string()
    {
		return json_encode($this->json);
    }

	function get_object()
    {
		return $this->json;
    }
    

    function update($key,$val)
    {
       	$this->insert($key,$val);
    }

    function delete($key)
    {
			$this->load->helper('file');
            unset($this->json[$key]);
			$bytes = write_file($this->filepath,json_encode($this->json));
			return;
    }
}

/* End of file slidecaption.php */
/* Location: ./application/models/slidecaption.php */