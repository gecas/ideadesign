<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Settings
     | ------------------------------------------------------------------------------------------------
     */
    'supported-locales'      => ['lt', 'en', 'ru'],

    'accept-language-header' => false,

    'hide-default-in-url'    => false,

    'facade'                 => 'Localization',

    /* ------------------------------------------------------------------------------------------------
     |  Route
     | ------------------------------------------------------------------------------------------------
     */
    'route'                  => [
        'middleware' => [
            'localization-session-redirect' => true,
            'localization-cookie-redirect'  => true,
            'localization-redirect'         => true,
            'localized-routes'              => true,
            'translation-redirect'          => true,
        ],
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Locales
     | ------------------------------------------------------------------------------------------------
     */
    'locales'   => [
        //====================================================>
       
        'en'          => [
            'name'     => 'English',
            'script'   => 'Latn',
            'dir'      => 'ltr',
            'native'   => 'English',
            'regional' => 'en_GB',
        ],

       
        
        'lt'          => [
            'name'     => 'Lithuanian',
            'script'   => 'Latn',
            'dir'      => 'ltr',
            'native'   => 'Lietuvių',
            'regional' => 'lt_LT',
        ],
        
       

        // R
        //====================================================>
       
        'ru'          => [
            'name'     => 'Russian',
            'script'   => 'Cyrl',
            'dir'      => 'ltr',
            'native'   => 'Русский',
            'regional' => 'ru_RU',
        ],
    ],
];
