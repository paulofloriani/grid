<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller {
var $sessao_id;	

	public function __construct() {
		//ini_set('display_errors',1);
		//ini_set('display_startup_erros',1);
		//error_reporting(E_ALL);
		parent::__construct();
		$this->load->model('usuarios_model');	
		$this->load->model('painel_model');
		$this->load->library('form_validation');
		$this->usuarios_model->logado();
		$this->sessao_id = $this->usuarios_model->id_sessao();
	}


	public function index(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('painel_view');
	}
	
	public function registro_ocorrencia(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('registro_ocorrencia_view',$dados);
		
		
		
	}
	
	public function registro_guia(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('registro_guia_view',$dados);
		
		
		
	}
	
	public function registro_produto(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('registro_produto_view',$dados);
		
		
		
	}
	
	
	public function mostra_ocorrencia(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['ocorrencia'] = $this->painel_model->getOcorrencia($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('mostra_ocorrencia_view',$dados);
		
	}
	
	public function mostra_guia(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['guia'] = $this->painel_model->getGuia($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('mostra_guia_view',$dados);
		
	}

	public function editar_guia(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['guia'] = $this->painel_model->getGuia($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('editar_guia_view',$dados);
		
	}	
	
	public function mostra_produto(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['produto'] = $this->painel_model->getProduto($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('mostra_produto_view',$dados);
		
	}

	public function editar_produto(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['produto'] = $this->painel_model->getProduto($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('editar_produto_view',$dados);
		
	}	
	
	
	public function lista_produtos(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['produto'] = $this->painel_model->buscaproduto();
		$this->load->view('inc/header',$header);
		$this->load->view('lista_produtos_view',$dados);
		
	}

	public function deletar_guia(){
		$retorno = $this->painel_model->deleta($this->input->post('guia_id'),'guia', 'id_guia');
		if($retorno == 1):
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Guia deletada com sucesso!");
				redirect(base_url('painel/lista_guias/'));	
		else:
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Não foi possivel deletar a guia!");
				redirect(base_url('painel/editar_guia/'.$this->input->post('guia_id')));										
		endif;
	}

	public function deletar_produto(){
$retorno = $this->painel_model->deleta($this->input->post('produto_id'),'produtos', 'produto_id');
		if($retorno == 1):
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Produto deletado com sucesso!");
				redirect(base_url('painel/lista_produtos/'));	
		else:
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Não foi possivel deletar o produto!");
				redirect(base_url('painel/editar_produto/'.$this->input->post('produto_id')));										
		endif;
	}
	
	public function lista_guias(){			
		//redireciona caso não seja admin
		if($this->usuarios_model->nivel() != 0): redirect(base_url('painel')); endif;
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['guia'] = $this->painel_model->buscaguia($this->uri->segment(3));
		$this->load->view('inc/header',$header);
		$this->load->view('lista_guias_view',$dados);
		
	}

	public function orgaos(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('orgaos_view');
		
	}
    
  
	
	
	public function imprimi_ocorrencia(){
		$dados['ocorrencia'] = $this->painel_model->getOcorrencia($this->uri->segment(3));
	
		$this->load->view('mostra_ocorrencia_view',$dados);
	
	}
	
	public function verifica_registro_ocorrencia(){
		$this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
		$this->form_validation->set_rules('km', 'km', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('produto', 'produto', 'required|trim|xss_clean|is_numeric|max_length[4]');
		$this->form_validation->set_rules('veiculos', 'Veiculos', 'required|trim|xss_clean');				
		$this->form_validation->set_rules('trafego', 'trafego', 'required|trim|xss_clean|max_length[1]');		
		$this->form_validation->set_rules('clima', 'clima', 'required|trim|xss_clean|max_length[1]');			
		$this->form_validation->set_rules('vitimas', 'vitimas', 'required|trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('n_vitimas', 'n_vitimas', 'trim|xss_clean|max_length[3]');
		$this->form_validation->set_rules('nome_informante', 'nome_informante', 'trim|xss_clean');
		$this->form_validation->set_rules('telefone_informante', 'telefone_informante', 'trim|xss_clean');
		$this->form_validation->set_rules('regiao_moradia', 'regiao_moradia', 'trim|xss_clean');
		$this->form_validation->set_rules('regiao_ind', 'regiao_ind', 'trim|xss_clean');
		$this->form_validation->set_rules('regiao_nenhum', 'regiao_nenhum', 'trim|xss_clean');		
		$this->form_validation->set_rules('prf', 'prf', 'trim|xss_clean');
		$this->form_validation->set_rules('defciv', 'defciv', 'trim|xss_clean');
		$this->form_validation->set_rules('dnit', 'dnit', 'trim|xss_clean');
		$this->form_validation->set_rules('nenhum', 'nenhum', 'trim|xss_clean');		
		$this->form_validation->set_rules('explosao', 'explosao', 'trim|xss_clean');
		$this->form_validation->set_rules('incendio', 'incendio', 'trim|xss_clean');
		$this->form_validation->set_rules('ar', 'ar', 'trim|xss_clean');
		$this->form_validation->set_rules('nenhum', 'nenhum', 'trim|xss_clean');
		
		
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$this->load->view('inc/header',$header);
			$this->load->view('registro_ocorrencia_view',$dados);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			if($this->input->post('regiao_moradia') == 1): $regiao_moradia = 1; else: $regiao_moradia = 0; endif;
			if($this->input->post('regiao_ind') == 1): $regiao_ind = 1; else: $regiao_ind= 0; endif;
			if($this->input->post('regiao_nenhum') == 1): $regiao_nenhum = 1; else: $regiao_nenhum = 0; endif;			
			if($this->input->post('prf') == 1): $prf= 1; else: $prf = 0; endif;
			if($this->input->post('defciv') == 1): $defciv = 1; else: $defciv = 0; endif;
			if($this->input->post('dnit') == 1): $dnit = 1; else: $dnit = 0; endif;
			if($this->input->post('nenhum') == 1): $nenhum = 1; else: $nenhum = 0; endif;
			
			if($this->input->post('explosao') == 1): $explosao = 1; else: $explosao = 0; endif;
			if($this->input->post('incendio') == 1): $incendio= 1; else: $incendio = 0; endif;
			if($this->input->post('ar') == 1): $ar = 1; else: $ar = 0; endif;
			if($this->input->post('nenhum') == 1): $ocorrencia_nenhum = 1; else: $ocorrencia_nenhum = 0; endif;
			
			$hora = date("h");
			if ($hora > 8 and $hora < 18 ): $turno = 'dia'; else: $turno = 'noite'; endif;
			
			
			$ocorrencia = array(
					       	'km' => set_value('km'),
							'hora' => $hora,
							'turno' => $turno,
					       	'produto' => set_value('produto'),
					       	'trafego' => set_value('trafego'),
							'clima' => set_value('clima'),
					       	'vitimas' => set_value('vitimas'),
							'n_vitimas' => set_value('n_vitimas'),
					       	'usu_id' => $this->input->post('usu_id'),
							'nome_informante' => set_value('nome_informante'),
							'telefone_informante' => set_value('telefone_informante'),
							'regiao_moradia' => $regiao_moradia,
							'regiao_ind' => $regiao_ind,
							'regiao_nenhum' => $regiao_nenhum,
							'prf' => $prf,
							'defciv' => $defciv,
							'dnit' => $dnit,
							'nenhum' => $nenhum,
							'ocorrencia_explosao' => $explosao,
							'ocorrencia_incendio' =>$incendio,
							'ocorrencia_prod_ar' => $ar,
							'ocorrencia_nenhum' => $ocorrencia_nenhum,
	
					       			
						);
					
			// run insert model to write data to db
			
			$retorno = $this->painel_model->salva_ocorrencia($ocorrencia);
			
		
			if ($retorno > 0){ // the information has therefore been successfully saved in the db			
				
				redirect(base_url('painel/mostra_ocorrencia\/').$retorno);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
		
		
		
		}


		public function verifica_editar_guia(){
		$this->form_validation->set_error_delimiters('<div class="red-text text-lighten-2">', '</div>');
		$this->form_validation->set_rules('guia', 'guia', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('guia_desc', 'Descrição do GUIA', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('1_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('1_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_2_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_2_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_3', 'acima', 'required|xss_clean');
		if($this->form_validation->run() == FALSE):
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['guia'] = $this->painel_model->getGuia($this->input->post('guia_id'));
			$this->load->view('inc/header',$header);
			$this->load->view('editar_guia_view',$dados);
		else:
			$guia_id = $this->input->post('guia_id');
			$guia = array(
			    'guia' => set_value('guia'),
				'guia_desc' => set_value('guia_desc'),
				'1_1' => set_value('1_1'),
				'1_2' => set_value('1_2'),
				'2_' => set_value('2_'),
				'2_1' => set_value('2_1'),
				'2_2_1' => set_value('2_2_1'),
				'2_2_2' => set_value('2_2_2'),
				'3_1' => set_value('3_1'),
				'3_2' => set_value('3_2'),
				'3_3' => set_value('3_3'),		
				);			
			$retorno = $this->painel_model->atualiza($guia_id,$guia, 'guia', 'id_guia');
			if($retorno == 1):
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Guia atualizada com sucesso!");
				redirect(base_url('painel/mostra_guia/'.$guia_id));
			else:
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Não foram feitas alterações!");
				redirect(base_url('painel/mostra_guia/'.$guia_id));			
			endif;
		endif;

		}	

		public function verifica_registro_guia(){
		$this->form_validation->set_error_delimiters('<div class="red-text text-lighten-2">', '</div>');
		$this->form_validation->set_rules('guia', 'guia', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('guia_desc', 'Descrição do GUIA', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('1_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('1_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_2_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('2_2_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_1', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_2', 'acima', 'required|xss_clean');
		$this->form_validation->set_rules('3_3', 'acima', 'required|xss_clean');			
	
		if ($this->form_validation->run() == FALSE) {
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$this->load->view('inc/header',$header);
			$this->load->view('registro_guia_view',$dados);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$guia = array(
			    'guia' => set_value('guia'),
				'guia_desc' => set_value('guia_desc'),
				'1_1' => set_value('1_1'),
				'1_2' => set_value('1_2'),
				'2_' => set_value('2_'),
				'2_1' => set_value('2_1'),
				'2_2_1' => set_value('2_2_1'),
				'2_2_2' => set_value('2_2_2'),
				'3_1' => set_value('3_1'),
				'3_2' => set_value('3_2'),
				'3_3' => set_value('3_3'),		
				);
					
			// run insert model to write data to db
			
			$retorno = $this->painel_model->salva_guia($guia);
			
		
			if ($retorno > 0){ // the information has therefore been successfully saved in the db			
				
				redirect(base_url('painel/mostra_guia\/').$retorno);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
		
		}
    
		public function editar_registro_produto(){
		$this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
		$this->form_validation->set_rules('onu', 'onu', 'required|trim|xss_clean|is_numeric|max_length[4]');			
		$this->form_validation->set_rules('guia', 'guia', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('nome', 'nome', 'required|xss_clean');
		$this->form_validation->set_rules('reag_agua', 'reag_agua', 'trim|xss_clean|is_numeric|max_length[1]');
		$this->form_validation->set_rules('hosp_id', 'hosp_id', 'trim|xss_clean|is_numeric|max_length[3]');
		$this->form_validation->set_rules('classe', 'classe', 'required|xss_clean');		
	
		if ($this->form_validation->run() == FALSE):
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['produto'] = $this->painel_model->getProduto($this->input->post('produto_id'));
			$this->load->view('inc/header',$header);
			$this->load->view('editar_produto_view',$dados);
		else:
			$produto_id = $this->input->post('produto_id');
			$produto = array(
				'onu' => set_value('onu'),
				'guia' => set_value('guia'),
				'nome' => set_value('nome'),
				'reag_agua' => set_value('reag_agua'),
				'hosp_id' => set_value('hosp_id'),
				'classe' => set_value('classe'),								       			
			);
			$retorno = $this->painel_model->atualiza($produto_id, $produto,'produtos','produto_id');		
			if($retorno == 1):
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Produto atualizado com sucesso!");
				redirect(base_url('painel/mostra_produto/'.$produto_id));				
			else:
				$this->session->set_flashdata('msg', 1);
				$this->session->set_flashdata('mensagem', "Não foi possível atualizar o produto!");
				redirect(base_url('painel/editar_produto/'.$produto_id));
			endif;
		endif;
	}        
		
		public function verifica_registro_produto(){
		$this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
		$this->form_validation->set_rules('onu', 'onu', 'required|trim|xss_clean|is_numeric|max_length[4]');			
		$this->form_validation->set_rules('guia', 'guia', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('nome', 'nome', 'required|xss_clean');
		$this->form_validation->set_rules('reag_agua', 'reag_agua', 'trim|xss_clean|is_numeric|max_length[1]');
		$this->form_validation->set_rules('hosp_id', 'hosp_id', 'trim|xss_clean|is_numeric|max_length[3]');
		$this->form_validation->set_rules('classe', 'classe', 'required|xss_clean');
		
	
		if ($this->form_validation->run() == FALSE) {
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$this->load->view('inc/header',$header);
			$this->load->view('registro_produto_view',$dados);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$produto = array(
				'onu' => set_value('onu'),
				'guia' => set_value('guia'),
				'nome' => set_value('nome'),
				'reag_agua' => set_value('reag_agua'),
				'hosp_id' => set_value('hosp_id'),
				'classe' => set_value('classe'),								       			
			);
					
			// run insert model to write data to db
			
			$retorno = $this->painel_model->salva_produto($produto);
			
		
			if ($retorno > 0){ // the information has therefore been successfully saved in the db			
				
				redirect(base_url('painel/mostra_produto\/').$retorno);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	
		
		
		
	}
    
      public function novo_usuario(){			
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$this->load->view('inc/header',$header);
		$this->load->view('usuarios/cadastro_usuario_view',$dados);		
	}
    
    public function verifica_novo_usuario(){
		$this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
		$this->form_validation->set_rules('nome', 'Nome', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|is_unique[usuarios.usu_email]');		
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$this->load->view('inc/header',$header);
			$this->load->view('usuarios/cadastro_usuario_view',$dados);
		}else{
		 	// build array for the model
            $cria_chave = sha1(date("Y-m-d H:i"));
			$email = $this->input->post('email');
			$usuario = array(
					       	'usu_nome' => set_value('nome'),
							'usu_email' => set_value('email'),
                            'usu_nivel' => 1,
                            'usu_chave'	=> $cria_chave,
                
						);	
            
            
            $chave = $cria_chave;
			//print_r($dados);
			$retorno = $this->usuarios_model->salva_usuario($usuario);
			if($retorno > 0):
				$this->envia_email_user($email, $chave);
			redirect(base_url('painel/admin/'));

			endif;

		}
		
		}
   
    
	public function altera_capitao(){
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['sessao_usuario'] = $this->usuarios_model->getUsuario();
		$this->load->view('inc/header',$header);
		$this->load->view('usuarios/altera_capitao_view',$dados);
	}	
	
	public function valida_capitao(){
		$this->form_validation->set_error_delimiters('<div class="chip red lighten-2 white-text">', '</div>');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|is_unique[usuarios.usu_email]');
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$dados['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
			$this->load->view('inc/header',$header);
			$this->load->view('usuarios/altera_capitao_view',$dados);
		}else{
			$cria_chave = sha1(date("Y-m-d H:i"));
			$email = $this->input->post('email');
			$dados = array(
				'usu_email' => $this->input->post('email'),
				'usu_nivel' => 0,
				'usu_chave'	=> $cria_chave,
					
			);
			$chave = $cria_chave;
			//print_r($dados);
			$retorno = $this->usuarios_model->altera_capitao($dados);
			if($retorno > 0):
				$this->envia_email_adm($email, $chave);
			
			endif;
		}
	}
    
    
     public function admin(){			
		$header['sessao_usuario'] = $this->usuarios_model->getUsuario($this->sessao_id);
		$dados['usuarios'] = $this->usuarios_model->getUsuarios();
		$this->load->view('inc/header',$header);
		$this->load->view('usuarios/admin_view',$dados);
		
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
	//	->cc('pfloriani@gmail.com')
		->subject($subject)
		->message($body)
		->send();
	
		if($result):
		//echo "email enviado";
		redirect(base_url('painel/admin/'));
		endif;
		//var_dump($result);
		//echo '<br />';
		//echo $this->email->print_debugger();
	
		exit;
	}
	
	public function envia_email_adm($email, $chave) {
		$this->load->library('email');
		$subject = 'CCI - Confirmação de Cadastro de Capitão';
		$message = '<p>Prezado Capitão, <br />
				Sua conta foi criada com sucesso<br />
				Para ativar sua conta acesse seguinte link:
				
				</p><a href="'. base_url('cadastro/confirma_cadastro/'.$chave).'">clique aqui</a>';
	
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
		->from('grid@naturezadigital.com.br','CCI Osório')
		// ->addaddress('pfloriani@gmail.com')    // Optional, an account where a human being reads.
		->to($email)
	//	->cc('pfloriani@gmail.com')
		->subject($subject)
		->message($body)
		->send();
	
		if($result):
		//echo "email enviado";
			redirect(base_url());
		endif;
		//var_dump($result);
		//echo '<br />';
		//echo $this->email->print_debugger();
	
		exit;
	}	
	
	 
}/*fim da classe





/* End of file painel.php */
/* Location: ./application/controllers/painel.php */