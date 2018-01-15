<?php

namespace Valouleloup\IssueBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Valouleloup\IssueBundle\Component\MatterMost\Notifier;
use Valouleloup\IssueBundle\Entity\Issue;
use Valouleloup\IssueBundle\ValouleloupIssueEvents;

class IssueListener implements EventSubscriberInterface
{
    /**
     * @var Notifier
     */
    private $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            ValouleloupIssueEvents::ISSUE_OPEN   => 'openIssue',
            ValouleloupIssueEvents::ISSUE_CLOSED => 'closeIssue',
        ];
    }

    /**
     * @param GenericEvent $event
     *
     * @throws \Exception
     */
    public function openIssue(GenericEvent $event)
    {
        $issue = $event->getSubject();

        if (!$issue instanceof Issue) {
            throw new \Exception('The subject must be instance of Issue, '.get_class($issue).' given.');
        }

        $this->notifier->openIssue($issue);
    }

    /**
     * @param GenericEvent $event
     *
     * @throws \Exception
     */
    public function closeIssue(GenericEvent $event)
    {
        $issue = $event->getSubject();

        if (!$issue instanceof Issue) {
            throw new \Exception('The subject must be instance of Issue, '.get_class($issue).' given.');
        }

        $this->notifier->closeIssue($issue);
    }
}
