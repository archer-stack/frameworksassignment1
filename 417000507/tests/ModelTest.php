<?php
    require "../framework/autoloader.php";

    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase{

        public function testModel(){
            $courseModel = new CourseModel();
            $this->assertInstanceOf('Model', $courseModel);
        }

        public function testAttach(){
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $this->assertEquals($indexView, $courseModel->getObservers()[0]);
        }

        public function testDetach(){
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $courseModel->detach($indexView);
            $this->assertEquals(array(), $courseModel->getObservers());
        }

        public function testNotify(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $courseModel->setData($courseModel->getAll());
            $courseModel->notify();
            $this->assertEquals($records,$indexView->getObsData()[0]);
        }

        public function testGetAll(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $courseModel = new CourseModel();
            $this->assertEquals($courseModel->getAll(),$records);
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
            $courseModel = new CourseModel();
            $this->assertEquals($courseModel->getRecord(3),$record);
        }
    }

?>