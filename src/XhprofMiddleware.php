<?php

namespace PhpMiddleware\Xhprof;

use PhpMiddleware\Xhprof\Storage\StorageInterface;
use PhpMiddleware\Xhprof\StoragePolicy\StoragePolicyInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;

final class XhprofMiddleware
{
    private $xhprof;
    private $storagePolicy;
    private $storage;

    public function __construct(XhprofInterface $xhprof, StoragePolicyInterface $storagePolicy, StorageInterface $storage)
    {
        $this->xhprof = $xhprof;
        $this->storagePolicy = $storagePolicy;
        $this->storage = $storage;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $this->xhprof->enable();

        $response = $next($request, $response);

        $xhprofData = $this->xhprof->disable();

        if ($this->storagePolicy->canStore($request, $response, $xhprofData)) {
            $this->storage->save($xhprofData);
        }
        return $response;
    }
}
