---
title: 'Documentation Technique MAW1.2'
disqus: hackmd
---
![forthebadge](https://forthebadge.com/images/badges/60-percent-of-the-time-works-every-time.svg)
# Numerik Games Festival

| **Auteurs** | Nicolas Henry, Jarod Streckeisen, Anel Muminovic |
| :--- | :---: |
| **Date de début du projet** | 8 janvier 2019 |
| **Date de fin de projet** | 28 juin 2019 |
| **Date de reddition du rapport** | 28 juin 2019 |

## Sommaire

[TOC]

## Introduction

Nous avons été affectés à un projet dans le cadre du Numerik Games Festival et de MAW1.2. Nous devions faire une application web basée sur Laravel qui permet à un visiteur de rentrer un ou plusieurs vers selon le thème qu'il a choisi. Les thèmes sont *Robot*, *Cyborg* et *IA*. L'application web fait référence au jeu [cadavre exquis](https://fr.wikipedia.org/wiki/Cadavre_exquis) où plusieurs personnes écrivent une phrase sans tenir compte de ce que le précédent a écrit.

## Termes spécifiques
Lors de cette documentation, vous serez confrontés à certains termes spécifiques, il est possible d'assimiler cela comme un livre :
Thèmes : Un thème de jeu, les robots, l'IA, les cyborgs. (Le nom du livre)
Prose : On peut l'imaginer comme des entités du thème. (Les chapitres du livre)
Vers : Le contenu d'une prose. (Le texte contenu dans un chapitre)

## Architecture des fichiers

Pour l'architecture de notre application, nous avons séparé les dossiers "Admin" et utilisateurs standard.

Nous avons gardé la logique de Laravel mais dans chaque "section" nous avons rajouté un dossier pour les ressources uniquement d'administration.

Nos images sont stockées dans /public/pictures/{folder} vu que nous avons 6 images qui ne changeront pas du projet. Nous avons cependant pensé à le faire avec le storage standard de Laravel mais ce point sera plus détaillé dans les problèmes rencontrés.

## Architecture réseau

![](https://i.imgur.com/xlNOiTB.png)



## Guide d'installation

### Prérequis

* PHP 7.3
* Laravel 5.7.x
* MySQL 5.6

### Installation


* Clonez le repository github
* Exécutez **cd /chemin/de/destination**.
* Exécutez **composer install**.
* Exécutez **npm install**.
* Créez un fichier **.env** en utilisant **.env.example**
* Exécutez **php artisan key:generate**
* Pour la base de données
    * Créez la base de données avec votre client SQL favori portant le même nom que celui dans  le **.env**
    * Exécutez **composer dump-autoload**
    * Exécutez **php artisan migrate:refresh --seed**
    * Si la commande au-dessus n'a pas fonctionné, exécutez **php artisan migrate** et **php artisan db:seed** 
* Exécuter **php artisan serve** pour lancer l'application

## Guide de déploiement sur SwissCenter avec Capistrano

La documentation est basée sur les standards du CPNV, vous la trouverez [ici](https://cpnv-es.github.io/capify_laravel_for_swisscenter.html)

Actuellement, le script capistrano ne créer et ne remplis pas la base de données automatiquement, il faut donc le faire manuellement.

Une fois le déploiement effectué, connectez-vous en SSH sur le serveur. Déplacer vous dans le dossier **current** et exécutez **php artisan migrate:refresh --seed**. 

## Fonctionnalités

Le projet NumerikGames est un nouveau projet commencé cette année (2019). Le projet a été commmencer "from scratch" ce qui veut dire que toutes les fonctionnalités listées ci-dessous sont nouvelles.

### Migration & Seeders

Nous avons mis en place des migrations Laravel ainsi que des seeders. 
Ils rendent la modification de la base de données beaucoup plus facile et plus flexible.

Les migrations créent actuellement 7 tables: 

* **Utilisateurs** (crée par défaut dans laravel)
* **migrations** (crée par défaut dans laravel)
* **passwords_resets** (crée par défaut dans laravel)
* **themes** -> table des thèmes
* **proses** -> table des proses
* **verses** -> tables des vers
* **settings** -> Table des paramètres liés à l'application

Les seeders remplissent automatiquement les tables avec certaines données comme : 

* Les 3 thèmes par défaut (Robot,Cyborg,IA)
* Les 6 proses (2 par thèmes)
* Les paramètres par défaut : 
    * **limit_verses** La limite de vers par prose
    * **limit_last_verses** Limite de vers affiché lors de l'ajout de vers
    * **syllabes** Le nombre maximum de syllabes par vers
    * **home_limit_prose** nombre de proses sur la page d'accueil
    * **home_limit_theme** nombre de thèmes sur la page d'accueil
    * **default_vers_*{theme}*-1** vers par défaut pour commencer la prose du *thème* choisis
    * **default_vers_*{theme}*-2** 2ème vers par défaut pour commencer la prose du *thème* choisi
    * **theme_*{theme}*_helper** liste de mots qui aideront l'utilisateur lors de l'insertion de vers
* Le compte administrateur de l'application


### Écriture d'un vers 

Une des principales fonctionnalités de l'application est de pouvoir écrire un vers dans une prose. La prose doit respecter certains critères et ne doit pas contenir d'injure.

La vue représentant l'ajout d'une prose est **proses/show.blade.php**
Le controller qui gère l'ajout est **VerseController.php** et le modèle est **Verse.php**

Un modal de confirmation a également été ajouté afin de prévenir les ajouts accidentels et nous permet de choisir si nous voulons rester sur la page pour continuer d'écrire d'autres prose ou si nous voulons revenir au menu principal.

#### Vérification d'un vers

Le contenu de chaque vers est vérifié. Un filtre à injure a été mis en place. Pour cela nous avons utilisé la librairie **banbuilder** créer par **snipe**

Site Web de la librairie : http://banbuilder.com/
Lien Github de la librairie : https://github.com/snipe/banbuilder

La liste des mots censurés peut être modifié via un fichier texte qui se trouve dans **/vendor/snipe/banbuilder/src/dict/fr.php**


Lors de l'ajout du vers, tous les mots sont vérifier avec BanBuilder

```
$censor = new CensorWords;
$badwords = $censor->setDictionary('fr');

$verse = new Verse($request->all());
$words = explode(" ",$verse->content);
for($i=0;$i<count($words);$i++)
{
  $string = $censor->censorString($words[$i]);
  if($string['matched'] != null)
  {
    $verse->word_flag = 1;
    $verse->status = 0;
  }
}
a$verse->save();
```


Une fonction va compter le nombre de vers avec des gros mots présent dans une prose.

```
public static function flagged_verse($prose) {
    $i = 0;
    foreach ($prose->verse as $verse) {
        if ($verse->word_flag) {
            $i++;
        }
    }
    if ($i) {
        echo "<span class='badge badge-danger'>Cette prose contient $i vers suspect.</span>";
    }
}
```

#### Prose pleine

Nous avons créé cette fonction pour vérifier si nos proses sont pleines. Elle va renvoyer un boolean lorsqu'elle est appelée dans nos controllers. Nous appelons le modèle **Setting** où est spécifié la limite de vers dans une prose et nous allons poser comme condition quand le nombre de vers d'une prose dépasse la limite, la valeur *true* va être retournée.

```
public function is_full($limit = null)
    {
        isset($limit) ? $limit : $limit = Setting::where('name', 'limit_verses')->first()->value ;
        $contains = count($this->verse);
        if ($contains >= $limit) {
            return true;
        } else {
            return false;
        };
    }
```

#### Vérifier si une prose contient des vers
Pour savoir si une prose est pleine et pour afficher uniquement celles qui contiennent des vers, une fonction va vérifier si elle contient des valeurs.
On notera le "verse_count" qui n'existe pas dans le MLD, cette colonne se fait créer par Laravel lors de sa requête avec Eloquent. Nous vérifions donc sa valeur pour savoir si elle en contient, si oui, nous mettons à jour la colonne "is_projectable".

```
public function only_with_data() {
    $proses = Prose::inRandomOrder()->with(['verse' => function ($query) {
        $query->where('status', 1);
    }])->withCount(['verse' => function ($query) {
        $query->where('status', 1);
    }])->having('verse_count', '>', 0)->get();
    return $proses->where('is_projectable', 1);
}
```

#### Création de prose
Si une prose est remplie due aux vers, une nouvelle prose se crée en reprenant l'ancienne prose pour avoir les mêmes éléments, ensuite, une boucle permet de créer les 2 premiers vers pour la prose spécifique.

```
public static function setDefault($oldProse) {
    $prose = new Prose();
    $prose->title = $oldProse->theme->name;
    $prose->theme_id = $oldProse->theme->id;
    $prose->path = $oldProse->path;
    $prose->save();
    $slug_id = substr(basename($oldProse->path), 0, strrpos(basename($oldProse->path), "."));
    for ($i = 1; $i < 3; $i++) {
        //cyborg-1-default_vers_2
        $vers = new Verse();
        $vers->content = Setting::where('name', "$slug_id-default_vers_$i")->first()->value;
        $vers->prose_id = $prose->id;
        $vers->status = 1;
        $vers->save();
    }
}
```


### Compteur de syllabes

La création d'une librairie pour compter les syllabes de tous les mots de la langue française nous aurait pris beaucoup trop de temps. Afin de nous faciliter la tâche, nous avons pris une librairie existante. Cette librairie se nomme **phpSyllable** et a été créée par **neochief**.

Lien de la librairie : https://github.com/neochief/phpSyllable

Le compteur de syllabe peut être activé / désactivé par l'utilisateur, il s'agit d'une aide visuelle. Le contour de l'input texte passe du vert au rouge selon le nombre de syllabes, 25 étant le passage au rouge.  

#### Appel de la librairie

Nous avons déclaré cette fonction comme *static* pour qu'elle soit utilisable dans toute notre application. La fonction va prendre la langue et le vers en entrée et renvoyer le nombre de syllabes en retour. Il y a aussi une spécificité, nous stockons le cache de la la librairie dans **/bootstrap/cache**

```
public static function countSyllable($verse, $lang)
    {
        // Create a new instance for the language
        $syllable = new \Syllable($lang);

        // Set the directory where Syllable can store cache files
        $syllable->getCache()->setPath(base_path(). '/bootstrap/cache');

        // Count the number of syllable in a text
        $syllableCount = $syllable->countSyllablesText($verse);

        return $syllableCount;
    }
```

Le compteur de syllabes va se faire en ajax, car nous avons besoin d'actualiser à chaque fois la valeur lorsque l'utilisateur tapera des mots dans le champ input. Voici la fonction dans le controller *ajaxRequestPost*. Nous appelons tout simplement la fonction *countSyllable* qui va retourner la réponse sous forme *JSON*.

```
public function ajaxRequestPost(Request $request)
    {
        $verse = $request->verse;
        $sylablleCount = Verse::countSyllable($verse, 'fr');

        return response()->json(['success' => true, 'data' => $sylablleCount]);
    }
```


### Compteur de vers dans une prose

Pour chaque prose un nombre de vers maximum est défini, c'est-à-dire 16. Une fois ce nombre atteint, la prose se ferme automatiquement et une nouvelle est générée.


### Interface Administrateur

Une interface administrateur a été implémentée dans l'application, elle est uniquement accessible après s'être connecté. Elle permet la gestion des thèmes, des proses et des vers. L'administrateur pourra éditer, supprimer ou ajouter. Il y a aussi la gestion des paramètres de l'application et lui permettre de choisir quelle prose afficher sur la page de projection.

### Projecteur de proses

Cette page sera présentée à l'événement pour afficher les proses qui sont finies de manière aléatoire. Elle aura un effet de défilement pour permettre aux visiteurs présents de pouvoir revoir leurs vers ajoutés précédemment.

#### Effet de défilement

Nous allons faire une boucle sur chacune de nos proses et prendre compte la hauteur de chaque prose pour faire défiler de prose en prose. Ici le premier *animate* scroll automatiquement à la prose suivante. Ensuite, le deuxième va faire défiler les vers vers le haut pour qu'il soit visible en entier. Et si c'est la dernière prose, nous revenons tout simplement à la première prose, toute en haut.

```
function projectorsLoop() {
        var proseHeight = prosesProjector1.height();

        // Loop trough every prose
        prosesProjector1.each(function(index) {
            $('html').animate({scrollTop: proseHeight}, speedSlides).delay(slideDurationSetting);
            proseHeight = proseHeight + prosesProjector1.height();
            $('.content-wrapper').animate({margin: "-320px"}).delay(slideDurationSetting);

            // Check if it's the last prose (-2 is for the 0 of the begining and the first prose that is omitted from the loop)
            if (index === totalSlideNumber-2) {
                return false;
            }
        });

        // Return to the top page
        $('html').animate({scrollTop: 0}, speedSlides);

    };
```

## Versioning

Nous avons utilisé Git et nous nous sommes basés sur ce [guide](https://semver.org).

### Branches ouvertes

Les branches suivantes sont les branches qui n'ont pas été fermées :
**feature/documentation** : Cette branche est ouverte, car en cas de développement du projet il sera important pour les nouveaux développeurs de pouvoir modifier le contenu de cette documentation.
**feature/test_production** : Cette branche a été créée pour faire des tests lors de notre bug 419, nous la laissons ouverte pour de potentiels tests avant de faire un passage en production.

## Problèmes rencontrés

### Erreur 419

**Error 419 Sorry, your session has expired**

L'erreur 419 est une erreur Laravel en rapport avec les token CSRF (Cross site request forgery) elle apparaissait sur notre serveur de production et rendait impossible toute requête POST.

Le problème est réglé mais la cause n'est pas clairement identifiée. Nous avons trouvé deux causes possibles.

1) Le fichier route posait problème. Nous avons pris le fichier route d'une autre branche et l'avons copié-collé.
2) Un fichier php "flash-message.blade.php" que nous avons simplement supprimé

Pour en arriver à cette conclusion , nous avons créé une feature "test_production" et créer un projet Laravel blanc et nous avons rajouté un par un nos fichiers (Model/View/Controller) jusqu'à que le bug apparaisse.


### Nested ressource
Lors du cours PMT, nous avons discuté des Nested Ressource et nous avons identifié ce besoin pour notre application.
Il nous aura quand même fallu quelques heures pour faire les vérifications concernant les routes comme /themes/{id}/proses/{id}

Nous avons fait un constructeur qui vérifie les id qui sont passé dans la requête et qui vérifie les routes qui en ont besoin.
```
public function __construct()
{
    $this->middleware(function ($request, $next) {
        if ( $request->theme->id == $request->prose->theme_id) {
            return $next($request);
        } else {
            return abort(404);
        }
    },
    ['only' => ['show', 'edit']]);
}
```

### Storage Laravel

Nous avons eu quelques soucis pour déployer nos images sur le serveur, en effet vu que nous utilisions le storage classique de Laravel, nous ne pouvions pas les push sur Github pour le déploiement. Comme nous avions des images fixes qui ne risquaient pas de bouger et que nous n'avons pas d'upload d'images, nous avons décidé de les mettre dans le dossier public de Laravel sans passer par le storage.


### Déploiement

Actuellement, l'application tourne sur un serveur SwissCenter. Cela n'a pas toujours été le cas et cela nous a fait perdre beaucoup de temps.

Nous avons commencé sur un serveur mis à disposition par le CPNV 
Nous avions dû : 

* installer toutes les applications (Nginx/php/mysql)
* Configurer le serveur manuellement 
* Créer le script capistrano pour le déploiement automatique

Nous avons ensuite cherché une solution d'hébergement plus efficace (Amazon/Digital Ocean/etc..)

## Base de données

![](https://i.imgur.com/Qj80jse.png)


La base de données contient 3 tables pour le fonctionnement de l'application + une table settings pour la gestion de réglages telle que la limite de vers dans une prose.

## Scénario de l'application

Le but de l'application est de fournir un jeu type cadavre exquis pour le Numerik Games d'Yverdon. 

Le jeu se compose de la manière suivante :
1. L'utilisateur choisit un thème qui lui convient
2. L'utilisateur choisit une image qui l'inspire
3. L'utilisateur lit les anciens vers rajoutés par d'autres utilisateurs
    3.1 L'utilisateur peut s'aider de mots pour écrire son vers
    3.2 L'utilisateur peut compliquer le jeu en ajoutant un compteur de syllabes
4. L'utilisateur rajoute son vers au jeu
    4.1 L'utilisateur peut continuer de jouer dans sa section
5. L'utilisateur quitte le jeu
6. À la fin de la soirée, les utilisateurs peuvent voir le contenu qu'ils ont ajouté sur un écran de projection.

Pour l'administration, nous avons créé des CRUD permettant de gérer le contenu inséré par les utilisateurs ainsi qu'une page settings pour des réglages dans l'application.

Vous trouverez les routes dans le fichier [suivant](https://github.com/CPNV-ES/NumerikGames/blob/master/routes/web.php).

## Conclusion

Commencer un projet depuis le début en n'ayant absolument rien sur quoi se baser est une expérience enrichissante. Cela n'a pas toujours été évident de se coordonner entre nous à certains moments, cependant nous avons pu outrepasser nos différents pour continuer dans le projet ou dans la résolution de problèmes. Malgré une charge de travail mal proportionnée pendant certains sprint, nous avons le plus souvent rattrapé notre travail et fini les features dans le prochain sprint.