<?php

namespace MageModule\Core\Test\Unit;

abstract class AbstractTestCase extends \Magento\Framework\TestFramework\Unit\BaseTestCase
{
    /**
     * Allows us to unit test private/protected methods
     *
     * @param object $object
     * @param string $methodName
     * @param array  $parameters
     *
     * @return mixed
     * @throws \ReflectionException
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method     = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
