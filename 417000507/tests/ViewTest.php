<?php
    require "../framework/autoloader.php";

    use PHPUnit\Framework\TestCase;

    class ViewTest extends TestCase{

        public function testView(){
            $view = new View();
            $this->assertInstanceOf('View', $view);
        }

        public function testTemplateSetter(){
            $view = new View();
            $file = "test.php";
            $view->setTemplate($file);
            $this->assertEquals($view->getTpl(), $file);
        }
        
        public function testAddVar(){
            $view = new View();
            $file = "test.php";
            $view->setTemplate($file);
            $view->addVar("Age", "21");
            $this->assertEquals($view->getVars()["Age"], "21");
        }
    }
?>