<?php

return [
    /**
     * Channels
     * For development check README in https://github.com/mygrigio/notifications
     */
    'channels' => [
        Grigio\Notifications\Channels\SmsIRChannel::class,
        Grigio\Notifications\Channels\EmailChannel::class,
    ],

    'email' => [
        'from' => env('MAIL_USERNAME'),
        'from_name' => env('APP_NAME')
    ],

    'sms_ir' => [
        'secret_key' => env('SMSIR_SECRET_KEY'),
        'api_key' => env('SMSIR_API_KEY'),
        'number' => env('SMSIR_NUMBER')
    ]
];
