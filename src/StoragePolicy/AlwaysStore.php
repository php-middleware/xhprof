<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AlwaysStore implements StoragePolicyInterface
{
    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData)
    {
        return true;
    }

}
