<?php

return [
    'instructionHeader' => 'Please follow these steps to get back on track:',
    'errorPages' => [
        400 => [
            'title' => 'Bad Request',
            'statusText' => 'Your Browser sent a Bad Request',
            'description' => 'Your browser sent a request our server <strong>couldn\'t process</strong>. Please try again or follow the steps below to resolve this issue.',
        ],
        401 => [
            'title' => 'Unauthorized',
            'statusText' => 'Please enter a password',
            'description' => 'To view this site, you must <strong>enter a password</strong>. Please <a href="" onclick="window.location.reload();return false;">refresh this page</a> and enter your credentials in the window presented.',
        ],
        403 => [
            'title' => 'This page is not public',
            'statusText' => 'This page is not public',
            'description' => 'This site is not available for public viewing. Please see our <a href="/">site</a> for valid links to click.',
        ],
        404 => [
            'title' => 'Not found',
            'statusText' => 'Page not found, sorry',
            'description' => 'The page you requested was <strong>not found</strong> on our servers.',
        ],
        405 => [
            'title' => 'Method Not Allowed',
            'statusText' => 'Your Browser sent an invalid request',
            'description' => 'Your browser sent a request our server <strong>couldn\'t process</strong> because the access method it tried to use is invalid for this page. Please try again or follow the steps below to resolve this issue.',
        ],
        406 => [
            'title' => 'Not Acceptable',
            'statusText' => 'Can\'t satisfy your needs',
            'description' => 'Your browser sent us a requirement we couldn\'t satisfy. Please try the steps below to resolve this issue.',
        ],
        408 => [
            'title' => 'Request Timeout',
            'statusText' => 'Too slow, sorry',
            'description' => 'Your browser took too long to send your request. Please see the list below to resolve your issue.',
        ],
        413 => [
            'title' => 'Request Entity Too Large',
            'statusText' => 'Too big!',
            'description' => 'Your browser sent us a waaaaay <strong>too large request</strong> which we couldn\'t process.',
        ],
        414 => [
            'title' => 'Request-URI Too Long',
            'statusText' => 'Too long!',
            'description' => 'Your browser sent us a waaaaay too long address and we couldn\'t process it.',
        ],
        417 => [
            'title' => 'Expectation Failed',
            'statusText' => 'Can\'t satisfy your expectations',
            'description' => 'Your browser sent us an expectation we couldn\'t satisfy. Please try the steps below to resolve your issue.',
        ],
        500 => [
            'title' => 'Internal Server Error',
            'statusText' => 'An error happened, sorry',
            'description' => 'Our server has encountered an error it can\'t recover from. Please try to trace back your steps. If the error persists, contact us.',
        ],
        502 => [
            'title' => 'Bad Gateway',
            'statusText' => 'Background Error',
            'description' => 'We are not able to process your request because our server has encountered an error in one of our background servers.',
        ],
        503 => [
            'title' => 'Maintenance',
            'statusText' => 'Maintenance',
            'description' => 'Our servers need love too, so we are performing scheduled maintenance at the moment. Please come back in a little while.',
        ],
        504 => [
            'title' => 'Bad Gateway',
            'statusText' => 'Background Error',
            'description' => 'We are not able to process your request because our background server is taking too long to respond.',
        ],
    ],
];