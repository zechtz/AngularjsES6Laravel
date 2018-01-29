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

## list all the institutions (GET request)
```sh
curl -i http://mnr.test/api/v1/institutions
```

## GET an invididual institution
```sh
curl -i http://mnrt.test/api/v1/institutions/id => (get id pass 1)
```

## Basic File & Folder Permissions for Laravel
```sh
sudo chgrp -R www-data storage bootstrap/cache
```
```sh
sudo chmod -R ug+rwx storage bootstrap/cache
```
[Check out the following discussion](https://laracasts.com/discuss/channels/general-discussion/laravel-framework-file-permission-security)
