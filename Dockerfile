# Utiliser l'image officielle d'Ubuntu
FROM ubuntu:latest

# Mettre à jour les paquets et installer Apache + PHP
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copier les fichiers du site web dans le dossier public du serveur Apache
COPY src/ /var/www/html/

# Exposer le port 80 pour le serveur web
EXPOSE 80

# Lancer Apache en arrière-plan
CMD ["apache2ctl", "-D", "FOREGROUND"]
