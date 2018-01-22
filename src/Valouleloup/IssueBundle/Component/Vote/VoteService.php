<?php

namespace Valouleloup\IssueBundle\Component\Vote;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Valouleloup\IssueBundle\Repository\VoteRepository;

class VoteService
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var VoteRepository
     */
    private $repository;

    public function __construct(TokenStorageInterface $tokenStorage, VoteRepository $repository)
    {
        $this->tokenStorage = $tokenStorage;
        $this->repository   = $repository;
    }

    /**
     * @return bool|string
     */
    public function getNbVotes()
    {
        $user = $this->tokenStorage->getToken()->getUser();

        return $this->repository->countVotesByUser($user);
    }
}