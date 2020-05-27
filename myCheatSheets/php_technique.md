# php technique

### to get the IP address via HTTPS
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
<hr>

### to set secure on cookie
```php
$name   = $this->session->getName();
$cookie = $this->cookies->get($name);
$cookie->setSecure(true);
```

### to reduce duplicated arrays
```php
generator fuction(object $gf)
```

### Query Bulder @Phalcon
```php
$fromDb = $this->getDi()->get('database_name')->query()
                ->inWhere('table_name.column_name', ['a', 'b']);
```

