2.  **Le texte brut au lieu du rendu :** Sur ta capture d'écran, on voit le code source (les balises) au lieu de voir le résultat final (le tableau, les titres en gras, etc.). Cela arrive si l'extension du fichier n'est pas strictement `.md` ou si l'éditeur ne supporte pas le rendu en direct.
3.  **Les liens mal formatés :** On voit des parenthèses et des crochets qui traînent autour des URLs de GitHub.

### La Solution pour que ça marche sur GitHub :

Pour régler ça, crée un nouveau fichier nommé exactement **`README.md`** à la racine de ton projet et colle **uniquement** ce bloc là (sans rien ajouter avant ou après) :

```markdown
# GourmetLibrary API

GourmetLibrary est une plateforme numérique de gestion de bibliothèque spécialisée dans les ouvrages culinaires. Développée avec le framework **Laravel 11**, cette API permet de gérer un catalogue de livres, les catégories associées, ainsi qu'un système d'authentification complet pour les utilisateurs et les administrateurs.

## 🚀 Fonctionnalités

### Utilisateurs (Gourmands)
* **Authentification** : Inscription et connexion sécurisées via Laravel Sanctum.
* **Consultation** : Accès à la liste complète des livres.
* **Recherche avancée** : Recherche par titre, nom du chef ou catégorie.
* **Populaires** : Affichage automatique des 5 livres les plus consultés.

### Administration
* **Gestion du catalogue** : Ajouter, modifier ou supprimer des livres et des catégories.
* **Suivi de l'état** : Mise à jour et consultation des livres dégradés (`is_damaged`).
* **Statistiques** : Tableau de bord affichant le total des livres, le nombre de livres endommagés et l'ouvrage le plus consulté.

## 🛠️ Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/oubelkacemhub/GourmetLibrary.git
   cd GourmetLibrary
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configuration**
   * Copier le fichier d'exemple : `cp .env.example .env`.
   * Configurer vos accès à la base de données dans le fichier `.env`.
   * Générer la clé d'application : `php artisan key:generate`.

4. **Base de données**
   * Lancer les migrations et les seeders :
   ```bash
   php artisan migrate --seed
   ```

5. **Lancer l'application**
   ```bash
   php artisan serve
   ```

## 📖 Documentation de l'API

### Routes Publiques

| Méthode | Point de terminaison | Description |
| :--- | :--- | :--- |
| POST | `/api/register` | Création de compte (rôles: `gourmand`, `admin`) |
| POST | `/api/login` | Connexion et obtention du token |
| GET | `/api/books` | Liste des livres |
| GET | `/api/books/search` | Recherche par titre, chef ou catégorie |
| GET | `/api/books/popular` | Top 5 des livres les plus consultés |

### Routes Protégées (Admin)

| Méthode | Point de terminaison | Description |
| :--- | :--- | :--- |
| POST | `/api/books` | Ajouter un nouveau livre |
| PUT | `/api/books/{id}` | Modifier les informations d'un livre |
| DELETE | `/api/books/{id}` | Supprimer un livre |
| PATCH | `/api/books/{id}/condition` | Modifier l'état d'usure d'un livre |
| POST | `/api/creatCategory` | Créer une nouvelle catégorie |
| GET | `/api/admin/stats` | Statistiques globales |
| GET | `/api/books/degraded` | Liste des livres endommagés |

## 🏗️ Technologies Utilisées
* **Backend** : Laravel 11
* **Authentification** : Laravel Sanctum
* **Base de données** : MySQL
