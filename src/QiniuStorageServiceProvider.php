<?php

namespace Overtrue\LaravelFilesystem\Qiniu;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Overtrue\Flysystem\Qiniu\QiniuAdapter;

class QiniuStorageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('filesystem')->extend('qiniu', function ($app, $config) {
            $adapter = new QiniuAdapter(
                $config['access_key'],
                $config['secret_key'],
                $config['bucket'],
                $config['domain']
            );

            return new FilesystemAdapter(new Filesystem($adapter), $adapter, $config);
        });
    }
}
