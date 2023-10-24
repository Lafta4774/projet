<?php require_once 'indexController.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
        <!-- 
                Etape 1 : la création du formulaire
                Première chose à faire pour vérifier les informations provenant d'un formulaire : avoir un formulaire.
                Il sera contenu obligatoirement dans une balise <form>
                Celle-ci possède plusieurs attributs :
                - action : l'url de destination des données du formulaire (ici index.php donc la page va se recharger)
                - method : la méthode d'envoi des données (ici POST donc les données seront envoyées de manière sécurisée dans la superglobale $_POST)
                il est également possible d'envoyer les données en GET mais celles-ci seront visibles dans l'url et donc moins sécurisées
                Ici nous avons également un nouvel attribut enctype qui permet de spécifier le type d'encodage des données. Il est nécessaire pour envoyer des fichiers.
            -->
        <form action="index.php" method="POST">

            <!-- 
                Etape 2 : les champs du formulaire
                Il existe plusieurs types de champs de formulaire. En voici quelques uns (voir MDN pour la liste complète) :
                - input type="text" : champ de texte libre
                - input type="password" : champ de texte libre dont la valeur est cachée
                - input type="email" : champ de texte libre dont la valeur doit être un email
                - input type="number" : champ de texte libre dont la valeur doit être un nombre
                - input type="file" : champ de type fichier
                - input type="submit" : bouton d'envoi du formulaire
                - input type="reset" : bouton de réinitialisation du formulaire
                - input type="radio" : bouton radio
                - input type="checkbox" : case à cocher
                - input type="date" : champ de date
                - input type="search" : champ de recherche
                - input type="tel" : champ de numéro de téléphone
                - input type="time" : champ d'heure
                - input type="url" : champ d'url
                - input type="submit" : bouton d'envoi du formulaire
                - textarea : champ de texte libre sur plusieurs lignes
                - select : liste déroulante

                Il existe également des attributs qui peuvent être ajoutés aux champs de formulaire :
                    - obligatoires :
                        - name : nom du champ de formulaire (obligatoire pour pouvoir le récupérer dans la superglobale $_POST ou $_GET selon la méthode choisie)
                        - id : identifiant du champ de formulaire (obligatoire pour pouvoir lier un label)
                    - facultatifs :
                        - required : rend obligatoire le remplissage du champ
                        - placeholder : affiche un texte gris clair dans le champ (disparaît lorsque l'on clique dans le champ)
                        - value : permet de donner une valeur par défaut au champ
                        - disabled : désactive le champ
                Le champs est souvent lié à un label qui permet de décrire le champ. Pour cela il faut que le label possède un attribut for qui doit avoir la même valeur que l'attribut id du champ de formulaire.
                
                Voir le champs username.
            -->
            <!-- 
                Etape 5 : Peaufiner l'affichage
                Une fois que toutes les vérifications ont été faites, on peut conserver les données envoyées par l'utilisateur et les erreurs s'il y en a.

                Pour conserver les données, il suffit de donner à l'attribut value du champ la valeur de la superglobale $_POST correspondante.. Ici j'utilise un @ devant la superglobale pour éviter d'avoir une erreur si la superglobale n'existe pas (au premier affichage de la page par exemple). Ca m'évite un if lourd et pas forcément très lisible et nécessaire.
             -->
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="exemple : DUPONT47"  >
            <!-- 
                Pour l'affichage des erreurs, je vérifie si l'index username existe dans le tableau $formErrors. Si c'est le cas, j'affiche le message d'erreur correspondant.
                Ici je n'utilise pas de @ devant la variable et je lui préfère un if car je veux que la balise p n'apparaisse que s'il y a une erreur. Si je mets un @ et que la variable n'existe pas, je n'ai pas de message d'erreur mais j'ai la balise p, ses marges, etc... 
             -->

            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" placeholder="exemple : a@b.c"  >

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="exemple : Jean123"  >

            <label for="password">Confirmer MDP</label>
            <input type="password" name="confirmPassword" id="password" placeholder="exemple : Jean123"  >

            <input type="submit" value="Envoyer">

        </form>
</body>

</html>