<?php
namespace PatriceEsperou\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blackblog;charset=utf8', 'root', '');
        return $db;
    }
}