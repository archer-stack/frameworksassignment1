<?php

    class View implements Observer{
        private $tpl;
        private $vars;
        private $obsData;

        public function __contruct(){
            $this->tpl = "";
            $this->vars = array();
            $this->obsData = array();
        }

        public function setTemplate($filename):void{
            $this->tpl = $filename;
        }

        public function display():void{
            extract($this->vars);
            $this->obsData;
            require $this->tpl;
        }

        public function addVar($name, $value):void{
            $this->vars[$name] = $value;
        }

        public function update(Observable $observable):void{
            $this->obsData = $observable->getData();
        }

        public function getObsData():array{
            return $this->obsData;
        }

        public function getTpl():string{
            return $this->tpl;
        }

        public function getVars():array{
            return $this->vars;
        }
        
    }
?>