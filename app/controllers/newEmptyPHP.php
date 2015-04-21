//set POST variables
$url = 'http://liman4u:liman4u@localhost:8000/api/v1/smssynclog';
$fields = array(
'message' => urlencode($message),
'message_id' => urlencode($message_id),
'from' => urlencode($from),
'sent_timestamp' => urlencode($sent_timestamp)
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
