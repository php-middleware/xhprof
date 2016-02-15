<?php

namespace PhpMiddleware\Xhprof;

use RuntimeException;

final class Xhprof implements XhprofInterface
{
    private $flags;

    private $options;

    public function __construct($flags = 0, array $options = [])
    {
        if (!extension_loaded('xhprof')) {
            throw new RuntimeException('xhprof is not loaded');
        }
        $this->flags = (int) $flags;
        $this->options = $options;
    }

    public function disable()
    {
        return xhprof_disable();
    }

    public function enable()
    {
        xhprof_enable($this->flags, $this->options);
    }

}
