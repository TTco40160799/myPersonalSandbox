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

### multi-byte string functions
- multi byte string length
```php
int mb_strlen(string $string [, string $encoding])
```
  - return the number of multi-byte string's length

- UPPER-CASE and lower-case
```php
print strtolower('株式会社TT.CO'); //株式会社tt.co
print strtoupper('株式会社tt.co'); //株式会社TT.CO
print lcfirst('TT.CO'); //tT.CO
print ucfirst('tt.co'); //Tt.co
print ucwords('tt.co'); //TT.CO

print mb_strtolower('株式会社ＴＴ．ＣＯ'); //株式会社ｔｔ．cｏ
print mb_strtoupper('株式会社ｔｔ．cｏ'); //株式会社TT.CO
```

- a slice of mb string
```php
string mb_substr(string $str, int $start [, int $length[, string $encoding]]);
```
```
例：「Tokyoタワー」での位置について
↓ 　　↑
0 Ｔ -8
1 Ｏ -7
2 Ｋ -6
3 Ｙ -5
4 Ｏ -4
5 タ -3
6 ワ -2
7 ー -1

```

- replace
```php
mixed str_replace(mixed $sorce, mixed $rep, mixed $target[, int &$counter]);
```
  - $source, $rep : string, int as well as array!

- explode
```php
array explode(string $delimiter, string $str[, int $limit]);

$str = '夢・出逢い・魔性';
$delimiter = '・';
print_r(explode($delimiter, $str));
// array([0]=>'夢' [1]=>'出逢い' [2]=>'魔性');
```

- search：return the first position
```php
int mb_strpos(string $str, string $substr[, int $off [, string $encoding]]);
```

- search：return the last position
```php
int mb_strrpos(string $str, string $substr[, int $off [, string $encoding]]);
```

- reform the string
```php
string sprintf('%2sが%1sです', '大好き', 'だし巻き卵'); //引数は文字列型
string vprintf('%2sが%1sです', ['大好き', 'だし巻き卵']); //引数が配列型
```

- convert
```php
string mb_convert_kana(string $str[, string $opt = 'KV'[, string $encoding]]);
```
  - KV ; (半角カナ→全角カナ) + (濁点付きの文字を１文字に変換)

- エンコーディング変換
```php
//1文字列変数のエンコーディング変換：$fromは複数指定可能
string mb_convert_encoding(string $target, string $to[, mixed $from]);

//複数の文字列変数を配列で渡してエンコーディング変換
string mb_convert_variables(string $to, mixed $from, mixed &$vars[, ...]);
```


### to reduce duplicated arrays
- generator fuction(gf)!!
- gf is an object
```php

```

