# SYMFONY

## EMAIL

- installer le mailer (si pas déjà fait par défaut)
- installer le package tiers
- dans les paramètres du compte Google => Sécurité => Connexions à Google : activer la Validation en deux étapes pour pouvoir accéder aux Mots de pass des applications
- créer une nouveau mot de passe d'application
- .env :
```
MAILER_DSN=gmail://USERNAME:PASSWORD@default
```
