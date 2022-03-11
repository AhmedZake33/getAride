<?php

return [

  'driver' => env('MAIL_DRIVER', 'smtp'),

'host' => env('MAIL_HOST','smtp.gmail.com'),

'port' => env('MAIL_PORT',465),

'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'ahmed.zake333@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Ahmedzaki'),
    ],
'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
'username' => 'ahmed.zake333@gmail.com', 

'password'=>'ahmed zake',

'sendmail' => '/usr/sbin/sendmail -bs',

'stream' => [
    'ssl' => [
        'allow_self_signed' => true,
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
    ],

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];
