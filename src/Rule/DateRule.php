<?php declare(strict_types=1);

namespace Swoft\Validator\Rule;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Validator\Annotation\Mapping\Date;
use Swoft\Validator\Contract\RuleInterface;
use Swoft\Validator\Exception\ValidatorException;

/**
 * Class IsDateRule
 *
 * @since 2.0
 *
 * @Bean(Date::class)
 */
class DateRule implements RuleInterface
{
    /**
     * @param array $data
     * @param string $propertyName
     * @param object $item
     * @param null $default
     *
     * @return array
     * @throws ValidatorException
     */
    public function validate(array $data, string $propertyName, $item, $default = null): array
    {
        /* @var Date $item */
        $format = $item->getFormat();

        $value = $data[$propertyName];

        if (! empty($format)) {
            $parsed = date_parse_from_format($format, $value);

            if ($parsed['error_count'] === 0 && $parsed['warning_count'] === 0) {
                return $data;
            }
        } elseif (is_string($value)) {
            $parsed = date_parse($value);

            if (checkdate($parsed['month'], $parsed['day'], $parsed['year'])) {
                return $data;
            }
        } elseif (filter_var($value, FILTER_VALIDATE_INT)) {
            // Between 1970-01-01 00:00:00 and 9999-12-31 23:59:59
            if ($value >= -28800 && $value <= 253402271999) {
                return $data;
            }
        }

        if (empty($format)) {
            $message = $item->getMessage();
            if (empty($message)) {
                $message = sprintf('The %s is not a valid date.', $propertyName);
            }
        } else {
            $message = sprintf(
                'The %s does not match the format %s.',
                $propertyName,
                $format
            );
        }

        /* @var Date $item */
        throw new ValidatorException($message);
    }
}
