<?php
 $request=file_get_contents('php://input');
$input=json_decode($request,true);
$icon= $icon;
 $message= $body;
 $title= $title;
$db_host = 'localhost'; //hostname
$db_user = 'id2152747_appasaheb4'; // username
$db_password = 'apple4'; // password
$db_name = 'id2152747_appasaheb4'; //database name
$link = mysqli_connect($db_host,$db_user,$db_password, $db_name);
$query = "select * from tblregistation";
$resultdb = mysqli_query ($link,$query);
while($row=mysqli_fetch_array($resultdb)){
 		$device_to[] =  $row[tokenNo];
}
for($i=0 ; $i< sizeof($device_to) ; $i++)
{
$to = $device_to[$i];
$res = array();
        $res['data']['title'] = $title;
        $res['data']['message'] = $message;
        $res['data']['image'] = $icon;
 $result = sendFCM($res,$to);   
}
function sendFCM($res,$key) {
$url = 'https://fcm.googleapis.com/fcm/send';
$fields = array (
        'to' => $key,
        'data' => $res
);
$fields = json_encode ( $fields );
$headers = array (
        'Authorization: key=' . "AAAA1qg3sPA:APA91bGFZtLjK6j9wdivcvd2TaXL2uwg-0L-lJK0R_SI82tvrOU4d43CljHpuMG2O44AQFKUh3osdyUYWWMXm3PtpisjHrW65w_FzjsEJsiJiGA7jDpJoQEx2TlCJo9-t6wmy1it-_Dd",
        'Content-Type: application/json'
);    
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, true );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
$result = curl_exec ( $ch );
curl_close ( $ch );
//echo $fields;
}
?>



