<?php

function highKeyword($keyword,$data)
{
    
      $data=  str_ireplace($keyword,"<span class='alert-success'>{$keyword}</span>",$data,$i);
      return $data;
      
 }
 
 
 function countKeyword($keyword,$arr)
{
    
    $count=0;
     foreach ($arr as $v)
     {
           
         
          $data=  str_ireplace($keyword,"<span class='alert-success'>{$keyword}</span>",$v,$i);
         $count+=$i;
     
     }
     return $count;
 }

$a=array("yehen","kamal","rahantha");
//echo counthighKeyword("a",$a);