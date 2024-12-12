  <?php

    class CandidatRepository
    {
        private $candidat;
        public  function create($values)
        {
            $db=$GLOBALS['db'];
            $code = self::getCode($values['emploi']);
            $values['code']=$code;
            return['code'=>$values['code'],'save'=> $db::createCandidat($values)];
            self::$candidat = new Candidat();
             self::$candidat->setCnib($values['files']['cnib']['name']);
             self::$candidat->setCode($code);
             self::$candidat->setDate_deliv($datedujour);
             self::$candidat->setDate_naiss($values['dn']);
             self::$candidat->setDiplome($values['dipl']);
             self::$candidat->setEmail($values['mail']);
             self::$candidat->setEmploi($values['emploi']);
             self::$candidat->setFiles($values['files']['diplf']['name']);
             self::$candidat->setLieu_naiss($values['lieun']);
             self::$candidat->setNationalite($values['nationalite']);
             self::$candidat->setNom($values['nom']);
             self::$candidat->setPrenom($values['prenom']);
             self::$candidat->setTelephone($values['telephone']);            
        }
        public  function update($values)
        {
            $db=$GLOBALS['db'];
            return['code'=>$values['code'],'save'=> $db::updateCandidat($values)];
        }
        public  function save()
        {
            $db=$GLOBALS['db'];
            $req = $db::getDb()->prepare("INSERT INTO candidat(`code`, `nom`, `prenom`, `telephone`, `email`, `cnib`, `date_naiss`, `lieu_naiss`, `emploi`, `files`,  `date_deliv`, `diplome`, `nationalite`) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $save= $req->execute([self::$candidat->getCode,
            self::$candidat->getNom,
            self::$candidat->getPrenom,
            self::$candidat->getTelephone,
            self::$candidat->getMail,
            self::$candidat->getCnib,
            self::$candidat->getDate_naiss,
            self::$candidat->getLieu_naiss,
            self::$candidat->getEmploi,
            self::$candidat->getFiles,
            self::$candidat->getDate_deliv,
            self::$candidat->getDiplome,
            self::$candidat->getNationalite
            ]);
            if($save){
                mail(self::$candidat->getMail,'code depositaire','Nous accusons réception de votre dossier!'."\n".' Votre code est le suivant : '.self::$candidat->getCode. "\n"." Ci-joint votre récipissé ! Veuillez l'imprimer !");
                return true;
            }else return false;
        }

        public  function get($code)
        { 
            $db=$GLOBALS['db'];
            $candidat= $db::get('candidat','code',$code);
            $emp=$db::get('emplois','id',  $candidat->emploi);
            $diplome=$db::get('diplome','id', $candidat->diplome);
            $candidat->emploi=$emp->designation;
            $candidat->files="CNIB, ".$diplome->designation;
            return $candidat;
        }
        private  function getCode($emploi)
        {
            $db=$GLOBALS['db'];
            $code = null;
            switch ($emploi) {
                case '1': 
                    $id = $db::cmpt('candidat',"sTi")+1;
                    $code = "sTI-".$id; break;
                case '2': 
                    $id = $db::cmpt('candidat',"sC")+1;
                    $code = "sC-".$id; break;
                case '3': 
                    $id = $db::cmpt('candidat',"sAC")+1;
                    $code = "sAC-".$id; break;
                case '4': 
                    $id = $db::cmpt('candidat',"sATC")+1;
                    $code = "sATC-".$id; break;
                case '5': 
                    $id = $db::cmpt('candidat',"sATE")+1;
                    $code = "ATE-".$id; break;
                
            }
            return $code;
        }

        /**
         * Get the value of candidat
         */ 
        public function getCandidat()
        {
                return $this->candidat;
        }

        public  function list()
        {
            $db=$GLOBALS['db'];
            return $emplois=$db::listCandidats();
        }
    }
    
?> 