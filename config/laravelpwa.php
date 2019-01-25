<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'icons' => [
            '72x72' => "{{url('/icons/icon-72.png')}}",
            '96x96' => "{{url('/icons/icon-96.png')}}",
            '128x128' => '/images/icons/icon-128x128.png',
            '144x144' => "{{url('/icons/icon-144.png')}}",
            '152x152' => '/images/icons/icon-152x152.png',
            '192x192' => "{{url('/icons/icon-192.png')}}",
            '384x384' => '/images/icons/icon-384x384.png',
            '512x512' => "{{url('/icons/icon-512.png')}}",
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ]
    ]
];
