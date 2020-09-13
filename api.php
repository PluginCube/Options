<?php

namespace CiraPress;

class API 
{
    /**
     * Parent instance.
     *
     * @since 1.0.0
     * @access private
     * @var string
     */
    private $parent;

    /**
     * Class constructer.
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param array $parent The parent instance.
     * 
     * @return void
     */
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Add a section
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param array $args Section arguments.
     * 
     * @return void
     */
    public function add_section($args)
    {
        do_action('cf/add/section/before', $args);

        extract($args);
        
        unset($args['id']);
        
        $args = wp_parse_args($args, [
            'title' => null,
            'description' => null,
            'priority' => 10,
            'fields' => []
        ]);

        $this->parent->args['sections'][$id] = $args;

        do_action('cf/add/section/after', $args);
    }

    /**
     * Add a field
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param array $args Field arguments.
     * 
     * @return void
     */
    public function add_field($args)
    {
        do_action('cf/add/field/before', $args);

        extract($args);
        
        unset($args['id']);
        unset($args['section']);

        $args = wp_parse_args($args, [
            'type' => 'text',
            'title' => null,
            'description' => null,
            'priority' => 10,
            'default' => null,
        ]);

        $this->parent->args['sections'][$section]['fields'][$id] = $args;

        do_action('cf/add/field/after', $args);
    }

    /**
     * Add a link to the menu
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param array $args Menu item arguments.
     * 
     * @return void
     */
    public function add_link($args)
    {
        do_action('cf/add/link/before', $args);

        extract($args);
        
        $args = wp_parse_args($args, [
            'type' => 'section',
            'title' => null,
            'icon' => 'ri-settings-4-fill',
            'priority' => 10,
        ]);

        $this->parent->args['menu'][] = $args;

        do_action('cf/add/link/after', $args);
    }
}