# AGENTS.md

Package: **overtrue/laravel-filesystem-qiniu**

## Purpose
Qiniu filesystem driver for Laravel (Flysystem adapter).

## Compatibility Targets
- Laravel: **^9|^10|^11|^12|^13**
- PHP: **Laravel 13 requires PHP 8.3+**

## Local Development
```bash
composer install
composer test
composer check-style
```

## Notes
- Tests are run via PHPUnit + Orchestra Testbench.
- If you see PHP deprecation notices from vendor packages during tests, treat them as upstream noise unless they fail CI.
