<?php
 class DBFactory 
 {  
 public static function getMysqlConnexionWithPDO()
 {  
 $db = new PDO('mysql:host=db555693792.db.1and1.com', 'dbo555693792', 'password');  
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
 return $db; 
 }  
 public static function getMysqlConnexionWithMySQLi() 
 {    
 return new MySQLi('db555693792.db.1and1.com', 'dbo555693792', 'password', 'db555693792');  
 } 
 }
