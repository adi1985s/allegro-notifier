<?php
namespace App\ValueObjects\Contracts;

abstract class ApiCredentials
{
    /**
     * @return string
     */
    abstract public function getUsername(): string;

    /**
     * @return string
     */
    abstract public function getPassword(): string;

    /**
     * @return string
     */
    abstract public function getApiToken(): string;
}