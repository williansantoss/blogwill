-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bd_ly_adv
--

CREATE DATABASE IF NOT EXISTS bd_ly_adv;
USE bd_ly_adv;

--
-- Definition of table `pg_inicial_carousel_imagens`
--

DROP TABLE IF EXISTS `pg_inicial_carousel_imagens`;
CREATE TABLE `pg_inicial_carousel_imagens` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `path_img_carousel` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_inicial_carousel_imagens`
--

/*!40000 ALTER TABLE `pg_inicial_carousel_imagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg_inicial_carousel_imagens` ENABLE KEYS */;


--
-- Definition of table `pg_inicial_noticias`
--

DROP TABLE IF EXISTS `pg_inicial_noticias`;
CREATE TABLE `pg_inicial_noticias` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `titulo` varchar(45) NOT NULL,
  `descricao_resumo` varchar(100) NOT NULL,
  `autor_noticia` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_inicial_noticias`
--

/*!40000 ALTER TABLE `pg_inicial_noticias` DISABLE KEYS */;
INSERT INTO `pg_inicial_noticias` (`id`,`titulo`,`descricao_resumo`,`autor_noticia`) VALUES 
 (1,'Novas regras do seguro-desemprego começam a v','Desse modo, a partir desta segunda-feira (2), primeiro dia útil após o in','willian'),
 (2,'teste','teste descrição','joao'),
 (3,'One framework, every device.','Bootstrap easily and efficiently scales your websites and applications with a single code base','Maria'),
 (4,'Full of features','With Bootstrap, you get extensive and beautiful documentation for common HTML elements, ','Paulo Coelho'),
 (5,'One framework, every device.','With Bootstrap, you get extensive and beautiful documentation for common HTML elements, ','guga');
/*!40000 ALTER TABLE `pg_inicial_noticias` ENABLE KEYS */;


--
-- Definition of table `pg_inicial_redesocial_icones`
--

DROP TABLE IF EXISTS `pg_inicial_redesocial_icones`;
CREATE TABLE `pg_inicial_redesocial_icones` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `path` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_inicial_redesocial_icones`
--

/*!40000 ALTER TABLE `pg_inicial_redesocial_icones` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg_inicial_redesocial_icones` ENABLE KEYS */;


--
-- Definition of table `pg_inicial_redesocial_pgfb`
--

DROP TABLE IF EXISTS `pg_inicial_redesocial_pgfb`;
CREATE TABLE `pg_inicial_redesocial_pgfb` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `codigo` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_inicial_redesocial_pgfb`
--

/*!40000 ALTER TABLE `pg_inicial_redesocial_pgfb` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg_inicial_redesocial_pgfb` ENABLE KEYS */;


--
-- Definition of table `pg_inicial_texto`
--

DROP TABLE IF EXISTS `pg_inicial_texto`;
CREATE TABLE `pg_inicial_texto` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'id do texto principal da pagina principal/inicial',
  `ini_titulo` varchar(45) NOT NULL COMMENT 'titulo do texto principal pagina principal/inicial',
  `ini_descricao` varchar(100) NOT NULL COMMENT 'descricao do texto principal da pagina principal/inicial',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_inicial_texto`
--

/*!40000 ALTER TABLE `pg_inicial_texto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg_inicial_texto` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
