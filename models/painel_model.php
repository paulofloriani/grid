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
class Painel_model extends CI_Model {
	
	function salva_ocorrencia($ocorrencia)
	{
		$this->db->insert('ocorrencias', $ocorrencia);
		return $this->db->insert_id();
		
	
	}
	
	function getOcorrencia($id=null){
		$this->db->select('*');
		$this->db->from('ocorrencias');
		$this->db->where('ocorrencias.id',$id);
		$this->db->join('produtos','produtos.onu = ocorrencias.produto','left outer');
		$this->db->join('guia','guia.guia = produtos.guia','left outer');
		$this->db->join('hospitais','hospitais.hosp_id = produtos.hosp_id','left outer');
		$this->db->join('isolamento','isolamento.produto_id = produtos.onu','left outer');		
		$query=$this->db->get();
		return $query->result();
	}
	
	
	function salva_guia($guia)
	{
		$this->db->insert('guia', $guia);
		return $this->db->insert_id();
		
	
	}
	
	function getGuia($id=null){
		$this->db->select('*');
		$this->db->from('guia');
		$this->db->where('id_guia',$id);
		
		$query=$this->db->get();
		return $query->result();
	}
	
	function buscaguia($id=null){
		$this->db->select('*');
		$this->db->from('guia');
		
		$query=$this->db->get();
		return $query->result();
	}
	
	function salva_produto($produto)
	{
		$this->db->insert('produtos', $produto);
		return $this->db->insert_id();
		
	
	}
	
	function getProduto($id=null){
		$this->db->select('*');
		$this->db->from('produtos');
		$this->db->where('produto_id',$id);
		$this->db->join('guia','guia.guia = produtos.guia','left outer');
		
		$query=$this->db->get();
		return $query->result();
	}
	
	public function buscaproduto($id=null){
		$this->db->select('*');
		$this->db->from('produtos');
		$this->db->join('guia','guia.guia = produtos.guia','left outer');
		
		$query=$this->db->get();
		return $query->result();
	}
   public function atualiza($id = null, $dados = null, $tabela = null, $coluna = null){
   		$this->db->where($coluna , $id);
   		$this->db->update($tabela , $dados);
   		return $this->db->affected_rows();
   }
	
	public function deleta($id = null, $tabela = null, $coluna = null ){
		$this->db->where($coluna, $id);
		$this->db->delete($tabela);
		return $this->db->affected_rows();
	}
	
	
}