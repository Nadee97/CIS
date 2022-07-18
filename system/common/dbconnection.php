

<?php
//Class for Database connection
class dbconnection{
    
    function connection(){
        //Database connection
        $host="localhost";
        $un="root";
        $pwd="";
        $db="cisdb";
        $con=new mysqli($host,$un,$pwd,$db);
        return $con;
        
            //If there is an error
            //if($con->connect_error){
              //  echo $con->connect_errno; //error number
            //}
    }  
}
$conobj=new dbconnection(); //To create an object
$con=$conobj->connection(); //To get connection string
//$GLOBALS['con']=$con; //To globalized connection

