<?php

declare(strict_types=1);

namespace App\Models;

class CsvFileModel extends \App\Model
{
    protected array $content;
    public function __construct()
    {
        parent::__construct();            
    }

    public function readData(){
        $file = $_FILES['csv'];
        if ($file['type'] !== 'text/csv') {
            throw new \Exception('File does not supported');
        }

        $open = fopen($file['tmp_name'], 'r');
        $params = fgetcsv($open);
        while (($line = fgetcsv($open)) !== false) {
            $this->content[$params[0]][] = $line[0];
            $this->content[$params[1]][] = $line[1];
            $this->content[$params[2]][] = $line[2];
            $this->content[$params[3]][] = $line[3];
        }
        fclose($open);  
        return $params;
    }

    public function saveData()
    {
        $params = $this->readData();

        $stmt = $this->db->prepare(
            'INSERT INTO transactions (date, check_code, description, amount) VALUES (?, ?, ?, ?)'
        );

        $dates = $this->content[$params[0]];
        $checks = $this->content[$params[1]];
        $descriptions = $this->content[$params[2]];
        $amounts = $this->content[$params[3]];

        for($i = 0; $i < count($dates); $i++){
            $format = date('Y-m-d', strtotime($dates[$i]));
            $stmt->execute([$format, $checks[$i], $descriptions[$i], str_replace(['$', ','], '', $amounts[$i])]);
        }
    }
}
