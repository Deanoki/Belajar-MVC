<?php

class App{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct()
    {
        // menerima variable methodnya
        $url = $this->parseUrl();
        if (isset($url[0])){
            if (file_exists('../app/controllers/'. $url[0] . '.php'))
            {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require '../app/controllers/'. $this->controller . '.php';

        $this->controller = new $this->controller;


        if (isset($url[1])) 
		{
			
			if (method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

        if(!empty($url)){
            $this->params = array_values($url);
            // var_dump($url);
        }

        // jalankan controller dan method serta kirimkan params
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])){
            // pisahkan url dengan garis miring (/)
            $url = rtrim($_GET['url'], '/');
            // membersihkan url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah url menjadi array tanpa memasukan garis miring (/)
            $url = explode('/', $url);

            // mengembalikan nilai variable
            return $url;
        }
    }
}