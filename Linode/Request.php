<?php

namespace CloudDoctor\Linode;

use GuzzleHttp\Client as GuzzleClient;
use CloudDoctor\Interfaces\RequestInterface;

class Request extends \CloudDoctor\Common\Request implements RequestInterface
{

    public function __construct($config)
    {
        parent::__construct();
        $this->guzzle = new GuzzleClient([
            'base_uri' => 'https://api.linode.com/v4/',
            'headers' => [
                'User-Agent' => 'CloudDoctor',
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$config['api-key']}",
            ],
        ]);
    }
}
