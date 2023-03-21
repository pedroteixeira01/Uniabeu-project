CREATE DATABASE cdcdia;
USE cdcdia;

DROP TABLE IF EXISTS `colegio`;
CREATE TABLE `colegio` (
  `idcolegio` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(130) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcolegio`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

#
# Data for table "colegio"
#

INSERT INTO `colegio` VALUES (1,'Facultad de la defensa nacional (FADENA)',1),(2,'Escuela de Altos Estudios Nacionales (EAEN)',2),(3,'Escuela Superior de Guerra (ESG)',3),(4,'Academia Nacional de Estudios PolÃ­ticos y EstratÃ©gicos (ANEPE)',4),(5,'Escuela Superior de Guerra (ESDEG)',5),(6,'Academia de Defensa Militar Conjunta (ADEMIC)',6),(7,'Colegio de Altos Estudios EstratÃ©gicos (CAEE)',7),(8,'Centro Superior de Estudios de la Defensa Nacional (CESEDEN)',8),(9,'Comando Superior de EducaciÃ³n del EjÃ©rcito (COSEDE)',9),(10,'Colegio de Defensa Nacional',10),(11,'Colegio de Defensa Nacional (CODENAL)',11),(12,'Centro de Estudios Superiores Navales (CESNAV)',11),(13,'Centro Superior de Estudios Militares del EjÃ©rcito (CSEM)',12),(14,'Institutos de Altos Estudios EstratÃ©gicos (IAEE)',13),(15,'Centro de Altos Estudios Nacionales (CAEN)',14),(16,'Instituto de Defesa Nacional (IDN)',15),(17,'Escuela de Graduados de Altos Estudios EstratÃ©gicos (EGAEE)',16),(18,'Centro de Altos Estudios Nacionales (CALEN)',17),(19,'Instituto de Altos Estudios de la Defensa Nacional (IAEDEN)',18),(20,'teste',4),(21,'COLÃ‰GIO DE DEFENSA NACIONAL DE HONDURAS',10);

#
# Structure for table "cursos"
#

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `idcursos` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcursos`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "cursos"
#

INSERT INTO `cursos` VALUES (1,'CACI','CURSO DE ANÃLISE DE CRISES INTERNACIONAIS'),(2,'CAED','CURSO DE ALTOS ESTUDOS EM DEFESA'),(3,'CMEC','CURSO DE ESTADO-MAIOR CONJUNTO'),(4,'CAD-SUL','CURSO AVANÃ‡ADO DE DEFESA SUL-AMERICANO'),(5,'CAEPE','CURSO DE ALTOS ESTUDOS DE POLÃTICA E ESTRATÃ‰GIA'),(6,'CEMC','CURSO DE ESTADO-MAIOR CONJUNTO'),(7,'CLMN','CURSO DE LOGÃSTICA E MOBILIZAÃ‡ÃƒO NACIONAL'),(8,'CGERD','CURSO DE GESTÃƒO DE RECURSOS DE DEFESA'),(9,'CSD','CURSO SUPERIOR DE DEFESA'),(10,'CSIE','CURSO SUPERIOR DE INTELIGÃŠNCIA ESTRATÃ‰GICA'),(11,'PCESG','PROGRAMA DE EXTENSÃƒO CULTURAL DA ESCOLA SUPERIOR DE GUERRA'),(12,'CDIPLOD','CURSO DE DIPLOMACIA DE DEFESA'),(13,'CDICA','CURSO DE DIREITO INTERNACIONAL DOS CONFLITOS ARMADOS'),(14,'CSUPE','CURSO SUPERIOR DE POLÃTICA E ESTRATÃ‰GIA'),(15,'PAM','PROGRAMA DE ATUALIZAÃ‡ÃƒO DA MULHER');

#
# Structure for table "estado_civil"
#

DROP TABLE IF EXISTS `estado_civil`;
CREATE TABLE `estado_civil` (
  `idestado_civil` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idestado_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "estado_civil"
#

INSERT INTO `estado_civil` VALUES (1,'Solteiro(a)'),(2,'Casado(a)'),(3,'UniÃ£o EstÃ¡vel'),(4,'Desquitado(a)'),(5,'Separado(a)'),(6,'Outro');

#
# Structure for table "evento"
#

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo_evento` int(11) DEFAULT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL,
  PRIMARY KEY (`idevento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "evento"
#

INSERT INTO `evento` VALUES (1,1,'XXIII ConferÃªncia de Diretores de ColÃ©gio de Defesa Ibero-Americanos','2022-01-01','2022-04-01');

#
# Structure for table "fator_rh"
#

DROP TABLE IF EXISTS `fator_rh`;
CREATE TABLE `fator_rh` (
  `idfator_rh` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idfator_rh`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "fator_rh"
#

INSERT INTO `fator_rh` VALUES (1,'A +'),(2,'A -'),(3,'B +'),(4,'B -'),(5,'AB +'),(6,'AB -'),(7,'O +'),(8,'O -'),(9,'TU-');

#
# Structure for table "forca"
#

DROP TABLE IF EXISTS `forca`;
CREATE TABLE `forca` (
  `idforca` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(3) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `imagem_forca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idforca`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "forca"
#

INSERT INTO `forca` VALUES (1,'MB','Marinha do Brasil','forca_marinha.png'),(2,'EB','ExÃ©rcito Brasileiro','forca_exercito.png'),(3,'FAB','ForÃ§a AÃ©rea Brasileira','forca_aeronautica.png'),(4,'CIV','CIVIL','logoAzulClaroEsgFicha.png'),(5,'PM','PolÃ­cia Militar','forcasAuxiliares.png'),(6,'PC','PolÃ­cia Civil','forcasAuxiliares.png'),(7,'CB','Corpo de Bombeiro','forcasAuxiliares.png'),(8,'PF','PolÃ­cia Federal','forcasAuxiliares.png'),(9,'PRF','PolÃ­cia RodoviÃ¡ria Federal','forcasAuxiliares.png');

#
# Structure for table "formacao"
#

DROP TABLE IF EXISTS `formacao`;
CREATE TABLE `formacao` (
  `idregistro` int(11) NOT NULL,
  `idtitulacao` int(11) NOT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `instituicao` varchar(100) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `orientacao` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `ano_ingresso` int(11) DEFAULT NULL,
  `ano_conclusao` varchar(4) DEFAULT NULL,
  `dtreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idregistro`,`idtitulacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "formacao"
#


#
# Structure for table "historico_curso"
#

DROP TABLE IF EXISTS `historico_curso`;
CREATE TABLE `historico_curso` (
  `idregistro` int(11) NOT NULL,
  `idcursos` int(11) NOT NULL,
  `instituicao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `localidade` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch` int(11) DEFAULT NULL,
  `ingresso` int(11) DEFAULT NULL,
  `egresso` int(11) DEFAULT NULL,
  `dtreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idregistro`,`idcursos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "historico_curso"
#

INSERT INTO `historico_curso` VALUES (16391,11,'ESG','Rio de Janeiro',164,2018,2018,'2019-04-19 11:33:27'),(16466,5,'ESG','Rio de Janeiro',1000,2018,2018,'2019-04-22 16:06:35'),(16466,9,'ESG','Rio de Janeiro',250,2018,2018,'2019-04-22 16:06:35');

#
# Structure for table "idioma"
#

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE `idioma` (
  `ididioma` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ididioma`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

#
# Data for table "idioma"
#

INSERT INTO `idioma` VALUES (1,'ALEMÃƒO'),(2,'AMÃRICA'),(3,'ÃRABE'),(4,'ASSAMÃŠS'),(5,'AWADHI'),(6,'AZERI'),(7,'BALÃšCHI'),(8,'BENGALI'),(9,'BHOJPURI'),(10,'BIELORRUSSO'),(11,'BIRMANÃŠS'),(12,'CANARÃŠS'),(13,'CAZAQUE'),(14,'CEBUANO'),(15,'CHATGAYA'),(16,'CHHATTISGARHI'),(17,'CHONA'),(18,'CINGALÃŠS'),(19,'CINIANJA'),(20,'CONCANI'),(21,'COREANO'),(22,'CRIOULO HAITIANO'),(23,'CURDO'),(24,'DECCANI'),(25,'DHUNDHARI'),(26,'ESPANHOL'),(27,'FRANCÃŠS'),(28,'FULANI'),(29,'GAN'),(30,'GREGO'),(31,'GUZERATE'),(32,'HAKKA'),(33,'HARIANI'),(34,'HAÃšÃ‡A'),(35,'HILIGAYNON'),(36,'HINDI'),(37,'HMONG'),(38,'HOLANDÃŠS'),(39,'HÃšNGARO'),(40,'IGBO'),(41,'ILOCANO'),(42,'INGLÃŠS'),(43,'IORUBÃ'),(44,'ITALIANO'),(45,'JAPONÃŠS'),(46,'JAVANÃŠS'),(47,'JIN'),(48,'KHMER'),(49,'KIRUNDI'),(50,'MADURÃŠS'),(51,'MAGAHI'),(52,'MAITHILI'),(53,'MALAIALA'),(54,'MALAIO'),(55,'MALGAXE'),(56,'MANDARIM'),(57,'MARATI'),(58,'MARVARI'),(59,'MIN BEI'),(60,'MIN DONG'),(61,'MIN NAN'),(62,'MORE'),(63,'NEPALÃŠS'),(64,'ORIÃ'),(65,'OROMO'),(66,'PANJABI'),(67,'PASTÃ“'),(68,'PERSA'),(69,'POLONÃŠS'),(70,'PORTUGUÃŠS'),(71,'QUÃCHUA'),(72,'QUINIARUANDA'),(73,'ROMENO'),(74,'RUSSO'),(75,'SERAIKI'),(76,'SERBO-CROATA'),(77,'SINDI'),(78,'SOMALI'),(79,'SUECO'),(80,'SUNDANÃŠS'),(81,'SYLHETI'),(82,'TAGALO'),(83,'TAILANDÃŠS'),(84,'TÃ‚MIL'),(85,'TCHECO (CHECO)'),(86,'TELUGO'),(87,'TURCO'),(88,'TURCOMANO'),(89,'UCRANIANO'),(90,'UIGUR'),(91,'URDU'),(92,'USBEQUE'),(93,'VIETNAMITA'),(94,'WUÂ '),(95,'XHOSA'),(96,'XIANG'),(97,'YUE'),(98,'ZHUANG'),(99,'ZULU');

#
# Structure for table "inscricao"
#

DROP TABLE IF EXISTS `inscricao`;
CREATE TABLE `inscricao` (
  `idinscricao` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `idevento` int(11) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idinscricao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "inscricao"
#

INSERT INTO `inscricao` VALUES (1,2,1,0,'INSCRITO'),(2,4,1,0,'INSCRITO'),(3,19,1,0,'INSCRITO');

#
# Structure for table "logs"
#

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `idlogs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) DEFAULT NULL,
  `queryexecutada` longtext NOT NULL,
  `dtreg` timestamp NULL DEFAULT NULL,
  `tabela` varchar(50) DEFAULT NULL,
  `acao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idlogs`),
  KEY `idusuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "logs"
#

INSERT INTO `logs` VALUES (1,NULL,'insert into programacao(data_programacao,horario,tema,idcolegio) values( :data_programacao, :horario, :tema, :idcolegio);','2022-01-18 23:11:34','programacao','Inserir'),(2,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,restricao_alimentar=:restricao_alimentar,telefone=:telefone,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha where idusuario= :idusuario','2022-02-19 01:54:19','usuario','Alterar'),(3,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,restricao_alimentar=:restricao_alimentar,telefone=:telefone,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha where idusuario= :idusuario','2022-02-19 01:56:07','usuario','Alterar'),(4,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,restricao_alimentar=:restricao_alimentar,telefone=:telefone,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha where idusuario= :idusuario','2022-02-19 01:57:33','usuario','Alterar'),(5,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,restricao_alimentar=:restricao_alimentar,telefone=:telefone,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha where idusuario= :idusuario','2022-02-19 02:00:01','usuario','Alterar'),(6,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,alergia_medicamento=:alergia_medicamento,restricao_alimentar=:restricao_alimentar,telefone=:telefone,idtema=:idtema,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha, logomarca=:logomarca where idusuario= :idusuario','2022-02-23 11:00:49','inscricao','Alterar'),(7,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,alergia_medicamento=:alergia_medicamento,restricao_alimentar=:restricao_alimentar,telefone=:telefone,idtema=:idtema,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha, logomarca=:logomarca where idusuario= :idusuario','2022-02-24 18:00:32','inscricao','Alterar'),(8,NULL,'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,alergia_medicamento=:alergia_medicamento,restricao_alimentar=:restricao_alimentar,telefone=:telefone,idtema=:idtema,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha, logomarca=:logomarca where idusuario= :idusuario','2022-03-04 11:20:54','inscricao','Alterar');

#
# Structure for table "ocorrencia"
#

DROP TABLE IF EXISTS `ocorrencia`;
CREATE TABLE `ocorrencia` (
  `idocorrencia` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) DEFAULT NULL,
  `idtipo_ocorrencia` int(11) DEFAULT NULL,
  `data_ocorrencia` date DEFAULT NULL,
  `hora_ocorrencia` varchar(5) DEFAULT NULL,
  `idsolucao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idocorrencia`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idtipo_ocorrencia` (`idtipo_ocorrencia`),
  KEY `idsolucao` (`idsolucao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "ocorrencia"
#


#
# Structure for table "pais"
#

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "pais"
#

INSERT INTO `pais` VALUES (1,'Argentina'),(2,'Bolivia'),(3,'Brasil'),(4,'Chile'),(5,'Colombia'),(6,'Ecuador'),(7,'El Salvador'),(8,'EspaÃ±a'),(9,'Guatemala'),(10,'Honduras'),(11,'MÃ©xico'),(12,'Nicaragua'),(13,'Paraguay'),(14,'PerÃº'),(15,'Portugal'),(16,'RepÃºblica Dominicana'),(17,'Uruguay'),(18,'Venezuela'),(19,'Boreal');

#
# Structure for table "perfil"
#

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  `dtreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "perfil"
#

INSERT INTO `perfil` VALUES (1,'ADMINISTRADOR','2018-07-08 11:28:53'),(2,'COLEGIO','2018-07-08 11:31:54'),(3,'PARTICIPANTE','2019-01-07 07:46:07'),(4,'SAÃšDE','2022-02-15 12:35:50');

#
# Structure for table "postograduacao"
#

DROP TABLE IF EXISTS `postograduacao`;
CREATE TABLE `postograduacao` (
  `idposto_graduacao` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(30) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `idforca` int(11) DEFAULT NULL,
  `imagem_posto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idposto_graduacao`),
  KEY `idforca` (`idforca`),
  CONSTRAINT `postograduacao_ibfk_1` FOREIGN KEY (`idforca`) REFERENCES `forca` (`idforca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "postograduacao"
#

INSERT INTO `postograduacao` VALUES (1,NULL,'Marechal',2,'marechal_eb.png'),(2,'Gen Ex','Gen de ExÃ©rcito',2,'gen_exercito_eb.png'),(3,'Gen Div','Gen de DivisÃ£o',2,'gen_divisao_eb.png'),(4,'Gen Brig','Gen de Brigada',2,'gen_brigada_eb.png'),(5,'Cel','Coronel',2,'cel_eb.png'),(6,'Ten Cel','Tenente-Coronel',2,'tc_eb.png'),(7,'Maj','Major',2,'maj_eb.png'),(8,'CapitÃ£o','Cap',2,'cap_eb.png'),(10,'1Âº Ten','1Âº Tenente',2,'1ten_eb.png'),(11,'2Âº Ten','2Âº Tenente',2,'2ten_eb.png'),(12,'ASP','Aspirante',2,'asp_eb.png'),(13,'S Ten','Subtenente',2,'sub_eb.png'),(14,'1Âº Sgt','1Âº Sargento',2,'1sgt_eb.png'),(15,'2Âº Sgt','2Âº Sargento',2,'2sgt__eb.png'),(16,'3Âº Sgt','3Âº Sargento',2,'3sgt_eb.png'),(17,'Cb','Cabo',2,'cb_eb.png'),(18,'Sd Nu B','Soldado',2,NULL),(19,'Outro','Outro',4,NULL);

#
# Structure for table "programacao"
#

DROP TABLE IF EXISTS `programacao`;
CREATE TABLE `programacao` (
  `idprogramacao` int(11) NOT NULL AUTO_INCREMENT,
  `data_programacao` date DEFAULT NULL,
  `horario` varchar(13) DEFAULT NULL,
  `tema` varchar(150) DEFAULT NULL,
  `idcolegio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprogramacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "programacao"
#

INSERT INTO `programacao` VALUES (1,'2022-05-01','10:00 - 12:00','teste\t\t\t\t\t\t\t\r\n                    \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n                    ',16);

#
# Structure for table "publicacao"
#

DROP TABLE IF EXISTS `publicacao`;
CREATE TABLE `publicacao` (
  `idpublicacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idpublicacao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "publicacao"
#

INSERT INTO `publicacao` VALUES (1,'LIVRO'),(2,'ARTIGO'),(3,'CAPÃTULO DE LIVRO'),(4,'APRESENTAÃ‡ÃƒO'),(5,'COAUTORIA EM APRESENTAÃ‡ÃƒO');

#
# Structure for table "situacao"
#

DROP TABLE IF EXISTS `situacao`;
CREATE TABLE `situacao` (
  `idsituacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idsituacao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "situacao"
#

INSERT INTO `situacao` VALUES (1,'LIBERADO'),(2,'RECUSADO'),(3,'AGUARDANDO LIBERAÃ‡ÃƒO');

#
# Structure for table "situacaocurso"
#

DROP TABLE IF EXISTS `situacaocurso`;
CREATE TABLE `situacaocurso` (
  `idsituacao_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idsituacao_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "situacaocurso"
#

INSERT INTO `situacaocurso` VALUES (1,'ATIVO'),(2,'INATIVO');

#
# Structure for table "tema"
#

DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `descricao_es` text,
  PRIMARY KEY (`idtema`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tema"
#

INSERT INTO `tema` VALUES (1,'O CENÃRIO GLOBAL E OS EFEITOS DO COVID-19 NAS ÃREAS DE SEGURANÃ‡A E DEFESA','EL ESCENARIO MUNDIAL Y LOS EFECTOS DEL COVID-19 EN LOS ÃMBITOS DE LA SEGURIDAD Y DEFENSA'),(2,'O PAPEL DAS FORÃ‡AS ARMADAS NO APOIO Ã€S POLÃTICAS ESTATAIS DE SAÃšDE NO COMBATE Ã€ PANDEMIA COVID-19: LIÃ‡Ã•ES APRENDIDAS','EL ROL DE LAS FUERZAS ARMADAS EN APOYO A LAS POLÃTICAS DE SALUD DEL ESTADO EN LA LUCHA CONTRA LA PANDEMIA COVID-19: LECCIONES APRENDIDAS'),(3,'COMO AS FORÃ‡AS ARMADAS SE PREPARAM PARA OS DESAFIOS DE FUTURAS PANDEMIAS: AMEAÃ‡AS ASSIMÃ‰TRICAS DE 2022','CÃ“MO SE PREPARAN LAS FFAA ANTE LOS DESAFÃOS DE LAS FUTURAS PANDEMIAS: AMENAZAS ASIMÃ‰TRICAS DEL 2022');

#
# Structure for table "teste"
#

DROP TABLE IF EXISTS `teste`;
CREATE TABLE `teste` (
  `idusuarios` int(11) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "teste"
#


#
# Structure for table "tipo_evento"
#

DROP TABLE IF EXISTS `tipo_evento`;
CREATE TABLE `tipo_evento` (
  `idtipo_evento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idtipo_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tipo_evento"
#

INSERT INTO `tipo_evento` VALUES (1,'Presencial');

#
# Structure for table "traje"
#

DROP TABLE IF EXISTS `traje`;
CREATE TABLE `traje` (
  `idtraje` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) DEFAULT NULL,
  `idevento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtraje`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "traje"
#

INSERT INTO `traje` VALUES (1,'teste22',1);

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sobrenome` varchar(120) DEFAULT NULL,
  `idcolegio` int(11) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `local_nascimento` varchar(150) DEFAULT NULL,
  `posto_formacao` varchar(120) DEFAULT NULL,
  `cargo_funcao` varchar(120) DEFAULT NULL,
  `num_passaporte` varchar(50) DEFAULT NULL,
  `validade_pass` date DEFAULT NULL,
  `idfator_rh` int(11) DEFAULT NULL,
  `enfermidades` longtext,
  `alergia_medicamento` longtext,
  `restricao_alimentar` longtext,
  `telefone` longtext,
  `exemplares` longtext,
  `dados_voo_ida` longtext,
  `dados_voo_volta` longtext,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `idperfil` int(11) DEFAULT NULL,
  `dtreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idtema` int(11) DEFAULT NULL,
  `logomarca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,NULL,'ADMIN','ADMIN',3,3,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin','IUBjZGNkaWE=',1,'2022-01-17 11:46:32',NULL,NULL),(2,NULL,'Prof. Gonzalo',' Caceres',1,1,'1983-01-02',NULL,'FORMACIÃ“N','CARGO','NÃšMERO DEL PASAPORTE',NULL,7,'                                                                                                                        ENFERMEDADES                                                                                                                                                                                                                     ','','                         RESTRICCIONES                                                                                                                                                          ','                           TELÃ‰FONO                                                                                                                                                                                        ',NULL,NULL,'                      INFORMACIÃ“N                                                                                                                                                                                              ','gonzalo.caceres@undef.edu.ar','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',1,NULL),(3,NULL,'CF Profesor Gustavo','CalderÃ³n Valle',2,2,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gcalderv@gmail.com','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(4,'./foto/2022.03.04-11.20.54_4.jpg','Cel Ricardo','Rodrigues Freire',3,3,'1992-01-02',NULL,'POSTO','CARGO','NÃšMERO ',NULL,7,'Nenhuma','Nenhuma','Massa','',NULL,NULL,'DADOS DO VOO ','ricardo.freire@esg.br','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',1,'./arquivo/2022.03.04-11.20.54_4.png'),(5,NULL,'CapitÃ¡n de NavÃ­o (R) Fernando','Mingram LÃ³pez',4,4,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'secgen@anepe.cl','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(6,NULL,'Mayor Carmen','HernÃ¡ndez Osorio',5,5,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'carmen.hernandez@esdegue.edu.co','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(7,NULL,'Coronel EMT. Avc. Pablo','Maruri Cevallos',6,6,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pmaruri@fae.mil.ec','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(8,NULL,'Licenciada Yansi','Alejandra LÃ³pez Cerritos',7,7,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'lopez.yansi@caee.edu.sv ','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(9,NULL,'Coronel ET. DEM. Carlos','MartÃ­n Fullana',8,8,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'acdia@mde.es','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(10,NULL,'Coronel de CaballerÃ­a DEM JOSÃ‰','LISANDRO DONIS MUÃ‘OZ ',9,9,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cosedecaee@gmail.com','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(11,NULL,'Coronel Mantenimiento de Aviones RaÃºl','HernÃ¡n LÃ³pez Coello',10,10,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'raullopez0074@hotmail.com ','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(12,NULL,'Coronel Julio','Antonio AlarcÃ³n Zamora',11,11,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'iyd.cdn@udefa.edu.mx ','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(13,NULL,'CN. Eusebio','Mendoza',12,11,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'rubenemendoza8@gmail.com','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(14,NULL,'Cnel DCEM Carlos','Gustavo BazÃ¡n Barrios',14,13,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pmpcen@iaee.edu.py;  ','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(15,NULL,'Coronel EP (r) y Mg. Javier','Trelles Vizquerra',15,14,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jefe.relacionesinterinstitucionales@caen.edu.pe','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(16,NULL,'Coronel Jorge','Costa Campos',16,15,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jorge.campos@defesa.pt','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(17,NULL,'Col. (FARD) Luis','Collado Kelmes',17,16,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Luiscollado@egae.mil.do','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(18,NULL,'Dr. Santiago','NÃºÃ±ez Castro ',18,17,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calen.subdtoracad@mdn.gub.uy ','IUAjY2RjZGlh',2,'2022-02-18 16:41:11',NULL,NULL),(19,NULL,'MARIANNA','ELIZABETH MONCADA ESPINAL',21,10,NULL,NULL,'SUBTENIENTE',NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cdndrrii@ffaa.mil.hn','IUAjY2RjZGlh',2,'2022-03-18 13:32:04',1,NULL);
