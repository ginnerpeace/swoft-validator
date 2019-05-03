<?php declare(strict_types=1);


namespace Swoft\Validator\Annotation\Parser;


use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use Swoft\Validator\ValidatorRegister;
use Swoft\Validator\Annotation\Mapping\IntType;

/**
 * Class IntTypeParser
 *
 * @since 2.0
 *
 * @AnnotationParser(IntType::class)
 */
class IntTypeParser extends Parser
{
    /**
     * @param int    $type
     * @param object $annotationObject
     *
     * @return array
     * @throws \Swoft\Validator\Exception\ValidatorException
     */
    public function parse(int $type, $annotationObject): array
    {
        if ($type != self::TYPE_PROPERTY) {
            return [];
        }

        ValidatorRegister::registerValidatorItem($this->className, $this->propertyName, $annotationObject);

        return [];
    }
}