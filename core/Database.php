<?php
    class Database
    {
        private static $_db_name='eonea';
        private static $_db_user='root';
        private static $_db_pass='';
        private static $_db_host='localhost';
        private static $db;

        public function __construct() {
        }
        public  static function isConnect()
        {
            if(self::$db == null) return false;
            else return true ;
            
        }
        public static function connect(){
            if(self::$db == null)
            {   
                self::$db=new PDO("mysql:host=".self::$_db_host .";dbname=".self::$_db_name, self::$_db_user, self::$_db_pass);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(self::$db !== null)
                echo "Connexion réussie à la base de données !";
                else
              echo "Connexion echouer";
            }
            
        }
        public static function createCandidat( $values)
        {
            if(self::$db == null) throw new Exception("Connectez-vous à la base de donnee pour pouvoir éffectuer un traitemement", 1);
            $uploaddir = '../eonea/files/';
            $datedujour= date('dmY'); 
            $req = self::$db->prepare("INSERT INTO candidat(`code`, `nom`, `prenom`, `telephone`, `email`, `cnib`, `date_naiss`, `lieu_naiss`, `num_cnib`, `emploi`, `files`, `experience`, `domaine_experience`,  `date_deliv`, `diplome`, `nationalite`) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $save= $req->execute([$values['code'],
            $values['nom'],
            $values['prenom'],
            $values['telephone'],
            $values['mail'],
            $values['files']['cnib']['name'],
            $values['dn'],
            $values['lieun'],
            $values['emploi'],
            $values['files']['diplf']['name'],
            "$datedujour",
            $values['dipl'],
            $values['nationalite']
            ]);
            if($save){
                foreach($values['files'] as $file){
                    $uploadfile = $uploaddir . basename($file['name']);
                    if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                        $save = true;
                    } else {
                        $save =false;
                    }
                }
                mail($values['mail'],'code depositaire','Nous accusons réception de votre dossier!\n Votre code est le suivant : '.$values['code']. "\n Ci-joint votre récipissé ! Veuillez l'imprimer !");
            }
            return $save;
        }
        public static function updateCandidat( $values)
        {
            if(self::$db == null) throw new Exception("Connectez vous a la base de donnee pour pouvoir effectuer un traitemement", 1);
            $uploaddir = '../eonea/files/';
            $datedujour= date('dmY'); 
            $req = self::$db->prepare("UPDATE candidat SET `nom`= ?, `prenom`= ?, `telephone`= ?, `email`= ?, `cnib`= ?, `date_naiss`= ?, `lieu_naiss`= ?, `emploi`= ?, `files`= ?,  `date_deliv`= ?, `diplome`= ?, `nationalite`= ?
                                            WHERE code=?");
            $save= $req->execute([
            $values['nom'],
            $values['prenom'],
            $values['telephone'],
            $values['mail'],
            $values['files']['cnib']['name'],
            $values['dn'],
            $values['lieun'],
            $values['emploi'],
            $values['files']['diplf']['name'],
            "$datedujour",
            $values['dipl'],
            $values['nationalite'],
            $values['code']
            ]);
            if($save){
                foreach($values['files'] as $file){
                    $uploadfile = $uploaddir . basename($file['name']);
                    if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                        $save = true;
                    } else {
                        $save =false;
                    }
                }
                mail($values['mail'],'code depositaire','Nous accusons réception de votre dossier!\n Votre code est le suivant : '.$values['code']. "\n Ci-joint votre récipissé ! Veuillez l'imprimer !");
            }
            return $save;
        }
        public  static function get($table_name,$element,$value)
        {
            try{
                // $query="";
                $req = self::$db->query("SELECT * FROM  `$table_name` WHERE $element='$value'");
                // $req = self::$db->prepare("SELECT * FROM  `$table_name` WHERE $element=':v'");
                // $req->execute(['v'=>"$value"]);
                $res= $req->fetchObject();
            }catch(Exception $e){
                throw new Exception($e, 1);
            }
            return $res;
        }
        public  static function cmpt($table_name,$sub)
        {
            $req = self::$db->query("SELECT *  FROM $table_name WHERE code LIKE '%$sub%' ");
            $res=$req->rowCount();
            return $res;
        }

        public  static function listEmploi() 
        {
            $emplois=[];
            $req = self::$db->query("SELECT * FROM emplois ");
        
            while($emplois[]= $req->fetchObject()){
                $emplois[]= $req->fetchObject();
            }

            return $emplois;
        }

        public  static function listCandidats() 
        {
            $candidats=[];
            $req = self::$db->query("SELECT * FROM candidat");
            while($candidats[]= $req->fetchObject()){
                $candidats[]= $req->fetchObject();
            }
            return $candidats;
        }

        public  static function listDiplome() 
        {
            $diplome=[];
            $req = self::$db->query("SELECT * FROM diplome");
            while($diplome[]= $req->fetchObject()){
                $diplome[]= $req->fetchObject();
            }
            return $diplome;
        }

        /**
         * Get the value of db
         */ 
        public static function getDb()
        {
                return self::$db;
        }
    }
    
?>