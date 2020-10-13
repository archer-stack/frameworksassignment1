<?php
    
    class IndexModel extends Model{
        public function getAll():array{
            $data = file_get_contents("../data/courses.json");
            return json_decode($data,true);
        }

        public function getRecord(string $id):array{
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);

            foreach($records as $record){
                if ($record["course_id"] == $id) {
                    return $record;
                }
            }
            return array();
        }
    }
?>