<?php

// TO-DO: Refacto this file to use the api.

$options = new CiraPress\Framework([
    'id' => 'cirapress20',
    'titles' =>
    [
        'page' => 'Cira',
        'menu' => 'Cirapress'
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
                    'attributes' => [
                        'placeholder' => 'Insert here ...',
                    ]
                ],
                'textarea' => [
                    'type' => 'textarea',
                    'title' => 'Textarea',
                    'default' => 'This is the textarea field.',
                    'attributes' => [
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
                    'condition' => ['switch', '===', true]
                ],
                'select' => [
                    'type' => 'select',
                    'title' => 'Select',
                    'default' => 'two',
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
                    'fields' => [
                        'text' => [
                            'type' => 'text',
                            'title' => 'Text',
                            'default' => 'This is the input field.',
                            'attributes' => [
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
                            'condition' => ['switch', '===', true]
                        ],
                        'multi_mini_input' => [
                            'type' => 'multi-mini-input',
                            'title' => 'Multi Mini Input',
                            'choices' => [
                                [
                                    'id' => 'size',
                                    'icon' => 'ri-font-size-2',
                                    'attributes' => [
                                        'placeholder' => 'Size',
                                    ]
                                ],
                                [
                                    'id' => 'hight',
                                    'attributes' => [
                                        'placeholder' => 'Hight',      
                                    ]  
                                ]
                            ]
                        ],
                    ],
                ],
                'radio_image' => [
                    'type' => 'radio-image',
                    'title' => 'Radio Image',
                    'default' => 'b',
                    'choices' => [
                        [
                            'img' => 'http://localhost:8080/images/gle_c-salt.gif',
                            'id' => 'a',
                            'title' => 'Layout A'
                        ],
                        [
                            'img' => 'http://localhost:8080/images/gle_c-salt-s.gif',
                            'id' => 'b',
                            'title' => 'Layout B'
                        ],
                        [
                            'img' => 'http://localhost:8080/images/gle_hncs.gif',
                            'id' => 'c',
                            'title' => 'Layout C'
                        ],
                        [
                            'img' => 'http://localhost:8080/images/gle_pbc.gif',
                            'id' => 'd',
                            'title' => 'Layout D'
                        ],
                        [
                            'img' => 'http://localhost:8080/images/gle_s-c-salt.gif',
                            'id' => 'e',
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
                    'content' => '<i>hello world!</i>'
                ],
                'preset' => [
                    'type' => 'preset',
                    'title' => 'Presets',
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
                ],
            ]
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
                ],
                'number' => [
                    'type' => 'number',
                    'title' => 'Number',
                    'default' => 23,
                    'attributes' => [
                        'placeholder' => 'Width'
                    ]
                ],
                'mini_input' => [
                    'type' => 'mini-input',
                    'title' => 'Mini Input',
                    'default' => 23,
                    'icon' => 'ri-font-size-2',
                    'attributes' => [
                        'placeholder' => 'Size',
                    ]
                ],
                'multi_mini_input' => [
                    'type' => 'multi-mini-input',
                    'title' => 'Multi Mini Input',
                    'choices' => [
                        [
                            'id' => 'size',
                            'icon' => 'ri-font-size-2',
                            'attributes' => [
                                'placeholder' => 'Size', 
                            ]       
                        ],
                        [
                            'id' => 'hight',
                            'attributes' => [
                                'placeholder' => 'Hight',
                            ]
                        ]
                    ]
                ],
                'radio_icon' => [
                    'type' => 'radio-icon',
                    'title' => 'Radio Icon',
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
                ],
                'typography' => [
                    'type' => 'typography',
                    'title' => 'Typography',
                ],
            ]
        ]
    ],
]);

$options->add('section', [
    'id' => 'documentation',
    'title' => 'Documentation',
    'priority' => 1
]);

$options->add('field', [
    'id' => 'typography',
    'type' => 'typography',
    'title' => 'Typography',
    'section' => 'documentation',
    'default' => [
        'size' => '12px'
    ]
]);

$options->add('field', [
    'id' => 'number',
    'type' => 'number',
    'title' => 'Number',
    'section' => 'documentation',
    'default' => 23,
]);

$options->add('link', [
    'type' => 'section',
    'section' => 'general',
    'title' => 'General',
    'icon' => 'ri-stack-fill'
]);

$options->add('link', [
    'type' => 'section',
    'section' => 'appearance',
    'title' => 'Appearance',
    'icon' => 'ri-pencil-ruler-fill'
]);

$options->add('link', [
    'type' => 'section',
    'section' => 'documentation',
    'title' => 'Documentation',
    'icon' => 'ri-file-list-fill'
]);

$options->add('link', [
    'type' => 'separator',
    'title' => 'Help'
]);

$options->add('link', [
    'type' => 'external',
    'url' => 'https://cirapress.com',
    'title' => 'Support',
    'icon' => 'ri-chat-3-fill'
]);