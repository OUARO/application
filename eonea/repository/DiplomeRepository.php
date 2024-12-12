<?php
    class DiplomeRepository
    {
        public  function list()
        {
            $db=$GLOBALS['db'];
            return $diplomes=$db::listDiplome();
        }
        public  function createDiplome()
        {
            $db=$GLOBALS['db'];
            $fields='designation';
            return['save'=> $db::create('diplome',$fields,$values)];
        }
        public  function getDiplome($code)
        {
            $db=$GLOBALS['db'];
            $diplome=$db::get('diplome','id',$code);
            return $diplome->designation;
        }
        public  function updateDiplome($value,$el='id')
        {
            $db=$GLOBALS['db'];
            $fields='designation';
            return['update'=> $db::update('diplome',$el,$value)];
        }
        
    }
    
?>