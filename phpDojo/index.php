<?
$testString = 'hello';

// no use
$testFunction = function() use($testString) {
    echo($testString);
};

$testFunction();