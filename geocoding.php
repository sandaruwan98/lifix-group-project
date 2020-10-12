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
     return false;
   }
}

getaddress( 6.881167433870161,79.864157036964 );
// getaddress( 6.881570466305064, 79.85680047538261);
// getaddress( 6.883686767848502,79.86359102010118 );

?>