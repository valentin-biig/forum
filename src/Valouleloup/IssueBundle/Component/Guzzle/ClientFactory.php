<?php

namespace Valouleloup\IssueBundle\Component\Guzzle;

use GuzzleHttp\Client;

class ClientFactory
{
    public static function createClient()
    {
        return new Client();
    }
}
