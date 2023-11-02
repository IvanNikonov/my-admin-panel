<?php

namespace app;

use app\models\Database;

class App
{
    public function __construct()
    {
        $this->prepareEnvironment();
    }

    private function prepareEnvironment(): void
    {
        $envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';


        if (is_file($envFile)) {
            $content = explode(PHP_EOL, file_get_contents($envFile));

            foreach ($content as $string) {
                if (!empty($string)) {
                    putenv($string);
                }
            }
        } else {
            throw new \Exception('Файл c ".env" не найден');
        }
    }

    public function run(): void
    {
        self::pre(Database::getInstance()->select('SELECT * from `workers`'));
    }

    public static function pre(mixed $data): void
    {
        echo sprintf('<pre>%s</pre>', print_r($data, true));
    }
}