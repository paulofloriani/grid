<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	


	/**
	 * construct do controller carrega models e librarys e functions
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('usuarios_model');
		
	
	
		$this->load->library('form_validation');
		//$this->sessao_id = $this->usuarios_model->id_sessao();
	}
	
	
	public function index(){
		
		$this->load->view('inc/header_deslogado');
		$this->load->view('login_view');
		$this->load->view('inc/footer');
	}
	
	public function verifica_login(){
		
		$this->input->post('login');
		$this->form_validation->set_error_delimiters ( '<div class="chip red lighten-2 white-text">','</div>' );
		$this->form_validation->set_rules('login','Login','trim|required|xss_clean');
		$this->form_validation->set_rules('senha','Senha','trim|required|xss_clean|callback_check_user_database');
		if($this->form_validation->run() == FALSE):
			$this->load->view('login_view');
		else:
			redirect(base_url('painel'));
		endif;
		
	}
	
	
	// --------------------------------------------------------------------
	/**
	 * Funcao para consultar o email e senha no banco
	 * se o retorno for positivo cria sessao com dados do usuario
	 */
	public function check_user_database($senha) {
		
		// Field validation succeeded. Validate against database
		$login = $this->input->post ('login');
	
		// query the database
		$result = $this->usuarios_model->login($login, $senha);
		
		if ($result) {
			$sess_array = array ();
			foreach ($result as $row) {
	
				$sess_array = array (
						'usu_id' => $row->usu_id,
						'usu_email' => $row->usu_email,
						'usu_nome' => $row->usu_nome,
						//'usu_nivel' => $row->usu_nivel,
						//'usu_empresa'=>$row->empresa_empresa_id,
						'logado' => true);
				$this->session->set_userdata('logado', $sess_array);
			}
			return TRUE;
		} else {
			redirect(base_url('login/ERRO'));
			return false;
		}
	}
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */