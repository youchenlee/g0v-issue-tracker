<?php
include './httpful.phar';

$code = $_GET['code'];
$client_secret = '__FILL_ME_ON_DEPOLY__';
$client_id = 'f28f25345252f276d729';

$response = \Httpful\Request::post("https://github.com/login/oauth/access_token")
    ->body("code=$code&client_secret=$client_secret&client_id=$client_id")
    ->addHeader('Accept', 'application/json')
    ->send();

$access_token = $response->body->access_token;
$token_type = $response->body->token_type;
?>
<html>
<head>
<script>
    window.location = '/?access_token=<?php echo $access_token?>';
</script>
</head>
</html>
