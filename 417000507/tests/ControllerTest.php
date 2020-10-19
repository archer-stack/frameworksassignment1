<?php
require "../framework/autoloader.php";
    
    use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase{
    public function testController(){
        $indexController = new IndexController();
        $this->assertInstanceOf('Controller', $indexController);
    }

    public function testModelSetter(){

        $courseModel = new CourseModel();
        $indexController = new IndexController();
        $indexController->setModel($courseModel);
        $this->assertEquals($courseModel, $indexController->getModel()); 
    }

    public function testViewSetter(){

        $indexView = new View();
        $indexController = new IndexController();
        $indexController->setView($indexView);
        $this->assertEquals($indexView, $indexController->getView()); 
    }
}
?>