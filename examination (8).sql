-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 12:16 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternativat`
--

CREATE TABLE `alternativat` (
  `pyetje_id` varchar(50) NOT NULL,
  `alternativa` varchar(6000) NOT NULL,
  `alternativa_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternativat`
--

INSERT INTO `alternativat` (`pyetje_id`, `alternativa`, `alternativa_id`) VALUES
('85859f1f6dfd713f0206650a7cdf784e', '5', '7e84ae43d8931818dc05640ba64569d5'),
('85859f1f6dfd713f0206650a7cdf784e', '3', 'ddd3c2f9e04b7a7ad54991b365a404e3'),
('85859f1f6dfd713f0206650a7cdf784e', '2', 'd825545b1275e4fcf41f821e022d4e9c'),
('85859f1f6dfd713f0206650a7cdf784e', '1', '6b8cb62cc45eee7dbe74ad0953e69ba0'),
('e01044b13ea59454410036b9c2c1de9f', 'k*k/2', '822265e9a3cb4fb9053a2a7e57b3bb08'),
('e01044b13ea59454410036b9c2c1de9f', 'k*k', 'a2de05714138127635046e44cf8080ef'),
('e01044b13ea59454410036b9c2c1de9f', 'a*b', '6e013d28818fdc11a64f9f4efaf22872'),
('e01044b13ea59454410036b9c2c1de9f', 'a*h', 'edd0e7458f30c5cf2627fba17abc4e67'),
('e24a5c805d962960fadd0e58f42fbccf', 'gjeometria', '1014ce139e8f9ccc79aa870ffebb5751'),
('e24a5c805d962960fadd0e58f42fbccf', 'algjebra', '02e48da678860bf174f6316ed6236788'),
('e24a5c805d962960fadd0e58f42fbccf', 'zejtaria', 'f1977fcfa0bc85580132e1963c6d8525'),
('e24a5c805d962960fadd0e58f42fbccf', 'probabiliteti', 'bf1dd500bb6b8df95124d96deda2fb84'),
('2d36e70c41f25321344edd5062a3b27b', '2', 'f4361ceef890a3bedb81c73867dfda11'),
('2d36e70c41f25321344edd5062a3b27b', '8', 'fc05b1c92f4d374cdd2b0d263f0049ed'),
('2d36e70c41f25321344edd5062a3b27b', '10', '037bb01f6aaec6f027cea08803bf2774'),
('2d36e70c41f25321344edd5062a3b27b', '4', 'dff244ace4da95c8c724bc0c0a8c3f3d'),
('74194031ac6161db2971df7a381955a8', '2', 'afd6c660415d9d6e73450a3be7427a2b'),
('74194031ac6161db2971df7a381955a8', '9', '0b9acf3e6d6fefa5cf40f6b6df7e8ae2'),
('74194031ac6161db2971df7a381955a8', '8', 'daf36b8d40f35a162865fb845f5e1d88'),
('74194031ac6161db2971df7a381955a8', '13', 'f537e0b4e84e11d7c1ea77661d885928'),
('3dfdc462e44db40a64a5f0f08ec4a0be', '1878', 'b5927e9c17003a446508554f65b0e8bb'),
('3dfdc462e44db40a64a5f0f08ec4a0be', '1912', '8b01716db13b6b031d1e9e927ed3f8d4'),
('3dfdc462e44db40a64a5f0f08ec4a0be', '1913', 'a76490393b7f6f68eaf7126732811d8f'),
('3dfdc462e44db40a64a5f0f08ec4a0be', '1458', 'a43264527076c84d1661852b769dcda8'),
('37709b5e4c93a6a8002b620eac2622b5', '1920', '8118f007bf018e917d58a45dcb475d18'),
('37709b5e4c93a6a8002b620eac2622b5', '1914', 'fbd5734e1894ae975c9da0fbb473a539'),
('37709b5e4c93a6a8002b620eac2622b5', '1928', '0889a3451c714bf877f888c51c569b47'),
('37709b5e4c93a6a8002b620eac2622b5', '1939', 'de22ba39316689f1ce5ad8760a100db2'),
('cb8fad2a757dd9e135673d291eab6a23', 'France ', '001bfbf0af4801c4da019f1ba3548ca6'),
('cb8fad2a757dd9e135673d291eab6a23', 'Itali', 'dc6abdf2a439351274a50bbb2875d20d'),
('cb8fad2a757dd9e135673d291eab6a23', 'Gjermani', 'e37885e3145a62f8ea2317783430218c'),
('cb8fad2a757dd9e135673d291eab6a23', 'Spanje', '9158b44e4b54709b0d315159984b3a2d'),
('9158b44e4b54709b0d315159984b3a2d', '1701', 'b4e02916bee5c6004502688a2333903c'),
('9158b44e4b54709b0d315159984b3a2d', '1812', '44a46abab8a755478cb278a2df6d7d2e'),
('9158b44e4b54709b0d315159984b3a2d', '1899', 'f536fd20a8d8e34e0f194f155e7a66f8'),
('9158b44e4b54709b0d315159984b3a2d', '1878', '0759cfc535938955b74844f64b4e4cf4'),
('04283c0fa0db7b7f1ff22cbea46405ce', '1997', '1b972b7598f77d61fe2ba8f8b4fc417b'),
('04283c0fa0db7b7f1ff22cbea46405ce', '1990', '8e031b9f8a95f078b61da3b8d97d9952'),
('04283c0fa0db7b7f1ff22cbea46405ce', '1995', '714ae82daebaf211e004c31ce72f7c86'),
('04283c0fa0db7b7f1ff22cbea46405ce', '2005', 'b8645729b07e1c04f1abce4078932554'),
('238f94ced9830d149f3c11784c880f62', 'F=ma', '58ce1566c56f8ad31601d327ef1eeb49'),
('238f94ced9830d149f3c11784c880f62', 'a=F/m', 'd52d1743a17b727325e6e38943536b5f'),
('238f94ced9830d149f3c11784c880f62', 'm=Fa', '88708c77a874548aab53ddcc35c72335'),
('238f94ced9830d149f3c11784c880f62', 'm=F/a', '631b84bc4875e1857e89123699432b27');

-- --------------------------------------------------------

--
-- Table structure for table `emailtable`
--

CREATE TABLE `emailtable` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailtable`
--

INSERT INTO `emailtable` (`email`) VALUES
('bhoxha@uet.com'),
('erama@uet.com'),
('dkraja@uet.com'),
('dmuco@uet.com'),
('mhalili@uet.com'),
('rbasha@uet.com'),
('mhaxhiu@uet.com'),
('dosmani@uet.com'),
('lmehmeti@uet.com'),
('dpeci@uet.com'),
('gkamberi@uet.com'),
('nskenderi@uet.com'),
('delezi@uet.com'),
('mdede@uet.com'),
('lcana@uet.com'),
('bluarasi@uet.com'),
('druka@uet.com'),
('ebegu@uet.com'),
('onikolla@uet.com'),
('ltoska@uet.com'),
('dleka@uet.ecom'),
('bshehu@uet.ecom'),
('iri@uet.com');

-- --------------------------------------------------------

--
-- Table structure for table `kerkesa`
--

CREATE TABLE `kerkesa` (
  `provim_id` text NOT NULL,
  `pyetje_id` text NOT NULL,
  `pyetje` text NOT NULL,
  `zgjedhje` int(15) NOT NULL,
  `nrp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerkesa`
--

INSERT INTO `kerkesa` (`provim_id`, `pyetje_id`, `pyetje`, `zgjedhje`, `nrp`) VALUES
('9ec754f53be5d462a2e2ca808357b1de', '85859f1f6dfd713f0206650a7cdf784e', 'Gjeni vleren e x ne ekuacionin 3x=6 ?', 4, 1),
('9ec754f53be5d462a2e2ca808357b1de', 'e01044b13ea59454410036b9c2c1de9f', 'Si gjendet siperfaqja e trekendeshit kenddrejte ?', 4, 2),
('9ec754f53be5d462a2e2ca808357b1de', 'e24a5c805d962960fadd0e58f42fbccf', 'Cila dege e matematikes merret me shprehjet shkronjore ?', 4, 3),
('9ec754f53be5d462a2e2ca808357b1de', '2d36e70c41f25321344edd5062a3b27b', 'Cila eshte rrenja katrore e 16 ?', 4, 4),
('9ec754f53be5d462a2e2ca808357b1de', '74194031ac6161db2971df7a381955a8', 'Sa bejne 3x3 ?', 4, 5),
('c76784871a8ee2cb49bbecb09437dffd', '3dfdc462e44db40a64a5f0f08ec4a0be', 'Kur u shpall pavaresia e Shqiperise ?', 4, 1),
('c76784871a8ee2cb49bbecb09437dffd', '37709b5e4c93a6a8002b620eac2622b5', 'Kur u shpall Ahmet Zogu I-re mbret i Shqiperise ?', 4, 2),
('c76784871a8ee2cb49bbecb09437dffd', 'cb8fad2a757dd9e135673d291eab6a23', 'Ne cilin vend u vra Esad Pashe Toptani nga Avni Rustemi ?', 4, 3),
('c76784871a8ee2cb49bbecb09437dffd', '9158b44e4b54709b0d315159984b3a2d', 'Ne cilin vit u mbajt Lidhja Shqiptare e Prizrenit ?', 4, 4),
('c76784871a8ee2cb49bbecb09437dffd', '04283c0fa0db7b7f1ff22cbea46405ce', 'Kur shpertheu lufta e fundit civile ne Shqiperi ?', 4, 5),
('a9511a22c3c2cb8c0282f170b49d02fb', '238f94ced9830d149f3c11784c880f62', 'Si gjendet nxitimi ?', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedagog`
--

CREATE TABLE `pedagog` (
  `teacher_id` int(11) NOT NULL,
  `pedagogusername` varchar(50) NOT NULL,
  `fakulteti` varchar(50) NOT NULL,
  `fjalekalimi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedagog`
--

INSERT INTO `pedagog` (`teacher_id`, `pedagogusername`, `fakulteti`, `fjalekalimi`) VALUES
(1, 'pedagogf1', 'Juridik', '1fpedagog'),
(2, 'pedagogf2', 'Ekonomik', '2fpedagog'),
(3, 'pedagogf3', 'Humane', '3fpedagog'),
(4, 'pedagogf4', 'Inxhinieri', '4fpedagog'),
(5, 'pedagogf5', 'Mjekesi', '5fpedagog');

-- --------------------------------------------------------

--
-- Table structure for table `pergjigjet`
--

CREATE TABLE `pergjigjet` (
  `pyetje_id` text NOT NULL,
  `pergjigje_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pergjigjet`
--

INSERT INTO `pergjigjet` (`pyetje_id`, `pergjigje_id`) VALUES
('85859f1f6dfd713f0206650a7cdf784e', 'd825545b1275e4fcf41f821e022d4e9c'),
('e01044b13ea59454410036b9c2c1de9f', '822265e9a3cb4fb9053a2a7e57b3bb08'),
('e24a5c805d962960fadd0e58f42fbccf', '02e48da678860bf174f6316ed6236788'),
('2d36e70c41f25321344edd5062a3b27b', 'dff244ace4da95c8c724bc0c0a8c3f3d'),
('74194031ac6161db2971df7a381955a8', '0b9acf3e6d6fefa5cf40f6b6df7e8ae2'),
('3dfdc462e44db40a64a5f0f08ec4a0be', '8b01716db13b6b031d1e9e927ed3f8d4'),
('37709b5e4c93a6a8002b620eac2622b5', '0889a3451c714bf877f888c51c569b47'),
('cb8fad2a757dd9e135673d291eab6a23', '001bfbf0af4801c4da019f1ba3548ca6'),
('9158b44e4b54709b0d315159984b3a2d', '0759cfc535938955b74844f64b4e4cf4'),
('04283c0fa0db7b7f1ff22cbea46405ce', '1b972b7598f77d61fe2ba8f8b4fc417b'),
('238f94ced9830d149f3c11784c880f62', 'd52d1743a17b727325e6e38943536b5f');

-- --------------------------------------------------------

--
-- Table structure for table `provim`
--

CREATE TABLE `provim` (
  `provim_id` text NOT NULL,
  `lenda` varchar(100) NOT NULL,
  `fakulteti` varchar(50) NOT NULL,
  `sakte` int(15) NOT NULL,
  `gabim` int(15) NOT NULL,
  `ushtrimet` int(15) NOT NULL,
  `data_provim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provim`
--

INSERT INTO `provim` (`provim_id`, `lenda`, `fakulteti`, `sakte`, `gabim`, `ushtrimet`, `data_provim`) VALUES
('9ec754f53be5d462a2e2ca808357b1de', 'Matematike', 'Inxhinieri', 20, 0, 5, '2020-05-13 13:50:15'),
('c76784871a8ee2cb49bbecb09437dffd', 'Histori', 'Humane', 20, 0, 5, '2020-05-13 14:02:25'),
('a9511a22c3c2cb8c0282f170b49d02fb', 'Fizike', 'Inxhinieri', 20, 0, 1, '2020-07-08 10:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `regjistrohu`
--

CREATE TABLE `regjistrohu` (
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(50) NOT NULL,
  `universiteti` varchar(50) NOT NULL,
  `fakulteti` varchar(50) NOT NULL,
  `gjinia` char(1) NOT NULL,
  `viti` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` bigint(30) NOT NULL,
  `fkalimi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regjistrohu`
--

INSERT INTO `regjistrohu` (`emri`, `mbiemri`, `universiteti`, `fakulteti`, `gjinia`, `viti`, `username`, `email`, `telefon`, `fkalimi`) VALUES
('Diana', 'Leka', 'uet', 'Humane', 'F', 2, 'dleka', 'dleka@uet.com', 54376575, '202cb962ac59075b964b07152d234b70'),
('Beni', 'Shehu', 'uet', 'Inxhinieri', 'M', 2, 'bshehu', 'bshehu@uet.com', 5465465, '202cb962ac59075b964b07152d234b70'),
('Bardhyl', 'Hoxha', 'uet', 'Inxhinieri', 'M', 2, 'bardhylh', 'bhoxha@uet.com', 78458723648756, '202cb962ac59075b964b07152d234b70'),
('Eneda', 'Rama', 'uet', 'Inxhinieri', 'F', 1, 'enedar', 'erama@uet.com', 456466, '202cb962ac59075b964b07152d234b70'),
('Dorian', 'Kraja', 'uet', 'Inxhinieri', 'M', 3, 'doriank', 'dkraja@uet.com', 456787678, '202cb962ac59075b964b07152d234b70'),
('Desara', 'Muco', 'uet', 'Inxhinieri', 'F', 2, 'desaram', 'dmuco@uet.com', 87896276, '202cb962ac59075b964b07152d234b70'),
('Mirton', 'Halili', 'uet', 'Inxhinieri', 'M', 3, 'mirtonh', 'mhalili@uet.com', 863463466, '202cb962ac59075b964b07152d234b70'),
('Rizana', 'Basha', 'uet', 'Inxhinieri', 'F', 2, 'rizanab', 'rbasha@uet.com', 364576325, '202cb962ac59075b964b07152d234b70'),
('Mentor', 'Haxhiu', 'uet', 'Inxhinieri', 'M', 2, 'mentorh', 'mhaxhiu@uet.com', 738975892, '202cb962ac59075b964b07152d234b70'),
('Drilona', 'Osmani', 'uet', 'Inxhinieri', 'F', 2, 'drilonao', 'dosmani@uet.com', 83127543, '202cb962ac59075b964b07152d234b70'),
('Ledion', 'Mehmeti', 'uet', 'Inxhinieri', 'M', 3, 'ledionm', 'lmehmeti@uet.com', 873486334, '202cb962ac59075b964b07152d234b70'),
('Deniada', 'Peci', 'uet', 'Inxhinieri', 'F', 2, 'deniadap', 'dpeci@uet.com', 3454646, '202cb962ac59075b964b07152d234b70'),
('Genius', 'Kamberi', 'uet', 'Inxhinieri', 'M', 3, 'geniusk', 'gkamberi@uet.com', 34973863, '202cb962ac59075b964b07152d234b70'),
('Nevila', 'Skenderi', 'uet', 'Inxhinieri', 'F', 2, 'nevilas', 'nskenderi@uet.com', 721783, '202cb962ac59075b964b07152d234b70'),
('Dimal', 'Elezi', 'uet', 'Humane', 'M', 2, 'dimale', 'delezi@uet.com', 7345643, '202cb962ac59075b964b07152d234b70'),
('Melisa', 'Dede', 'uet', 'Humane', 'F', 2, 'melisad', 'mdede@uet.com', 6564364, '202cb962ac59075b964b07152d234b70'),
('Lorik', 'Cana', 'uet', 'Humane', 'M', 1, 'lorikc', 'lcana@uet.com', 76437563, '202cb962ac59075b964b07152d234b70'),
('Brisilda', 'Luarasi', 'uet', 'Humane', 'F', 2, 'brisildal', 'bluarasi@uet.com', 43757394, '202cb962ac59075b964b07152d234b70'),
('Dardan', 'Ruka', 'uet', 'Humane', 'M', 2, 'dardanr', 'druka@uet.com', 4354235, '202cb962ac59075b964b07152d234b70'),
('Iri', 'Sulaj', 'uet', 'Inxhinieri', 'M', 3, 'iris', 'iri@uet.com', 64575375, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `riprovime`
--

CREATE TABLE `riprovime` (
  `emri` varchar(45) NOT NULL,
  `mbiemri` varchar(55) NOT NULL,
  `email` varchar(35) NOT NULL,
  `viti` int(3) NOT NULL,
  `fakulteti` varchar(25) NOT NULL,
  `numril` int(3) NOT NULL,
  `lenda1` varchar(35) NOT NULL,
  `lenda2` varchar(35) NOT NULL,
  `lenda3` varchar(35) NOT NULL,
  `koha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riprovime`
--

INSERT INTO `riprovime` (`emri`, `mbiemri`, `email`, `viti`, `fakulteti`, `numril`, `lenda1`, `lenda2`, `lenda3`, `koha`) VALUES
('Diana', 'Leka', 'dleka@uet.com', 2, 'Humane', 3, 'Filozofi', 'Histori', 'Sociologji', '2020-05-13 14:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `vleresim`
--

CREATE TABLE `vleresim` (
  `email` varchar(35) NOT NULL,
  `provim_id` text NOT NULL,
  `rezultatip` int(15) NOT NULL,
  `niveli` int(15) NOT NULL,
  `sakte` int(15) NOT NULL,
  `gabim` int(15) NOT NULL,
  `data_provim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedagog`
--
ALTER TABLE `pedagog`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedagog`
--
ALTER TABLE `pedagog`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
