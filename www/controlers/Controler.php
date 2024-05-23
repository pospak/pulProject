<?php
abstract class Controler{

    protected array $data = array();
    protected string $view = "";
    protected array  $head  = array("title"=>"","keywords"=>"","description"=>"");

    

    public function viewListing(): void
    {
        if ($this->view){
                            extract($this->data);
                            require("views/" . $this->view . ".phtml");
                        }
    }

public function redirect(string $url): never
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }
    abstract function process(array $parameters): void;
}
