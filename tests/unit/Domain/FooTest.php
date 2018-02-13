<?php
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 16.12.17
 * Time: 23:24
 */

namespace Domain;

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    /**
     * @test
     */
    public function foo()
    {
        self::assertEquals(1, 1);
    }
}
