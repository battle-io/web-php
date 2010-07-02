<?php
    /*
     * This hook handles all exceptions
     */
    class Exceptions {

    // Set the errors vars
    public static $errors = array();

    // The user tried to get to a page that doesn't exist.  Reroute the user to the error controller
    public static function reroute(){
        // Send the error header (IMPORTANT)
        header("HTTP/1.0 404 Not Found");

        // Create the error controller and call the 404 method
        $controller = new Errors_Controller;
        $controller->error_404();
        $controller->_render();

        // Get out of here and stop processing now
       die();
    }

    /*
     * Set the site exception handler
     * @return void
     * @params void
     */
    public static function set_exception_handler(){
        // Set error handler
        set_error_handler(array('Exceptions', 'record'));

        // Set exception handler
        set_exception_handler(array('Exceptions', 'record'));
    }

    /*
     * Store the errors to the static $error var
     * @return void
     * @params string, string
     */
    public static function record($exception, $message = NULL, $file = NULL, $line = NULL){
        Exceptions::$errors[] = array(
            'exception' => $exception,
            'message' => $message,
            'file' => $file,
            'line' => $line
        );
    }

}

// Add and remove system events so that our custom event handling fires and not the built-in Kohana handlers
//Event::add('system.ready', array('Exceptions', 'set_exception_handler'));

// Handle 404 errors
Event::clear('system.404', array('Kohana', 'show_404'));
Event::add('system.404',array('Exceptions','reroute'));
?>
