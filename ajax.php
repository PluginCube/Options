<?php

namespace CiraPress;

class AJAX 
{
    /**
     * Parent instance.
     *
     * @since 1.0.0
     * @access private
     * @var string
     */
    private $parent = '1.0.0';

    /**
     * Class constructer.
     * 
     * @since 1.0.0
     * @access public
     * @return void
     */
    public function __construct($parent)
    {
        $this->parent = $parent;

        add_action('wp_ajax_cf', [$this, 'request']);
    }

    /**
     * Process the requests.
     * 
     * @since 1.0.0
     * @access public
     * @return void
     */
    public function request()
    {        
        if ( ! check_ajax_referer('cf', 'security')) {
            wp_die();
        }

        if ( ! current_user_can($this->parent->args['capability'])) {
            wp_die();
        }
        
        $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : false;

        if ($method && method_exists($this, $method)) {
            $this->$method();
        }
    }

    /**
     * Respond.
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param bool $success Indicate the request was processed successfully.
     * @param string|null $message Optional message to pass back with json the respons.
     * @param array $data Optional data to pass back with json the respons.
     * 
     * @return void
     */
    public function respond($success, $data = [])
    {
        if (wp_doing_ajax()) {
            if ($success) {
                wp_send_json_success($data);
            } else {
                wp_send_json_error($data);
            }
        }

        // for internal use
        return ['success' => $success, 'data' => $data];
    }

    /**
     * Save & update values.
     * 
     * @since 1.0.0
     * @access public
     * @return void
     */
    public function save()
    {
        $this->respond(true, [
            'values' => $this->parent->get_values(),
            'errors' => $this->parent->get_errors()
        ]);
    }
}