<?php
$curl = curl_init();
$header=array('Accept: application/json','app_id: b588625e','app_key: 90f2d8f354b4a294a5dafcf85d13b066');
print_r($header);
curl_setopt($curl, CURLOPT_URL, "https://od-api.oxforddictionaries.com:443/api/v1/entries/en/ace");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','app_id: b588625e','app_key: 90f2d8f354b4a294a5dafcf85d13b066')); //setting custom header
$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
print(json_decode($result));
print_r($info)
?>