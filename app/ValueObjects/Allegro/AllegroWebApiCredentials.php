<?php
namespace App\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiCredentials;

class AllegroWebApiCredentials extends ApiCredentials
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $webApiToken;

    /**
     * @param string $username
     * @param string $password
     * @param string $webApiToken
     */
    public function __construct(string $username, string $password, string $webApiToken)
    {
        $this->guard($username, $password, $webApiToken);
        $this->username = $username;
        $this->password = $password;
        $this->webApiToken = $webApiToken;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $webApiToken
     */
    protected function guard($username, $password, $webApiToken)
    {
        if (empty($username)) {
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'username'));
        }
        if (empty($password)) {
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'password'));
        }
        if (empty($webApiToken)) {
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'webApiToken'));
        }
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->webApiToken;
    }
}