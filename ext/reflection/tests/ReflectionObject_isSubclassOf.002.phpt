--TEST--
ReflectionObject::isSubclassOf() - bad arguments
--CREDITS--
Robin Fernandes <robinf@php.net>
Steve Seear <stevseea@php.net>
--FILE--
<?php
class C {}
$ro = new ReflectionObject(new C);

echo "\n\nTest bad arguments:\n";
try {
	var_dump($ro->isSubclassOf());
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
try {
	var_dump($ro->isSubclassOf('C', 'C'));
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
try {
	var_dump($ro->isSubclassOf(null));
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
try {
	var_dump($ro->isSubclassOf('ThisClassDoesNotExist'));
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
try {
	var_dump($ro->isSubclassOf(2));
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
?>
--EXPECTF--
Test bad arguments:

Warning: ReflectionClass::isSubclassOf() expects exactly 1 parameter, 0 given in %s on line 7
NULL

Warning: ReflectionClass::isSubclassOf() expects exactly 1 parameter, 2 given in %s on line 12
NULL
Parameter one must either be a string or a ReflectionClass object
Class ThisClassDoesNotExist does not exist
Parameter one must either be a string or a ReflectionClass object
