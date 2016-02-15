<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface StoragePolicyInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param array $resultData
     */
    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData);
}
