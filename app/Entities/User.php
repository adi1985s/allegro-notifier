<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use LaravelDoctrine\ORM\Auth\Authenticatable as AuthTrait;

/**
 * @ORM\Entity
 */
class User implements AuthContract
{
    use AuthTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=254)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=254)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=254)
     */
    private $lastName;

    public function __construct(string $email, string $firstName, string $lastName, string $password)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = bcrypt($password);
    }

    /**
     * @return int
     */
    public function getAuthIdentifierName() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }
}
