## Making a POST request to the server using curl (eg creating an institution)
```sh
curl -H "Content-Type: application/json" -X POST -d ' {
    "name": "Testing Institution",
        "address": "11010",
        "email": "test@gmail.com",
        "phone_number": "0765342000",
        "additional_information": "foo bar",
        "institution_id": null
} ' http://mnrt.test/api/v1/institutions
```

## List all the institutions (GET request)
```sh
curl -i http://mnr.test/api/v1/institutions
```

## GET an invididual institution
```sh
curl -i http://mnrt.test/api/v1/institutions/id
```

## DELETE an institution
```
sh curl -X DELETE http://mnrt.test/api/v1/institutions/1
```

## Basic File & Folder Permissions for Laravel
```sh
sudo chgrp -R www-data storage bootstrap/cache
```
```sh
sudo chmod -R ug+rwx storage bootstrap/cache
```
[https://laracasts.com/discuss/channels/general-discussion/laravel-framework-file-permission-security](https://laracasts.com/discuss/channels/general-discussion/laravel-framework-file-permission-security)
