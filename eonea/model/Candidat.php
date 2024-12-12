<?php
    class Candidat
    {
        private $id;
        private $code;
        private $nom;
        private $prenom;
        private $date_naiss;
        private $lieu_naiss;
        private $telephone;
        private $email;
        private $cnib;
        private $emploi;
        private $files;
        private $date_deliv;
        private $diplome;
        private $nationalite;
        private $created_at;
        private $updated_at;
        private $table='candidat';

        public function __construct() {
        }
        /**
         * Get the value of updated_at
         */ 
        public function getUpdated_at()
        {
                return $this->updated_at;
        }

        /**
         * Set the value of updated_at
         *
         * @return  self
         */ 
        public function setUpdated_at($updated_at)
        {
                $this->updated_at = $updated_at;

                return $this;
        }

        /**
         * Get the value of created_at
         */ 
        public function getCreated_at()
        {
                return $this->created_at;
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreated_at($created_at)
        {
                $this->created_at = $created_at;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of code
         */ 
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom($prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of date_naiss
         */ 
        public function getDate_naiss()
        {
                return $this->date_naiss;
        }

        /**
         * Set the value of date_naiss
         *
         * @return  self
         */ 
        public function setDate_naiss($date_naiss)
        {
                $this->date_naiss = $date_naiss;

                return $this;
        }

        /**
         * Get the value of lieu_naiss
         */ 
        public function getLieu_naiss()
        {
                return $this->lieu_naiss;
        }

        /**
         * Set the value of lieu_naiss
         *
         * @return  self
         */ 
        public function setLieu_naiss($lieu_naiss)
        {
                $this->lieu_naiss = $lieu_naiss;

                return $this;
        }

        /**
         * Get the value of telephone
         */ 
        public function getTelephone()
        {
                return $this->telephone;
        }

        /**
         * Set the value of telephone
         *
         * @return  self
         */ 
        public function setTelephone($telephone)
        {
                $this->telephone = $telephone;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of cnib
         */ 
        public function getCnib()
        {
                return $this->cnib;
        }

        /**
         * Set the value of cnib
         *
         * @return  self
         */ 
        public function setCnib($cnib)
        {
                $this->cnib = $cnib;

                return $this;
        }

        /**
         * Get the value of emploi
         */ 
        public function getEmploi()
        {
                return $this->emploi;
        }

        /**
         * Set the value of emploi
         *
         * @return  self
         */ 
        public function setEmploi($emploi)
        {
                $this->emploi = $emploi;

                return $this;
        }

        /**
         * Get the value of files
         */ 
        public function getFiles()
        {
                return $this->files;
        }

        /**
         * Set the value of files
         *
         * @return  self
         */ 
        public function setFiles($files)
        {
                $this->files = $files;

                return $this;
        }

        /**
         * Get the value of date_deliv
         */ 
        public function getDate_deliv()
        {
                return $this->date_deliv;
        }

        /**
         * Set the value of date_deliv
         *
         * @return  self
         */ 
        public function setDate_deliv($date_deliv)
        {
                $this->date_deliv = $date_deliv;

                return $this;
        }

        /**
         * Get the value of diplome
         */ 
        public function getDiplome()
        {
                return $this->diplome;
        }

        /**
         * Set the value of diplome
         *
         * @return  self
         */ 
        public function setDiplome($diplome)
        {
                $this->diplome = $diplome;

                return $this;
        }

        /**
         * Get the value of nationalite
         */ 
        public function getNationalite()
        {
                return $this->nationalite;
        }

        /**
         * Set the value of nationalite
         *
         * @return  self
         */ 
        public function setNationalite($nationalite)
        {
                $this->nationalite = $nationalite;

                return $this;
        }

        /**
         * Get the value of table
         */ 
        public function getTable()
        {
                return $this->table;
        }
    }
    
?>