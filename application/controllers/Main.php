<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('neo');
    }

    public function index(){
        $nodes = $this->neo->get_label_nodes('Pessoa');

        $props['pessoas'] = array();

        foreach ($nodes as $key => $node){
            array_push($props['pessoas'], $node->getProperties());
        }

        $this->load->view('index', $props);
	}

    public function removeNo($id){
	    $this->neo->remove_node($id);
    }

    public function insereNo(){
        $node = $this->neo->insert('Pessoa',
            array(
                'Nome' => 'Pedro Álvares Cabral',
                'Nascimento' => '1467 ou 1468 Belmonte, Portugal',
                'Morte' => '1520 (51, 52 ou 53 anos) Santarém, Portugal',
                'Nacionalidade' => 'Portuguesa',
                'Ocupação' => 'Navegador e explorador Comandante da frota do Reino de Portugal'
            )
        );
    }
}
