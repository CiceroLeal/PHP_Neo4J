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

	public function criar(){
        $this->load->view('create');
    }

    public function removeNo($id){
	    $this->neo->remove_node($id);
    }

    public function inserir(){
        $form = $this->input->post();

        $evento = $this->neo->insert('Evento',
            array(
                'titulo' => $form['titulo'],
                'conteudo' => $form['conteudo']
            )
        );

        $periodo = $this->neo->insert('Periodo',
            array(
                'content' => $form['periodo'],
            )
        );

        $localizacao = $this->neo->insert('Localizacao',
            array(
                'content' => $form['localizacao'],
            )
        );

        $tema = $this->neo->insert('Tema',
            array(
                'content' => $form['tema'],
            )
        );

        $agentes = array();

        for($i = 0; $i < count($form['agentes']); $i++ ){
            $agente = $this->neo->insert('Agentes',
                array(
                    'content' => $form['agentes'][$i],
                )
            );

            array_push($agentes, $agente);
        }

        $this->neo->add_relation($evento, $periodo, 'periodo');
        $this->neo->add_relation($evento, $localizacao, 'localizacao');
        $this->neo->add_relation($evento, $tema, 'tema');

        foreach ($agentes as $key => $agente){
            $this->neo->add_relation($evento, $agente, 'agente');
        }

        print('Inserção realizada com sucesso');
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
