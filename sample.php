<?php

$sample = new CiraPress\Framework([
    'id' => 'cirapress15',
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
            'icon' => 'ri-pencil-ruler-fill'
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
            'icon' => 'ri-chat-3-fill'
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
                        'choices' => [
                            [
                                'id' => 'one',
                                'title' => 'One'
                            ],
                            [
                                'id' => 'two',
                                'title' => 'Two'
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
                            'icon' => [
                                'type' => 'icon',
                                'title' => 'Icon',
                                'default' => 'ri-building-3-line',
                            ],
                            'multi_mini_input' => [
                                'type' => 'multi-mini-input',
                                'title' => 'Multi Mini Input',
                                'options' => [
                                    'choices' => [
                                        [
                                            'id' => 'size',
                                            'icon' => 'ri-font-size-2',
                                            'placeholder' => 'Size',        
                                        ],
                                        [
                                            'id' => 'hight',
                                            'placeholder' => 'Hight',        
                                        ]
                                    ]
                                ]
                            ]
                        ],
                    ]
                ],
                'radio_image' => [
                    'type' => 'radio-image',
                    'title' => 'Radio Image',
                    'default' => 'b',
                    'options' => [
                        'choices' => [
                            [
                                'img' => 'http://localhost:8080/images/gle_c-salt.gif',
                                'id' => 'a',
                                'label' => 'Layout A'
                            ],
                            [
                                'img' => 'http://localhost:8080/images/gle_c-salt-s.gif',
                                'id' => 'b',
                                'label' => 'Layout B'
                            ],
                            [
                                'img' => 'http://localhost:8080/images/gle_hncs.gif',
                                'id' => 'c',
                                'label' => 'Layout C'
                            ],
                            [
                                'img' => 'http://localhost:8080/images/gle_pbc.gif',
                                'id' => 'd',
                                'label' => 'Layout D'
                            ],
                            [
                                'img' => 'http://localhost:8080/images/gle_s-c-salt.gif',
                                'id' => 'e',
                            ],                            
                        ],
                    ],
                ],
                'export' => [
                    'type' => 'export',
                    'title' => 'Export',
                ],
                'import' => [
                    'type' => 'import',
                    'title' => 'Import',
                ],
                'html' => [
                    'type' => 'html',
                    'title' => 'HTML',
                    'options' => [
                        'content' => '<i>hello world!</i>'
                    ]
                ],
                'preset' => [
                    'type' => 'preset',
                    'title' => 'Presets',
                    'options' => [
                        'presets' => [
                            [
                                'title' => 'Dark',
                                'img' => 'http://localhost:8080/wp-content/themes/twentytwenty/screenshot.png',
                                'data' => [
                                    'general' => [
                                        'text' => 'Dark theme import successfuly.'
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Minimal',
                                'img' => 'http://localhost:8080/wp-content/themes/twentyseventeen/screenshot.png',
                                'data' => [
                                    'general' => [
                                        'text' => 'Minimal theme import successfuly.'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
            ],
        ],
        'appearance' => [
            'title' => 'Appearance',
            'description' => 'This is my section.',
            'fields' =>
            [
                'multi_color' => [
                    'type' => 'multi-color',
                    'title' => 'Multi Color',
                    'default' => [
                        'link'    => '#0088cc',
                        'hover'   => '#00aaff',
                        'active'  => '#00ffff',                
                    ],
                    'options' => [
                        'choices' => [
                            [
                                'id' => 'link',
                                'title' => 'Link'
                            ],
                            [
                                'id' => 'hover',
                                'title' => 'Hover'
                            ],
                            [
                                'id' => 'active',
                                'title' => 'Active'
                            ]
                        ]
                    ]
                ],
                'number' => [
                    'type' => 'number',
                    'title' => 'Number',
                    'default' => 23,
                    'options' => [
                        'placeholder' => 'Width'
                    ]
                ],
                'mini_input' => [
                    'type' => 'mini-input',
                    'title' => 'Mini Input',
                    'default' => 23,
                    'options' => [
                        'icon' => 'ri-font-size-2',
                        'placeholder' => 'Size',
                    ]
                ],
                'multi_mini_input' => [
                    'type' => 'multi-mini-input',
                    'title' => 'Multi Mini Input',
                    'options' => [
                        'choices' => [
                            [
                                'id' => 'size',
                                'icon' => 'ri-font-size-2',
                                'placeholder' => 'Size',        
                            ],
                            [
                                'id' => 'hight',
                                'placeholder' => 'Hight',        
                            ]
                        ]
                    ]
                ],
                'radio_icon' => [
                    'type' => 'radio-icon',
                    'title' => 'Radio Icon',
                    'options' => [
                        'choices' => [
                            [
                                'id' => 'left',
                                'title' => 'Left',
                                'icon' => 'ri-align-left'
                            ],
                            [
                                'id' => 'right',
                                'title' => 'Right',
                                'icon' => 'ri-align-right'
                            ],
                            [
                                'id' => 'center',
                                'title' => 'Center',
                                'icon' => 'ri-align-center'
                            ],
                            [
                                'id' => 'justify',
                                'title' => 'Justify',
                                'icon' => 'ri-align-justify'
                            ]
                        ]
                    ]
                ],
                'typography' => [
                    'type' => 'typography',
                    'title' => 'Typography',
                ],
            ]
        ]
    ],
]);