<?php
namespace App\ValueObjects\Contracts;

abstract class ApiUrl
{
    /**
     * @return string
     */
    abstract public function get(): string;
}