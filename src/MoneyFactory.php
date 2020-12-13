<?php

namespace EccKit\Money;

use EccKit\Money\Calculator\Calculator;
use EccKit\Money\Formatter\Formatter;

/**
 * Class MoneyFactory.
 */
class MoneyFactory
{
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    /** @var Formatter Formatter */
    protected Formatter $formatter;
    
    /**
     * MoneyFactory constructor.
     *
     * @param Calculator $calculator Calculator
     * @param Formatter  $formatter  Formatter
     */
    public function __construct(Calculator $calculator, Formatter $formatter)
    {
        $this->calculator = $calculator;
        $this->formatter = $formatter;
    }
    
    /**
     * Create.
     *
     * @param float    $value    Value
     * @param Currency $currency Currency
     *
     * @return Money
     */
    public function create(float $value, Currency $currency): Money
    {
        return new Money(
            $value,
            $currency,
            $this->getCalculator(),
            $this->getFormatter()
        );
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
}
