<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ElasticPopulateCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('issue:elastic:populate')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $issueRepo = $this->getContainer()->get('doctrine')->getRepository('ValouleloupIssueBundle:Issue');
        $issues = $issueRepo->findAll();

        $postManager = $this->getContainer()->get('val_issue.component.elastic.post.manager');

        foreach ($issues as $issue) {
            $postManager->indexIssue($issue);
        }
    }
}
