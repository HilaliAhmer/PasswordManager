<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | By default the theme light is activated, but you can change it by
    | specifying the dark mode. To change theme, update the global variable to `dark`
    |
    */

    'theme' => env('NOTIFY_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Demo URL
    |--------------------------------------------------------------------------
    |
    | if true you can access to the demo documentation of the notify package
    | here: http://localhost:8000/notify/demo, by default is true
    |
    */

    'demo' => true,

    /*
    |--------------------------------------------------------------------------
    | Notification timeout
    |--------------------------------------------------------------------------
    |
    | Defines the number of seconds during which the notification will be visible.
    |
    */

    'timeout'   => 5000,

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    | Available model: connect, drake, emotify, smiley, toast
    |
    */

    'preset-messages' => [
        // An example preset 'user updated' Connectify notification.
        $model='toast',
        'password-update' => [
            'message' => 'Şifre başarılı bir şekilde kaydedildi.',
            'type'    => 'success',
            'model'   => $model,
            'title'   => 'Şifre güncellenmesi',
        ],
        'password-create' => [
            'message' => 'Şifre başarılı bir şekilde eklendi.',
            'type'    => 'success',
            'model'   => $model,
            'title'   => 'Şifre eklendi!',
        ],
        'password-delete' => [
            'message' => 'Şifre başarılı bir şekilde silindi.',
            'type'    => 'error',
            'model'   =>  $model,
            'title'   => 'Şifre silindi!',
        ],
        'password-clone' => [
            'message' => 'Şifre başarılı bir şekilde klonlandı.',
            'type'    => 'info',
            'model'   => $model,
            'title'   => 'Şifre klonlandı!',
        ],
    ],

];
