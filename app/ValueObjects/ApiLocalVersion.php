<?php
namespace App\ValueObjects;

abstract class ApiLocalVersion
{
    /**
     * @return int
     */
    abstract public function get(): int;
}