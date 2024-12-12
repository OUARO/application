<?php

    class adminController extends Controller
    {        
        protected $layout='../eonea/views/layout/administration.php';

        /**
         * indexAction
         *  Conduit a la page de soumission de dossier
         * @return void
         */
        function indexAction(): void{
            $this->render('administration/login');           
        }
                
        /**
         * loginAction
         * si identifiants corrects connecte l'user et le renvoi a la page d'administration
         * sinon renvoi a la page de connexion
         * @return void
         */
        function loginAction(){
            if(isset($_POST) AND isset($_POST['submit'])){
                //check for each content if it's not null
                foreach($_POST as $k=>$post_content){
                    if(!isset($post_content)){
                        $error= "Un des champs n'a pas ete correctement rempli";
                        $this->render("administration/login",['error'=>$error]);
                        exit();
                    }else{
                        $_post[$k]=htmlentities($post_content);
                    }
                }
                $user= $this->Repository('user');
                $userInfos= $user->login($_post['ident'], $_post['password']) ;  
                if(isset($userInfos['error'])){
                    $this->render("administration/login",['error'=>$userInfos['error']]);
                    exit();
                }
                $candidat= $this->Repository('candidat');
                $listCandidats=$candidat->list();
                $this->render("administration/candidats",['candidats'=>$listCandidats], );
            }
        }        
        /**
         * emploisAction
         * listes emploi avec options supprimer,ajouter
         * @return void
         */
        function emploisAction(){
            
            $emploi= $this->Repository('emplois');
            $emplois=$emploi->list();
            $this->render('administration/parametres/emplois',['emplois'=>$emplois]);
        }
         /**
         * diplomesAction
         * liste des diplomes avec options supprimer,ajouter
         * @return void
         */
        function diplomesAction(){
            
            $dipl= $this->Repository('diplome');
            $diplomes=$dipl->list();
            $this->render('administration/parametres/diplomes',['diplomes'=>$diplomes], false);
        }
         /**
         * candidatsAction
         * liste des candidatas avec option aficher et impression liste
         * @return void
         */
        function candidatsAction(){           
            $candidat= $this->Repository('candidat');
            $emploi= $this->Repository('emplois');
            $dipl= $this->Repository('diplome');
            $listcandidats= $candidat->list(); 
            foreach($listcandidats as  $candidat){
                if(is_object($candidat)){
                    $num=$candidat->emploi;
                    $candidat->emploi = $emploi->getEmploi($num);
                    $num=$candidat->diplome;
                    $candidat->diplome=$dipl->getDiplome($num);
                }
            }
            $this->render('administration/candidats',['candidats'=>$listcandidats],  false);
        }
         /**
         * candidatAction
         * permet de gerer un candidat(valider demande,rejeter, impression fiche, voir document)
         * @return void
         */
        function candidatAction($code=null){
            if (isset($code)){
                $candidat= $this->Repository('candidat');
                $diplome= $this->Repository('diplome');
                $code=htmlentities($code);
                $candidatInfos= $candidat->get($code);
                $candidatInfos->diplome= $diplome->getDiplome($candidatInfos->diplome);
                $this->render('administration/candidat',['candidat'=>$candidatInfos]);
            }
            if(isset($_POST['code'])){
                $candidat= $this->Repository('candidat');
                $code=$_POST['code'];
                $candidatInfos= $candidat->get($code);
                if(isset($_POST['afficher']))  
                    $this->render('administration/candidat',['candidat'=>$candidatInfos], false);
                if(isset($_POST['print']))  
                    $this->render('administration/candidat',['candidat'=>$candidatInfos], true);
               
                if(isset($_POST['getFiles']))
                    $cnib=$candidatInfos['cnib'];
                    $diplome=$candidatInfos['diplome'];
                    $this->render('pdf',['files'=>$cnib]);
                    $this->render('pdf',['files'=>$diplome]);
            }else{
                $error= "Impossible de trouver le candidat... Re-essayer ou contacter l'administrateur!!!";
                $this->render('administration/candidats',['error'=>$error]);
            }
    
        }        
    }
    
?>