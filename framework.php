<?php
/**
 * Creates an interactive wordpress options panel.
 *
 * @package    CiraPress
 * @subpackage Framework
 * @copyright  Copyright (c) 2020, CiraPress
 * @license    https://opensource.org/licenses/MIT
 * @since      1.0
 */

namespace CiraPress;

class Framework 
{
    /**
     * Version, used for cache-busting.
     *
     * @since 1.0.0
     * @access private
     * @var string
     */
    private $version = '1.0.0';

    /**
     * Directory URL.
     *
     * @since 1.0.0
     * @access private
     * @var string|null
     */
    private $url;

    /**
     * Directory path.
     *
     * @since 1.0.0
     * @access private
     * @var string|null
     */
    private $path;

    /**
     * Translated strings for localization.
     *
     * @since 1.0.0
     * @access public
     * @var array
     */
    public $translation = [];
    
    /**
     * Current inctance arguments.
     *
     * @since 1.0.0
     * @access public
     * @var array
     */
    public $args = [];

    /**
     * Class constructer.
     * 
     * @since 1.0.0
     * @access public
     * @param array $args Current inctance arguments.
     * @return void
     */
    public function __construct($args)
    {
        $this->path = trailingslashit(str_replace('\\', '/', dirname( __FILE__ )));
        $this->url = site_url(str_replace(str_replace('\\', '/', ABSPATH ), '', $this->path));

        $this->args = wp_parse_args($args, [
            'capability' => 'manage_options',
            'menu_icon' => '',
            'menu_position' => 99,            
        ]);

        
        $this->translation = include $this->path . "/translation.php";
        
        add_action('_admin_menu', [$this, "add_admin_page"]);
        
        if ($this->in_view()) {
            add_action('admin_enqueue_scripts', [$this, "styles"]);
            add_action('admin_enqueue_scripts', [$this, "scripts"]);
            add_action('admin_enqueue_scripts', [$this, "app_state"]);
        }
    }

    /**
     * Add admin page.
     * 
     * @since 1.0.0
     * @access public
     * @return void
     */
    public function add_admin_page()
    {
        extract($this->args);
        add_menu_page($titles['page'], $titles['menu'], $capability, $id, [$this, 'render_page'], $menu_icon, $menu_position);
    }

    /**
     * Render page.
     *
     * @since 1.0.0
     * @access public 
     * @return void
     */
    public function render_page()
    {
        echo '<div id="cf"></div>';
    }

    /**
     * Determine if settings page is currently in view.
     *
     * @since 1.0.0
     * @access public 
     * @return boolean
     */
    public function in_view()
    {            
        return $GLOBALS['pagenow'] === 'admin.php' && isset($_GET['page']) && $_GET['page'] === $this->args['id'];
    }

    /**
     * Enqueue scripts.
     *
     * @since 1.0.0
     * @access public 
     * @return void
     */
    public function scripts()
    {
        wp_enqueue_script('cf', $this->url . "app/build/bundle.js", ['jquery'], $this->version, true);
    }

    /**
     * Enqueue styles.
     *
     * @since 1.0.0
     * @access public 
     * @return void
     */
    public function styles()
    {
        wp_enqueue_style('cf', $this->url . "app/build/bundle.css");
    }

    /**
     * Pass the initial state to Svelte.
     *
     * @since 1.0.0
     * @access public 
     * @return void
     */
    public function app_state()
    {
        $data = [
            'id' => $this->args['id'],
            'menu' => $this->args['menu'],
            'sections' => $this->args['sections'],
            'values' => $this->get_values(),
            'errors' => $this->get_errors(),
            'defaults' => $this->get_defaults(),
            'translation' => $this->translation,
            'titles' => $this->args['titles']
        ];

        wp_localize_script('cf', 'CFStore', $data);
    }

    /**
     * Get default values.
     * 
     * @since 1.0.0
     * @access public 
     * @return array
     */
    public function get_defaults()
    {
        $defaults = [];

        foreach ($this->args['sections'] as $section) {
            $defaults[$section['id']] = [];

            foreach ($section['fields'] as $field) {
                if(isset($field['default'])){
                    $defaults[$section['id']][$field['id']] = $field['default'];
                }
            }
        }

        return $defaults;
    }

    /**
     * Get saved values.
     * 
     * @since 1.0.0
     * @access public 
     * @return array
     */
    public function get_values()
    {
        $values = get_option($this->args['id']);
        $defaults = $this->get_defaults();

        if ($values) return wp_unslash(wp_parse_args($values , $defaults));

        return $defaults;
    }

    /**
     * Validate the values.
     * 
     * @since 1.0.0
     * @access public 
     * @return array
     */
    public function get_errors($values = NULL)
    {
        $errors = [];
        is_array($values) ?: $values = $this->get_values();

        foreach ($this->args['sections'] as $section) {
            foreach ($section['fields'] as $field) {
                if ($field['validate']) {
                    $value = $values[$section['id']][$field['id']];
                    $result = call_user_func($validate, $value);
                    
                    if( ! empty($result) ) {
                        $errors[$section['id']][$field['id']] = $result;
                    }
                }
            }
        }

        return $errors;
    }

    /**
     * Save the values.
     * 
     * @since 1.0.0
     * @access public 
     * @return void
     */
    public function save()
    {
    }
}

// Dev-only
require_once dirname(__FILE__) . "/sample.php";