--TEST--
026: Name ambiguity (class name & namespace name)
--FILE--
<?php
namespace Foo;

class Foo {
  function __construct() {
  	echo "Method - ".__CLASS__."::".__FUNCTION__."\n";
  }
  static function Bar() {
  	echo "Method - ".__CLASS__."::".__FUNCTION__."\n";
  }
}

function Bar() {
  echo "Func   - ".__FUNCTION__."\n";
}

$x = new Foo;
Foo::Bar();
$x = new Foo::Foo;
Foo::Foo::Bar();
::Foo::Bar();
--EXPECT--
Method - Foo::Foo::__construct
Method - Foo::Foo::Bar
Method - Foo::Foo::__construct
Method - Foo::Foo::Bar
Func   - Foo::Bar
