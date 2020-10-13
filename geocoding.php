<?php 

function getaddress($lat,$lng)
{
   $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyBs3xcz7WtgWjnoSMnJi4zBzGReOijrJrU';
//    $url=  'https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&key=AIzaSyBs3xcz7WtgWjnoSMnJi4zBzGReOijrJrU';
   $json = @file_get_contents($url);
//    echo $json;
   $data=json_decode($json);
//    echo $data;
   $status = $data->status;
   if($status=="OK")
   {
     echo $data->results[0]->formatted_address;
   }
   else
   {
     echo "failed";
   }
}



?>