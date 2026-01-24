# 🏡 EstateHub – Plateforme de gestion immobilière

---

## 🧰 Outils et technologies utilisés

### 🔹 Backend
- **Laravel 11**
- **PHP**

### 🔹 Frontend
- **HTML5**
- **CSS3**
- **Bootstrap**
- **JavaScript**
- **Blade (Laravel)**

### 🔹 Base de données
- **MySQL**
- **phpMyAdmin** (administration et gestion de la base de données)

### 🔹 Autres outils
- Laravel Storage (gestion des images)
- Git & GitHub (gestion de versions)

---

## 🎯 Présentation du projet

EstateHub est une application web de gestion immobilière développée avec **Laravel 11**.  
Elle permet la **consultation**, la **gestion** et la **réservation de biens immobiliers** à travers un système de **rôles et permissions**.

L’application repose sur trois acteurs principaux :
- Client
- Agent immobilier
- Administrateur

Chaque acteur dispose d’un **parcours de navigation**, de **fonctionnalités spécifiques** et de **droits d’accès contrôlés**.

---

## 👥 Acteurs du système et fonctionnalités

### 👤 Client (Utilisateur final)

Le client est un utilisateur souhaitant consulter les biens immobiliers et planifier des visites.

#### 🔹 Navigation
- Accès à la page d’accueil
- Consultation des **biens validés par l’administrateur**
- Navigation entre les annonces et les détails des biens

#### 🔹 Authentification
- Création d’un compte client
- Connexion / déconnexion sécurisée
- Redirection automatique vers la page de connexion lors d’une action protégée

#### 🔹 Fonctionnalités
- Consulter les biens immobiliers disponibles
- Voir les détails d’un bien (prix, surface, localisation, images, agent)
- Réserver un rendez-vous pour visiter un bien
- Suivre l’état de ses rendez-vous (en attente, accepté, refusé)

#### 🔹 Sécurité
- Impossible de réserver une visite sans être connecté
- Accès limité uniquement aux biens validés
- Accès contrôlé par middleware d’authentification

---

### 🧑‍💼 Agent immobilier

L’agent est responsable de la gestion des biens immobiliers et du suivi des rendez-vous.

#### 🔹 Navigation
- Connexion via un compte agent
- Accès à un menu spécifique agent
- Navigation centralisée via les pages de gestion

#### 🔹 Gestion des biens
- Ajouter un bien immobilier
- Modifier ses propres biens
- Consulter l’ensemble des biens
- Visualiser l’état de validation des biens (validé / non validé)

#### 🔹 Gestion des rendez-vous
- Consulter les rendez-vous liés à ses biens
- Suivre les demandes de visites des clients
- Gérer le statut des rendez-vous

#### 🔹 Restrictions
- Un agent ne peut modifier que ses propres biens
- Les biens doivent être validés par l’administrateur avant publication

---

### 🛠️ Administrateur

L’administrateur assure la supervision et le contrôle global de la plateforme.

#### 🔹 Navigation
- Accès sécurisé via un compte administrateur
- Menu d’administration dédié
- Vue globale sur le système

#### 🔹 Gestion des données
- Gérer les catégories de biens
- Gérer les types de biens immobiliers
- Structurer les annonces

#### 🔹 Validation
- Consulter tous les biens ajoutés par les agents
- Valider ou invalider les biens
- Garantir que seuls les biens validés sont visibles par les clients

---

## 🔄 Cycle de navigation et de gestion

1. L’agent ajoute un bien immobilier  
2. L’administrateur valide ou invalide le bien  
3. Le client consulte les biens validés  
4. Le client réserve un rendez-vous  
5. L’agent consulte et gère les rendez-vous  
6. Le système assure le suivi et la sécurité via les rôles  

---

## ⚙️ Environnement de développement

- PHP >= 8.2
- Composer
- MySQL
- phpMyAdmin
- Serveur local (XAMPP / WAMP / Laragon)
- Navigateur web moderne

---

## 🚀 Étapes d’installation

### 1️⃣ Cloner le projet
```bash
git clone https://github.com/VOTRE_USERNAME/EstateHub.git
cd EstateHub
