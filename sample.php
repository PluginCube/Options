<?php

$sample = new CiraPress\Framework([
    'id' => 'cirapress08',
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
                    'options' => [
                        'placeholder' => 'Insert here ...',
                    ]
                ],
                'textarea' => [
                    'type' => 'textarea',
                    'title' => 'Textarea',
                    'default' => 'This is the textarea field.',
                    'options' => [
                        'placeholder' => 'Insert here ...',
                    ]
                ],
                'color' => [
                    'type' => 'color',
                    'title' => 'Color',
                    'default' => '#555555',
                ],
                'switch' => [
                    'type' => 'switch',
                    'title' => 'Switch',
                    'default' => true,
                ],
                'image' => [
                    'type' => 'image',
                    'title' => 'Image',
                    'default' => '',
                ],
                'select' => [
                    'type' => 'select',
                    'title' => 'Select',
                    'default' => 'two',
                    'options' => [
                        'items' => [
                            [
                                'id' => 'one',
                                'text' => 'One'
                            ],
                            [
                                'id' => 'two',
                                'text' => 'Two'
                            ]
                        ]
                    ]
                ],
                'icon' => [
                    'type' => 'icon',
                    'title' => 'Icon',
                    'default' => 'ri-building-3-line',
                ],
                'editor' => [
                    'type' => 'editor',
                    'title' => 'Editor',
                    'default' => 'hello <i>world</i>',
                ],
                'repeater' => [
                    'type' => 'repeater',
                    'title' => 'Repeater',
                    'options' => [
                        'fields' => [
                            'text' => [
                                'type' => 'text',
                                'title' => 'Text',
                                'default' => 'This is the input field.',
                                'options' => [
                                    'placeholder' => 'Insert here ...',
                                ]
                            ],
                            'textarea' => [
                                'type' => 'textarea',
                                'title' => 'Textarea',
                                'default' => 'This is the textarea field.',
                                'options' => [
                                    'placeholder' => 'Insert here ...',
                                ]
                            ],
                            'color' => [
                                'type' => 'color',
                                'title' => 'Color',
                                'default' => '#555555',
                            ],
                            'switch' => [
                                'type' => 'switch',
                                'title' => 'Switch',
                                'default' => true,
                            ],
                            'image' => [
                                'type' => 'image',
                                'title' => 'Image',
                                'default' => '',
                            ],
                        ],
                    ]
                ],
            ],
        ]
    ]
]);