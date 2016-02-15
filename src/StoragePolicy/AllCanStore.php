<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AllCanStore implements StoragePolicyInterface
{
    /**
     * @var StoragePolicyInterface[]
     */
    private $policies;

    public function __construct(array $policies)
    {
        $this->policies = $policies;
    }

    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData)
    {
        foreach ($this->policies as $policy) {
            if (!$policy->canStore($request, $response, $resultData)) {
                return false;
            }
        }
        return true;
    }

}
