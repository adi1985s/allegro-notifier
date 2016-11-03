<?php
namespace App\ValueObjects\Contracts;

abstract class ApiCountryCode
{
    /**
     * @return int
     */
    abstract public function get(): int;
}