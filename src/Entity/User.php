<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    protected $google_id;

    /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    protected $google_access_token;

    public function __construct() {
        parent::__construct();
    }

    public function setGoogleId($id) {
        $this->google_id = $id;
    }

    public function setGoogleAccessToken($token) {
        $this->google_access_token = $token;
    }

    public function getGoogleId() {
        return $this->google_id;
    }

    public function getGoogleAccessToken() {
        return $this->google_access_token;
    }

}
