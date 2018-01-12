<?php

namespace Valouleloup\IssueBundle\Component\MatterMost;

use GuzzleHttp\RequestOptions;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Valouleloup\IssueBundle\Component\Guzzle\ClientFactory;
use Valouleloup\IssueBundle\Entity\Issue;

class Notifier
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var string
     */
    private $webhook;

    public function __construct(Router $router, $webhook)
    {
        $this->client = ClientFactory::createClient();
        $this->router = $router;
        $this->webhook = $webhook;
    }

    public function openIssue(Issue $issue)
    {
        $tab = [
            'attachments' => [
                [
                    'fallback' => 'Issue open by ' . $issue->getAuthor()->getUsername() . ' on Issue Bundle',
                    'color' => '#8AC865', //CC4040
                    'pretext' => 'Issue open by ' . $issue->getAuthor()->getUsername() . ' on Issue Bundle',
                    'title' => '# ' . $issue->getId() . ' - [' . $issue->getTheme()->getLabel() .'] ' . $issue->getLabel(),
                    'title_link' => $this->router->generate('show_issue', ['id' => $issue->getId()], UrlGeneratorInterface::ABSOLUTE_URL)
                ],
            ],
        ];

        $this->client->request('POST', $this->webhook, [RequestOptions::JSON => $tab]);
    }
}