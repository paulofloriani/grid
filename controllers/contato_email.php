<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
/*
 * Formulário de contato do website
 *
 * @author William Rufino
 * @version 1.0
 * @category model
 * @access public
 */

    class Contato_email extends CI_Controller {
 
    /*
     * Construtor da classe
     * @author William Rufino
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
    }
 
    /*
     * Método Index, página inicial do formulário de contato
     *
     * @author William Rufino
     * @version 1.0
     * @access public
     */
    public function index() {
        $this->load->view('contato');
    }
 
    /*
     * Método enviaEmail, onde será realmente enviado nosso formulário.
     *
     * @author William Rufino
     * @version 1.0
     * @access public
     */
    public function enviaEmail() {
        $this->load->library('email');

        $this->email->initialize();
        

 
        $this->email->from('grid@naturezadigital.com.br');
        $this->email->to('shanarai@gmail.com');
 
        $this->email->subject('teste');
        $this->email->message('teste do corpo');
        $this->email->send();
        
        echo $this->email->print_debugger();

    }
    
    public function send_mail() {
$this->load->library('email');

            $subject = 'Servidor';
            $message = '<p>This message has been sent for testing purposes.</p>';

            // Get full html:
            $body =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset='.strtolower(config_item('charset')).'" />
    <title>'.html_escape($subject).'</title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
'.$message.'
</body>
</html>';
            // Also, for getting full html you may use the following internal method:
            //$body = $this->email->full_html($subject, $message);

            $result = $this->email
                ->from('grid@naturezadigital.com.br')
               // ->addaddress('pfloriani@gmail.com')    // Optional, an account where a human being reads.
                ->to('shanarai@gmail.com')      
                ->cc('pfloriani@gmail.com')
                ->subject($subject)
                ->message($body)
                ->send();

            var_dump($result);
            echo '<br />';
            echo $this->email->print_debugger();

            exit;
    }
 
}
/* End of file contato.php */
/* Location: ./system/application/controllers/contato.php */