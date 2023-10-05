-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2023 às 20:24
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faculdade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `class`
--

INSERT INTO `class` (`id_class`, `id_curso`, `id_teacher`) VALUES
(3, 1, NULL),
(4, 2, NULL),
(5, 3, 12),
(6, 4, NULL),
(7, 5, NULL),
(8, 6, 8),
(9, 7, 10),
(10, 8, 13),
(11, 9, 14),
(12, 10, 15),
(23, 30, NULL),
(24, 31, 0),
(25, 32, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `curso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`) VALUES
(1, 'Matemática'),
(2, 'Física'),
(3, 'Química'),
(4, 'Biologia'),
(5, 'História'),
(6, 'Geografia'),
(7, 'Inglês'),
(8, 'Economia'),
(9, 'Literatura'),
(10, 'Computação'),
(30, 'Letras'),
(31, 'Advocacia'),
(32, 'Programação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id_permissao` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `permissoes`
--

INSERT INTO `permissoes` (`id_permissao`, `tipo`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'students');

-- --------------------------------------------------------

--
-- Estrutura para tabela `smateria`
--

CREATE TABLE `smateria` (
  `id_materia` int(11) NOT NULL,
  `id_class` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `smateria`
--

INSERT INTO `smateria` (`id_materia`, `id_class`, `id_aluno`) VALUES
(1, 7, 3),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password_hash` varchar(250) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `id_permissoes` int(11) DEFAULT NULL,
  `img` longblob DEFAULT NULL,
  `status_user` varchar(10) DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni`, `email`, `password_hash`, `nome`, `apelido`, `endereco`, `nascimento`, `id_permissoes`, `img`, `status_user`) VALUES
(1, '123456789', 'admin@admin', 'admin', 'administrador', 'admin', 'Nishi no Miyako, 97', '2023-09-02', 1, NULL, 'activo'),
(2, '987654321', 'teacher@teacher', 'teacher', 'professor', 'prof', 'rua Coruja 14', '2023-09-01', 2, NULL, 'activo'),
(3, '147852368', 'alumnos@alumnos', 'alumnos', 'alunos', 'alunos', 'corujinha', '2023-08-10', 3, NULL, 'activo'),
(8, '807507837-3', 'civons0@unblog.fr', 'iZ7\'ot8WPR?x\'C)', 'Clemente Ivons', 'civons0', 'PO Box 67841', '2023-10-04', 2, NULL, 'activo'),
(9, '041855264-9', 'emarven1@ucoz.ru', 'dL3}2w1#Y`F', 'Ermengarde Marven', 'emarven1', '12th Floor', '2023-10-04', 2, NULL, 'activo'),
(10, '841576081-7', 'bpendall2@cnn.com', 'mS5%n&pr6G9X*(', 'Beatriz Pendall', 'bpendall2', 'Suite 56', '2023-10-22', 2, NULL, 'activo'),
(11, '477335053-9', 'lmccoy3@salon.com', 'tX4|6Pf`aNS=68', 'Lynnelle McCoy', 'lmccoy3', 'Apt 1120', '2022-06-08', 2, NULL, 'activo'),
(12, '540530102-7', 'abeardsworth4@newyorker.com', 'wC0}hl4v_fRZqK1', 'Anastassia Beardsworth', 'abeardsworth4', '6th Floor', '2023-05-15', 2, NULL, 'activo'),
(13, '953608108-3', 'tveljes5@techcrunch.com', 'dV4/$h)jmr', 'Thorn Veljes', 'tveljes5', 'Room 101', '2023-10-04', 2, NULL, 'activo'),
(14, '204486163-1', 'pungerer6@sina.com.cn', 'gH73|4G}CO7S', 'Phelia Ungerer', 'pungerer6', 'PO Box 47979', '2023-02-06', 2, NULL, 'activo'),
(15, '653763062-2', 'afernihough7@ed.gov', 'bK6$uSktptsO?)A@', 'Anabella Fernihough', 'afernihough7', '7th Floor', '2023-04-20', 2, NULL, 'activo'),
(16, '783956280-9', 'jdrynan8@deviantart.com', 'xY8DOf1', 'Jehanna Drynan', 'jdrynan8', 'Apt 296', '2024-04-04', 2, NULL, 'activo'),
(17, '419261807-9', 'smorrant9@archive.org', 'lY0)<SEQB', 'Sigrid Morrant', 'smorrant9', 'Suite 87', '0000-00-00', 3, NULL, 'activo'),
(18, '821351819-5', 'troskillya@answers.com', 'rR1|~\"XB<}', 'Tracie Roskilly', 'troskillya', 'Suite 91', '0000-00-00', 3, NULL, 'activo'),
(19, '423532999-5', 'alangrickb@examiner.com', 'wY6>\"Nf}{4H1\"', 'Alvin Langrick', 'alangrickb', 'Suite 26', '0000-00-00', 3, NULL, 'activo'),
(20, '544606708-8', 'bpechac@lycos.com', 'wH7*=s(8', 'Bianca Pecha', 'bpechac', 'PO Box 8776', '0000-00-00', 3, NULL, 'activo'),
(21, '158619506-9', 'tmoffettd@wisc.edu', 'rB1)|lm3S*Ub>)A', 'Tedd Moffett', 'tmoffettd', 'Apt 1101', '0000-00-00', 3, NULL, 'activo'),
(22, '653408355-8', 'urudolfere@amazonaws.com', 'uX7/bz+aj', 'Ursala Rudolfer', 'urudolfere', 'Apt 1025', '0000-00-00', 3, NULL, 'activo'),
(23, '278146972-6', 'cguernerf@weebly.com', 'kF1.{d,Sx', 'Chrissie Guerner', 'cguernerf', 'Room 155', NULL, 3, NULL, 'activo'),
(24, '681388766-1', 'pbonhommeg@cbslocal.com', 'gC6#4FT+!', 'Prudy Bonhomme', 'pbonhommeg', 'PO Box 32980', NULL, 3, NULL, 'activo'),
(25, '887387591-2', 'cnoteyoungh@tmall.com', 'gL9/|h1\"r>2', 'Claudell Noteyoung', 'cnoteyoungh', 'Room 909', NULL, 3, NULL, 'activo'),
(26, '286034892-1', 'keakini@icio.us', 'cG4|0/j', 'Kaela Eakin', 'keakini', '5th Floor', NULL, 3, NULL, 'activo'),
(27, '292135184-6', 'eorrisj@tinyurl.com', 'pN4.g4Lg3Mi|%`', 'Eustacia Orris', 'eorrisj', 'Apt 1568', NULL, 3, NULL, 'activo'),
(28, '673502210-6', 'hsturdyk@blogspot.com', 'mW3=7a\",NkXbn/g', 'Holly Sturdy', 'hsturdyk', 'Suite 92', NULL, 3, NULL, 'activo'),
(29, '521361439-6', 'jmacguinessl@seattletimes.com', 'aV3)e*i1QVw&.o', 'Johny MacGuiness', 'jmacguinessl', '10th Floor', NULL, 3, NULL, 'activo'),
(30, '845678606-3', 'ltrewm@1und1.de', 'qF9<Y\'6lGnTF>Y*', 'Lane Trew', 'ltrewm', '8th Floor', NULL, 3, NULL, 'activo'),
(31, '145785564-X', 'mdavillen@google.co.jp', 'qT7{og\'4J~%fM1j\"', 'Maisey Daville', 'mdavillen', 'PO Box 235', NULL, 3, NULL, 'activo'),
(32, '389013180-8', 'frosenboimo@google.com.au', 'pT6+o/FrnQWma|o', 'Flss Rosenboim', 'frosenboimo', 'PO Box 89417', NULL, 3, NULL, 'activo'),
(33, '946710049-5', 'rmacgrathp@ca.gov', 'kO0j&a\"W`L', 'Roseanne MacGrath', 'rmacgrathp', '5th Floor', NULL, 3, NULL, 'activo'),
(34, '678962801-0', 'jgilffillanq@taobao.com', 'mG3?jrSX\"m', 'Jamal Gilffillan', 'jgilffillanq', 'PO Box 21711', NULL, 3, NULL, 'activo'),
(35, '516647763-4', 'hhadawayr@adobe.com', 'xB8(vT/g..', 'Hugh Hadaway', 'hhadawayr', 'Suite 86', NULL, 3, NULL, 'activo'),
(36, '742098209-0', 'sstortons@mtv.com', 'bG2@4|AZo', 'Sydel Storton', 'sstortons', 'Suite 30', NULL, 3, NULL, 'activo'),
(37, '532337644-9', 'pcisect@example.com', 'yO9+H*}M#L%', 'Parker Cisec', 'pcisect', 'Suite 67', NULL, 3, NULL, 'activo'),
(38, '741680853-7', 'aenneveru@mashable.com', 'hR8_dNJ{sWRWA', 'Abbye Ennever', 'aenneveru', 'Apt 216', NULL, 3, NULL, 'activo'),
(39, '377254657-9', 'hbroadleyv@mlb.com', 'aE8\"y&)SqV4', 'Horacio Broadley', 'hbroadleyv', 'Room 1782', NULL, 3, NULL, 'activo'),
(40, '246910112-3', 'adeportew@sourceforge.net', 'mA9@OxjJGAw{', 'Alexio Deporte', 'adeportew', 'Suite 53', NULL, 3, NULL, 'activo'),
(41, '261245926-X', 'rbragax@vimeo.com', 'zQ7*$z`<9c4p9|A', 'Roosevelt Braga', 'rbragax', '9th Floor', NULL, 3, NULL, 'activo'),
(42, '042400063-6', 'abollandy@toplist.cz', 'kN1<={(=Z)', 'Adara Bolland', 'abollandy', '5th Floor', NULL, 3, NULL, 'activo'),
(43, '641024107-0', 'anadinz@de.vu', 'sA0|zLb%BFh3iM', 'Averil Nadin', 'anadinz', 'Room 629', NULL, 3, NULL, 'activo'),
(44, '394820744-5', 'cashmole10@clickbank.net', 'uR7~a0x.jw#b', 'Christoper Ashmole', 'cashmole10', 'Room 1574', NULL, 3, NULL, 'activo'),
(45, '577218515-2', 'dharesign11@upenn.edu', 'sZ4#qA\'s{', 'Dimitri Haresign', 'dharesign11', 'Room 1741', NULL, 3, NULL, 'activo'),
(46, '715731863-6', 'jgourley12@bluehost.com', 'uS7!d4NA', 'Jackquelin Gourley', 'jgourley12', 'Room 1735', NULL, 3, NULL, 'activo'),
(47, '687714507-0', 'nposnette13@amazon.com', 'uI5\"\'{`</s!', 'Naomi Posnette', 'nposnette13', 'Suite 33', NULL, 3, NULL, 'activo'),
(48, '560434998-4', 'fgwinn14@blinklist.com', 'dK3/2$hA|uVo,y', 'Fritz Gwinn', 'fgwinn14', 'Suite 24', NULL, 3, NULL, 'activo'),
(49, '676958802-1', 'schaldecott15@amazon.co.uk', 'vQ1+D?9ZBE*{*Qy?', 'Suzy Chaldecott', 'schaldecott15', 'Apt 1460', NULL, 3, NULL, 'activo'),
(50, '117239466-0', 'lcoste16@npr.org', 'cM2\'i=HdIc.|6de', 'Lars Coste', 'lcoste16', 'Room 914', NULL, 3, NULL, 'activo'),
(51, '534302739-3', 'bcommins17@nhs.uk', 'yS3)tqxH', 'Benedicto Commins', 'bcommins17', 'Apt 1003', NULL, 3, NULL, 'activo'),
(52, '093052805-0', 'cvirgo18@zdnet.com', 'eR1@QN%1+', 'Cornelius Virgo', 'cvirgo18', 'PO Box 79410', NULL, 3, NULL, 'activo'),
(53, '707507837-2', 'bbarthelet19@thetimes.co.uk', 'hB8<sMBN}`#K', 'Benetta Barthelet', 'bbarthelet19', 'Room 1132', NULL, 3, NULL, 'activo'),
(54, '643225020-X', 'ahrishanok1a@fc2.com', 'cG3=jg612j>~', 'Abelard Hrishanok', 'ahrishanok1a', 'Apt 62', NULL, 3, NULL, 'activo'),
(55, '696310570-7', 'smcreynolds1b@123-reg.co.uk', 'oF9?P/YC~~f~w>v}', 'Suzy McReynolds', 'smcreynolds1b', 'Apt 86', NULL, 3, NULL, 'activo'),
(56, '946668168-0', 'rdesesquelle1c@imdb.com', 'hS0(ax9*meHP`C6', 'Ricki Desesquelle', 'rdesesquelle1c', '11th Floor', NULL, 3, NULL, 'activo'),
(57, '986303854-7', 'mliggett1d@ycombinator.com', 'aN8#5nRe(|\"CD', 'Mano Liggett', 'mliggett1d', 'Suite 31', NULL, 3, NULL, 'activo'),
(58, '103127121-X', 'ssylvaine1j@surveymonkey.com', 'uO5.!I%lm', 'Sherline Sylvaine', 'ssylvaine1j', 'Room 1371', NULL, 3, NULL, 'activo'),
(69, NULL, 'joshuacardoso97@gmail.com', 'asdfg', 'Joshua Pedro Cardoso', 'Josh', 'Casa 10', '1997-01-18', 2, NULL, 'activo'),
(70, NULL, 'lidialanasol@gmail.com', 'asdfg', 'Lídia Lana Ribeiro Sol', 'abcd', 'Casa', '2023-10-12', 2, NULL, 'activo'),
(72, NULL, 'lidialana@gmail.com', 'asdfg', 'Lídia Lana Ribeiro Sol', 'Josh', 'Casa', '2023-10-15', 2, NULL, 'activo'),
(73, '3571594682', 'ze@ze', 'asdfg', 'jose', 'ze', 'Rua Cinco', '1765-12-13', 3, NULL, 'activo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Índices de tabela `smateria`
--
ALTER TABLE `smateria`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_permissoes` (`id_permissoes`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `smateria`
--
ALTER TABLE `smateria`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `smateria`
--
ALTER TABLE `smateria`
  ADD CONSTRAINT `smateria_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `smateria_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_permissoes`) REFERENCES `permissoes` (`id_permissao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
