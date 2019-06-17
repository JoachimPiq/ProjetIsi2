create database if not exists ecologiquedb character set utf8 collate utf8_unicode_ci;

grant all privileges on ecologiquedb.* to 'ecologiquedb_user'@'localhost' identified by 'secret';

use ecologiquedb;

drop table if exists commentaire;
drop table if exists article;
drop table if exists password_resets;
drop table if exists users;

create table article (
idArticle integer not null primary key auto_increment,
titreArticle varchar(45) not null,
contenuArticle varchar(0) not null,
idUser integer unsigned not null
) engine=innodb character set utf8 collate utf8_unicode_ci;


CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `article`
    ADD CONSTRAINT `fk_art_usr` FOREIGN KEY (idUser) REFERENCES users(id);

 CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


create table commentaire (
idCom integer not null primary key auto_increment,
contenuCom varchar(500) not null,
idArticle integer not null,
idUser integer unsigned not null,
constraint fk_com_conf foreign key(idArticle) references article(idArticle),
constraint fk_com_usr foreign key(idUser) references users(id)
) engine=innodb character set utf8 collate utf8_unicode_ci;