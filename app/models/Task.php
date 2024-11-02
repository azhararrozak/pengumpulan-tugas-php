<?php
    class Task {
        private $config;

        public function __construct($config){
            $this->config = $config;
        }

        public function getConfig(){
            return $this->config;
        }

        public function isFileValid($file, $extension){
            return in_array($extension, $this->config['file']) && $file['size'] < $this->config['ukuran'];
        }
    }
?>