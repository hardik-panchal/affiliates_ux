<?php
echo date('Y-m-d H:i:s');
echo "<br>-<br>";
echo strtotime(date('Y-m-d H:i:s'));
sleep(4);
echo "<br>-<br>";
//echo date('Y-m-d H:i:s');
echo "<br>-<br>";
echo date('Y-m-d H:i:s',(strtotime(date('Y-m-d H:i:s'))+7000));

die;
$url = "https://api-sandbox.foxycart.com/clients";
$body = array("redirect_uri" => "http://166.78.186.70/bio/oauth",
    "project_name" => "Test",
    "contact_name" => "Dave",
    "company_name" => "TestABC",
    "contact_email" => "testoperators@gmail.com",
    "contact_phone" => "555-123-4567");
$body = http_build_query($body);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('FOXY-API-VERSION: 1', 'Accept: application/hal+json', 'Content-Type: application/x-www-form-urlencoded'));
$output = curl_exec($ch);
$errno = curl_errno($ch);
$error = curl_error($ch);
$result = json_decode($output, true);
if (isset($result['token']['access_token'])) {
    echo "success! your token: {$result['token']['access_token']}";
    d($result);
    $url = $result['_links']['self']['href'];
    $ch = curl_init();
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('FOXY-API-VERSION: 1', 'Authorization: Bearer ' . $result['token']['access_token']));
    $output = curl_exec($ch);
    $errno = curl_errno($ch);
    $error = curl_error($ch);
    $result1 = json_decode($output, true);
    d($result1);
} else {
    echo "Sorry! some error has been occur!";
    d($result);
}
curl_close($ch);
die;
?>