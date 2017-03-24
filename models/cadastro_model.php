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
class Cadastro_model extends CI_Model {
	
	public function login(){
		
		$query = $this->db->get('usuarios');
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

	public function verifica_chave($chave = NULL){
		$this->db->where('usu_chave',$chave);
		$query = $this->db->get('usuarios');
		return $query->result();
	}
	
}