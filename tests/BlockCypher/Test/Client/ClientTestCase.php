<?php

namespace BlockCypher\Test\Client;

/**
 * Class ClientTestCase
 *
 * @package BlockCypher\Test\Client
 */
class ClientTestCase extends \PHPUnit_Framework_TestCase
{
    public function mockProvider()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockApiContext();

        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return null
     */
    public static function getObject()
    {
        return null;
    }

    /**
     * @param string $version
     * @param string $coin
     * @param string $chain
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getMockApiContext($version = 'v1', $coin = 'btc', $chain = 'main')
    {
        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->once())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/$version/$coin/$chain"));

        return $mockApiContext;
    }

    public function mockProviderGetParamsValidation()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockApiContext();

        return array(
            array($obj, $mockApiContext, null),
            array($obj, $mockApiContext, ''),
            array($obj, $mockApiContext, 'TestSample'),
        );
    }

    /**
     * Asserts that an array has a specified subset.
     * TODO: replace by
     * https://phpunit.de/manual/current/en/appendixes.assertions.html#appendixes.assertions.assertArraySubset
     * when PHPUnit version is updated.
     *
     * @param array  $subset
     * @param array $array
     * @param boolean            $strict  Check for object identity
     * @param string             $message
     * @since Method available since PHPUnit Release 4.4.0
     */
    protected function assertArraySubset($subset, $array, $strict = false, $message = '')
    {
        foreach($subset as $item) {
            $this->assertContains($item, $array);
        }
    }
}