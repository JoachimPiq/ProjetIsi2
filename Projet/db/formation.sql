create table Formation (
idForm integer not null primary key auto_increment,
intituleForm varchar(45) not null,
descriptionForm varchar(600) not null
) engine=innodb character set utf8 collate utf8_unicode_ci

insert into Formation values (1, 'Formation Photoshop', 'Découvrir le traitement des images numériques couleur ainsi que leur séparation
quadrichromique. Répondre aux besoins des photographes, photograveurs, des créatifs et des inventeurs d\'images. Acquérir une méthode de travail professionnelle.');

insert into Formation values(2, 'Formation Publisher', 'Savoir créer et produire des compositions de type brochures, prospectus, formulaire, invitation, bulletin d\'informations.');

insert into Formation values
(3, 'Formation Outlook', 'Savoir gérer les différents objets et les outils de communication.');