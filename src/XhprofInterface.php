<?php

namespace PhpMiddleware\Xhprof;

interface XhprofInterface
{
    public function enable();

    /**
     * @return array
     */
    public function disable();
}
