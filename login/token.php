<?php
// Step 6
$data = 'client_id=' . '7fa39dd97d7fdd18652b' . '&' .
		'client_secret=' . '49ce88999b51c65069449a0d32047aee71fef5d3' . '&' .
		'code=' . urlencode($_GET['code']);

$ch = curl_init('https://github.com/login/oauth/access_token');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

preg_match('/access_token=([0-9a-f]+)/', $response, $out);
echo $out[1];
curl_close($ch);
?>
