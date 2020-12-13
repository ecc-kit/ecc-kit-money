<?php

namespace EccKit\Money\Calculator;

use EccKit\Money\Money;
use InvalidArgumentException;

/**
 * Class Calculator.
 */
class Calculator
{
    /** Math rounding */
    public const ROUND_MATH = 'ROUND_MATH';
    /** Always up */
    public const ROUND_UP = 'ROUND_UP';
    /** Always down */
    public const ROUND_DOWN = 'ROUND_DOWN';
    
    /**
     * Addition.
     *
     * @param Money ...$monies Monies
     *
     * @return int
     */
    public function add(Money ...$monies): int
    {
        $result = 0;
        foreach ($this->prepareMonies($monies) as $value) {
            $result += (int) $value;
        }
        
        return $result;
    }
    
    /**
     * Subtraction.
     *
     * @param Money ...$monies Monies
     *
     * @return int
     */
    public function sub(Money ...$monies): int
    {
        $result = 0;
        foreach ($this->prepareMonies($monies) as $value) {
            $result -= (int) $value;
        }
    
        return $result;
    }
    
    /**
     * Multiplication.
     *
     * @param Money $money Money
     * @param int $value Value
     *
     * @return int
     */
    public function mul(Money $money, int $value, string $roundingMode): int
    {
        return (int) $money->getValue() * $value;
    }
    
    /**
     * Division.
     *
     * @param Money $money Money
     * @param int $value Value
     *
     * @return int
     */
    public function div(Money $money, int $value, string $roundingMode): int
    {
        return (int) $money->getValue() / $value;
    }
    
    /**
     * Round.
     *
     * @param float  $value        Value
     * @param int    $precision    Precision
     * @param string $roundingMode Rounding Mode
     *
     * @return int
     */
    public function round(float $value, int $precision, string $roundingMode): int
    {
        /** @todo: Implement this */
        
        return $value;
    }
    
    /**
     * Monies prepare.
     *
     * @param Money ...$monies
     *
     * @return array<Money>
     */
    protected function prepareMonies(Money ...$monies): array
    {
        $currency = '';
        $values = [];
        foreach ($monies as $money) {
            if (!$currency) {
                $currency = $money->getCurrency();
            }
            
            if ($currency->getCode() !== $money->getCurrency()->getCode()) {
                throw new InvalidArgumentException(
                    'currencies must be the same, first currency is %s, other currencies contain %s',
                    $currency->getCode(),
                    $money->getCurrency()->getCode()
                );
            }
            
            $values[] = $money->getValue();
        }
        
        return $values;
    }
}
