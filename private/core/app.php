<?php  

/**
 * main app file
 */
class App {
	protected $controller = "home";
	protected $method = "index";
	protected $params = [];
	public function __construct() {
		$URL = $this->getURL();
		if (file_exists('../private/controllers/' . $URL[0] . '.php')) {
			$this->controller = $URL[0];
		}

		require '../private/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller();
	}

	private function getURL() {
		$url = isset($_GET['url']) ? $_GET['url'] : "home";
		return explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
	}
}


// the idea: create clean url
// /students/subjrct/id
// www.mywebsite.com/students/class/id 
// class/function in class/parameters

?>


