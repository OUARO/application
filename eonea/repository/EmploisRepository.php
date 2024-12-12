<?php
    class EmploisRepository
    {
        public  function list()
        {
            $db=$GLOBALS['db'];
            return $emplois=$db::listEmploi();
        }
        public  function createEmploi($values)
        {
            $db=$GLOBALS['db'];
            $fields='designation';
            return['save'=> $db::create('emplois',$fields,$values)];
        }
        public  function getEmploi($value)
        {
            $db=$GLOBALS['db'];
            $emploi=$db::get('emplois','id',$value);
            return $emploi->designation;
        }
        public  function updateEmploi($value,$el='id')
        {
            $db=$GLOBALS['db'];
            $fields='designation';
            return['update'=> $db::update('emplois',$el,$value)];
        }
        
    }
    
?>