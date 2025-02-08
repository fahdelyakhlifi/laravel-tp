# 📌 laravel-tp

contient des tp pour comprendre bien laravel
---

## 🚀 Installation

### 1️⃣ Prérequis

Avant de commencer, assure-toi d’avoir installé :

- PHP (>=8.x)
- Composer (https://getcomposer.org/download/)
- MySQL ou SQLite
- Node.js & npm (si tu utilises Laravel Mix ou Vite)
- Git (https://git-scm.com/)

---

### 2️⃣ Cloner le projet

Utilise la commande suivante pour cloner le projet sur ta machine :

git clone https://github.com/ton-utilisateur/ton-repo.git
cd ton-repo

---

### 3️⃣ Installer les dépendances

Installe les dépendances PHP avec Composer :

composer install

Si ton projet utilise des paquets npm (ex. Tailwind, Vue.js, etc.), installe-les avec :

npm install

---

### 4️⃣ Configurer l’environnement

Copie le fichier .env.example en .env et configure tes variables d’environnement :

cp .env.example .env

Génère la clé de l’application :

php artisan key:generate

---

### 5️⃣ Configurer la base de données

Dans `.env`, configure ta base de données :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_ta_base
DB_USERNAME=ton_user
DB_PASSWORD=ton_mot_de_passe

Puis exécute :

php artisan migrate --seed

Si ton projet utilise des données de test, ajoute --seed pour remplir la base.

---

### 6️⃣ Lancer le serveur

Démarre le serveur Laravel :

php artisan serve

Puis accède au projet via :

http://127.0.0.1:8000

---

## 🛠 Commandes utiles

- Créer un modèle avec une migration :
    php artisan make:model Nom -m
  
- Créer un contrôleur :
    php artisan make:controller NomController
  
- Créer une factory :
    php artisan make:factory NomFactory --model=Nom
  
- Créer un seeder :
    php artisan make:seeder NomSeeder
  

---

## 📜 License

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus d’informations.
