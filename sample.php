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
                'text' => [
                    'type' => 'text',
                    'title' => 'Text',
                    'default' => 'This is the input field.',
                    'description' => 'This is the description field, good for additional info.',
                    'options' => [
                        'placeholder' => 'Insert here ...',
                    ]
                ],
                'textarea' => [
                    'type' => 'textarea',
                    'title' => 'Textarea',
                    'default' => 'This is the textarea field.',
                    'description' => 'This is the description field, good for additional info.',
                    'options' => [
                        'placeholder' => 'Insert here ...',
                    ]
                ],
                'switch' => [
                    'type' => 'switch',
                    'title' => 'Switch',
                    'default' => true,
                    'description' => 'This is the description field, good for additional info.',
                ]
            ],
        ]
    ]
]);