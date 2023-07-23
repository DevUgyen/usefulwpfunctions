<?php 
function event_location($latitude,$longitude) {
	//Google Map API URL
	$API_KEY = get_theme_mod('google_map_api'); // Google Map Free API Key
	$url = "https://maps.google.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&key=".$API_KEY."";
	// Send CURL Request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$returnBody = json_decode($response);
	// Google MAP
	$status = $returnBody->status;
	if($longitude||$latitude){
		if($status == "REQUEST_DENIED"){ 
			$result = $returnBody->error_message;
		} else { 
			$result = $returnBody->results[0]->formatted_address;
		}
		return $result;
	}
}
?>
