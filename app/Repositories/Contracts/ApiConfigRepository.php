<?php
namespace App\Repositories\Contracts;

interface ApiConfigRepository
{
    public function getApiToken() : string;

    public function getApiLocalVersion() : int;

    public function getApiUrl() : string;
}