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
GET http://localhost:8000/api/nodes
```

**Response**

```
Status: 200 OK
{
  "-LpVRpkri9eGdgIQlJ0P": {
    "name": "STRING",
    "neighborhoods": [
    	{"id": "STRING", "direction": "STRING"},  
	{"id": "STRING", "direction": "STRING"},
	...
    ],
    "meta": [
      { "key": "STRING", "value": "STRING" },
      { "key": "STRING", "value": "STRING" },
      ...
    ]
  }
}
```

```
POST http://localhost:8000/api/nodes
```

**Parameters**

```
{
    "name": "STRING",
    "neighborhoods": [
    	{"id": "STRING", "direction": "STRING"},  
	{"id": "STRING", "direction": "STRING"},
	...
    ],
    "meta": [
      { "key": "STRING", "value": "STRING" },
      { "key": "STRING", "value": "STRING" },
      ...
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
PUT http://localhost:8000/api/nodes/:id
```

**Parameters**

```
{
    "name": "STRING",
    "neighborhoods": [
    	{"id": "STRING", "direction": "STRING"},  
	{"id": "STRING", "direction": "STRING"},
	...
    ],
    "meta": [
      { "key": "STRING", "value": "STRING" },
      { "key": "STRING", "value": "STRING" },
      ...
    ]
}
```

**Response**

```
Status: 200 OK
{
    "name": "STRING",
    "neighborhoods": [
    	{"id": "STRING", "direction": "STRING"},  
	{"id": "STRING", "direction": "STRING"},
	...
    ],
    "meta": [
      { "key": "STRING", "value": "STRING" },
      { "key": "STRING", "value": "STRING" },
      ...
    ]
}
```

```
DELETE http://localhost:8000/api/nodes/:id
```

**Response**

```
Status: 200 OK
```
