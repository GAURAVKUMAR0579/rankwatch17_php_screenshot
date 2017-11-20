<!DOCTYPE html>
<html>

<style>
body {background-color: powderblue;}
</style
</html>

<h2 style="color:blue;"> <center>Screenshot From Url </center> </h2>
<form  align="center" method="get">
	<input type="text" name="url" placeholder="SITE URL ">
	<input type="submit" name="Submit">
</form>

<?php

if(isset($_GET['Submit']))
{
	
	$url=$_GET['url'];
//website url
$surl = "http://".$url;

//call Google PageSpeed Insights API
$data = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$surl&screenshot=true");

//decode json data
$data = json_decode($data, true);

//image data
$image = $data['screenshot']['data'];
$image = str_replace(array('_','-'),array('/','+'),$image); 


$Imagen=str_replace('.','',$url);
      $postImageUrl ="data:image/jpeg;base64,".$image;
      $postImageExt ="jpg";
     $Imagen= str_replace (" ","",$Imagen) ;
      @$rawImage = file_get_contents ($postImageUrl) ;
      if($rawImage)
      {
              file_put_contents("scrnsht/".$Imagen.".".$postImageExt,$rawImage) ;
			  
			
			  
             echo      '<h2 style="color:blue;"> <center>   Screenshot Saved!   </center> </h2> ' ; 
	}
	
}


?>