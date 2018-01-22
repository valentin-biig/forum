<?php

namespace Valouleloup\IssueBundle\Repository;

use Doctrine\DBAL\Connection;
use FOS\UserBundle\Model\UserInterface;

class VoteRepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    
    public function countVotesByUser(UserInterface $user)
    {
        $sql = 'SELECT count(*) 
                FROM post_user_interface p 
                LEFT JOIN valou_post ON p.post_id = valou_post.id
                WHERE valou_post.author_id = ' . $user->getId();

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}