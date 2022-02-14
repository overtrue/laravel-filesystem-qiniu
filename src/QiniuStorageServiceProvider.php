<?php

namespace Overtrue\LaravelFilesystem\Qiniu;

use Illuminate\Support\ServiceProvider;
use League\Flysystem\Config;
use League\Flysystem\Filesystem;

class QiniuStorageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('filesystem')->extend('qiniu', function ($config) {
            $adapter = new QiniuAdapter(
                $config['access_key'],
                $config['secret_key'],
                $config['bucket'],
                $config['domain']
            );

            return new Filesystem($adapter, new Config(['disable_asserts' => true]));
        });
    }
}
