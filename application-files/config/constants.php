<?php

return [
    'URL' => env('APP_URL'),
    'APP_API_URL' => env('APP_API_URL',env('APP_URL')),
    'APP_DOMAIN' => env('APP_DOMAIN'),
    'APP_PROTOCOL' => env('APP_PROTOCOL', 'https'),
    'PREFIX' => env('PREFIX', 'system'),
    'TWOFA' => env('TWOFA', 1),
    'META' => ['meta' => [
        'copyright' => 'Copyright 2023 E.K. Solutions Pvt. Ltd.',
        'site' => env('APP_URL'),
        'emails' => ['rabigorkhaly@gmail.com', 'hitest@proshore.com'],
        'api' => [
            'version' => 1,
        ],
    ]],
    'FROM_MAIL' => env('MAIL_FROM_ADDRESS', 'examadmin@proshore.com'),
    'FROM_NAME' => env('MAIL_FROM_NAME', 'proshore'),
    'DEFAULT_LOCALE' => env('DEFAULT_LOCALE', 'en'),
    'ADMIN_DEFAULT_EMAIL' => env('ADMIN_DEFAULT_EMAIL', 'examadmin@proshore.com'),
    'DEFAULT_LINK_EXPIRATION' => env('DEFAULT_LINK_EXPIRATION' ?? 30),

    'DEFAULT_TWO_FA_REQUEST_EXPIRATION' => env('DEFAULT_TWO_FA_REQUEST_EXPIRATION' ?? 10),
    'DEFAULT_TWO_FA_THROTTLE_LIMIT' => env('DEFAULT_TWO_FA_THROTTLE_LIMIT', 4),
    'DEFAULT_TWO_FA_THROTTLE_EXPIRATION' => env('DEFAULT_TWO_FA_THROTTLE_EXPIRATION', 2),

    'DEFAULT_LOGIN_ATTEMPT_LIMIT' => env('DEFAULT_LOGIN_ATTEMPT_LIMIT', 4),
    'DEFAULT_LOGIN_ATTEMPT_EXPIRATION' => env('DEFAULT_LOGIN_ATTEMPT_EXPIRATION', 2),

    'DEFAULT_FORGOT_PASSWORD_LIMIT' => env('DEFAULT_FORGOT_PASSWORD_LIMIT', 4),
    'DEFAULT_FORGOT_PASSWORD_EXPIRATION' => env('DEFAULT_FORGOT_PASSWORD_EXPIRATION', 2),

    'API_URL' => env('API_URL', 'http://ip-api.com'),
    'IP_ADDRESS' => env('IP_ADDRESS', '110.44.123.47'),

    "excelDeliveryRateHeadings" => [
        'to location', 'charge per kg', 'extra charge per kg', 'charge per half kg', 'extra charge per half kg'
    ],
    "excelCustomerHeadings" => [
        'sn', 'customer name', 'contact number', 'location', 'alternate number', 'address', 'product name', 'product price', 'cod amount', 'remarks', 'landmark', 'customer order id', 'weight', 'service type'
    ],
    "paymentTypes" => [
        'cashOnDelivery' => 'Cash On Delivery',
        'pre-paid' => 'Pre-paid',
    ],
    "rateSheetTypes" => ['linear' => 'Linear', 'bucket' => 'Bucket'],

    "failedDeliveryRemarks" => [
        'call-not-received-by-receiver' => 'Call Not Received By Receiver',
        'receiver-mobile-switched-off' => 'Receiver Mobile Switched Off',
        'receiver-unreachable' => 'Receiver Unreachable',
        'receiver-not-available' => 'Receiver Not Available',
        'future-delivery-requested-by-receiver' => 'Future Delivery Requested By Receiver',
        'out-of-delivery-area' => 'Out Of Delivery Area',
    ],

    "failedPickupRemarks" => [
        'sender-mobile-no-response' => 'Sender Mobile No Response',
        'rescheduled-by-sender' => 'Rescheduled By Sender',
        'parcel-not-ready' => 'Parcel Not Ready'
    ],

    "failedReturnRemarks" => [
        'call-not-received-by-receiver' => 'Call Not Received By Receiver',
        'receiver-mobile-switched-off' => 'Receiver Mobile Switched Off',
        'receiver-unreachable' => 'Receiver Unreachable',
        'receiver-not-available' => 'Receiver Not Available',
        'future-delivery-requested-by-receiver' => 'Future Delivery Requested By Receiver',
        'out-of-delivery-area' => 'Out Of Delivery Area',
    ],

    "PAGINATE" => env('PAGINATE', 50)
];
