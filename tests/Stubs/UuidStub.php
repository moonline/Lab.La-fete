<?php
namespace App\Tests\Stubs;


class UuidStub {
	public static $index = 0;
	static function uuid4() {
		return ++self::$index;
	}
}
