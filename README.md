# 🏡 EstateHub  
### Plateforme de gestion immobilière

EstateHub est une application web développée dans le cadre d’un **projet académique**, ayant pour objectif la conception d’une plateforme moderne et structurée dédiée à la **gestion**, la **consultation** et la **réservation de biens immobiliers**.

Le projet repose sur une **architecture orientée rôles**, garantissant une **navigation claire**, une **gestion sécurisée** et une **séparation logique des responsabilités** entre les différents acteurs.

---

## 🎯 Objectifs du projet

✔ Centraliser la gestion des biens immobiliers  
✔ Faciliter la consultation des biens pour les clients  
✔ Permettre aux agents de gérer efficacement leurs annonces et rendez-vous  
✔ Assurer la validation et le contrôle des biens par un administrateur  
✔ Mettre en place une navigation sécurisée basée sur les rôles et permissions  

---

## 🧰 Outils et technologies utilisés

### ⚙️ Backend
- 🟢 **Laravel 11**
- 🐘 **PHP**

### 🎨 Frontend
- 🌐 **HTML5**
- 🎨 **CSS3**
- 🅱️ **Bootstrap**
- ⚡ **JavaScript**
- 🧩 **Blade (moteur de templates Laravel)**

### 🗄️ Base de données
- 🐬 **MySQL**
- 🛠️ **phpMyAdmin** (administration et gestion de la base)

### 🔧 Autres outils
- 🖼️ **Laravel Storage** (gestion des images)
- 🔄 **Git & GitHub** (gestion de versions et collaboration)

---

## 👥 Acteurs du système et fonctionnalités

L’application repose sur **trois acteurs principaux**, chacun disposant de fonctionnalités spécifiques et d’un parcours de navigation adapté.

---

### 👤 Client (Utilisateur final)

Le client est un utilisateur souhaitant consulter les biens immobiliers et planifier des visites.

#### 🧭 Navigation
- Accès à la page d’accueil
- Consultation des **biens validés par l’administrateur**
- Navigation entre les annonces et les détails des biens

#### 🔐 Authentification
- Création d’un compte client
- Connexion / déconnexion sécurisée
- Redirection automatique vers la page de connexion lors d’une action protégée

#### ⭐ Fonctionnalités
- Consulter les biens immobiliers disponibles
- Visualiser les détails d’un bien (prix, surface, localisation, images, agent)
- Réserver un rendez-vous pour visiter un bien
- Suivre l’état de ses rendez-vous *(en attente, accepté, refusé)*

#### 🔒 Sécurité
- Réservation impossible sans authentification
- Accès limité uniquement aux biens validés
- Protection des routes via middleware d’authentification

---

### 🧑‍💼 Agent immobilier

L’agent est responsable de la gestion des biens immobiliers et du suivi des rendez-vous associés.

#### 🧭 Navigation
- Connexion via un compte agent
- Accès à un menu dédié aux fonctionnalités agent
- Navigation centralisée via les pages de gestion

#### 🏠 Gestion des biens
- Ajouter un nouveau bien immobilier
- Modifier ses propres biens
- Consulter l’ensemble des biens
- Visualiser l’état de validation des biens *(validé / non validé)*

#### 📅 Gestion des rendez-vous
- Consulter les rendez-vous liés à ses biens
- Suivre les demandes de visite des clients
- Gérer le statut des rendez-vous

#### 🚫 Restrictions
- Un agent ne peut modifier que ses propres biens
- Les biens doivent être validés par l’administrateur avant publication

---

### 🛠️ Administrateur

L’administrateur assure la supervision globale et le contrôle du bon fonctionnement de la plateforme.

#### 🧭 Navigation
- Accès sécurisé via un compte administrateur
- Menu d’administration dédié
- Vue globale sur l’ensemble du système

#### 🗂️ Gestion des données
- Gestion des catégories de biens immobiliers
- Gestion des types de biens *(appartement, villa, etc.)*
- Structuration et organisation des annonces

#### ✅ Validation des biens
- Consultation de tous les biens ajoutés par les agents
- Validation ou invalidation des biens
- Garantie que seuls les biens validés sont visibles par les clients

---

## 🔄 Cycle de navigation et de gestion

1️⃣ L’agent ajoute un bien immobilier  
2️⃣ L’administrateur valide ou invalide le bien  
3️⃣ Le client consulte les biens validés  
4️⃣ Le client réserve un rendez-vous  
5️⃣ L’agent consulte et gère les rendez-vous  
6️⃣ Le système assure le suivi et la sécurité via les rôles  

---

## ⚙️ Environnement de développement

- 🐘 PHP ≥ 8.2  
- 📦 Composer  
- 🐬 MySQL  
- 🛠️ phpMyAdmin  
- 💻 Serveur local *(XAMPP / WAMP / Laragon)*  
- 🌍 Navigateur web moderne  

---

## 🚀 Installation du projet

### 1️⃣ Cloner le dépôt
```bash
git clone https://github.com/ZinHar1032/EstateHub.git
cd EstateHub
