# GourmetLibrary API

GourmetLibrary est une plateforme numérique de gestion de bibliothèque spécialisée dans les ouvrages culinaires. Développée avec le framework **Laravel 11**, cette API permet de gérer un catalogue de livres, les catégories associées, ainsi qu'un système d'authentification complet pour les utilisateurs et les administrateurs.

## 🚀 Fonctionnalités

### Utilisateurs (Gourmands)

- **Authentification** : Inscription et connexion sécurisées via Laravel Sanctum.
- **Consultation** : Accès à la liste complète des livres.
- **Recherche avancée** : Recherche par titre, nom du chef ou catégorie.
- **Populaires** : Affichage automatique des 5 livres les plus consultés.

### Administration

- **Gestion du catalogue** : Ajouter, modifier ou supprimer des livres et des catégories.
- **Suivi de l'état** : Mise à jour et consultation des livres dégradés (`is_damaged`).
- **Statistiques** : Tableau de bord affichant le total des livres, le nombre de livres endommagés et l'ouvrage le plus consulté.

## 🛠️ Installation

1. **Cloner le projet**
    ```bash
    git clone [https://github.com/votre-utilisateur/GourmetLibrary.git](https://github.com/votre-utilisateur/GourmetLibrary.git)
    cd GourmetLibrary
    ```

````

2. **Installer les dépendances**

    ```bash
    composer install
    ```

3. **Configuration**
    - Copier le fichier d'exemple : `cp .env.example .env`.
    - Configurer vos accès à la base de données dans le fichier `.env`.
    - Générer la clé d'application : `php artisan key:generate`.

4. **Base de données**
    - Lancer les migrations et les seeders :

    ```bash
    php artisan migrate --seed
    ```

5. **Lancer l'application**
    ```bash
    php artisan serve
    ```

## 📖 Documentation de l'API

### Routes Publiques

| Méthode | Point de terminaison | Description                                     |
| :------ | :------------------- | :---------------------------------------------- |
| POST    | `/api/register`      | Création de compte (rôles: `gourmand`, `admin`) |
| POST    | `/api/login`         | Connexion et obtention du token                 |
| GET     | `/api/books`         | Liste des livres (filtrable par catégorie)      |
| GET     | `/api/books/search`  | Recherche par titre, chef ou catégorie          |
| GET     | `/api/books/popular` | Top 5 des livres les plus consultés             |

### Routes Protégées (Admin)

_Nécessitent un Bearer Token et le middleware `admin.access`_.

| Méthode | Point de terminaison        | Description                                          |
| :------ | :-------------------------- | :--------------------------------------------------- |
| POST    | `/api/books`                | Ajouter un nouveau livre                             |
| PUT     | `/api/books/{id}`           | Modifier les informations d'un livre                 |
| DELETE  | `/api/books/{id}`           | Supprimer un livre                                   |
| PATCH   | `/api/books/{id}/condition` | Modifier l'état d'usure d'un livre                   |
| POST    | `/api/creatCategory`        | Créer une nouvelle catégorie                         |
| GET     | `/api/admin/stats`          | Statistiques globales (total, endommagés, populaire) |
| GET     | `/api/books/degraded`       | Liste détaillée des livres endommagés                |

## 🏗️ Technologies Utilisées

- **Backend** : Laravel 11
- **Authentification** : Laravel Sanctum
- **Base de données** : MySQL

```

```
````
