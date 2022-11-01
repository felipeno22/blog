 <?php 


//iniciando sessao
session_start();
require_once("vendor/autoload.php");



use \Slim\Slim;


$app = new Slim();

$app->config('debug', true);


require_once("rotas/site.php");
require_once("rotas/jquery_blogs_contents.php");
require_once("rotas/jquery_comments_responses.php");
require_once("rotas/admin.php");
require_once("rotas/user.php");
require_once("rotas/blog.php");
require_once("rotas/content.php");
require_once("rotas/comment.php");






$app->run();//dps dde carregado os arquivos ele roda

 ?>