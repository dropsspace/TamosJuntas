-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para dbempodera
CREATE DATABASE IF NOT EXISTS `dbempodera` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_latvian_ci */;
USE `dbempodera`;

-- Copiando estrutura para tabela dbempodera.tbconclusao
CREATE TABLE IF NOT EXISTS `tbconclusao` (
  `IDConclusao` int(11) NOT NULL AUTO_INCREMENT,
  `idUso` int(11) NOT NULL DEFAULT '0',
  `idtpViolencia` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDConclusao`),
  KEY `FK_tbconclusao_tbuso` (`idUso`),
  KEY `FK_tbconclusao_tbtipoviolencia` (`idtpViolencia`),
  CONSTRAINT `FK_tbconclusao_tbtipoviolencia` FOREIGN KEY (`idtpViolencia`) REFERENCES `tbtipoviolencia` (`IDtpViolencia`),
  CONSTRAINT `FK_tbconclusao_tbuso` FOREIGN KEY (`idUso`) REFERENCES `tbuso` (`IDuso`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbempodera.tbconclusao: ~50 rows (aproximadamente)
/*!40000 ALTER TABLE `tbconclusao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbconclusao` ENABLE KEYS */;

-- Copiando estrutura para tabela dbempodera.tbpergunta
CREATE TABLE IF NOT EXISTS `tbpergunta` (
  `IDpergunta` int(11) NOT NULL AUTO_INCREMENT,
  `IDtpViolencia` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `tpResposta` enum('R','C') NOT NULL COMMENT 'Radio, Checkbox',
  PRIMARY KEY (`IDpergunta`),
  KEY `FK_tbpergunta_tbtipoviolencia` (`IDtpViolencia`),
  CONSTRAINT `FK_tbpergunta_tbtipoviolencia` FOREIGN KEY (`IDtpViolencia`) REFERENCES `tbtipoviolencia` (`IDtpViolencia`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1 COMMENT='Perguntas apresentadas pelo Sistema';

-- Copiando dados para a tabela dbempodera.tbpergunta: ~57 rows (aproximadamente)
/*!40000 ALTER TABLE `tbpergunta` DISABLE KEYS */;
INSERT INTO `tbpergunta` (`IDpergunta`, `IDtpViolencia`, `pergunta`, `tpResposta`) VALUES
	(1, 3, ' Seu companheiro/a já te:', 'C'),
	(2, 3, 'Seu companheiro/a já te:', 'C'),
	(3, 3, 'Seu companheiro/a já', 'C'),
	(4, 3, 'Seu companheiro/a já te obrigou a utilizar:', 'C'),
	(7, 5, 'Seu companheiro/a impede que você estude?', 'R'),
	(9, 5, 'Seu companheiro/a impede que você trabalhe?', 'R'),
	(10, 5, 'Seu companheiro/a controla com quem você anda no trabalho?', 'R'),
	(12, 5, 'Seu companheiro/a faz várias ligações durante o dia para garantir que você está onde disse que estaria?', 'R'),
	(13, 5, 'Seu companheiro/a controla:', 'C'),
	(14, 5, ' Seu companheiro/a faz várias ligações durante o dia para garantir que você está onde disse que estaria?', 'R'),
	(15, 5, 'Seu companheiro/a já vasculhou ', 'C'),
	(19, 5, 'Seu companheiro/a tem ciúmes excessivos de seus amigos ou parentes? ', 'R'),
	(20, 5, 'Seu companheiro/a constrange você na frente dos amigos ou da família?', 'R'),
	(21, 5, 'Seu companheiro/a diminui suas conquistas? ', 'R'),
	(22, 5, 'Seu companheiro/a ', 'C'),
	(23, 5, 'Seu companheiro/a usa como desculpa, as drogas e álcool, para dizer coisas indelicadas?', 'R'),
	(27, 5, 'Seu companheiro/a evita ou proíbe que você', 'C'),
	(32, 5, 'Seu companheiro/a já a ameaçou caso rompesse o relacionamento? \r\n', 'R'),
	(33, 5, 'Seu companheiro/a transmite a sensação de que não há como sair do relacionamento?', 'R'),
	(34, 5, 'Seu companheiro/a desconsidera sua opinião ou decisão?', 'R'),
	(35, 5, 'Seu companheiro/a já te prendeu em casa alguma vez?', 'R'),
	(36, 5, 'Seu companheiro/a já te fez pensar que está ficando louca ou confusa? ', 'R'),
	(37, 5, 'Seu companheiro/a já te fez sentir culpada por algo?  ', 'R'),
	(38, 2, 'Seu companheiro/a se nega a utilizar preservativo?', 'R'),
	(39, 2, 'Seu companheiro/a já te forçou a assistir pornografia? ', 'R'),
	(40, 2, 'Seu companheiro/a faz pressão para ter relações sexuais, mesmo que você não queira?', 'R'),
	(41, 2, 'Seu companheiro/a  já te forçou a realizar práticas sexuais que causam desconforto ou nojo? ', 'R'),
	(42, 2, 'Seu companheiro/a te proíbe de: ', 'C'),
	(43, 2, 'Seu companheiro/a já te', 'C'),
	(44, 2, 'Seu companheiro/a já te forçou a ter relações sexuais com outras pessoas? ', 'R'),
	(47, 1, 'Seu companheiro/a  já se apropriou de \r\n', 'C'),
	(48, 1, 'Seu companheiro/a  já quebrou bens pessoais teus propositalmente?\r\n', 'R'),
	(49, 1, 'Seu companheiro/a  já estragou seus instrumentos de trabalho? ', 'R'),
	(50, 1, 'Seu companheiro/a já escondeu bens pessoais teus?\r\n', 'R'),
	(52, 1, 'Seu companheiro/a  já vendeu algo de sua propriedade sem te consultar? \r\n', 'R'),
	(53, 4, 'Seu companheiro/a já', 'C'),
	(55, 4, 'Seu companheiro/a  já ameaçou disseminar suas fotos ou seus vídeos pessoais?', 'R'),
	(56, 4, 'Seu companheiro/a  já expôs fotos ou vídeos seus na internet sem sua permissão?', 'R'),
	(57, 5, 'Seu companheiro já falou que ninguém nunca vai te amar, te aceitar ou te querer além dele?', 'R'),
	(58, 6, 'Seu companheiro/a fala que  você tem sorte por ele querer estar em um relacionamento  com você? ', 'R'),
	(59, 6, 'Seu companheiro/a reage negativamente à suas conquistas e às coisas boas que acontecem na sua vida? ', 'R'),
	(60, 6, 'Seu companheiro/a fala que em briga de casal outras pessoas não devem interferir? ', 'R'),
	(61, 6, 'Seu companheiro/a fala que seus problemas são "coisa de casal" e que não devem ser compartilhados com amigos ou com a sua família?\r\n', 'R'),
	(62, 6, 'Seu companheiro/a desconta a agressividade batendo em mesas, portas e outros objetos.\r\n', 'R'),
	(64, 6, 'O humor do seu companheiro/a muda de agressivo e abusivo para uma aparência humilde, desculpando-se e tornando-se uma pessoa amorosa depois que o abuso aconteceu?', 'R'),
	(65, 6, 'Seu companheiro/a já te encheu de presentes após ser violento/agressivo com você? ', 'R'),
	(66, 5, 'Seu companheiro/a te desmotiva a conquistar seus sonhos?', 'R'),
	(67, 6, 'Seu companheiro/a já se sentiu incomodado com você estudar? ', 'R'),
	(68, 6, 'Seu companheiro/a já se sentiu incomodado com você trabalhar? ', 'R'),
	(69, 6, 'Seu companheiro/a diz que você não é nada sem ele ou que ele não é nada sem você?', 'R'),
	(70, 6, 'Você sente que precisa pedir permissão para seu companheiro/a  para sair sozinha? ', 'R'),
	(71, 6, 'Seu companheiro/a costuma fazer com que você se sinta mal?', 'R'),
	(72, 6, 'Seu companheiro/a diz que roupas você não pode usar? ', 'R'),
	(73, 3, 'Seu companheiro/a já te:', 'C'),
	(74, 3, 'Seu companheiro/a já', 'C'),
	(75, 5, 'Seu companheiro/a controla:', 'C'),
	(76, 5, 'Seu companheiro/a usa seus filhos como chantagem?', 'R');
/*!40000 ALTER TABLE `tbpergunta` ENABLE KEYS */;

-- Copiando estrutura para tabela dbempodera.tbresposta
CREATE TABLE IF NOT EXISTS `tbresposta` (
  `IDresposta` int(11) NOT NULL AUTO_INCREMENT,
  `IDpergunta` int(11) NOT NULL,
  `resposta` varchar(155) DEFAULT NULL,
  `simnao` char(3) DEFAULT NULL,
  PRIMARY KEY (`IDresposta`),
  KEY `FK_tbresposta_tbpergunta` (`IDpergunta`),
  CONSTRAINT `FK_tbresposta_tbpergunta` FOREIGN KEY (`IDpergunta`) REFERENCES `tbpergunta` (`IDpergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbempodera.tbresposta: ~129 rows (aproximadamente)
/*!40000 ALTER TABLE `tbresposta` DISABLE KEYS */;
INSERT INTO `tbresposta` (`IDresposta`, `IDpergunta`, `resposta`, `simnao`) VALUES
	(1, 1, 'empurrou', NULL),
	(2, 1, 'chutou', NULL),
	(4, 1, 'beliscou', NULL),
	(5, 73, 'queimou', NULL),
	(6, 73, 'agarrou fortemente', NULL),
	(7, 2, 'cortou', NULL),
	(9, 2, 'furou', NULL),
	(10, 2, 'deu um tapa', NULL),
	(12, 73, 'ameaçou com algum objeto', NULL),
	(13, 3, 'atirou objetos contra você', NULL),
	(15, 3, 'puxou seus cabelos', NULL),
	(16, 3, 'tentou te estrangular', NULL),
	(17, 74, 'te puxou pela roupa com força', NULL),
	(18, 74, 'te segurou pelo braço com força', NULL),
	(20, 4, 'bebidas', NULL),
	(21, 4, 'drogas', NULL),
	(22, 4, 'remédios', NULL),
	(23, 75, 'os lugares que você frequenta', NULL),
	(24, 13, 'o horário que você chega em casa', NULL),
	(26, 75, 'as atividades que você realiza', NULL),
	(27, 13, 'o que você veste', NULL),
	(28, 13, 'seu corte ou cor do cabelo', NULL),
	(29, 12, NULL, 'Não'),
	(30, 7, NULL, 'Não'),
	(31, 10, NULL, 'Sim'),
	(33, 9, NULL, 'Não'),
	(34, 14, NULL, 'Não'),
	(35, 15, 'seu celular', NULL),
	(36, 15, 'suas redes sociais', NULL),
	(37, 15, 'suas coisas', NULL),
	(38, 19, NULL, 'Não'),
	(39, 20, NULL, 'Não'),
	(40, 21, NULL, 'Não'),
	(41, 22, 'te xinga', NULL),
	(42, 22, 'grita com você', NULL),
	(43, 22, 'te chama com palavrões', NULL),
	(45, 23, NULL, 'Não'),
	(46, 27, 'faça  coisas que gosta', NULL),
	(48, 27, 'tenha contato com sua família ou amigos', NULL),
	(49, 27, 'pratique sua religião', NULL),
	(50, 32, NULL, 'Não'),
	(51, 33, NULL, 'Não'),
	(52, 34, NULL, 'Não'),
	(53, 35, NULL, 'Não'),
	(54, 38, NULL, 'Não'),
	(55, 39, NULL, 'Não'),
	(56, 40, NULL, 'Não'),
	(57, 41, NULL, 'Não'),
	(58, 42, 'ir ao ginecologista', NULL),
	(59, 42, 'de usar métodos contraceptivos (pílula anticoncepcional, injeção anticoncepcional, DIU, SIU)', NULL),
	(60, 43, 'proibiu de fazer laqueadura', NULL),
	(61, 43, 'pressionou a engravidar', NULL),
	(62, 43, 'pressionou a realizar um aborto ', NULL),
	(63, 44, NULL, 'Não'),
	(65, 47, 'seus bens materiais', NULL),
	(66, 47, 'seu salário', NULL),
	(67, 47, 'sua conta bancária', NULL),
	(68, 48, NULL, 'Não'),
	(69, 49, NULL, 'Não'),
	(70, 50, NULL, 'Não'),
	(71, 52, NULL, 'Não'),
	(72, 53, 'inventou histórias ao seu respeito', NULL),
	(73, 53, 'disseminou mentiras que a envergonhasse', NULL),
	(74, 53, 'expôs histórias falsas sobre você nas redes sociais', NULL),
	(75, 57, NULL, 'Não'),
	(76, 59, NULL, 'Não'),
	(77, 58, NULL, 'Não'),
	(78, 60, NULL, 'Não'),
	(79, 61, NULL, 'Não'),
	(80, 62, NULL, 'Não'),
	(81, 64, NULL, 'Não'),
	(82, 65, NULL, 'Não'),
	(83, 66, NULL, 'Não'),
	(84, 67, NULL, 'Não'),
	(85, 68, NULL, 'Não'),
	(86, 69, NULL, 'Não'),
	(87, 70, NULL, 'Não'),
	(88, 71, NULL, 'Não'),
	(89, 72, NULL, 'Não'),
	(90, 56, NULL, 'Não'),
	(91, 12, NULL, 'Sim'),
	(92, 7, NULL, 'Sim'),
	(93, 10, NULL, 'Não'),
	(95, 9, NULL, 'Sim'),
	(96, 14, NULL, 'Sim'),
	(97, 19, NULL, 'Sim'),
	(98, 20, NULL, 'Sim'),
	(99, 21, NULL, 'Sim'),
	(101, 23, NULL, 'Sim'),
	(102, 32, NULL, 'Sim'),
	(103, 33, NULL, 'Sim'),
	(104, 34, NULL, 'Sim'),
	(105, 35, NULL, 'Sim'),
	(106, 38, NULL, 'Sim'),
	(107, 39, NULL, 'Sim'),
	(108, 40, NULL, 'Sim'),
	(109, 41, NULL, 'Sim'),
	(110, 44, NULL, 'Sim'),
	(111, 48, NULL, 'Sim'),
	(112, 49, NULL, 'Sim'),
	(113, 50, NULL, 'Sim'),
	(114, 52, NULL, 'Sim'),
	(115, 57, NULL, 'Sim'),
	(116, 59, NULL, 'Sim'),
	(117, 58, NULL, 'Sim'),
	(118, 60, NULL, 'Sim'),
	(119, 61, NULL, 'Sim'),
	(120, 62, NULL, 'Sim'),
	(121, 64, NULL, 'Sim'),
	(122, 65, NULL, 'Sim'),
	(123, 66, NULL, 'Sim'),
	(124, 67, NULL, 'Sim'),
	(125, 68, NULL, 'Sim'),
	(126, 69, NULL, 'Sim'),
	(127, 70, NULL, 'Sim'),
	(128, 71, NULL, 'Sim'),
	(129, 72, NULL, 'Sim'),
	(130, 56, NULL, 'Sim'),
	(131, 42, 'de usar métodos contraceptivos (camisinha feminina ou masculina, diafragma) ', NULL),
	(132, 37, NULL, 'Não'),
	(133, 37, NULL, 'Sim'),
	(134, 55, NULL, 'Não'),
	(135, 55, NULL, 'Sim'),
	(136, 36, NULL, 'Não'),
	(137, 36, NULL, 'Sim'),
	(139, 74, 'ameaçou com armas de fogo', NULL),
	(140, 75, 'o tempo que você pode sair', NULL),
	(141, 76, NULL, 'Não'),
	(142, 76, NULL, 'Sim');
/*!40000 ALTER TABLE `tbresposta` ENABLE KEYS */;

-- Copiando estrutura para tabela dbempodera.tbresultadoresposta
CREATE TABLE IF NOT EXISTS `tbresultadoresposta` (
  `IdResultadoResposta` int(10) NOT NULL AUTO_INCREMENT,
  `IdUso` int(10) NOT NULL DEFAULT '0',
  `IdResposta` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdResultadoResposta`),
  KEY `FK__tbuso` (`IdUso`),
  KEY `FK__tbresposta` (`IdResposta`),
  CONSTRAINT `FK__tbresposta` FOREIGN KEY (`IdResposta`) REFERENCES `tbresposta` (`IDresposta`),
  CONSTRAINT `FK__tbuso` FOREIGN KEY (`IdUso`) REFERENCES `tbuso` (`IDuso`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbempodera.tbresultadoresposta: ~499 rows (aproximadamente)
/*!40000 ALTER TABLE `tbresultadoresposta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbresultadoresposta` ENABLE KEYS */;

-- Copiando estrutura para tabela dbempodera.tbtipoviolencia
CREATE TABLE IF NOT EXISTS `tbtipoviolencia` (
  `IDtpViolencia` int(11) NOT NULL AUTO_INCREMENT,
  `tpViolencia` varchar(23) NOT NULL,
  PRIMARY KEY (`IDtpViolencia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbempodera.tbtipoviolencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbtipoviolencia` DISABLE KEYS */;
INSERT INTO `tbtipoviolencia` (`IDtpViolencia`, `tpViolencia`) VALUES
	(1, 'patrimonial'),
	(2, 'sexual'),
	(3, 'física'),
	(4, 'moral '),
	(5, 'psicológica'),
	(6, 'relacionamento de risco'),
	(7, 'relacionamento saudável');
/*!40000 ALTER TABLE `tbtipoviolencia` ENABLE KEYS */;

-- Copiando estrutura para tabela dbempodera.tbuso
CREATE TABLE IF NOT EXISTS `tbuso` (
  `IDuso` int(11) NOT NULL AUTO_INCREMENT,
  `dataAcesso` datetime NOT NULL,
  `filhos` enum('0','1') NOT NULL COMMENT '0 = Não 1= Sim',
  `estuda` enum('0','1') NOT NULL,
  `trabalha` enum('0','1') NOT NULL,
  `tpRelacionamento` enum('0','1') DEFAULT NULL COMMENT '0=Hetero 1=Homo',
  PRIMARY KEY (`IDuso`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbempodera.tbuso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbuso` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbuso` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
