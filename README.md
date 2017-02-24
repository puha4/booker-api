booker-api
==========

A Symfony project created on February 17, 2017, 4:59 pm.

## Create oauth client
```php
bin/console app:oauth:client:create --redirect-uri="http://127.0.0.1:8000/" --grant-type="authorization_code" --grant-type="password" --grant-type="refresh_token" --grant-type="token" --grant-type="client_credentials"
```

## Load fixtures data
```php
bin/console doc:fix:loa
```
Default username:admin, password:admin

## Create own user
```php
bin/console fos:user:create
```