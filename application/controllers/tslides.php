<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tslides extends CI_Controller {

	protected $galleries = array();
	//protected $galleries = array("westspanishpeak"=>"West Spanish Peak Hike","bearlakehike"=>"Bear Lake Hike");
	
	
	public function index()
	{
		$data['galleries'] = $this->galleries;
		$this->load->view('tslides_index',$data);
	}
	
	public function images($imageLib = null)
	{
		$this->load->helper('file');
		$imageDir = "./img/" .$imageLib;
		
		if ($imageLib == null || get_filenames($imageDir) === FALSE){
			$data['galleries'] = $this->galleries;
			$this->load->view('tslides_index',$data);
			return;
		}
		$this->load->jsonmodel('Slidecaption',$imageDir. "/slideInfo.json");
		
		
		$data['imagePath'] = '../img/'.$imageLib.'/';
		$images = get_filenames($imageDir);
		
		$infoPos = array_search("slideInfo.json",$images);
		if ($infoPos !== false){
			unset($images[$infoPos]);
		}
		
		$data['slideInfo'] = $this->Slidecaption->get_object_string();
		
		$data['imagesArray'] = '"'.implode('","', $images).'"';
		$data['galleries'] = $this->galleries;
		
		$this->load->view('images',$data);
		
		
		
	}
	
	public function admin($imageLib = null)
	{
		$this->load->helper('file');
		$imageDir = "./img/" .$imageLib;
		
		if ($imageLib == null || get_filenames($imageDir) === FALSE){
			$data['galleries'] = $this->galleries;
			$this->load->view('tslides_index',$data);
			return;
		}
		$this->load->jsonmodel('Slidecaption',$imageDir. "/slideInfo.json");
		
		
		$imagePath = '../../img/'.$imageLib.'/';
		$images = get_filenames($imageDir);
		
		$infoPos = array_search("slideInfo.json",$images);
		if ($infoPos !== false){
			unset($images[$infoPos]);
		}
		
		$slideInfo = $this->Slidecaption->get_object();
		
		$html = "<table>";
		
		foreach ($images as $image){
			$html .= "<tr>";
			$html .= "<td><img src='".$imagePath.$image."'/></td>";
			$slideTxt = (array_key_exists($image,$slideInfo)) ? $slideInfo[$image] : "";
			$html .= "<td><textarea name='$image'>$slideTxt</textarea></td>";
			$html .= "<td><button name='$image'>update</button></td>";
			$html .= "</tr>";
			
		}
		$html .= "</html>";
		
		$data['imageTable'] = $html;
		$data['imageLib'] = $imageLib;
		
		$this->load->view('admin',$data);
		
	}
	
	public function update($imageLib = null)
	{
		$this->load->helper('file');
		$imageDir = "./img/" .$imageLib;
		
		if ($imageLib == null || get_filenames($imageDir) === FALSE){
			echo "unrecognized image library";
		}
		
		$imgName = $this->input->post('imgname');
		$caption = $this->input->post('caption');
		
		$this->load->jsonmodel('Slidecaption',$imageDir. "/slideInfo.json");
		$this->Slidecaption->update($imgName,$caption);
		
		echo "saved";
		
	}
}

/* End of file tslides.php */
/* Location: ./application/controllers/tslides.php */