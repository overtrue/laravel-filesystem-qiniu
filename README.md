# Laravel filesystem Qiniu 

[Qiniu](http://www.qiniu.com/) storage for Laravel based on [overtrue/flysystem-qiniu](https://github.com/overtrue/flysystem-qiniu).

# Requirement

- PHP >= 5.5.9

# Installation

```shell
$ composer require "overtrue/laravel-filesystem-qiniu" -vvv
```

# Configuration

1. After installing the library, register the `Overtrue\LaravelFilesystem\Qiniu\QiniuStorageServiceProvider` in your `config/app.php` file:

  ```php
  'providers' => [
      // Other service providers...
      Overtrue\LaravelFilesystem\Qiniu\QiniuStorageServiceProvider::class,
  ],
  ```

2. Add a new disk to your `config/filesystems.php` config:
 ```php
 <?php

 return [
     //...
     'qiniu' => [
        'driver'     => 'qiniu',
        'access_key' => env('QINIU_ACCESS_KEY', 'xxxxxxxxxxxxxxxx'),
        'secret_key' => env('QINIU_SECRET_KEY', 'xxxxxxxxxxxxxxxx'),
        'bucket'     => env('QINIU_BUCKET', 'test'),
        'domain'     => env('QINIU_DOMAIN', 'xxx.clouddn.com'), // or host: https://xxxx.clouddn.com
     ],
     //...
 ];
 ```

# Usage

```php
$disk = Storage::disk('qiniu');

// create a file
$disk->put('avatars/1', $fileContents);

// check if a file exists
$exists = $disk->has('file.jpg');

// get timestamp
$time = $disk->lastModified('file1.jpg');
$time = $disk->getTimestamp('file1.jpg');

// copy a file
$disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
$disk->move('old/file1.jpg', 'new/file1.jpg');

// get file contents
$contents = $disk->read('folder/my_file.txt');

// fetch file 
$file = $disk->fetch('folder/my_file.txt');

// get file url
$url = $disk->getUrl('folder/my_file.txt');

// get file upload token
$token = $disk->getUploadToken('folder/my_file.txt');
$token = $disk->getUploadToken('folder/my_file.txt', 3600);
```

[Full API documentation.](http://flysystem.thephpleague.com/api/)

# License

MIT
