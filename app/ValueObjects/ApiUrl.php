<?php
namespace App\ValueObjects;

abstract class ApiUrl
{
    /**
     * @return int
     */
    abstract public function get(): string;
}