<?php

    class Commentaire{
        
        private $id;
        private $pseudo;
        private $contenus;
        private $article;
        
        public function __construct($id = 0, $pseudo = "", $contenus = "", $article = "")
        {
            $this->setId($id);
            $this->setPseudo($pseudo);
            $this->setContenus($contenus);
            $this->setArticle($article);
        }

        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setPseudo($pseudo){$this->pseudo = $pseudo;}
        public function getPseudo(){return $this->pseudo;}

        public function setContenus($contenus){$this->contenus = $contenus;}
        public function getContenus(){return $this->contenus;}

        public function setArticle($article){$this->article = $article;}
        public function getArticle(){return $this->article;}



    }