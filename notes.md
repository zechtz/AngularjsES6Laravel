## Making a POST request to the server using curl (eg creating an institution)
curl -H "Content-Type: application/json" -X POST -d ' {
"name": "TTSA",
"address": "11080",
"email": "ttsa@gmail.com",
"phone_number": "0715542000",
"additional_information": "foo bar",
"institution_id": null
} ' http://localhost:3000/api/v1/institutions

## list all the institutions (GET request)
curl -i http://localhost:3000/api/v1/institutions

## GET an invididual institution
curl -i http://localhost:3000/api/v1/institutions/id => (get id pass 1)

