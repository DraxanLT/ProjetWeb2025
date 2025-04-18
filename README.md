# 🚀 Projet Web 2025 par Draxan LAUNAY-TRAN

Ce ReadMe sert de synthèse à mes avancées dans le développement du projet.

---

## 📦 - Backlog 2

Pour ce projet, j'ai décidé de me concentrer sur le backlog 2 pour les défis techniques qu'il me propose.

Je pense avoir effectué PRESQUE **toutes les stories d'après ce que j'ai compris**.

En effet, en regardant les projets de mes camarades (par pure curiosité), j'ai remarqué quelques différences 
au niveau de la partie des tâches de la vie commune (Common-Life).  
J'ai compris que les tâches servaient comme des fiches d'avancement, comme l'idée du suivi du ménage dans la 
Coding Factory : chaque fois que quelqu'un nettoie un endroit (toilettes, cuisines, ...), il le mentionne sur une fiche
en indiquant son nom et prénom suivi de ce qu'il a fait.  
Là, c'est presque pareil, il clique sur le bouton "Participer" et explique ce qu'il a fait s'il le souhaite, même s'il 
n'explique pas ce qu'il a fait, il sera compté comme participant.

Mes camarades, eux, ont fait en sorte que chaque tâche soit prenable par une seule personne à la fois.  
Moi, j'ai plus pensé au côté communautaire qui me semble être le but de ces stories (1, 2 et 3).

---

## 🚧 - Fonctionnalité manquante

- Affecter une/des promotion(s) à une tâche/un bilan.

---

## 💻 - Mes idées non-implémentées

- Mettre un nombre limite de participations à une tâche pour qu'elle se clôture elle-même.
- Mettre un bouton pour modifier un bilan en cas d'erreur de génération par Mistral IA.

---

## ⚙️ - Mon avis sur le projet

### ❤️ - Positif

- **Laravel** est, je trouve, un bon moyen de créer des sites dynamiques et je pense réutiliser ce framework pour des projets
personnels.
- Ce genre de projet complexe offre plein de **possibilités**, **d'idées supplémentaires** à un point où je laisse passer les bonus
devant les features nécéssaires.

### 💔 - Négatif

- C'était bien plus **complexe** que ce qu'on a fait cette année, légèrement plus complexe que le projet Flash, mais puisque
c'est un projet important pour notre année, c'est compréhensible.
- Le fait que le projet soit individuel et non en groupe est un peu décevant. Cependant, cela reste compréhensible.

### + - Plus

J'ai fait l'erreur de trop être pris sur mes idées qui me venaient pendant le projet que les fonctionnalités demandées par le backlog,
j'en prends compte et je ferai en sorte de plus me concentrer sur l'essentiel que sur le bonus. Je n'ai pas pu implémenter
la possibilité d'affecter des promotions à des tâches et/ou des bilans par negligence, je m'en excuse.

---

## 👤 - À faire pour tester

### Il suffit de suivre la procédure classique :

### 1️⃣ - Configuration de l'environnement

```bash
✍️ Ouvrez le fichier .env et configurez les paramètres liés à votre base de données :

DB_DATABASE=nom_de_votre_bdd
DB_USERNAME=utilisateur
DB_PASSWORD=motdepasse

# plus loin (à la fin du .env si vous voulez)

MISTRAL_API_KEY=votre_clé_mistral
```

### 2️⃣ - Installation des dépendances PHP

```bash
composer install
```

### 3️⃣ - Nettoyage et optimisation du cache

```bash
php artisan optimize:clear
```

### 4️⃣ - Génération de la clé d'application

```bash
php artisan key:generate
```

### 5️⃣ - Migration de la base de données

```bash
php artisan migrate
```

### 6️⃣ - Population de la base (Données de test)

```bash
php artisan db:seed
```

---

## 💻 - Compilation des assets (si nécessaire)

```bash
npm install
npm run dev
```

---
