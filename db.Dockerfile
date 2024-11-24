FROM mariadb:lts-ubi9

ENV MARIADB_DATABASE=marmitaria
ENV MARIADB_USER=root
ENV MARIADB_ROOT_PASSWORD=Marmita@02

VOLUME /var/lib/mysql

COPY ./src/modelo/database/marmitaria.sql /docker-entrypoint-initdb.d/