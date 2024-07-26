<?php

/**
 * O caminho base do diretório do website.
 *
 * Este valor define o caminho base para o diretório do website, dependendo de como a URL está estruturada.
 * 
 * Exemplo de uso:
 * - Se o website estiver acessível em uma URL como `https://dinpack.com/servicos/`, e este SEO estiver dentro de "serviços", 
 *   defina o valor como `"/servicos/"`.
 * - Caso contrário, defina apenas como `"/"`.
 *
 */
const WEBSITE_FOLDER = "/";

/**
 * O caminho base do diretório de estilização.
 * 
 * Esse valor define o caminho para o diretório de estilização do website!
 *
 * Exemplo de  uso:
 * - Se os arquivos CSS estiver dentro de uma pasta chamada `assets/estilos`,
 * defina o valor como `WEBSITE_FOLDER . "assets/estilos"`
 * */
const CSS_FOLDER = WEBSITE_FOLDER . "assets/css";

/**
 * O caminho base do diretório de scripts.
 * 
 * Esse valor define o caminho para o diretório de scripts do website!
 *
 * Exemplo de  uso:
 * - Se os arquivos JS estiver dentro de uma pasta chamada `assets/scripts`,
 * defina o valor como `WEBSITE_FOLDER . "assets/scripts"`
 * */
const JS_FOLDER = WEBSITE_FOLDER . "assets/js";

/**
 * O caminho base do diretório de imagens.
 * 
 * Esse valor define o caminho para o diretório de imagens do website!
 *
 * Exemplo de  uso:
 * - Se as imagens estiver dentro de uma pasta chamada `assets/images`,
 * defina o valor como `WEBSITE_FOLDER . "assets/images"`
 * */
const IMAGE_FOLDER = WEBSITE_FOLDER . "assets/images";

/**
 * Páginas não dinâmicas do website.
 *
 * Esta constante define uma lista de URLs para páginas que são estáticas e não geradas dinamicamente no website.
 * 
 * Exemplo de uso:
 * - Se o website possui páginas estáticas como a página inicial, a página 404, o mapa do site, etc.,
 * defina a constante com os caminhos relativos dessas páginas.
 *
 */
const NON_DINAMIC_PAGES = ["/", "/404", "/mapa-site", "/agradecimentos", "/email-enviado", "/trabalhos"];
