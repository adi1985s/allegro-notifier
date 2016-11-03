<?php
namespace App\ValueObjects\Contracts;

abstract class ApiLocalVersion
{
    /**
     * @return int
     */
    abstract public function get(): int;
}