<?php
    
    class CourseModel extends Model{
        public function getAll():array{
            $data = file_get_contents($this->path . "/" . "data/courses.json");
            return json_decode($data,true);
        }

        public function getRecord(string $id):array{
            $data = file_get_contents($this->path . "/" . "data/courses.json");
            $records = json_decode($data,true);

            foreach($records as $record){
                if ($record["course_id"] == $id) {
                    return $record;
                }
            }
            return array();
        }

        public function getCourseInstrutors():array{
            $data = file_get_contents($this->path . "/" . "data/course_instructor.json");
            return json_decode($data, true);
        }

        public function getInstructors():array{
            $data = file_get_contents($this->path . "/" . "data/instructors.json");
            return json_decode($data, true);
        }

        public function getPopular():array{
            $records = $this->getAll();
            $courseInstructors = $this->getCourseInstrutors();
            $instructors = $this->getInstructors();

            for ($i=0; $i < sizeof($records); $i++) { 
                for ($j=0; $j < sizeof($courseInstructors); $j++) { 
                    for ($p=0; $p < sizeof($instructors); $p++) { 
                        if ($records[$i]["course_id"] == $courseInstructors[$j]["course_id"] && $courseInstructors[$j]["instructor_id"] == $instructors[$p]["instructor_id"]) {
                            $records[$i]["instructor_name"] = $instructors[$p]["instructor_name"];
                        }
                    }
                }
            }
            usort($records,function($a,$b){
                return strnatcasecmp($a['course_access_count'],$b['course_access_count']);
            });
            return array_slice(array_reverse($records),0,8);
        }

        public function getRecommend():array{
            $records = $this->getAll();
            $courseInstructors = $this->getCourseInstructors();
            $instructors = $this->getInstructors();

            for ($i=0; $i < sizeof($records); $i++) {
                for ($j=0; $j < sizeof($courseInstructor); $j++) {
                    for ($k=0; $k < sizeof($instructors); $k++) {
                        if ($records[$i]["course_id"] == $courseInstructor[$j]["course_id"] && $courseInstructor[$j]["instructor_id"] == $instructors[$k]["instructor_id"]) {
                            $records[$i]["instructor_name"] = $instructors[$k]["instructor_name"];
                        }
                    }
                }
            }
            usort($records,function($a,$b){
                return strnatcasecmp($a['course_recommendation_count'],$b['course_recommendation_count']);
            });
            return array_slice(array_reverse($records),0,8);
        }

    }
?>