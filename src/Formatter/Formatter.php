<?php

namespace EccKit\Money\Formatter;

use EccKit\Money\Calculator\Calculator;
use EccKit\Money\Money;

/**
 * Interface Formatter.
 */
abstract class Formatter
{
    /** Default format template */
    public const FORMAT = '%s%f';
    
    /** List of placeholders */
    protected const PLACEHOLDERS = [
        '%s',
        '%f',
    ];
    
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    
    /**
     * Formatter constructor.
     *
     * @param Calculator $calculator Calculator
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Format.
     *
     * @param Money  $money  Money
     * @param string $format Format
     *
     * @return mixed
     */
    public function format(Money $money, string $format): string
    {
        $map = $this->getMap($money);
        
        $this->assertMapPlaceholders($map);
        
        return str_replace(
            array_keys($map),
            array_values($map),
            $format
        );
    }
    
    /**
     * Placeholders value map.
     *
     * @param Money $money Money
     *
     * @return array
     */
    abstract protected function getMap(Money $money): array;
    
    /**
     * Validate Map
     *
     * @param array $map Map
     */
    protected function assertMapPlaceholders(array $map): void
    {
        $validate = array_diff (self::PLACEHOLDERS, array_keys($map));
        
        if ($validate) {
            throw new InvalidArgumentException(
                sprintf('Format map is not valid, map of %s placeholders expected'),
                implode(', ', $validate)
            );
        }
    }
}
