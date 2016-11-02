<?php
namespace App\Repositories\Doctrine;

use App\Repositories\Contracts\CategoryRepository;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Pagination\Paginatable;

class DoctrineCategoryRepository extends EntityRepository implements CategoryRepository
{
    use Paginatable;

    /**
     * @return int
     */
    public function count() : int
    {
        return $this->createQueryBuilder('queryTotal')
            ->select('COUNT(queryTotal.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}