<?php

return [

    'groups' => [
        /* Flame namespace groups.
            You need to specify your flame groups that you want to create features inside.
            Accepts 1 group key (namespace group) and 2 keys inside (namespace and path).

            '<namespace_group>' => [
                'namespace' => '<your feature namespace root>',
                'path' => '<the physical path to your feature namespace root>'
            ]

            As the one specified:
            'demo' => [
                'namespace' => 'Laraning\Flame\Features',
                'path'      => package_path('laraning/flame/src/Features'),
            ]

            Means that Flame will autoload the demo namespace group, and load features from the
            namespace defined in that path.
            */

        'demo' => [
            'namespace' => 'Laraning\Flame\Features',
            'path'      => package_path('Features'),
        ],

        /* Suggested namespace group for your Laravel app.
            It will create features in your app/Flame/Features folder.
            You can then use the command:
            php artisan make:feature flame ManageCars (as example)! Have fun!
        */
        'flame' => [
            'namespace' => 'App\Flame\Features',
            'path'      => base_path('app/Flame/Features'),
        ],
        /*****/
    ],

    'demo' => [
        'route' => true,
    ],
];
