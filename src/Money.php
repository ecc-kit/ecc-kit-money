<?php

namespace EccKit\Money;

/**
 * Class Money.
 */
class Money
{
    /** @var float Money value */
    protected float $value;
    /** @var Currency */
    protected Currency $currency;
    /** @var int */
    protected int $accuracy;
    
    /**
     * Money constructor.
     *
     * @param float    $value    Value
     * @param Currency $currency Currency
     * @param ?int     $accuracy Custom decimal currency value
     */
    public function __construct(float $value, Currency $currency, ?int $accuracy = null)
    {
        $this->currency = $currency;
        $this->accuracy = $accuracy ?? $currency->getDecimal();
        
        $this->value = $this->toAccuracy($value, $this->getAccuracy());
    }
    
    /**
     * Money value.
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
    
    /**
     * Currency.
     *
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }
    
    /**
     * Accuracy.
     *
     * @return int
     */
    public function getAccuracy(): int
    {
        return $this->accuracy;
    }
    
    /**
     * To accuracy.
     *
     * @param float $value    Value
     * @param int   $accuracy Currency
     *
     * @return float
     */
    protected function toAccuracy(float $value, int $accuracy): float
    {
        return round($value, $accuracy);
    }
}
