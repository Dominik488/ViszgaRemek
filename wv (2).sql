-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 28. 13:10
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `wv`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friendship`
--

CREATE TABLE `friendship` (
  `fid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `ffid` int(11) NOT NULL,
  `fstatus` varchar(1) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `friendship`
--

INSERT INTO `friendship` (`fid`, `fuid`, `ffid`, `fstatus`) VALUES
(43, 5, 3, 'P'),
(44, 5, 4, 'P'),
(45, 5, 6, 'P');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korabbinev`
--

CREATE TABLE `korabbinev` (
  `kid` int(11) NOT NULL,
  `kuid` int(11) NOT NULL,
  `kunick` varchar(18) COLLATE utf8_hungarian_ci NOT NULL,
  `kdatum` datetime NOT NULL,
  `kstatusz` varchar(500) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `korabbinev`
--

INSERT INTO `korabbinev` (`kid`, `kuid`, `kunick`, `kdatum`, `kstatusz`) VALUES
(5, 3, 'oliver', '2025-01-31 10:48:20', ''),
(6, 4, 'Z4tonyy', '2025-01-31 10:49:05', ''),
(7, 3, 'oliver2', '2025-01-31 10:50:34', ''),
(8, 3, 'oliver', '2025-01-31 10:50:47', ''),
(9, 4, 'oliver3', '2025-01-31 10:52:10', ''),
(10, 4, 'Z4tonyy', '2025-01-31 10:52:42', ''),
(11, 5, 'hehe', '2025-02-03 10:13:29', ''),
(12, 5, 'hihi', '2025-02-19 11:34:39', ''),
(13, 6, 'kabutops', '2025-02-21 10:39:30', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `luid` int(11) NOT NULL,
  `ldatum` datetime NOT NULL,
  `lip` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `naplo`
--

CREATE TABLE `naplo` (
  `nid` int(11) NOT NULL,
  `nuid` int(11) NOT NULL,
  `ndatum` datetime NOT NULL,
  `nip` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `nurl` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `om`
--

CREATE TABLE `om` (
  `omid` int(11) NOT NULL,
  `omom` varchar(80) COLLATE utf8_hungarian_ci NOT NULL,
  `omoszt` varchar(3) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `ustrid` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `unick` varchar(16) COLLATE utf8_hungarian_ci NOT NULL,
  `upw` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `unev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `uwmail` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `uwmailtag` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `uemail` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `uom` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  `uprofkepnev` varchar(80) COLLATE utf8_hungarian_ci NOT NULL,
  `uprofkep_eredetinev` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `udatum` datetime NOT NULL,
  `uip` int(40) NOT NULL,
  `ustatusz` varchar(1) COLLATE utf8_hungarian_ci NOT NULL,
  `ukomment` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`uid`, `ustrid`, `unick`, `upw`, `unev`, `uwmail`, `uwmailtag`, `uemail`, `uom`, `uprofkepnev`, `uprofkep_eredetinev`, `udatum`, `uip`, `ustatusz`, `ukomment`) VALUES
(3, 'ag50vtnsg', 'oliver', '1f2c4b69ba551f867b26ba6d7b860389', 'Mohai OlivÃ©r Tibor', '@wm-iskola.hu', '', 'oliver@oliver', '', '', '', '2025-01-31 10:48:20', 0, 'A', ''),
(4, 'k7tap2', 'Z4tonyy', 'ed2b1f468c5f915f3f1cf75d7068baae', 'ZÃ¶lderdÅ‘ ZÃ©tÃ©ny', 'zolderdo.zeteny@wm-iskola.hu', 'zolderdo.zeteny', 'zolderdozeteny@gmail.com', '72389325682', '4_250131112816.jpg', '1_250109103318.jpg', '2025-01-31 10:49:05', 0, 'A', ''),
(5, 'mcba4i8a5w', 'hihi', '25d55ad283aa400af464c76d713c07ad', '', '@wm-iskola.hu', '', 'asd@asd.hu', '', '', '', '2025-02-03 10:13:29', 0, 'A', ''),
(6, 'b27u9vlsc', 'kabutops', '25d55ad283aa400af464c76d713c07ad', '', '', '', 'kuki@kuki.com', '', '', '', '2025-02-21 10:39:30', 0, 'A', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzid` int(11) NOT NULL,
  `uzuid` int(11) NOT NULL,
  `uztouid` int(11) NOT NULL,
  `uztext` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `uzdatum` datetime NOT NULL,
  `uzstatus` varchar(1) COLLATE utf8_hungarian_ci NOT NULL,
  `uzfile` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`uzid`, `uzuid`, `uztouid`, `uztext`, `uzdatum`, `uzstatus`, `uzfile`) VALUES
(1, 5, 3, 'Teszt üzenet', '2025-02-26 10:13:55', 'o', 'kuki.jpg'),
(2, 5, 3, 'Második teszt üzenet', '2025-02-26 10:14:23', 'o', 'juj.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`fid`);

--
-- A tábla indexei `korabbinev`
--
ALTER TABLE `korabbinev`
  ADD PRIMARY KEY (`kid`);

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- A tábla indexei `naplo`
--
ALTER TABLE `naplo`
  ADD PRIMARY KEY (`nid`);

--
-- A tábla indexei `om`
--
ALTER TABLE `om`
  ADD PRIMARY KEY (`omid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`uzid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `friendship`
--
ALTER TABLE `friendship`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT a táblához `korabbinev`
--
ALTER TABLE `korabbinev`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `naplo`
--
ALTER TABLE `naplo`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `om`
--
ALTER TABLE `om`
  MODIFY `omid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `uzid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
