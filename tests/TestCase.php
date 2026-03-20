<?php

namespace Overtrue\LaravelFilesystem\Qiniu\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Overtrue\LaravelFilesystem\Qiniu\QiniuStorageServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [QiniuStorageServiceProvider::class];
    }
}
