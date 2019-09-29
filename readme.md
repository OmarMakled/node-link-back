### Node link back-end

### Installation

- clone `git@github.com:OmarMakled/node-link-back.git`
- cd `node-link-back`
- run `composer install`

### Testing

- run `php bin/phpunit`

### Running the application

- run `php -S localhost:8000 -t public/`

### API

```
GET http://localhost:8000/
```

**Response**

```
Status: 200 OK
{
  "-LpVRpkri9eGdgIQlJ0P": {
    "meta": [
      {
        "key": "a",
        "value": "aa"
      }
    ],
    "name": "A",
    "parent": ""
  }
}
```

```
POST http://localhost:8000/
```

**Parameters**

```
{
	"name": "A",
	"parent": "",
	"meta": [
		{"key": "a", "value": "aa"}
	]
}
```

**Response**

```
Status: 201 OK
{
  "name": "-LpVRpkri9eGdgIQlJ0P"
}
```

```
PUT http://localhost:8000/:id
```

**Parameters**

```
{
	"name": "A",
	"parent": "",
	"meta": [
		{"key": "a", "value": "aa"}
	]
}
```

**Response**

```
Status: 200 OK
{
  "meta": [
    {
      "key": "a",
      "value": "aa"
    }
  ],
  "name": "A",
  "parent": ""
}
```

```
DELETE http://localhost:8000/:id
```

**Response**

```
Status: 200 OK
```
