# php

<summary>基本構造</summary>
<details>

- string型
    - 基本は'シングルクォート'
    - "ダブルクォート"は、特殊な場合だけ
    - 変数を展開できる
    - エスケープシーケンスが使える

### Multi-byte String Methods
#### multi byte string length
```php
int mb_strlen(string $string [, string $encoding])
```
- return the number of multi-byte string's length

#### UPPER-CASE and lower-case
```php
print strtolower('株式会社TT.CO'); //株式会社tt.co
print strtoupper('株式会社tt.co'); //株式会社TT.CO
print lcfirst('TT.CO'); //tT.CO
print ucfirst('tt.co'); //Tt.co
print ucwords('tt.co'); //TT.CO

print mb_strtolower('株式会社ＴＴ．ＣＯ'); //株式会社ｔｔ．cｏ
print mb_strtoupper('株式会社ｔｔ．cｏ'); //株式会社TT.CO
```

#### a slice of mb string
```php
string mb_substr(string $str, int $start [, int $length[, string $encoding]]);

/* 例：「Tokyoタワー」での位置について
↓ 　　↑
0 Ｔ -8
1 Ｏ -7
2 Ｋ -6
3 Ｙ -5
4 Ｏ -4
5 タ -3
6 ワ -2
7 ー -1
*/
```

#### replace
```php
mixed str_replace(mixed $sorce, mixed $rep, mixed $target[, int &$counter]);
```
- $source, $rep : string, int as well as array!

#### explode
```php
array explode(string $delimiter, string $str[, int $limit]);

$str = '夢・出逢い・魔性';
$delimiter = '・';
print_r(explode($delimiter, $str));
// array([0]=>'夢' [1]=>'出逢い' [2]=>'魔性');
```

#### search：return the first position
```php
int mb_strpos(string $str, string $substr[, int $off [, string $encoding]]);
```

#### search：return the last position
```php
int mb_strrpos(string $str, string $substr[, int $off [, string $encoding]]);
```

#### reform the string
```php
string sprintf('%2sが%1sです', '大好き', 'だし巻き卵'); //引数は文字列型
string vprintf('%2sが%1sです', ['大好き', 'だし巻き卵']); //引数が配列型
```

#### converting
```php
string mb_convert_kana(string $str[, string $opt = 'KV'[, string $encoding]]);
//KV ; (半角カナ→全角カナ) + (濁点付きの文字を１文字に変換)
```

#### encoding
```php
//1文字列変数のエンコーディング変換：$fromは複数指定可能
string mb_convert_encoding(string $target, string $to[, mixed $from]);

//複数の文字列変数を配列で渡してエンコーディング変換
string mb_convert_variables(string $to, mixed $from, mixed &$vars[, ...]);
```

#### Email
```php
bool mb_send_mail(string $to, string $subject, string $msg[, string $headers[, string $params]]);
```
- headers could be below;
  - Cc / Bcc
  - Content-Type
  - Date
  - From
  - In-Reply-To / Message-ID
  - Received
  - Reply-To
  - Subject
  - X-Mailer

- Requirement : edit <strong>php.ini & sendmail.ini</strong>
  - Windows
    - php.ini
      ```INI
      mbstring.language = "Japanese"
      sendmail_path = "¥"C:¥xampp¥sendmail¥sendmail.exe¥" -t"
      ;sendmail_path = "C:¥xampp¥mailtodisk¥mailtodisk.exe"
      ```
    - sendmail.ini
      ```INI
      smtp_server=smtp.example.exe
      smtp_port=587
      auth_username=user01example
      auth_password=passwordExample
      force_sender=user01@example.com
      ``` 
  - Linux
    - php.ini
      ```INI
      mbstring.language = "Japanese"
      sendmail_path = sendmail -t -i -fuser01@exmaple.com
      ```
  - remember the restart <strong>Apache</strong>
<hr>

- 浮動小数点リテラル：float
    - <仮数部> e/E <符号><指数部>
    - e/Eの区別は特にない
    - 例：35480000 = 3.548E5  = 3.548 * 10 ^ 5
    - 例：0.001141 = 1.141e-3 = 1.141 * 10 ^ -3
- 浮動小数点数の演算
- resource型
    - 外部にあるファイル等のリソース
- 配列の結合
- 配列の比較の順序：==, !=, <>　等
- ビット演算子、というかビット演算そのもの：何に使うの？
    - 良い記事](https://qiita.com/satoshinew/items/566bf91707b5371b62b6)
    - 主なメリット
        - データ量が少なくて済む
        - 実際速い
        - 一つのデータに複数の情報を詰め込める
- 実行演算子
    - バッククォートで囲んだブロック
    - シェルとして実行される
- エラー制御演算子
    - メソッド前に「@」をつける
    - 例: ＠print 1/0;
    - なるべく使わずに、エラー制御にすべき
    - デバグしにくくなる
- 制御構文
￼
    - while：while(条件式){ 処理 }
        1. 条件分岐
        2. Trueの場合に任意処理、Falseで終了
        3. 1へ戻る
    - do~while：do{ 処理 }while (条件式)
        1. 任意処理
        2. 条件分岐
        3. Trueの場合に1ヘ戻りFalseで終了
    - for
        1. 初期化処理
        2. 条件分岐
        3. Trueの場合に任意処理、Falseで終了
        4. 増減処理
        5. 2へ戻る
    - foreach
        1. 条件分岐：配列/オブジェクト内に要素があるかどうか
        2. 任意処理
        3. 1へ戻り、次の要素へ対象を移す

    - カンマ演算子( , )
        - 条件式、処理、増減式を追記できる
        - for($i=0; $i<9; print "{$i}番目", $i++)
        - 視認性悪いので濫用しないこと

    - break
        - 強制的にループから抜ける
    - continue
        - 強制的にループを1回分スキップする

- 静的変数(static)について
    - 同じ関数を複数回呼び出す際には保存されている
    - 変数名で呼び出すことはない
- 可変長引数の関数
    - 「…」ピリオド3つを(型宣言)(…)(変数名)の順番でつける
    - 引数の数が不特定の場合に利用
        - function(int …$number)
    - 渡す引数の全てが宣言された型である必要がある
    - 可変長引数は、引数リストの最後尾に記述する必要がある
    - PHP5.6以降の機能
```php
function replaceContents(string $path, string …$args) :string
{
	$data = file_get_contents($path);
	for($i = 0; $i < count($args); $i++){
		$data = str_replace(‘{’ . ($i) . ‘}’, $args[$I], $data);
	}
	return $data;
}
```
    - 「…」直後に配列(≠連想配列)を渡すと、各要素を変数にあてがってくれる(=アンパック)
```php
function products(int $tate, int $yoko, int $oku) :int
{
	return $tate * $yoko * $oku;
} 

print products(…[10,10,10]) . ‘立方メートル’;	// 結果：1,000立方メートル
```

- 可変関数
    - 定義済み関数名の変数によって呼び出す関数
    - 型名：callable
```php
function callableFunction(callable $func, array $array)
{
	return $func(…$array);
}

$name = ‘products’;
$size = [1, 2, 3];
print callableFunction($name, $size);	//結果：6立方メートル
```
- 無名関数 / use
    - 親スコープの変数等を引き継ぐ
		https://www.php.net/manual/ja/functions.anonymous.php

</details>


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

### to reduce duplicated arrays
```php
generator fuction(object $gf)
```

```php

```

