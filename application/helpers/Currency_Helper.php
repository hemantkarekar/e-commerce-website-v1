<?php
// number_to_currency(float $number, 'USD', 'en_US', 2)

function number_to_currency(mixed $number, $currency, $decimals = 2): string
{
    $number = number_format((float)$number, $decimals, '.', ',');
    return NumberFormatter::formatCurrency($number, $currency);
}

function number_to_amount(mixed $number, $decimals): string
{
    return number_format((float)$number, $decimals, '.', ',');
}
