<?php
    class Pdf
    {
        private $name;
        private $header;
        private $content;
        private $footer;
        private $repertoire="../files";

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of header
         */ 
        public function getHeader()
        {
                return $this->header;
        }

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Get the value of footer
         */ 
        public function getFooter()
        {
                return $this->footer;
        }

        /**
         * Get the value of repertoire
         */ 
        public function getRepertoire()
        {
                return $this->repertoire;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Set the value of header
         *
         * @return  self
         */ 
        public function setHeader($header)
        {
                $this->header = $header;

                return $this;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Set the value of footer
         *
         * @return  self
         */ 
        public function setFooter($footer)
        {
                $this->footer = $footer;

                return $this;
        }
    }
    
?>