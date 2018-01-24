<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ExceptionHandler {
    /**
     * @var Exception
     */
    protected $exception = NULL;

    /**
     * @var boolean
     */
    protected $isXHRRequest = FALSE;

    /**
     * Set up the default error handler and check the request type.
     * 
     * @param array $params
     */
    public function __construct(array $params = array()) {
        // Sets the default exception handler. Will also pick up any uncaught exceptions.
        set_exception_handler(array($this, 'handle'));
       

        // Ajax calls are handled differently.
        if ( ! empty($params['isXHRRequest']) && TRUE == $params['isXHRRequest']) {
            $this->setIsXHRRequest(TRUE);
        }
    }

    /**
     * Handle the exceptions. Environment aware and request type aware.
     * 
     * @param  Exception $exception
     * @return void
     */
    public function handle(Exception $exception) {

        $this->setException($exception);

        switch (ENVIRONMENT) {
            case 'development' :
                $this->logException();
                break;
            case 'testing' :
            case 'production' :
                $this->logException();
                break;
            default :
                // Not necessary.
        }

        $isXHRRequest = $this->getIsXHRRequest();

        if (TRUE === $isXHRRequest) {
            $this->sendXHRResponse();
        } else {
            $this->redirectToError();
        }
    }

    /**
     * Set the excption object.
     * 
     * @param Exception $exception
     * @return void
     */
    public function setException(Exception $exception) {
        $this->exception = $exception;
    }

    /**
     * Retrieve the exception object.
     * 
     * @return Exception
     */
    public function getException() {
        return $this->exception;
    }

    /**
     * Set the boolean value of the XHR request type.
     * 
     * @param boolean $isXHRRequest
     */
    public function setIsXHRRequest($isXHRRequest) {
        $this->isXHRRequest = (bool) $isXHRRequest;
    }

    /**
     * Retrieve the boolean value of the XHR request type.
     * 
     * @return boolean
     */
    public function getIsXHRRequest() {
        return $this->isXHRRequest;
    }

    /**
     * Printing out a readable message to the browser.
     * 
     * @return void
     */
    private function printException() {
        $exception = $this->getException();
        echo ' ';
        echo ' Exception: ' . $exception->getMessage() . '<br />';
        echo ' Code: ' . $exception->getCode() . '<br />';
        echo ' File: ' . $exception->getFile() . '<br />';
        echo ' Line: ' . $exception->getLine() . '<br />';
        echo ' Trace: ' . $exception->getTraceAsString();
    }

    /**
     * Exception logging. Requires the threshold in the config to be greater than or equal to 1.
     * 
     * @return void
     */
    private function logException() {
        $exception = $this->getException();
        $message   = 
            'Exception: ' . $exception->getMessage() . PHP_EOL .
            'Code: ' . $exception->getCode() . ' ' . 
            'File: ' . $exception->getFile() . ' ' . 
            'Line: ' . $exception->getLine() . PHP_EOL .
            'Trace: ' . $exception->getTraceAsString();

        log_message('error', $message);
    }

    /**
     * Redirects to the application's error page for displaying.
     * 
     * @return void
     */
    public function redirectToError() {
        $this->_CI = &get_instance();
        $message = $this->getException()->getMessage();                 

        $redirect_url = '/error?message='.urlencode($message);
        echo '<script>';
        echo 'window.location.href = "'.$redirect_url.'";';
        echo '</script>';
        die();

        //problems with this no time to figure it out
        //redirect('error?message='.$message, 'refresh')
    }

    /**
     * Echoes the JSON encoded XHR response.
     * 
     * @return void
     */
    public function sendXHRResponse() {
        $response = array(
            'status'  => FALSE,
            'message' => $this->getException()->getMessage() 
        );

        echo json_encode($response);
    }
}