<?php

namespace PhpMiddleware\Xhprof\Storage;

interface StorageInterface
{
    public function save(array $profile);
}
