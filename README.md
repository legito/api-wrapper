# legito/api-wrapper
PHP wrapper for Legito REST API requests.

Wrapper currently support:
- Legito API v1
- Legito API v2
- Legito API v3

Legacy API is not supported anymore.

English documentation for API [https://app.swaggerhub.com/apis-docs/Legito/legito-api/3](https://app.swaggerhub.com/apis-docs/Legito/legito-api/3)


## Install
The preferred way to install this package is through [composer](http://getcomposer.org/download/).

```
composer require legito/api-wrapper
```

## Basic usage

``` php
<?php

use Legito\Api\Legito;

// Configure API wrapper
$apiKey = 'ad2e37c9-ee63-4479-9295-36cf21674343';
$privateKey = '37c2f78b02';
//$url = 'https://example.legito.com'; // use only if you run Legito on custom server

// Create instance
$legitoApi = (new Legito($apiKey, $privateKey, $url))->getWrapper();

// Call some API methods
// ------------------------------------------------------------------------

// Creates document version from template suite ID 2255. Inserts some data to input
// element 'first_party_name1' and downloads it.
$templateSuiteId = 2255;
$smartDocument = $legitoApi->postDocumentVersionData(
    $templateSuiteId,
    [
         [
              'name' => 'first_party_name1',
              'value' => 'John Doe'
         ]
    ]
);
$documentsData = $legitoApi->getDocumentVersionDownload($smartDocument->code, 'pdf');
foreach($documentsData as $documentData) {
    file_put_contents(
        $documentData->filename,
        base64_decode($documentData->data)
    );
}

// Prints all users form your workspace.
$users = $legitoApi->getUser();
print_r($users);

// Creates two users in your workspace.
$legitoApi->postUser(
    [
         [
            'email' => 'johndoe@legito.com',
            'name' => 'John Doe'
         ],
         [
             'email' => 'janedee@legito.com',
             'name' => 'Jane Dee',
             'caption' => 'CEO'
         ]
    ]
);

// Deletes user form your workspace.
$legitoApi->deleteUser('johndoe@legito.com');
```