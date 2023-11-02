<?php

namespace app\models;

class Database
{
    private static ?self $_instance = null;
    private ?\PDO $_db = null;

    private function __construct()
    {
        $this->_db = new \PDO(
            sprintf(
                'mysql:host=%s;dbname=%s',
                getenv('DB_HOST'),
                getenv('DB_NAME')
            ),
            getenv('DB_USER'),
            getenv('DB_PASSWORD')
        );
    }

    public static function getInstance(): self
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function select($query): array
    {
        return $this->_db->query($query)->fetchAll();
    }
}