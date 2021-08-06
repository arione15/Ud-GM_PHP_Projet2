# Catalogue mes Projets

"Catalogue" est un site internet présentant les projets web que j'ai réalisés

## I. Environnement de développement

* PHP 7.4
* POO
* PDO
* mySQL


## II. Points à retenir
 
1. ajouter $options (dans $pdo) pour l'affichage des caractères spéciaux :
```php
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    //  $pdo = new PDO($dsn, $user, $password);
    $pdo = new PDO($dsn, $user, $password, $options);
```

2. la 2ème requête pour le type (qui est dans la table type) en faisant le lien avec la table projet :

```php
$req2 = "SELECT * FROM type WHERE idType = :idType";
                        $query = $pdo->prepare($req2);
                        $query->bindValue(":idType", $projet["idType"], PDO::PARAM_INT);
                        $query->execute();
                        $type = $query->fetch(PDO::FETCH_ASSOC);
```