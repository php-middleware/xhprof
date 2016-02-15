<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface StoragePolicyInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $resultData
     *
     * @return bool
     */
    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData);
}
