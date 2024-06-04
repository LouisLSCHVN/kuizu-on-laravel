# KUIZU

UML d'introduction pour kuizu, un outil de quiz en ligne

## Introduction

Kuizu est une plateforme de quiz en ligne. Elle permet de créer des quiz, de les partager et de les jouer.

Elle sera développée en utilisant **Laravel** pour le backend et **Vue.JS** pour le frontend.

## Sommaire

Par ordre de priorité :

1. **Utilisateurs**
2. **Quiz**
3. **Questions**
4. **Réponses**
5. **Résultats**
6. **Quiz en temps réel**
7. **Amis**
8. **Collaboration**
9. **Premium**
10. **Admin**

## Utilisateurs

Les utilisateurs peuvent s'inscrire, se connecter et jouer à des quiz. Ils peuvent aussi créer des quiz et les partager.

### Table : `users`

- `id` -> **int** : Identifiant de l'utilisateur
- `username` -> **varchar(255)** : Nom d'utilisateur
- `password` -> **varchar(255)** : Mot de passe
- `profile_picture` -> **varchar(255)** : Image de profil
- `email` -> **varchar(255)** : Adresse email
- `created_at` -> **timestamp** : Date de création
- `updated_at` -> **timestamp** : Date de mise à jour
- `verified` -> **boolean** : Compte vérifié / défault : `false`
- `verification_token` -> **varchar(255)** : Token de vérification
- `role` -> **enum('user', 'premium', 'admin')** : Rôle de l'utilisateur / défault : `user`
- `bio` -> **text** : Biographie de l'utilisateur,
- `last_login` -> **timestamp** : NULL DEFAULT NULL,
- `pseudo_color` -> **varchar(7)** : DEFAULT NULL,

### Fonctionnatilés

**Fillable**: email, pseudo, password

- [X] Inscription : Permettre aux utilisateurs de s'inscrire
- [X] Connexion : Permettre aux utilisateurs de se connecter
- [ ] Show : Afficher le profil d'un utilisateur
- [ ] Edit : Modifier le profil d'un utilisateur (username, email, bio, profile_picture, pseudo_color)
- [ ] Reset password : Permettre aux utilisateurs de réinitialiser leur mot de passe (envoi d'un email de réinitialisation)
- [ ] Verify email : Permettre aux utilisateurs de vérifier leur adresse email (envoi d'un email de vérification)
- [ ] Change password : Permettre aux utilisateurs de changer leur mot de passe
- [ ] Delete : Supprimer un utilisateur
- [ ] Logout : Déconnecter un utilisateur

## Quiz

Les utilisateurs peuvent créer des quiz, les partager, collaborer et les jouer.

### Table : `quizzes`

- `id` -> **int** : Identifiant du quiz
- `title` -> **varchar(255)** : Titre du quiz
- `description` -> **text** : Description du quiz
- `user_id` -> **int** : Identifiant de l'utilisateur qui a créé le quiz
- `created_at` -> **timestamp** : Date de création
- `updated_at` -> **timestamp** : Date de mise à jour
- `published` -> **boolean** : Quiz publié / défault : `false`

## Question

Les quiz sont composés de questions.

### Table : `questions`

- `id` -> **int** : Identifiant de la question
- `quiz_id` -> **int** : Identifiant du quiz
- `question` -> **text** : Question
- `created_at` -> **timestamp** : Date de création
- `updated_at` -> **timestamp** : Date de mise à jour
- `type` -> **enum('text', 'image', audio, multiple_choice, true_false)** : Type de question / défault : `text`
- `points` -> **int** : Points de la question / défault : `1`
- `order` -> **int** : Ordre de la question dans le quiz
- `image` -> **varchar(255)** : Image de la question
- `audio` -> **varchar(255)** : Audio de la question
- `explanation` -> **text** : Explication de la réponse
- `time` -> **int** : Temps pour répondre à la question / défault : `30`

## Réponse

Les questions sont composées de réponses.

### Table : `answers`

- `id` -> **int** : Identifiant de la réponse
- `question_id` -> **int** : Identifiant de la question
- `answer` -> **text** : Réponse
- `correct` -> **boolean** : Réponse correcte / défault : `false`
- `created_at` -> **timestamp** : Date de création
- `updated_at` -> **timestamp** : Date de mise à jour
