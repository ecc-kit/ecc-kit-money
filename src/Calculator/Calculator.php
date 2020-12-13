<?php

namespace EccKit\Money\Calculator;

use EccKit\Money\Money;
use InvalidArgumentException;

/**
 * Class Calculator.
 */
class Calculator
{
    /**
     * Addition.
     *
     * @param Money ...$monies Monies
     *
     * @return float
     */
    public function add(Money ...$monies): float
    {
        $result = 0;
        foreach ($this->prepareMonies($monies) as $value) {
            $result += $value;
        }
        
        return $result;
    }
    
    /**
     * Subtraction.
     *
     * @param Money ...$monies Monies
     *
     * @return float
     */
    public function sub(Money ...$monies): float
    {
        $result = 0;
        foreach ($this->prepareMonies($monies) as $value) {
            $result -= $value;
        }
    
        return $result;
    }
    
    /**
     * Multiplication.
     *
     * @param Money $money Money
     * @param float $value Value
     *
     * @return float
     */
    public function mul(Money $money, float $value): float
    {
        return $money->getValue() * $value;
    }
    
    /**
     * Division.
     *
     * @param Money $money Money
     * @param float $value Value
     *
     * @return float
     */
    public function div(Money $money, float $value): float
    {
        return $money->getValue() / $value;
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
        $currency = null;
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
