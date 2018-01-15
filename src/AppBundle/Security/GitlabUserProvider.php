<?php

namespace AppBundle\Security;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;

class GitlabUserProvider extends FOSUBUserProvider
{
    /**
     * {@inheritdoc}
     */
    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $username = $response->getUsername();

        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();
        $setterPrefix = 'set'.ucfirst($service);
        $setter_id = $setterPrefix.'Id';
        $setter_token = $setterPrefix.'AccessToken';

        //we "disconnect" previously connected users
        if (null !== $previousUser = $this->userManager->findUserBy(array($property => $username))) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }

        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());
        $this->userManager->updateUser($user);
    }
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $service = $response->getResourceOwner()->getName();
        $accessToken = $response->getAccessToken();
        $serviceId = $response->getUsername();
        $email = $response->getEmail();

        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';

        $user = $this->userManager->findUserByEmail($email);

        if (null === $user) {
            $user = $this->userManager->createUser();
            $user->setUsername($response->getData()['username']);
            $user->setEmail($email);
            $user->setPassword('');
            $user->setEnabled(true);
            $user->setGitlabAvatar($response->getData()['avatar_url']);
        }

        $user->$setter_id($serviceId);
        $user->$setter_token($accessToken);
        $this->userManager->updateUser($user);
        return $user;
    }
}