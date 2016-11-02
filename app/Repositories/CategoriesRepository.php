<?php
namespace App\Repositories;

use Doctrine\Common\Collections\ArrayCollection;

abstract class CategoriesRepository
{
    abstract public function getAll() : ArrayCollection;
}