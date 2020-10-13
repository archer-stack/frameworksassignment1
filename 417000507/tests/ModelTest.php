<?php
    require "../framework/autoloader.php";

    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase{

        public function testModel(){
            $indexModel = new IndexModel();
            $this->assertInstanceOf('Model', $indexModel);
        }

        public function testAttach(){
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $this->assertEquals($indexView, $indexModel->getObservers()[0]);
        }

        public function testDetach(){
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $indexModel->detach($indexView);
            $this->assertEquals(array(), $indexModel->getObservers());
        }

        public function testNotify(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $indexModel->setData($indexModel->getAll());
            $indexModel->notify();
            $this->assertEquals($records,$indexView->getObsData());
        }

        public function testGetAll(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $indexModel = new IndexModel();
            $this->assertEquals($indexModel->getAll(),$records);
        }

        public function testGetRecord(){
            $data = '{
                "course_id":"3",
                "course_name":"Software Engineering",
                "course_description":"Software engineering is the study and an application of engineering to the design, development, and maintenance of software.",
                "course_recommendation_count":"57",
                "course_access_count":"435",
                "course_image":"software.jpg"
            }';
            $record = json_decode($data,true);
            $indexModel = new IndexModel();
            $this->assertEquals($indexModel->getRecord(3),$record);
        }
    }

?>