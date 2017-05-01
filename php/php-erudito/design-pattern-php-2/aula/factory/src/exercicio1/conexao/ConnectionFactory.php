<?php

class ConnectionFactory{
    
    private $config;
    private $type = 'default';


    public function getConnection($type = 'default'){
        
        $this->parseConfig($type);
        $config = $this->config;

        $dsn = "{$config['driver']}:dbname={$config['dbname']};host={$config['host']};port:{$config['port']}";
        $user = $config['user'];
        $password = $config['password'];
        
        return new PDO($dsn, $user, $password);
       
    }

    private function parseConfig($type){
        
        $banco = parse_ini_file('config.ini');
        $this->config = $banco;

    }



}