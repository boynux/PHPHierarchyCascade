<?php

class Test {
	static $id = 10;

	function TestMe ($prefix = '') {
		$id = '';

		if (get_called_class () != __CLASS__) {
			$className = get_parent_class (get_called_class ());

			$id = (new ReflectionMethod ($className, 'TestMe'))->invoke ($this);
		}

		return $prefix . $id .'.' . static::$id;
	}
}

class ChildTest extends Test {
	static $id = 11;
}

class ChildTestTest extends ChildTest {
	static $id = 12;
}

class ChildTestTest2 extends ChildTestTest {
	static $id = 13;
}

$test = new ChildTestTest2;
echo $test->TestMe ('Fantastic');
