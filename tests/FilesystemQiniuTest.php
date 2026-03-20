<?php

namespace Overtrue\LaravelFilesystem\Qiniu\Tests;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

class FilesystemQiniuTest extends TestCase
{
    public function test_it_registers_qiniu_filesystem_driver(): void
    {
        config()->set('filesystems.disks.qiniu', [
            'driver' => 'qiniu',
            'access_key' => 'dummy',
            'secret_key' => 'dummy',
            'bucket' => 'dummy',
            'domain' => 'https://example.com',
        ]);

        $disk = Storage::disk('qiniu');

        $this->assertInstanceOf(FilesystemAdapter::class, $disk);
    }
}
