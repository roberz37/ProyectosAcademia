<?php

require_once("./vendor/autoload.php");
require_once("MiFramework.php");

use PHPUnit\Framework\TestCase;

final class MiFrameworkTest extends TestCase{
    function testAndaTodo(){
        $this->assertTrue(true);
    }

    function testExisteRouter(){
        $this->assertTrue(class_exists("Router"));
    }

    function testAddRoute(){
        $router= new Router();
        $route= $router->addRoute("/noticia/(\d{0,4})\.html", "target");
        $this->assertTrue($route);
    }
    function testMatch(){
        $router= new Router();
        $route=$router->addRoute("/noticia/(\d{0,4})\.html", "target");
        $target= $router->match("/noticia/1234.html");
        $target1= $router->match("/noticia/6734.html");
        $target2= $router->match("/noticia/1964.html");
        $this->assertEquals("target", $target);
        $this->assertEquals("target", $target1);
        $this->assertEquals("target", $target2);
    }
    
    function testAddRoutes(){
        $router= new Router();
        $route= $router->addRoute("/noticia/(\d{0,4})\.html","target");
        $this->assertTrue($route);
        $route2= $router->addRoute("/noticia/(\d{0,4})\.html", "estatua");
        $this->assertEquals(false, $route2);
    }
    function testAddRoutesOk(){
        $router= new Router();
        $route= $router->addRoute("/noticia/(\d{0,4})\.html","target");
        $this->assertTrue($route);
        $route2= $router->addRoute("/noticia/(\d{1,8})\.html", "estatua");
        $this->assertTrue($route2);
    }
    function testMatchesOk(){
        $router= new Router();
        $route= $router->addRoute("/noticia/(\d{0,4})\.html","target");
        $route2= $router->addRoute("/noticia/(\d{4,8})\.html", "estatua");
        $target= $router->match("/noticia/1234.html");
        $target2= $router->match("/noticia/123456.html");
        $this->assertEquals("target", $target);
         $this->assertEquals("estatua", $target2);
    }
    function testMatches(){
        $router= new Router();
        $target= $router->match("/noticia/noExiste");
        $this->assertTrue(is_null($target));
    }


    function testExisteTemplate(){
        $this->assertTrue(class_exists("TemplateEngine"));
    }

    function testAddVariable(){
        $engine= new TemplateEngine("archivo.template");
        $template= $engine->addVariable("path", "hola");
        $this->assertTrue($template);
    }
    
    function testRenderOk(){
        $engine= new TemplateEngine("prueba.template");
        $engine->addVariable("titulo", "hola");
        $template=$engine->render();
        $resultado= file_get_contents("pruebaLimpia.template");
        $this->assertEquals($resultado, $template);

    }

    function testRender(){
        $engine= new TemplateEngine("prueba.template");
        $template=$engine->render();
        $resultado= file_get_contents("pruebaLimpiaTotal.template");
        $this->assertEquals($resultado, $template);
    }
    function testAddVariables(){
        $engine= new TemplateEngine("prueba.template");
        $engine->addVariable("titulo", "hola");
        $engine->addVariable("parrafo", "chau");
        $template=$engine->render();
        $resultado= file_get_contents("pruebaVariablesLimpia.template");
        $this->assertEquals($resultado, $template);
    }

}
