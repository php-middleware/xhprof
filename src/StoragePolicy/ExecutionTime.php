<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ExecutionTime implements StoragePolicyInterface
{
    private $timeToStore;

    public function __construct($timeToStore)
    {
        $this->timeToStore = $timeToStore;
    }

    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData)
    {
        return isset($resultData['main()']['wt']) && $resultData['main()']['wt'] > $this->timeToStore;
    }
}
