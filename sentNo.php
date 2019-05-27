<?php
header("Access-Control-Allow-Origin: *"); 


 $image = $icon;
 $message = $body;
 $title = $title;
$db_host = 'localhost'; //hostname
$db_user = 'newappte_menuapp'; // username
$db_password = 'apple4'; // password
$db_name = 'newappte_menuapp'; //database name
$link = mysqli_connect($db_host,$db_user,$db_password, $db_name);
$query = "select * from tblUserRegistation";
$result = mysqli_query ($link,$query);
while($row=mysqli_fetch_array($result)){
 		$device_to[] =  $row['tokenNo'];     
}
for($i=0 ; $i< sizeof($device_to) ; $i++)
{
$to = $device_to[$i];
sendPush($to,$title,$message,$image);
}
 
	function sendPush($to,$title,$message,$image)
	{
		define( 'API_ACCESS_KEY', 'AAAA1qg3sPA:APA91bGFZtLjK6j9wdivcvd2TaXL2uwg-0L-lJK0R_SI82tvrOU4d43CljHpuMG2O44AQFKUh3osdyUYWWMXm3PtpisjHrW65w_FzjsEJsiJiGA7jDpJoQEx2TlCJo9-t6wmy1it-_Dd');
		$registrationIds = array($to);
		
		

//	$msg = array
//	(
//	'message' => $message,
//	'title' => $title,
//        'image' => $icon,
//	'vibrate' => 0,
//	'sound' => 0
//);
                
        $res = array();
        $res['data']['title'] = $title;
        $res['data']['message'] = $message;
        $res['data']['image'] = $image;


	$fields = array
	(
		'registration_ids' => $registrationIds,
		'data' => $res
);
$headers = array
(
'Authorization: key=' . API_ACCESS_KEY,
'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
}


?>