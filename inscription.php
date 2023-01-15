<? 
        $nom = strtolower($_POST["nom"]);
        $prenom = strtolower($_POST["prenom"]);
        $email = strtolower($_POST ["email"]);
        $date_de_naissance = $_POST["date_de_naissance"];
        
        // Renvoie True si l'email dispo
        function EmailDispo($db, $email)
        {
          $query = "SELECT * FROM `utilisateurs` WHERE email =:email;";
          $resultat = $db->prepare($query);
          $resultat->execute(['email' => $email]);
          $nombrelignes = $resultat->rowcount();
          return $nombrelignes == 0;
        }
        
        // Renvoie True si le prenom dispo
        function Prenom($db, $prenom)
        {
          $query = "SELECT * FROM `utilisateurs` WHERE prenom =:prenom";
          $resultat = $db->prepare($query);
          $resultat->execute(['prenom' => $prenom]);
        
          $nombrelignes = $resultat->rowcount();
        
          return $nombrelignes == 0;
        }
        
        // Renvoie True si le nom dispo
        function Nom($db, $nom)
        {
          $query = "SELECT * FROM `utilisateurs` WHERE nom =:nom";
          $resultat = $db->prepare($query);
          $resultat->execute(['nom' => $nom]);
        
          $nombrelignes = $resultat->rowcount();
        
          return $nombrelignes == 0;
        }
        
        
        
        if (!(empty($_POST['nom']))){
        
          if (EmailDispo($db, $email) && Prenom($db, $prenom) && Nom($db, $nom))
        
            // L'inscription est possible
            $query = " INSERT INTO `utilisateurs` (`id`, `prenom`, `nom` , `email` ,`date_de_naissance`) VALUES (NULL, :prenom, :nom, :email, :date_de_naissance);";
            $resultat = $db->prepare($query);
            $resultat->execute(['prenom' => $prenom, 'nom' => $nom, 'date_de_naissance' => $date_de_naissance ,'email' => $email]);
        
          }
          else{
              if (!(EmailDispo($db, $email))){
                header('Location: index.php?erreur=Email déjà existant');
                exit();
              }
              else{
                header('Location: index.php?erreur=Pseudonyme déjà existant');
                exit();
              }
        
        
        
          }
        
        else {
          header('Location: index.php?erreur= Erreur');
          exit();
        }
        
        
         ?>