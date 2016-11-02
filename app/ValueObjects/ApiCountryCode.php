<?php
namespace App\ValueObjects;

abstract class ApiCountryCode
{
    /**
     * @return int
     */
    abstract public function get(): int;
}