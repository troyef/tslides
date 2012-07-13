<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	/**
	 * Model Loader
	 *
	 * This function lets users load and instantiate models.
	 *
	 * @param	string	the name of the class
	 * @param	string	name for the model
	 * @param	bool	database connection
	 * @param	string	arbitrary argument for the model constructor	
	 * @return	void
	 */
	public function jsonmodel($model, $modelArg = Null, $name = '')
	{ 
		if ($model == '')
		{
			return;
		}

		if ($name == '')
		{
			$name = $model;
		}
		$path = '';
		
		$CI =& get_instance();
		if (isset($CI->$name))
		{
			show_error('The model name you are loading is the name of a resource that is already being used: '.$name);
		}
		if (in_array($name, $this->_ci_models, TRUE))
		{
			return;
		}

		$model = strtolower($model);

		foreach ($this->_ci_model_paths as $mod_path)
		{
			if ( ! file_exists($mod_path.'models/'.$path.$model.'.php'))
			{
				continue;
			}

			if ( ! class_exists('CI_Model'))
			{
				load_class('Model', 'core');
			}

			require_once($mod_path.'models/'.$path.$model.'.php');

			$model = ucfirst($model);
			
			$CI->$name = new $model($modelArg);

			$this->_ci_models[] = $name;
			return;
		}

		// couldn't find the model
		show_error('Unable to locate the model you have specified: '.$model);
	}
}

/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */