<?php

$sample = new CiraPress\Framework([
    'id' => 'cirapress3',
    'titles' =>
    [
        'page' => 'Cira',
        'menu' => 'Cirapress'
    ],
    'menu' =>
    [
        [
            'type' => 'section',
            'id' => 'general',
            'title' => 'General',
            'icon' => 'ri-stack-fill'
        ],
        [
            'type' => 'section',
            'id' => 'appearance',
            'title' => 'Appearance',
            'icon' => 'ri-pantone-fill'
        ],
        [
            'type' => 'section',
            'id' => 'documentation',
            'title' => 'Documentation',
            'icon' => 'ri-file-list-fill'
        ],
        [
            'type' => 'separator',
            'title' => 'Help'
        ],
        [
            'type' => 'link',
            'url' => 'https://cirapress.com',
            'title' => 'Support',
            'icon' => 'ri-chat-1-fill'
        ]
    ],
    'sections' => 
    [
        'general' => [
            'title' => 'General',
            'description' => 'This is my section.',
            'fields' =>
            [
                
                'icon' => [
                    'type' => 'icon',
                    'title' => 'Icon',
                    'default' => 'building-3-line',
                ],
                'icons' => [
                    'type' => 'icon',
                    'title' => 'Icon',
                    'default' => 'building-3-line',
                ],
                'icosssn' => [
                    'type' => 'icon',
                    'title' => 'Icon',
                    'default' => 'building-3-line',
                ],
                'ison' => [
                    'type' => 'icon',
                    'title' => 'Icon',
                    'default' => 'building-3-line',
                ],

            ],
        ]
    ]
]);