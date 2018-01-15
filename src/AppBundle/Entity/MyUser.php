<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * MyUser.
 *
 * @ORM\Entity()
 */
class MyUser extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="gitlab_id", type="string", length=255, nullable=true)
     */
    private $gitlabId;

    /**
     * @ORM\Column(name="gitlab_access_token", type="string", length=255, nullable=true)
     */
    private $gitlabAccessToken;

    /**
     * @ORM\Column(name="gitlab_avatar", type="string", nullable=true)
     */
    private $gitlabAvatar;

    /**
     * @param string $gitlabId
     */
    public function setGitlabId($gitlabId)
    {
        $this->gitlabId = $gitlabId;
    }

    /**
     * @return string
     */
    public function getGitlabId()
    {
        return $this->gitlabId;
    }

    /**
     * @param string $gitlabAccessToken
     */
    public function setGitlabAccessToken($gitlabAccessToken)
    {
        $this->gitlabAccessToken = $gitlabAccessToken;
    }

    /**
     * @return string
     */
    public function getGitlabAccessToken()
    {
        return $this->gitlabAccessToken;
    }

    /**
     * @return string
     */
    public function getGitlabAvatar()
    {
        return $this->gitlabAvatar;
    }

    /**
     * @param string $gitlabAvatar
     */
    public function setGitlabAvatar($gitlabAvatar)
    {
        $this->gitlabAvatar = $gitlabAvatar;
    }
}
