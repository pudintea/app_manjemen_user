
/*
 * ***************************************************************
 *  Script 		: Belajar Codeigniter
 *  Version 	: 3.1.11
 *  Date 		: 01 Maret 2020
 *  Author 		: Pudin Saepudin Ilham Development Ciamis
 *  Email 		: najzmitea@@gmail.com
 *  Description : Seorang Petani yang suka dengan teknologi.
 *  Blog 		: https://www.pudintea.web.id / https://anibarstudio.blogspot.com.
 *  Github 		: https://github.com/pudintea.
 * ***************************************************************
 */
-- TABEL MASTER
--
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_nama_depan` varchar(120) NOT NULL,
  `user_nama_belakang` varchar(120) NOT NULL,
  `user_telpon` varchar(120) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_status` tinyint(1) unsigned NOT NULL,
  `user_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `uc_email` UNIQUE (`user_email`),
  CONSTRAINT `uc_username` UNIQUE (`user_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `m_user` (`id_user`, `user_nama_depan`, `user_nama_belakang`, `user_telpon`, `user_email`, `user_username`, `user_password`, `user_status`, `user_tgl_edit`, `user_tgl_input`) VALUES
(1, 'Pudin', 'Saepudin Ilham', '081381729540', 'admin1@gmail.com', 'admin1', 'a7661db5aaac348f555f3fa961a5477367de2f1b7240763a205718e2988329d9c84e3db733f6c5b66e7652bbf044feaa5a39759dcbe1fb0a5d412516b1af4e65WDixq023yGNBGVd+U1FrDn/ibcHEsdLN37LSamI7rEFtwTYyIueHCpOPR8FKr/+eiTBLsjaL5Igep3yVwQcKjw==', 0, '2020-04-20 13:39:53', '2020-04-20 08:49:54');


CREATE TABLE IF NOT EXISTS `m_grup` (
  `id_grup` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grup_nama` varchar(120) NOT NULL,
  `grup_deskripsi` varchar(120) NOT NULL,
  `grup_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grup_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_grup`),
  CONSTRAINT `uc_grup_nama` UNIQUE (`grup_nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `m_grup` (`id_grup`, `grup_nama`, `grup_deskripsi`, `grup_tgl_edit`, `grup_tgl_input`) VALUES
(1, 'Administrator', 'Admin paling tinggi pada aplikasi ini', '2020-04-20 01:51:11', '2020-04-20 08:51:11'),
(2, 'Members', 'Members User', '2020-04-20 07:22:43', '2020-04-20 14:22:43');

CREATE TABLE IF NOT EXISTS `m_loguser` (
  `id_loguser` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loguser_tgl` DATE NOT NULL,
  `loguser_username` varchar(50) NOT NULL,
  `loguser_ip` varchar(20) NOT NULL,
  `loguser_jml` tinyint(1) unsigned NOT NULL,
  `loguser_status` tinyint(1) unsigned NOT NULL,
  `loguser_time` int(11) unsigned NOT NULL,
  `loguser_token` varchar(32) NOT NULL,
  `loguser_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `loguser_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_loguser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `t_user_grup` (
  `id_user_grup` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_grup_id_grup` int(11) unsigned NOT NULL,
  `user_grup_id_user` int(11) unsigned NOT NULL,
  `user_grup_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_grup_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_user_grup`),
  KEY `fk_user_grup_user1_idx` (`user_grup_id_user`),
  KEY `fk_user_grup_grup1_idx` (`user_grup_id_grup`),
  CONSTRAINT `uc_user_grup` UNIQUE (`user_grup_id_user`, `user_grup_id_grup`),
  CONSTRAINT `fk_user_grup_user1` FOREIGN KEY (`user_grup_id_user`) REFERENCES `m_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`user_grup_id_grup`) REFERENCES `m_grup` (`id_grup`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `t_user_grup` (`id_user_grup`, `user_grup_id_grup`, `user_grup_id_user`, `user_grup_tgl_edit`, `user_grup_tgl_input`) VALUES
(1, 1, 1, '2020-04-20 01:51:19', '2020-04-20 08:51:19'),
(2, 2, 1, '2020-04-20 07:22:58', '2020-04-20 14:22:58');

CREATE VIEW v_usergrup
AS
SELECT tb1.id_user_grup, tb1.user_grup_id_user, tb1.user_grup_id_grup,
tb2.id_user, tb2.user_nama_depan, tb2.user_nama_belakang, tb2.user_username, tb2.user_email,
tb3.id_grup, tb3.grup_nama,tb3.grup_deskripsi
FROM t_user_grup tb1
LEFT JOIN m_user tb2 ON tb1.user_grup_id_user = tb2.id_user
LEFT JOIN m_grup tb3 ON tb1.user_grup_id_grup = tb3.id_grup;




