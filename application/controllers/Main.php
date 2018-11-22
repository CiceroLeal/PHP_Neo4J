<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('neo');
    }

    public function index(){
        $nodes = $this->neo->get_label_nodes('Evento');

        $props['evento'] = array();

        foreach ($nodes as $key => $node){
            $evento = $node->getProperties();
            $evento['id'] = $node->getId();

            array_push($props['evento'], $evento);
        }

        $this->load->view('index', $props);
	}

	public function criar(){
        $this->load->view('create');
    }

    public function editar($id){
        $nodes = $this->getNodes($id);
        $nodes['id'] = $id;
        $this->load->view('edit', $nodes);
    }

    private function getNodes($id){
        $startNode = $this->neo->get_node($id);
        $rels = $this->neo->get_relations($id);

        $endNodes = $this->getEndNodes($rels);

        $nodes['Agentes'] = array();
        foreach ($endNodes as $key => $node){
            $props = $node->getProperties();
            $label = $this->neo->get_label($node->getId());
            $labName = $label[0]->getName();

            if($labName == 'Agentes'){
                array_push($nodes['Agentes'], $props['content']);
            }else{
                $nodes[$labName] = $props['content'];
            }
        }

        $nodes['Evento'] = $startNode->getProperties();

        return $nodes;
    }

    private function getEndNodes($rels){
        return array_map(function ($rel) {
            return $rel->getEndNode();
        }, $rels);
    }

    public function atualizar($id){
        $this->removeEvento($id, false);
        $this->inserir(false);

        echo "<script>window.location.href = '/grafos';</script>";
    }

    public function excluir($id){
        $this->removeEvento($id);
    }

    private function removeEvento($id, $msg = true){
        $rels = $this->neo->get_relations($id);

        $nodes = $this->getEndNodes($rels);

        foreach ($rels as $rel){
            $this->neo->delete_relation($rel->getId());
        }

        foreach ($nodes as $key => $node){
            $this->neo->remove_node($node->getId());
        }

        $this->neo->remove_node($id);

        if($msg){
            echo "<script>window.location.href = '/grafos';</script>";
        }
    }

    public function inserir($msg = true){
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

        if($msg){
            echo "<script>window.location.href = '/grafos';</script>";
        }
    }
}
