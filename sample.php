<?php

/**
 * Initialize the instance
 */
$options = new PluginCube\Options([
    'id' => 'plugincube_s',
    'titles' => [
        'page' => 'Cora',
        'menu' => 'Cora'
    ],
    'display_version' => 'free'
]);

/**
 * Section: General
 */

$options->add('section', [
    'id' => 'general',
    'title' => 'General',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'General',
    'section' => 'general',
    'icon' => 'ri-dashboard-fill',
]);


$options->add('section', [
    'id' => 'menu',
    'title' => 'Menu',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Menu',
    'section' => 'menu',
    'icon' => 'ri-chat-smile-3-fill',
]);


$options->add('section', [
    'id' => 'toolbar',
    'title' => 'Toolbar',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Toolbar',
    'section' => 'toolbar',
    'icon' => 'ri-coin-fill',
]);


$options->add('section', [
    'id' => 'theme',
    'title' => 'Theme',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Theme',
    'section' => 'theme',
    'icon' => 'ri-pantone-fill',
]);


$options->add('section', [
    'id' => 'login',
    'title' => 'Login Page',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Login Page',
    'section' => 'login',
    'icon' => 'ri-key-fill',
]);


$options->add('section', [
    'id' => 'scripts',
    'title' => 'Custom Scripts',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Custom Scripts',
    'section' => 'scripts',
    'icon' => 'ri-code-box-fill',
]);


$options->add('section', [
    'id' => 'optimization',
    'title' => 'Optimization',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Optimization',
    'section' => 'optimization',
    'icon' => 'ri-water-flash-fill',
]);


$options->add('section', [
    'id' => 'advanced',
    'title' => 'Advanced',
]);

$options->add('link', [
    'type' => 'section',
    'title' => 'Advanced',
    'section' => 'advanced',
    'icon' => 'ri-input-method-fill',
]);




$options->add('field', [
    'id' => 'text',
    'type' => 'text',
    'title' => 'Text',
    'section' => 'general',
    'default' => 'This is the text field.',
    'attributes' => [
        'placeholder' => 'Insert here ...',
    ],
    'description' => 'A short description that will be displayed under the title.',
]);

// $options->add('field', [
//     'id' => 'textarea',
//     'type' => 'textarea',
//     'title' => 'Textarea',
//     'section' => 'general',
//     'default' => 'This is the textarea field.',
//     'attributes' => [
//         'placeholder' => 'Insert here ...',
//     ],
//     'description' => 'A short description that will be displayed under the title.',
// ]);

$options->add('field', [
    'id' => 'color',
    'type' => 'color',
    'title' => 'Color Picker',
    'section' => 'general',
    'default' => '#eeeeee',
    'description' => 'A short description that will be displayed under the title.',
]);

$options->add('field', [
    'id' => 'icon',
    'type' => 'icon',
    'title' => 'Icon',
    'section' => 'general',
    'description' => 'A short description that will be displayed under the title.',
]);

$options->add('field', [
    'id' => 'switch',
    'type' => 'switch',
    'title' => 'Switch',
    'section' => 'general',
    'description' => 'A short description that will be displayed under the title.',
]);


$options->add('field', [
    'id' => 'select',
    'type' => 'select',
    'title' => 'Select',
    'section' => 'general',
    'choices' => [
        [
            'value' => 'menu',
            'label' => 'Open menu'
        ],
        [
            'value' => 'first_item',
            'label' => 'Launch first item'
        ],
    ],
    'attributes' => [
        'isMulti' => true,
        'isCreatable' => true,
    ],
    'description' => 'A short description that will be displayed under the title.',
]);

$options->add('field', [
    'id' => 'multi_mini_input',
    'type' => 'multi-mini-input',
    'title' => 'Mlti Mini Input',
    'section' => 'general',
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
    ],
    'description' => 'A short description that will be displayed under the title.',
]);


$options->add('field', [
    'id' => 'repeater',
    'type' => 'repeater',
    'title' => 'Repeater',
    'section' => 'general',
    'limit'   => 5,
    'limit_link' => [
        'icon' => '',
        'text' => 'Go Pro',
        'msg'  => 'Upgrade to the Pro plan to get unlimited items.',
        'url' => 'facebook.com'
    ],
    'fields' => [
        [
            'id' => 'message',
            'type' => 'text',
            'title' => 'Title',
            'default' => 'New Item',
            'attributes' => [
                'placeholder' => 'Inset title...',
            ],
        ],
        [
            'id' => 'color',
            'type' => 'color',
            'title' => 'Color Picker',            
        ],
        [
            'id' => 'repeater',
            'type' => 'repeater',
            'title' => 'Repeater',
            'section' => 'general',
            'fields' => [
                [
                    'id' => 'message',
                    'type' => 'text',
                    'title' => 'Title',
                    'default' => 'New Item',
                    'attributes' => [
                        'placeholder' => 'Inset title...',
                    ],
                ],
                [
                    'id' => 'color',
                    'type' => 'color',
                    'title' => 'Color Picker',            
                ],
            ],
        
        ]
    ],
]);

$options->add('field', [
    'id' => 'radio_icon',
    'type' => 'radio-icon',
    'title' => 'Radio Icon',
    'section' => 'general',
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
]);

$options->add('field', [
    'id' => 'typography',
    'type' => 'typography',
    'title' => 'Typography',
    'section' => 'general',
    'family' => true,
    'variant' => true,
    'size' => true,
    'variant' => true,
    'lineHeight' => true,
    'letterSpacing' => true,
    'wordSpacing' => true,
    'alignment' => true,
    'decoration' => true,
]);

$options->add('field', [
    'id' => 'multicolor',
    'type' => 'multi-color',
    'title' => 'Multi Color',
    'section' => 'general',
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
]);

$options->add('field', [
    'id' => 'radioimage',
    'type' => 'radio-image',
    'title' => 'Radio Image',
    'section' => 'general',
    'default' => 'second',
    'choices' => [
        [
            'title' => 'First',
            'img' => 'http://localhost/wp-content/themes/twentytwenty/screenshot.png',
            'id' => 'first'
        ],
        [
            'title' => 'Second',
            'img' => 'http://localhost/wp-content/themes/twentynineteen/screenshot.png',
            'id' => 'second'
        ]
    ]
]);

$options->add('field', [
    'id' => 'preset',
    'type' => 'preset',
    'title' => 'Preset',
    'section' => 'general',
    'presets' => [
        [
            'title' => 'Dark',
            'img' => 'http://localhost/wp-content/themes/twentytwenty/screenshot.png',
            'data' => [
                'general' => [
                    'text' => 'Dark theme import successfuly.'
                ]
            ]
        ],
        [
            'title' => 'Minimal',
            'img' => 'http://localhost/wp-content/themes/twentynineteen/screenshot.png',
            'data' => [
                'general' => [
                    'text' => 'Minimal theme import successfuly.'
                ]
            ]
        ]
    ]
]);

$options->add('field', [
    'id' => 'export',
    'type' => 'export',
    'title' => 'Export',
    'section' => 'general',
]);

$options->add('field', [
    'id' => 'import',
    'type' => 'import',
    'title' => 'Import',
    'section' => 'general',

]);

$options->add('field', [
    'id' => 'html',
    'type' => 'html',
    'title' => 'html',
    'section' => 'general',
    'content' => '<i>hello world!</i>',
]);
