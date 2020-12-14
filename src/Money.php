<?php

declare(strict_types=1);

namespace EccKit\Money;

use EccKit\Money\Calculator\Calculator;
use EccKit\Money\Formatter\Formatter;

/**
 * Class Money.
 */
class Money
{
    /** @var int Money value */
    protected int $value;
    /** @var Currency Currency */
    protected Currency $currency;
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    /** @var Formatter Formatter */
    protected Formatter $formatter;
    
    /**
     * Money constructor.
     *
     * @param int        $value      Value
     * @param Currency   $currency   Currency
     * @param Calculator $calculator Calculator
     * @param Formatter  $formatter  Formatter
     */
    public function __construct(int $value, Currency $currency, Calculator $calculator, Formatter $formatter)
    {
        $this->value = $value;
        $this->currency = $currency;
        $this->calculator = $calculator;
        $this->formatter = $formatter;
    }
    
    /**
     * CreateFromImmutable
     *
     * @param MoneyImmutable $money Money
     *
     * @return Money
     */
    public static function createFromImmutable(MoneyImmutable $money): Money
    {
        return new static(
            $money->getValue(),
            $money->getCurrency(),
            $money->getCalculator(),
            $money->getFormatter()
        );
    }
    
    /**
     * Money value.
     *
     * @return int
     */
    public function getValue(): int
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
     * Calculator.
     *
     * @return Calculator
     */
    public function getCalculator(): Calculator
    {
        return $this->calculator;
    }
    
    /**
     * Formatter.
     *
     * @return Formatter
     */
    public function getFormatter(): Formatter
    {
        return $this->formatter;
    }
    
    /**
     * Addition.
     *
     * @param Money $money Money
     *
     * @return $this
     */
    public function add(Money $money): Money
    {
        $this->modify($this->getCalculator()->add($this, $money));
        
        return $this;
    }
    
    /**
     * Subtraction.
     *
     * @param Money $money Money
     *
     * @return $this
     */
    public function sub(Money $money): Money
    {
        $this->modify($this->getCalculator()->sub($this, $money));
        
        return $this;
    }
    
    /**
     * Multiplication.
     *
     * @param int    $value        Value
     * @param string $roundingMode Rounding Mode
     *
     * @return $this
     */
    public function mul(int $value, string $roundingMode = Calculator::ROUND_MATH): Money
    {
        $this->modify($this->getCalculator()->mul($this, $value, $roundingMode));
        
        return $this;
    }
    
    /**
     * Division.
     *
     * @param int    $value        Value
     * @param string $roundingMode Rounding Mode
     *
     * @return $this
     */
    public function div(int $value, string $roundingMode = Calculator::ROUND_MATH): Money
    {
        $this->modify($this->getCalculator()->div($this, $value, $roundingMode));
        
        return $this;
    }
    
    /**
     * Format.
     *
     * @param string $format Format
     *
     * @return string
     */
    public function format(string $format = ''): string
    {
        return $this->getFormatter()->format($this, $format);
    }
    
    /**
     * Modify.
     *
     * @param int $value Value
     *
     * @return $this
     */
    protected function modify(int $value): Money
    {
        $this->value = $value;
        
        return $this;
    }
}
