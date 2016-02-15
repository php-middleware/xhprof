<?php

namespace PhpMiddleware\Xhprof;

use RuntimeException;

final class XhprofSample implements XhprofInterface
{
    public function __construct()
    {
        if (!extension_loaded('xhprof')) {
            throw new RuntimeException('xhprof is not loaded');
        }
    }

    public function disable()
    {
        return xhprof_sample_enable();
    }

    public function enable()
    {
        xhprof_sample_enable();
    }

}
