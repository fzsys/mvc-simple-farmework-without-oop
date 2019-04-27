<?php

namespace application\models;

use application\core\Model;

class MainModel extends Model
{
    public function getNews()
    {
        $result = $this->db->all('SELECT title, description FROM news WHERE id > 0');
        return $result;
    }
}