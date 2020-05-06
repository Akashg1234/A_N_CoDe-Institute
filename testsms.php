<?php
$name="raja";
$mon="July2019";
$field = array(
    "sender_id" => "FSTSMS",
    "language" => "english",
    "route" => "qt",
    "numbers" => "9831619800",
    "message" => "9920",
    "variables" => "{#EE#}|{#DD#}",
    "variables_values" => "'$name'|'$mon'"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: zbB4EXUERtpF01lQXy3LBKPSBkejJrRhHSxC5ufrO7934rZEet1SQFUWSS7r",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
