<?php 
declare(strict_types=1);
namespace App;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {        
    }

    public static function make(string $view, array $params = [])
    {
        return new static($view, $params);
    }

    public function render():bool|string
    {
        $viewPath = VIEWS_PATH . '/' . $this->view . '.php';

        if (! file_exists($viewPath)){
            throw new \App\Exceptions\ViewNotFoundExeption();
        }

        foreach($this->params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get(string $name){
        return $this->params[$name] ?? null;
    }
}


?>