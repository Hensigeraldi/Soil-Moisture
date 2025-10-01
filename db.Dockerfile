FROM mysql:5.7

# Set password root dan nama database
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=saw_beasiswa

EXPOSE 3306
