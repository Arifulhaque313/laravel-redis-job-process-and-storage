# Laravel 12 + Redis Simple Example

This project demonstrates basic usage of Redis in Laravel 12 for:

- Simple key-value storage  
- Asynchronous queue job with Redis backend

---

## Installation

1. **Install Redis server**

Using Docker:

```bash
docker run -d --name redis-server -p 6379:6379 redis
```


Or install manually on your OS.

2. **Install PHP Redis extension**

For Ubuntu/Debian:

```bash
sudo apt install php-redis
```
Or use PECL:

```bash
pecl install redis
```

3. **Set Redis client package**

If you don’t want to install PHP Redis extension, use predis:

```bash
composer require predis/predis
```

4. **Configure .env**

```env
QUEUE_CONNECTION=redis
CACHE_DRIVER=redis
SESSION_DRIVER=redis

REDIS_CLIENT=phpredis   # or predis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_PASSWORD=null
```

5. **Clear config cache**

```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

**Routes**

URL	Description
```bash
/redis/set	Store sample user names in Redis
/redis/get	Retrieve stored user names
/redis/delete	Delete stored user names
/queue/test	Dispatch a simple log queue job
```

**Usage Summary**
1. Use Redis facade in RedisController for key-value operations.
2. Use Laravel Job LogSimpleMessage dispatched from QueueTestController for async logging via Redis queue.
3. Run queue worker:

```bash
php artisan queue:work
```
Check logs at storage/logs/laravel.log to see queued log messages.

Happy coding! 🚀

```css
If you want, I can help you generate the full controller and job code snippets as well!
```