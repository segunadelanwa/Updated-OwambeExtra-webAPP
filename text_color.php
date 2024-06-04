<?php


if($text_color == 1 ){  
//COLOR(white white)	1 
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 250, 250, 250);
}elseif($text_color == 2){ 
//COLOR(black and black  )	2
$red      = imagecolorallocate($event_banner, 22, 22, 22);
$default  = imagecolorallocate($event_banner, 22, 22, 22); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 3){ 
//COLOR(yello and yellow  )	3
$red      = imagecolorallocate($event_banner, 229, 240, 28);
$default  = imagecolorallocate($event_banner, 229, 240, 28); 
$bblack   = ImageColorAllocate($event_banner, 229, 240, 28);  
}elseif($text_color == 4){ 
//COLOR(blue and blue  )	4
$red      = imagecolorallocate($event_banner, 15,  32, 125);
$default  = imagecolorallocate($event_banner, 15,  32, 125); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);	
}elseif($text_color == 5){ 		
//COLOR(Pink and Pink  )	5
$red      = imagecolorallocate($event_banner, 240, 28, 169);
$default  = imagecolorallocate($event_banner, 240, 28, 169); 
$bblack   = ImageColorAllocate($event_banner, 240, 28, 169);	
}elseif($text_color == 6){ 
//COLOR(Gold and Gold )	6
$red      = imagecolorallocate($event_banner, 242, 230, 65);
$default  = imagecolorallocate($event_banner, 242, 230, 65); 
$bblack   = ImageColorAllocate($event_banner, 242, 230, 65);						
}elseif($text_color == 7){  
//COLOR(white and black  )	7
///////////////////////////////////////////////////////////////////////
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 8){
//COLOR(blue and white )	8 
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
}elseif($text_color == 9){
//COLOR(white and gold  )	9
$red      = imagecolorallocate($event_banner, 250, 250, 250);
$default  = imagecolorallocate($event_banner, 250, 250, 250); 
$bblack   = ImageColorAllocate($event_banner, 242, 230, 65);
}elseif($text_color == 10){						
//COLOR(black and blue  )	10
$red      = imagecolorallocate($event_banner, 15,  32, 125);
$default  = imagecolorallocate($event_banner, 15,  32, 125); 
$bblack   = ImageColorAllocate($event_banner, 22, 22, 22);
}elseif($text_color == 11){						
//COLOR(blue and  black )	11
$red      = imagecolorallocate($event_banner, 22, 22, 22);
$default  = imagecolorallocate($event_banner, 22, 22, 22); 
$bblack   = ImageColorAllocate($event_banner, 15,  32, 125);
}

 


?>
