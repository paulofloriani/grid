<?php if (!defined('BASEPATH'))	exit ('No direct script access allowed');
/**
 *
 * @package CodeIgniter
 * @author Natureza Digital  Dev Team
 * @copyright Copyright (c) 2014, naturezadigital.com.br, Inc.
 * @license http://naturezadigital.com.br/license.html
 * @link http://naturezadigital.com.br
 * @since Version 1.0
 *        ------------------------------------------------------------------------
 *       
 *        Classe para manipulacao dos dados do usuario (CRUD na base)
 *       
 * @package CodeIgniter
 * @category Model
 * @author Shanarai
 *        
 */
class Usuarios_model extends CI_Model {
	
	public function login($login=null,$senha=null){
		
		$this->db->where('usu_email',$login);
		$this->db->where ('usu_senha',sha1($senha));
		$query = $this->db->get('usuarios');
		return $query->result();
		
	}
	
	public function getUsuario($id =NULL){
		if($id !=null):
			$this->db->where('usu_id',$id);
			$query = $this->db->get('usuarios');
		return $query->result();
		endif;
	}
    public function getUsuarios(){
		$this->db->select('*');
		$this->db->from('usuarios');
		
		$query=$this->db->get();
		return $query->result();
	}
    function salva_usuario($usuario = NULL)
	{
		$this->db->insert('usuarios', $usuario);
		return $this->db->insert_id();	
	}
     function salva_usuario2($id = null, $usuario = null )
	{
		if($id != null):               
                $this->db->where('usu_id',$id);
                $this->db->update('usuarios',$usuario);
                return   $this->db->affected_rows();
            endif;
		
	
	}
	
	public function id_sessao(){
		$sess = $this->session->userdata('logado');
		if(isset($sess) and $sess != NULL):
		$res = $this->session->userdata('logado');
		foreach ($res as $key =>$linha):
		if($key == 'usu_id'):
		$id = $linha;
		endif;
		endforeach;
		return $id;
		endif;
	}
	
	public function logado(){
		$logado = $this->session->userdata('logado');
		if (!isset($logado) || $logado != true) :
		$url = uri_string();
		$this->session->set_flashdata('url',$url);
		redirect (base_url());
		endif;
	}
	
	public function nivel(){
		$logado = $this->session->userdata('logado');
		foreach($logado as $key => $linha):
		//echo $key;
		if($key == 'usu_nivel'):
		return    $linha; endif;
		endforeach;
	}	
	
	public function altera_capitao($dados = NULL){
		$this->db->insert('usuarios', $dados);
		return  $this->db->insert_id();
		
	}
	
	
	
}