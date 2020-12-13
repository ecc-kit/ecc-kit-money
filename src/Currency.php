<?php

namespace EccKit\Money;

/**
 * Class Currency.
 */
class Currency
{
    /** @var string ISO 4217 string code */
    protected string $code;
    /** @var int ISO 4217 number code */
    protected int $number;
    /** @var int Decimal value of currency (ISO 4217) */
    protected int $decimal;
    /** @var string Symbol of currency */
    protected string $symbol;
    
    /**
     * Currency constructor.
     *
     * @param string $code    ISO 4217 string code
     * @param int    $number  ISO 4217 number code
     * @param int    $decimal Decimal value of currency (ISO 4217)
     * @param string $symbol  Symbol of currency
     */
    public function __construct(
        string $code,
        int $number,
        int $decimal,
        string $symbol = ''
    )
    {
        $this->code = $code;
        $this->number = $number;
        $this->decimal = $decimal;
        $this->symbol = $symbol;
    }
    
    /**
     * Currency string code(ISO 4217).
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
    
    /**
     * Currency number code(ISO 4217).
     *
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }
    
    /**
     * Decimal value of currency (ISO 4217).
     *
     * @return int
     */
    public function getDecimal(): int
    {
        return $this->decimal;
    }
    
    /**
     * Symbol of currency.
     *
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->getSymbol();
    }
}
