<?php

class DbManager
{
    private $stringConnect;
    private $connect;

    public function __construct(string $stringConnect)
    {
        $this->stringConnect = $stringConnect;
    }

    public function connectTo()
    {
        $this->connect = pg_connect($this->stringConnect);
        if ($this->connect) {
            return true;
        } else {
            echo "Ошибка подключения: " . pg_last_error();
        }

        return false;
    }

    public function insertTo(string $tableName, array $values)
    {
        if ($this->connect) {
            $insertResult = pg_insert($this->connect, $tableName, $values);

            if (!$insertResult) {
                echo "Ошибка вставки: " . pg_last_error();
            }
        }
    }

    public function makeQuery(string $query) 
    {
        $result = pg_query($this->connect, $query);
        if ($result) {
            return pg_fetch_array($result);
        }

        return [];
    }

    public function closeConnection()
    {
        if ($this->connect) {
            pg_close($this->connect);
        }
    }
}
