<?php declare(strict_types=1);


namespace SwoftTest\Validator\Unit;


use PHPUnit\Framework\TestCase;
use Swoft\Validator\Validator;
use SwoftTest\Validator\Testing\ValidateDemo;
use Swoft\Validator\Exception\ValidatorException;

/**
 * Class ValidatorTypeTest
 *
 * @since 2.0
 */
class ValidatorTypeTest extends TestCase
{
    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage array must exist!
     *
     * @throws ValidatorException
     */
    public function testArrayType()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testArray');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage int must exist!
     *
     * @throws ValidatorException
     */
    public function testIntType()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testInt');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage bool must exist!
     *
     * @throws ValidatorException
     */
    public function testBoolType()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testBool');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage string must exist!
     *
     * @throws ValidatorException
     */
    public function testStringType()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testString');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage float must exist!
     *
     * @throws ValidatorException
     */
    public function testFloatType()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testFloat');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage array message
     *
     * @throws ValidatorException
     */
    public function testArrayTypeMessage()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testArrayMessage');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage int message
     *
     * @throws ValidatorException
     */
    public function testIntTypeMessage()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testIntMessage');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage bool message
     *
     * @throws ValidatorException
     */
    public function testBoolTypeMessage()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testBoolMessage');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage string message
     *
     * @throws ValidatorException
     */
    public function testStringTypeMessage()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testStringMessage');
    }

    /**
     * @expectedException Swoft\Validator\Exception\ValidatorException
     * @expectedExceptionMessage float message
     *
     * @throws ValidatorException
     */
    public function testFloatTypeMessage()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testFloatMessage');
    }

    /**
     * @throws ValidatorException
     */
    public function testDefault()
    {
        $data = [];
        Validator::validate($data, ValidateDemo::class, 'testTypeDefault');

        $result = [
            'arrayDefault'  => [],
            'stringDefault' => '',
            'intDefault'    => 0,
            'boolDefault'   => false,
            'floatDefault'  => 1.0,
        ];
        $this->assertEquals($data, $result);
    }
}