<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cpt_botoes() {

    $labels = array(
        'name' => 'Botões da HOME',
        'singular_name' => 'Botão da Home',
        'menu_name' => 'Botões da HOME',
        'name_admin_bar' => 'Botões da Home',
        'add_new' => 'Novo',
        'add_new_item' => 'Novo botão',
        'new_item' => 'Novo botão',
        'edit_item' => 'Editar',
        'view_item' => 'Ver',
        'all_items' => 'Todos os botões',
        'search_items' => 'Buscar',
        'parent_item_colon' => 'Botões',
        'not_found' => 'Botão não localizado.',
        'not_found_in_trash' => 'Botão não localizado no lixo.'
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-screenoptions',
        'query_var' => true,
        'rewrite' => array('slug' => 'botao-home'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            //'taxonomies' => array('category')
//        'taxonomies' => array('category', 'post_tag')
    );

    register_post_type('botao-home', $args);


}

add_action('init', 'cpt_botoes');


function btn_cat() {

    //Áreas de pesquisa
    $labels = array(
        'name' => 'Tipo de botão',
        'singular_name' => 'Tipo de botão',
        'search_items' => 'Buscar',
        'all_items' => 'Todos',
        'parent_item' => __('Parent'),
        'parent_item_colon' => __('Parent:'),
        'edit_item' => 'Editar',
        'update_item' => 'Editar',
        'add_new_item' => 'Adicionar novo tipo de botão',
        'new_item_name' => 'Novo tipo de botão',
        'menu_name' => __('Tipo de botão'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tipo-botao'),
    );

    register_taxonomy('tipo-botao', array('botao-home'), $args);
    //end - Áreas de pesquisa
    //Áreas de pesquisa
    $labels = array(
        'name' => 'Tamanho do botão',
        'singular_name' => 'Tamanho do botão',
        'search_items' => 'Buscar',
        'all_items' => 'Todos',
        'parent_item' => __('Parent'),
        'parent_item_colon' => __('Parent:'),
        'edit_item' => 'Editar',
        'update_item' => 'Editar',
        'add_new_item' => 'Adicionar novo tamanho de botão',
        'new_item_name' => 'Novo tamanho de botão',
        'menu_name' => __('Tamanho do botão'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tamanho-botao'),
    );

    register_taxonomy('tamanho-botao', array('botao-home'), $args);
    //end - Áreas de pesquisa
}

add_action('init', 'btn_cat');

