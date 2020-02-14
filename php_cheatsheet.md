# php
### to get the IP address that a visitor/api comes from via HTTPS
```php
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipArray = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $apiAddress = $ipArray[0];
} else {
    $apiAddress = $_SERVER['REMOTE_ADDR'];
}
```

### to change the encoding and pull a request apart
- notice:"mb_detect_encoding()" is NOT accurate as supposed to be
```php
$response = $_POST;
$decodedResponse = [];
foreach($response as $varName => $varValue){
    $decodedResponse[$varName] = mb_convert_encoding(urldecode($varValue), 'UTF-8', 'the original encoding');
}
extract($decodedResponse);
```
