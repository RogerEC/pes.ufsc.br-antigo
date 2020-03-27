-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: pes
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pes_aluno`
--

DROP TABLE IF EXISTS `pes_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_aluno` (
  `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT,
  `TRABALHO` varchar(60) DEFAULT NULL,
  `PERIODO_OCUPACAO` varchar(30) DEFAULT NULL,
  `CARGA_HORARIA` varchar(30) DEFAULT NULL,
  `ROTINA_ESTUDO` varchar(60) DEFAULT NULL,
  `DIAS_ESTUDO` varchar(60) DEFAULT NULL,
  `TEMPO_ESTUDO` varchar(30) DEFAULT NULL,
  `ORIGEM_TRAJ` varchar(30) DEFAULT NULL,
  `TRANSPORTE` varchar(30) DEFAULT NULL,
  `TEMPO_TRAJETO` varchar(30) DEFAULT NULL,
  `FEZ_VEST` varchar(60) DEFAULT NULL,
  `CURSO` varchar(45) DEFAULT NULL,
  `TIPO_UNI` varchar(30) DEFAULT NULL,
  `ESTUDANTE` tinyint(1) NOT NULL,
  `TURNO_ESTUDO` varchar(15) DEFAULT NULL,
  `SERIE` varchar(15) DEFAULT NULL,
  `TURMA` varchar(15) DEFAULT NULL,
  `NUM_MATRICULA` int(11) DEFAULT NULL,
  `NOME_ESCOLA` varchar(60) DEFAULT NULL,
  `LOCALIZACAO` varchar(60) DEFAULT NULL,
  `CHAVE` varchar(64) DEFAULT NULL,
  `CONFIRMADO` tinyint(1) DEFAULT NULL,
  `DATA_REGISTRO` datetime NOT NULL,
  `ANO_CONCLUSAO` int(11) DEFAULT NULL,
  `ID_TURMA` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ESCOLA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ALUNO`),
  KEY `ID_TURMA` (`ID_TURMA`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ESCOLA` (`ID_ESCOLA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_aluno`
--

LOCK TABLES `pes_aluno` WRITE;
/*!40000 ALTER TABLE `pes_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_atividade_antiga`
--

DROP TABLE IF EXISTS `pes_atividade_antiga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_atividade_antiga` (
  `ID_ATIVIDADE_ANTIGA` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) DEFAULT NULL,
  `NOME_PROF` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID_ATIVIDADE_ANTIGA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_atividade_antiga`
--

LOCK TABLES `pes_atividade_antiga` WRITE;
/*!40000 ALTER TABLE `pes_atividade_antiga` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_atividade_antiga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_atividade_antiga_voluntario`
--

DROP TABLE IF EXISTS `pes_atividade_antiga_voluntario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_atividade_antiga_voluntario` (
  `ID_ATIVIDADE_ANTIGA_VOLUNTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ATIVIDADE_ANTIGA` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_ATIVIDADE_ANTIGA_VOLUNTARIO`),
  KEY `ID_ATIVIDADE_ANTIGA` (`ID_ATIVIDADE_ANTIGA`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_atividade_antiga_voluntario`
--

LOCK TABLES `pes_atividade_antiga_voluntario` WRITE;
/*!40000 ALTER TABLE `pes_atividade_antiga_voluntario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_atividade_antiga_voluntario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_atividade_atual`
--

DROP TABLE IF EXISTS `pes_atividade_atual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_atividade_atual` (
  `ID_ATIVIDADE_ATUAL` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) DEFAULT NULL,
  `CARGA_HORARIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ATIVIDADE_ATUAL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_atividade_atual`
--

LOCK TABLES `pes_atividade_atual` WRITE;
/*!40000 ALTER TABLE `pes_atividade_atual` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_atividade_atual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_atividade_atual_voluntario`
--

DROP TABLE IF EXISTS `pes_atividade_atual_voluntario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_atividade_atual_voluntario` (
  `ID_ATIVIDADE_ATUAL_VOLUNTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ATIVIDADE` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_ATIVIDADE_ATUAL_VOLUNTARIO`),
  KEY `ID_ATIVIDADE` (`ID_ATIVIDADE`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_atividade_atual_voluntario`
--

LOCK TABLES `pes_atividade_atual_voluntario` WRITE;
/*!40000 ALTER TABLE `pes_atividade_atual_voluntario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_atividade_atual_voluntario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_avaliacao`
--

DROP TABLE IF EXISTS `pes_avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_avaliacao` (
  `ID_AVALIACAO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(120) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `NOTA` double NOT NULL,
  PRIMARY KEY (`ID_AVALIACAO`),
  KEY `ID_ALUNO` (`ID_ALUNO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_avaliacao`
--

LOCK TABLES `pes_avaliacao` WRITE;
/*!40000 ALTER TABLE `pes_avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_curso`
--

DROP TABLE IF EXISTS `pes_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_curso` (
  `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_CURSO`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_curso`
--

LOCK TABLES `pes_curso` WRITE;
/*!40000 ALTER TABLE `pes_curso` DISABLE KEYS */;
INSERT INTO `pes_curso` VALUES (1,'Administração'),(2,'Agronomia'),(3,'Agronomia'),(4,'Animação'),(5,'Antropologia'),(6,'Arquitetura e Urbanismo'),(7,'Arquivologia'),(8,'Artes Cênicas'),(9,'Bacharelado em Ciência e Tecnologia'),(10,'Biblioteconomia'),(11,'Ciência da Informaçã'),(12,'Ciências Biológicas'),(13,'Ciências Contábeis'),(14,'Ciências da Computação'),(15,'Ciência e Tecnologia de Alimentos'),(16,'Ciências Econômicas'),(17,'Ciências Sociais'),(18,'Cinema'),(19,'Design'),(20,'Design de Produto'),(21,'Direito'),(22,'Educação Física'),(23,'Enfermagem'),(24,'Engenharia Automotiva'),(25,'Engenharia Aeroespacial'),(26,'Engenharia Civil'),(27,'Engenharia Civil de Infraestrutura'),(28,'Engenharia de Alimentos'),(29,'Engenharia de Aquicultura'),(30,'Engenharia de Computação'),(31,'Engenharia de Controle e Automação'),(32,'Engenharia de Controle e Automação'),(33,'Engenharia de Energia'),(34,'Engenharia de Materiais'),(35,'Engenharia de Materiais'),(36,'Engenharia de Produção Civil'),(37,'Engenharia de Produção Elétrica'),(38,'Engenharia de Produção Mecânica'),(39,'Engenharia de Transportes e Logística'),(40,'Engenharia Elétrica'),(41,'Engenharia Eletrônica'),(42,'Engenharia Ferroviária e Metroviária'),(43,'Engenharia Florestal – Curitibanos'),(44,'Engenharia Mecânica'),(45,'Engenharia Mecatrônica – Joinville'),(46,'Engenharia Naval – Joinville'),(47,'Engenharia Química'),(48,'Engenharia Sanitária e Ambiental'),(49,'Engenharia Têxtil – Blumenau'),(50,'Farmácia'),(51,'Filosofia'),(52,'Física'),(53,'Fisioterapia – Araranguá'),(54,'Fonoaudiologia'),(55,'Geografia'),(56,'Geologia'),(57,'História'),(58,'Jornalismo'),(59,'Letras – Língua Alemã'),(60,'Letras – Língua Espanhola'),(61,'Letras – Língua Francesa'),(62,'Letras – Língua Inglesa'),(63,'Letras – Língua Italiana'),(64,'Letras – Libras'),(65,'Letras – Língua Portuguesa'),(66,'Matemática – Licenciatura'),(67,'Matemática – Licenciatura – Blumenau'),(68,'Matemática e Computação Científica'),(69,'Medicina'),(70,'Medicina Veterinária – Curitibanos'),(71,'Meteorologia'),(72,'Museologia'),(73,'Nutrição'),(74,'Oceanografia'),(75,'Odontologia'),(76,'Pedagogia'),(77,'Psicologia'),(78,'Química'),(79,'Química – Licenciatura – Blumenau'),(80,'Relações Internacionais'),(81,'Secretariado Executivo'),(82,'Serviço Social'),(83,'Sistemas de Informação'),(84,'Tecnologias da Informação e Comunicação – Araranguá'),(85,'Zootecnia'),(86,'Outros');
/*!40000 ALTER TABLE `pes_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disciplina`
--

DROP TABLE IF EXISTS `pes_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disciplina` (
  `ID_DISCIPLINA` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(13) NOT NULL,
  `DISPONIBILIDADE` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_DISCIPLINA`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disciplina`
--

LOCK TABLES `pes_disciplina` WRITE;
/*!40000 ALTER TABLE `pes_disciplina` DISABLE KEYS */;
INSERT INTO `pes_disciplina` VALUES (1,'Atualidades','0'),(2,'Biologia','1'),(3,'Física','1'),(4,'História','1'),(5,'Geografia','1'),(6,'Gramática','0'),(7,'Matemática','1'),(8,'Química','1'),(9,'Redação','0');
/*!40000 ALTER TABLE `pes_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disciplina_prof`
--

DROP TABLE IF EXISTS `pes_disciplina_prof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disciplina_prof` (
  `ID_DISCIPLINA_PROF` int(11) NOT NULL AUTO_INCREMENT,
  `OPCAO` int(1) DEFAULT NULL,
  `ID_DISCIPLINA` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_DISCIPLINA_PROF`),
  KEY `ID_DISCIPLINA` (`ID_DISCIPLINA`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disciplina_prof`
--

LOCK TABLES `pes_disciplina_prof` WRITE;
/*!40000 ALTER TABLE `pes_disciplina_prof` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_disciplina_prof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disp_dia`
--

DROP TABLE IF EXISTS `pes_disp_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disp_dia` (
  `ID_DISP_DIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_DISP_DIA`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disp_dia`
--

LOCK TABLES `pes_disp_dia` WRITE;
/*!40000 ALTER TABLE `pes_disp_dia` DISABLE KEYS */;
INSERT INTO `pes_disp_dia` VALUES (1,'SEG1'),(2,'SEG2'),(3,'SEG3'),(4,'SEG4'),(5,'TER1'),(6,'TER2'),(7,'TER3'),(8,'TER4'),(9,'QUA1'),(10,'QUA2'),(11,'QUA3'),(12,'QUA4'),(13,'QUI1'),(14,'QUI2'),(15,'QUI3'),(16,'QUI4'),(17,'SEX1'),(18,'SEX2'),(19,'SEX3'),(20,'SEX4');
/*!40000 ALTER TABLE `pes_disp_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disp_dia_prof`
--

DROP TABLE IF EXISTS `pes_disp_dia_prof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disp_dia_prof` (
  `ID_DISP_DIA_PROF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DISP_DIA` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_DISP_DIA_PROF`),
  KEY `ID_DISP_DIA` (`ID_DISP_DIA`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disp_dia_prof`
--

LOCK TABLES `pes_disp_dia_prof` WRITE;
/*!40000 ALTER TABLE `pes_disp_dia_prof` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_disp_dia_prof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disp_turno`
--

DROP TABLE IF EXISTS `pes_disp_turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disp_turno` (
  `ID_DISP_TURNO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(5) NOT NULL,
  PRIMARY KEY (`ID_DISP_TURNO`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disp_turno`
--

LOCK TABLES `pes_disp_turno` WRITE;
/*!40000 ALTER TABLE `pes_disp_turno` DISABLE KEYS */;
INSERT INTO `pes_disp_turno` VALUES (1,'SEG1'),(2,'SEG2'),(3,'SEG3'),(4,'TER1'),(5,'TER2'),(6,'TER3'),(7,'QUA1'),(8,'QUA2'),(9,'QUA3'),(10,'QUI1'),(11,'QUI2'),(12,'QUI3'),(13,'SEX1'),(14,'SEX2'),(15,'SEX3');
/*!40000 ALTER TABLE `pes_disp_turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_disp_turno_gestao`
--

DROP TABLE IF EXISTS `pes_disp_turno_gestao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_disp_turno_gestao` (
  `ID_DISP_TURNO_GESTAO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DISP_TURNO` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_DISP_TURNO_GESTAO`),
  KEY `ID_DISP_TURNO` (`ID_DISP_TURNO`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_disp_turno_gestao`
--

LOCK TABLES `pes_disp_turno_gestao` WRITE;
/*!40000 ALTER TABLE `pes_disp_turno_gestao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_disp_turno_gestao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_divulg`
--

DROP TABLE IF EXISTS `pes_divulg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_divulg` (
  `ID_DIVULG` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_DIVULG`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_divulg`
--

LOCK TABLES `pes_divulg` WRITE;
/*!40000 ALTER TABLE `pes_divulg` DISABLE KEYS */;
INSERT INTO `pes_divulg` VALUES (1,'Instagram'),(2,'Facebook'),(3,'E-mail'),(4,'Cartaz'),(5,'Hall'),(6,'Passagem na sala'),(7,'Indicação amigo/familiar'),(8,'TV'),(9,'Rádio'),(10,'Jornal'),(11,'Revista'),(12,'Visita na escola'),(13,'Outro');
/*!40000 ALTER TABLE `pes_divulg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_divulg_aluno`
--

DROP TABLE IF EXISTS `pes_divulg_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_divulg_aluno` (
  `ID_DIVULG_ALUNO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DIVULG` int(11) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  PRIMARY KEY (`ID_DIVULG_ALUNO`),
  KEY `ID_ALUNO` (`ID_ALUNO`),
  KEY `ID_DIVULG` (`ID_DIVULG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_divulg_aluno`
--

LOCK TABLES `pes_divulg_aluno` WRITE;
/*!40000 ALTER TABLE `pes_divulg_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_divulg_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_divulg_volunt`
--

DROP TABLE IF EXISTS `pes_divulg_volunt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_divulg_volunt` (
  `ID_DIVULG_VOLUNT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DIVULG` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID_DIVULG_VOLUNT`),
  KEY `ID_DIVULG` (`ID_DIVULG`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_divulg_volunt`
--

LOCK TABLES `pes_divulg_volunt` WRITE;
/*!40000 ALTER TABLE `pes_divulg_volunt` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_divulg_volunt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_endereco`
--

DROP TABLE IF EXISTS `pes_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_endereco` (
  `ID_ENDERECO` int(11) NOT NULL AUTO_INCREMENT,
  `COMPLEMENTO` varchar(150) DEFAULT NULL,
  `CEP` int(11) DEFAULT NULL,
  `RUA` varchar(60) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `BAIRRO` varchar(60) DEFAULT NULL,
  `CIDADE` varchar(60) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  PRIMARY KEY (`ID_ENDERECO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_endereco`
--

LOCK TABLES `pes_endereco` WRITE;
/*!40000 ALTER TABLE `pes_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_escola`
--

DROP TABLE IF EXISTS `pes_escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_escola` (
  `ID_ESCOLA` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) NOT NULL,
  `NOME_CONTATO` varchar(60) DEFAULT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `ID_ENDERECO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ESCOLA`),
  KEY `ID_ENDERECO` (`ID_ENDERECO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_escola`
--

LOCK TABLES `pes_escola` WRITE;
/*!40000 ALTER TABLE `pes_escola` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_escola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_info_pessoal`
--

DROP TABLE IF EXISTS `pes_info_pessoal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_info_pessoal` (
  `ID_INFO_PESSOAL` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(30) NOT NULL,
  `SOBRENOME` varchar(45) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `NUM_WPP` varchar(15) DEFAULT NULL,
  `N_RG` varchar(30) DEFAULT NULL,
  `ORG_EMIS` varchar(15) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `DATA_NASC` date DEFAULT NULL,
  `IDADE` int(11) DEFAULT NULL,
  `GENERO` enum('M','F','O') DEFAULT NULL,
  `NOME_RESP` varchar(60) DEFAULT NULL,
  `NUM_RESP` varchar(15) DEFAULT NULL,
  `CPF_RESP` varchar(14) DEFAULT NULL,
  `PARENTESCO` varchar(15) DEFAULT NULL,
  `TIPO_INFO` enum('P','G','A') DEFAULT NULL,
  `ID_ALUNO` int(11) DEFAULT NULL,
  `ID_VOLUNT` int(11) DEFAULT NULL,
  `ID_ENDERECO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_INFO_PESSOAL`),
  KEY `ID_ALUNO` (`ID_ALUNO`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`),
  KEY `ID_ENDERECO` (`ID_ENDERECO`),
  KEY `ID_USUARIO` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_info_pessoal`
--

LOCK TABLES `pes_info_pessoal` WRITE;
/*!40000 ALTER TABLE `pes_info_pessoal` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_info_pessoal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_presenca`
--

DROP TABLE IF EXISTS `pes_presenca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_presenca` (
  `ID_PRESENCA` int(11) NOT NULL AUTO_INCREMENT,
  `DATA_PRESENCA` int(11) NOT NULL,
  `AULA` varchar(10) NOT NULL,
  `PRESENCA` enum('P','F','J') NOT NULL,
  `JUSTIFICATIVA` varchar(120) DEFAULT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRESENCA`),
  KEY `ID_ALUNO` (`ID_ALUNO`),
  KEY `ID_USUARIO` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_presenca`
--

LOCK TABLES `pes_presenca` WRITE;
/*!40000 ALTER TABLE `pes_presenca` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_presenca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_setor`
--

DROP TABLE IF EXISTS `pes_setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_setor` (
  `ID_SETOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) NOT NULL,
  `DISPONIBILIDADE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SETOR`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_setor`
--

LOCK TABLES `pes_setor` WRITE;
/*!40000 ALTER TABLE `pes_setor` DISABLE KEYS */;
INSERT INTO `pes_setor` VALUES (1,'Diretoria de T.I. e Estatística',1),(2,'Diretoria Discente',1),(3,'Diretoria Docente',1),(4,'Diretoria de Capitação e Gestão Financeira',1),(5,'Presidência',0);
/*!40000 ALTER TABLE `pes_setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_setor_gestao`
--

DROP TABLE IF EXISTS `pes_setor_gestao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_setor_gestao` (
  `ID_SETOR_GESTAO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SETOR` int(11) NOT NULL,
  `ID_VOLUNT` int(11) NOT NULL,
  `OPCAO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_SETOR_GESTAO`),
  KEY `ID_SETOR` (`ID_SETOR`),
  KEY `ID_VOLUNT` (`ID_VOLUNT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_setor_gestao`
--

LOCK TABLES `pes_setor_gestao` WRITE;
/*!40000 ALTER TABLE `pes_setor_gestao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_setor_gestao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_turma`
--

DROP TABLE IF EXISTS `pes_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_turma` (
  `ID_TURMA` int(11) NOT NULL AUTO_INCREMENT,
  `ANO` int(11) NOT NULL,
  `NUM_TURMA` char(2) NOT NULL,
  PRIMARY KEY (`ID_TURMA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_turma`
--

LOCK TABLES `pes_turma` WRITE;
/*!40000 ALTER TABLE `pes_turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_usuario`
--

DROP TABLE IF EXISTS `pes_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` char(1) NOT NULL,
  `SENHA` varchar(256) NOT NULL,
  `USUARIO` varchar(256) NOT NULL UNIQUE,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_usuario`
--

LOCK TABLES `pes_usuario` WRITE;
/*!40000 ALTER TABLE `pes_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pes_volunt`
--

DROP TABLE IF EXISTS `pes_volunt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pes_volunt` (
  `ID_VOLUNT` int(11) NOT NULL AUTO_INCREMENT,
  `CHAVE` varchar(64) DEFAULT NULL,
  `CONFIRMADO` tinyint(1) DEFAULT NULL,
  `CONTRATADO` tinyint(1) DEFAULT NULL,
  `MOTIVACAO` varchar(1000) DEFAULT NULL,
  `COMO_CONTR` varchar(1000) DEFAULT NULL,
  `MOTIVO_OPCAO` varchar(1000) DEFAULT NULL,
  `MOTIVO_EDUCACAO` varchar(1000) DEFAULT NULL,
  `EXP_VOLUNTARIO` varchar(1000) DEFAULT NULL,
  `ESTUDANTE` tinyint(1) NOT NULL,
  `OCUPACAO` varchar(60) DEFAULT NULL,
  `TIPO_VOLUNTARIO` enum('G','P') DEFAULT NULL,
  `DISP_SEMANAL` varchar(15) DEFAULT NULL,
  `REL_PES` varchar(60) DEFAULT NULL,
  `FASE` int(11) DEFAULT NULL,
  `MATRICULA` int(11) DEFAULT NULL,
  `ID_CARGO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_CURSO` int(11) DEFAULT NULL,
  `ID_DISCIPLINA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_VOLUNT`),
  KEY `ID_CARGO` (`ID_CARGO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_CURSO` (`ID_CURSO`),
  KEY `ID_DISCIPLINA` (`ID_DISCIPLINA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pes_volunt`
--

LOCK TABLES `pes_volunt` WRITE;
/*!40000 ALTER TABLE `pes_volunt` DISABLE KEYS */;
/*!40000 ALTER TABLE `pes_volunt` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-05  2:06:14
