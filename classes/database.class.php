<?php

class Database
{
    protected function connectDB()
    {
		$connection = new mysqli("localhost", "root", "", "askmedb");
		if (!$connection) {
			echo 'Cannot connect to database server';
			exit;
		}			
		return $connection;
    }
}

?>