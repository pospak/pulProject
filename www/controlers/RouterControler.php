<?php
//main class
class RouterControler extends Controler
{
    protected Controler $controler;

  
//parse url
    private function parseUrl(string $url) : array
    {

        $parsedURL = parse_url($url);
$parsedURL["path"] = ltrim($parsedURL["path"], "/");
$parsedURL["path"] = trim($parsedURL["path"]);
$explodedPath = explode("/", $parsedURL["path"]);

return $explodedPath;
    }

    //makes first Letters in url capital
    private function dawnToCamelNot(string $text) : string {
        $sentence = str_replace("-"," ",$text);
        $sentence = ucwords($sentence);
        $sentence = str_replace(" ","",$sentence);

        return $sentence;
    }

    //processing and showing wanted view
    public function process(array $parameters): void
    {
        $parsedURL = $this->parseUrl($parameters[0]);

        if (empty($parsedURL[0]))
        $this->redirect('main');
        $controlerClass = $this->dawnToCamelNot(array_shift($parsedURL))."Controler";

        if (file_exists('controlers/' . $controlerClass . '.php'))
        $this->controler = new $controlerClass;
    else
        $this->redirect('error');
       
        $this->controler->process($parsedURL);
   
        $this->data["title"] = $this->controler->head["title"];
        $this->data["description"] = $this->controler->head["description"];
        $this->data["kewywords"] = $this->controler->head["keywords"];

        $this->view = "layout";

session_start();
    }    

}