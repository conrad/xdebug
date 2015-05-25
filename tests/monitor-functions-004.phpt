--TEST--
Function Monitor: Method function name
--FILE--
<?php
class Foo
{
	static function doStuff()
	{
	}

	public function doMethodStuff()
	{
	}
}

xdebug_start_function_monitor( [ 'Foo::doStuff', 'Foo->doMethodStuff' ] );

Foo::doStuff();

$f = new Foo;
$f->doMethodStuff();

var_dump(xdebug_get_monitored_functions());
xdebug_stop_function_monitor();
?>
--EXPECT--
array(2) {
  [0]=>
  array(3) {
    ["function"]=>
    string(12) "Foo::doStuff"
    ["filename"]=>
    string(67) "/home/derick/dev/php/derickr-xdebug/tests/monitor-functions-004.php"
    ["lineno"]=>
    int(15)
  }
  [1]=>
  array(3) {
    ["function"]=>
    string(18) "Foo->doMethodStuff"
    ["filename"]=>
    string(67) "/home/derick/dev/php/derickr-xdebug/tests/monitor-functions-004.php"
    ["lineno"]=>
    int(18)
  }
}
