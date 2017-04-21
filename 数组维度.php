<?php 

	//方法1
  
	private static function array_depth($array) {
  
        if(!is_array($array)) return 0;
        
        $max_depth = 1;
        
        foreach ($array as $value) {
        
            if (is_array($value)) {
            
                $depth = array_depth($value) + 1;
                

                if ($depth > $max_depth) {
                
                    $max_depth = $depth;
                    
                }
                
            }
            
        }
        
        return $max_depth;
        
    }
	
  
	<?php 
  
	//方法2
  
$items=array(1,2,3,4,5); 


function array_depth($a){

  $i=1;$j=1;
  
  foreach($a as $v){
  
  if(is_array($v)){
  
    $i=1+array_depth($v);
    
    if($j < $i){
    
       $j = $i;
       
     }
     
  }
  
}

return $j;

}


echo array_depth($items);

<?php

//方法3

function test($arr,$lev = 1,$maxlev = 1){

    if(!is_array($arr)){
    
        return;
        
    }
    
    $maxlev = $lev;
    
    foreach($arr as $k=>$v){
    
    if(is_array($v)){
    
        $maxlev = max($maxlev,test($v,$lev+1,$maxlev));
        
    }
    
    }
    
    return $maxlev;
    
}

print_r(test($items));


//方法4

$arraystr = serialize($items);

$len=strlen($arraystr);

$deep = 0;

$maxdeep = 0;


for($i=0 ;$i<$len ;$i++){

  if( '{' == $arraystr[$i] ){
  
    $deep ++ ;
    
    ($deep > $maxdeep) && $maxdeep = $deep ;
    
}

  if( '}' == $arraystr[$i] ){
  
    $deep -- ;
    
  }
  
}

echo $maxdeep;
