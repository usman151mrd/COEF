<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Usman
 */
$mydb = new Database();

class Database {
   	private  $con;
	var $sql_string;
	var $lstinsrtid;
	var $idaffeted;
	var $sarows;
	var $uarows;
    public function __construct() {
       try{
		   
		$this->con =  new PDO("mysql:host=localhost;dbname=Cosef","usman","Fa@12345");
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   }
	   catch(Exception $exc)
	   {
		    echo $exc->getTraceAsString();
	   }
    }
	function setQuery($sql) {
		$this->sql_string=$sql;
	}
    public function selection() {
        try {
                $state = $this->con->prepare($this->sql_string);
                $state->setFetchMode(PDO::FETCH_OBJ);
                $state->execute();
		$this->sarows=$state->rowCount();
                return $state;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function login($email,$h_upass) {
        try {
                $state = $this->con->prepare($this->sql_string);
                $state->bindParam(':email',$email);
                $state->bindParam(':password',$h_upass);
                $state->execute();
				$state->setFetchMode(PDO::FETCH_OBJ);
		        $this->sarows=$state->rowCount();
                return $state;
				echo $this->sql_string;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function update() {
        try {
				
                $state = $this->con->prepare($this->sql_string);
                $state->execute();
				$this->uarows = $state->rowCount();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
     public function insert() {
         try {
			 	
             	$this->idaffeted = $this->con->exec($this->sql_string);
		$this->lstinsrtid = $this->con->lastInsertId();
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
         
    }
    public function delete() {
         try {
			 	
             	$this->idaffeted = $this->con->exec($this->sql_string);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
         
    }
	public function ctable()
	{
		try
		{
			$this->con->exec($this->sql_string);
		}
		catch(Exception $exc) {
             echo $exc->getTraceAsString();
         }
	}
	public function loadResultList( $key='' ) {
		$cur = $this->selection();
		
		$array = array();
		while ($row = $cur->fetch()) {
			if ($key) {
				$array[$row->$key] = $row;
			} else {
				$array[] = $row;
			}
		}
	//	mysql_free_result( $cur );
		return $array;
	}
	public function insert_id() {
    // get the last id inserted over the current db connection
		return $this->lstinsrtid;
	}
	function loadSingleResult() {
		$cur = $this->selection();
			
		while ($row = $cur->fetch()) {
		return	$data = $row;
		}
	//	mysql_free_result( $cur );
		//return $data;
	}
	public function rowcount()
	{
		return $this->sarows;	
	}
	public function idaffected_rows()
	{
			return $this->idaffeted;
	}
	public function uaffected_rows()
	{
		return $this->uarows;	
	}
}

	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
	
	}
	function bdate_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y" , $nicetime);	
	
	}
	function formatDate($date){
	return date('g:i a', strtotime($date));
}
