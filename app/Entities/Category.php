<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={
 *     @ORM\Index(name="category_id_parent_id", columns={"id", "parent_id"}),
 *     @ORM\Index(name="category_position_idx", columns={"position"}),
 *     @ORM\Index(name="category_id_parent_id_a_id_a_p_id", columns={"id", "parent_id", "allegro_id", "allegro_parent_id"})
 * })
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $parentId;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $name;

    /**
     * @ORM\Column(type="smallint", options={"unsigned"=true})
     */
    protected $position;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $allegroId;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $allegroParentId;

    /**
     * @param string $name
     * @param int $position
     * @param int $parentId
     * @param int $allegroId
     * @param int $allegroParentId
     */
    public function __construct(string $name, int $position, int $parentId, int $allegroId, int $allegroParentId)
    {
        $this->name = $name;
        $this->parentId = $parentId;
        $this->allegroId = $allegroId;
        $this->allegroParentId = $allegroParentId;
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getParentId() : int
    {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPosition() : int
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function getAllegroId() : int
    {
        return $this->allegroId;
    }

    /**
     * @return int
     */
    public function getAllegroParentId() : int
    {
        return $this->allegroParentId;
    }


}