<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Formulário de contato do website
 *
 * @author William Rufino
 * @version 1.0
 * @category model
 * @access public
 */

    class Cadastro extends CI_Controller {
 
    /*
     * Construtor da classe
     * @author William Rufino
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('cadastro_model');
        $this->load->library('form_validation');
    }
 
    /*
     * Método Index, página inicial do formulário de contato
     *
     * @author William Rufino
     * @version 1.0
     * @access public
     */
    public function index() {
    	$this->load->view('inc/header.php');
        $this->load->view('cadastro/confirma_cadastro_view');
    }



    public function cadastro_usuario_1() {
        $this->load->view('inc/header_deslogado'); 
        $this->load->view('cadastro/cadastro_usuario_1_view'); 
    }

    public function verifica_cadastro_usuario_1(){
        $this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|xss_clean');           
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|is_unique[usuarios.usu_email]');      
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('inc/header_deslogado'); 
            $this->load->view('cadastro/cadastro_usuario_1_view'); 
        }else{
            // build array for the model
            $cria_chave = sha1(date("Y-m-d H:i"));
            $email = $this->input->post('email');
            $usuario = array(
                            'usu_nome' => set_value('nome'),
                            'usu_email' => set_value('email'),
                            'usu_nivel' => 1,
                            'usu_chave' => $cria_chave,
                
                        );  
            
            
            $chave = $cria_chave;
            //print_r($dados);
            $retorno = $this->cadastro_model->salva_usuario($usuario);
            if($retorno > 0):
                $this->envia_email_user($email, $chave);
            endif;

        }
        
        }
    
 
    public function cadastro_usuario_2() {
		$retorno = $this->cadastro_model->verifica_chave($this->uri->segment(3));
		foreach ($retorno as $ret): endforeach;
    	if($ret->usu_chave != $this->uri->segment(3)):
    		//redirect(base_url());
    	endif;
		$dados['usuario'] = $this->cadastro_model->verifica_chave($this->uri->segment(3));
    	$this->load->view('cadastro/cadastro_usuario_2_view', $dados);
    }

    public function verifica_cadastro_usuario_2(){
        $this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|xss_clean');           
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean');  
        $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|xss_clean');    
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim|xss_clean');   
        $this->form_validation->set_rules('confirma_senha', 'Confirmação de Senha', 'required|matches[senha]|trim|xss_clean');      
        $this->form_validation->set_rules('patente', 'Patente', 'required|trim|xss_clean');   
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $dados['usuario'] = $this->cadastro_model->verifica_chave($this->uri->segment(3));
            $this->load->view('inc/header_deslogado'); 
            $this->load->view('cadastro/cadastro_usuario_2_view', $dados); 
        }else{
            // build array for the model
            $cria_chave = sha1(date("Y-m-d H:i"));
            $id = $this->input->post('usu_id');
            $email = $this->input->post('email');
            
            $usuario = array(
                            'usu_nome' => set_value('nome'),
                            'usu_email' => set_value('email'),
                            'usu_senha' => sha1(set_value('senha')),
                            'usu_cpf' => set_value('cpf'),
                            'usu_patente' => set_value('patente'),                           
                
                        );  
            
            
            $chave = $cria_chave;
            //print_r($dados);
            $retorno = $this->cadastro_model->salva_usuario2($id, $usuario);
            if($retorno == 1):
                redirect(base_url(cadastro/retorno_cadastro));
            endif;

        }
        
        }

    public function retorno_cadastro() {
        $this->load->view('cadastro/retorno_cadastro_view'); 
    }

    

    

        public function envia_email_user($email, $chave) {
        $this->load->library('email');
        $subject = 'CCI - Confirmação de Cadastro de Usuário';
        $message = '<p>Prezado, <br />
                Sua conta foi criada com sucesso<br />
                Para ativar sua conta acesse seguinte link:
                
                </p><a href="'. base_url('cadastro/cadastro_usuario_2/'.$chave).'">clique aqui</a>';
    
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
        ->from('grid@ceosmap.com.br','CCI Osório')
        // ->addaddress('pfloriani@gmail.com')    // Optional, an account where a human being reads.
        ->to($email)
    //  ->cc('pfloriani@gmail.com')
        ->subject($subject)
        ->message($body)
        ->send();
    
        if($result):
        //echo "email enviado";
        redirect(base_url('cadastro/retorno_cadastro'));
        endif;
        //var_dump($result);
        //echo '<br />';
        //echo $this->email->print_debugger();
    
        exit;
    }
    

 
}
/* End of file contato.php */
/* Location: ./system/application/controllers/contato.php */