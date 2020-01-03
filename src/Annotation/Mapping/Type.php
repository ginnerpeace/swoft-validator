<?php declare(strict_types=1);


namespace Swoft\Validator\Annotation\Mapping;

/**
 * Class Type
 *
 * @since 2.0
 */
class Type
{
    /**
     * @var bool
     */
    protected $nullable = false;

    /**
     * Type constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['nullable'])) {
            $this->nullable = $values['nullable'];
        }
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }
}
