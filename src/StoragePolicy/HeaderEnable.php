<?php

namespace PhpMiddleware\Xhprof\StoragePolicy;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HeaderEnable implements StoragePolicyInterface
{
    const DEFAULT_HEADER = 'X-Xhprof-Enable';
    const DEFAULT_VALUE = 'true';

    private $header;
    private $value;

    public function __construct($header = self::DEFAULT_HEADER, $value = self::DEFAULT_VALUE)
    {
        $this->header = $header;
        $this->value = $value;
    }

    public function canStore(ServerRequestInterface $request, ResponseInterface $response, array $resultData)
    {
        return $request->getHeaderLine($this->header) === $this->value;
    }
}
