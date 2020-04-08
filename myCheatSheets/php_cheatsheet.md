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

### to compare a variable with multiple conditions using "in_array"
- get readable code especially when to compare with a set of long name consts (hopefully)
```php
if(in_array($targetVariable, [
    TargetDifinedMasters::CATEGORY_NAME[OutputConfigItem[$condition1]],
    TargetDifinedMasters::CATEGORY_NAME[OutputConfigItem[$condition2]],
    TargetDifinedMasters::CATEGORY_NAME[OutputConfigItem[$condition3]]...

])){
```
### to reduce duplicated arrays
- generator fuction(gf)!!
- gf is an object
```php

```

