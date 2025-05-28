-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: sql204.infinityfree.com
-- Létrehozás ideje: 2025. Máj 28. 12:18
-- Kiszolgáló verziója: 10.6.19-MariaDB
-- PHP verzió: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `if0_38415749_wv`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dok`
--

CREATE TABLE `dok` (
  `did` int(11) NOT NULL,
  `dpostid` int(11) NOT NULL,
  `dtextid` int(11) NOT NULL,
  `duid` int(11) NOT NULL,
  `dtext` text NOT NULL,
  `dfile` text DEFAULT NULL,
  `dvote` text NOT NULL,
  `dclass` text NOT NULL,
  `devent` varchar(1) NOT NULL DEFAULT 'N',
  `deventEnd` date DEFAULT NULL,
  `dtime` datetime NOT NULL,
  `dstatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friendship`
--

CREATE TABLE `friendship` (
  `fid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `ffid` int(11) NOT NULL,
  `fstatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korabbinev`
--

CREATE TABLE `korabbinev` (
  `kid` int(11) NOT NULL,
  `kuid` int(11) NOT NULL,
  `kunick` varchar(18) NOT NULL,
  `kdatum` datetime NOT NULL,
  `kstatusz` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `luid` int(11) NOT NULL,
  `ldatum` datetime NOT NULL,
  `lip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `naplo`
--

CREATE TABLE `naplo` (
  `nid` int(11) NOT NULL,
  `nuid` int(11) NOT NULL,
  `ndatum` datetime NOT NULL,
  `nip` varchar(40) NOT NULL,
  `nurl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `ustrid` varchar(10) NOT NULL,
  `unick` varchar(16) NOT NULL,
  `upw` varchar(40) NOT NULL,
  `unev` varchar(30) NOT NULL,
  `uwmail` varchar(100) NOT NULL,
  `uwmailtag` varchar(30) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uosztaly` varchar(6) NOT NULL,
  `uom` varchar(11) NOT NULL,
  `uprofkepnev` varchar(80) NOT NULL,
  `uprofkep_eredetinev` varchar(250) NOT NULL,
  `udatum` datetime NOT NULL,
  `uip` int(40) NOT NULL,
  `ustatusz` varchar(1) NOT NULL,
  `ukomment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzid` int(11) NOT NULL,
  `uzuid` int(11) NOT NULL,
  `uztouid` int(11) NOT NULL,
  `uztext` mediumtext NOT NULL,
  `uzdatum` datetime NOT NULL,
  `uzstatus` varchar(1) NOT NULL,
  `uzfile` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `votelog`
--

CREATE TABLE `votelog` (
  `vid` int(11) NOT NULL,
  `vdpostid` int(11) NOT NULL,
  `vuid` int(11) NOT NULL,
  `vchoice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `dok`
--
ALTER TABLE `dok`
  ADD PRIMARY KEY (`did`);

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
-- A tábla indexei `votelog`
--
ALTER TABLE `votelog`
  ADD PRIMARY KEY (`vid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `dok`
--
ALTER TABLE `dok`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `friendship`
--
ALTER TABLE `friendship`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `korabbinev`
--
ALTER TABLE `korabbinev`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `uzid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `votelog`
--
ALTER TABLE `votelog`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
