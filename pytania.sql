-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 05, 2025 at 11:56 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pytania`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id` int(11) NOT NULL,
  `pytanie` longtext NOT NULL,
  `odp` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pytania`
--

INSERT INTO `pytania` (`id`, `pytanie`, `odp`) VALUES
(1, 'Jaka jest długość rzeki Nil w kilometrach?', 6650),
(2, 'Ile metrów wynosi wysokość Mount Everest?', 8848),
(3, 'Jaka jest powierzchnia Australii w kilometrach kwadratowych?', 7692024),
(4, 'Ile mieszkańców ma Tokio według danych z 2023 roku?', 37400068),
(5, 'Jaka jest długość Wielkiej Rafy Koralowej w kilometrach?', 2300),
(6, 'Ile kilometrów wynosi obwód Ziemi wzdłuż równika?', 40075),
(7, 'Jaka jest głębokość Rowu Mariańskiego w metrach?', 11034),
(8, 'Ile wysp wchodzi w skład archipelagu Indonezji?', 17508),
(9, 'Jaka jest powierzchnia Jeziora Bajkał w kilometrach kwadratowych?', 31722),
(10, 'Ile metrów wynosi wysokość najwyższego wodospadu świata (Angel Falls)?', 979),
(11, 'Jaka jest długość Amazonki w kilometrach?', 6575),
(12, 'Ile mieszkańców ma Indie według danych z 2023 roku?', 1393409038),
(13, 'Jaka jest powierzchnia Antarktydy w kilometrach kwadratowych?', 14000000),
(14, 'Ile kilometrów wynosi długość Muru Chińskiego?', 21196),
(15, 'Jaka jest wysokość wulkanu Mauna Loa na Hawajach w metrach?', 4169),
(16, 'Ile wysp składa się na archipelag Hawajów?', 137),
(17, 'Jaka jest powierzchnia Grenlandii w kilometrach kwadratowych?', 2166086),
(18, 'Ile metrów wynosi głębokość najgłębszego jeziora świata (Bajkał)?', 1642),
(19, 'Jaka jest długość rzeki Missisipi w kilometrach?', 3730),
(20, 'Ile mieszkańców ma Brazylia według danych z 2023 roku?', 213993437),
(21, 'Jaka jest wysokość wieży Eiffel w metrach?', 324),
(22, 'Ile metrów wynosi długość mostu Golden Gate?', 2737),
(23, 'Jaka jest maksymalna nośność mostu Akashi Kaikyō w tonach?', 23000),
(24, 'Ile kilowatów mocy generuje elektrownia wodna Trzech Przełomów w Chinach?', 22500000),
(25, 'Jaka jest wysokość Statuły Wolności w metrach?', 93),
(26, 'Ile metrów wynosi długość tunelu Gotarda w Alpach?', 57091),
(27, 'Jaka jest maksymalna prędkość pociągu Maglev w Szanghaju w km/h?', 431),
(28, 'Ile ton waży największy samolot transportowy świata (Antonov An-225)?', 640),
(29, 'Jaka jest rozpiętość skrzydeł Boeinga 747 w metrach?', 64),
(30, 'Ile metrów wynosi wysokość Burj Khalifa?', 829),
(31, 'Jaka jest długość Kanału Sueskiego w kilometrach?', 193),
(32, 'Ile pasażerów może pomieścić największy statek pasażerski Icon of the Seas?', 7600),
(33, 'Jaka jest maksymalna moc elektrowni jądrowej w Kashiwazaki-Kariwa w megawatach?', 7965),
(34, 'Ile metrów wynosi długość mostu Danyang-Kunshan w Chinach?', 164800),
(35, 'Jaka jest wysokość Empire State Building w metrach?', 443),
(36, 'Ile ton stali zużyto na budowę mostu Sydney Harbour Bridge?', 52800),
(37, ':Jaka jest maksymalna prędkość samolotu Concorde w km/h?', 2172),
(38, 'Ile metrów wynosi długość Kanału Panamskiego?', 80000),
(39, 'Jaka jest maksymalna nośność dźwigu Liebherr LTM 11200-9.1 w tonach?', 1200),
(40, 'Jaka jest wysokość wieży CN Tower w Toronto w metrach?', 553),
(41, 'Jaka jest maksymalna prędkość Bugatti Chiron w km/h?', 490),
(42, 'Ile koni mechanicznych ma silnik Ferrari SF90 Stradale?', 1000),
(43, 'Jaka jest pojemność silnika samochodu Ford Mustang GT (2023) w centymetrach sześciennych?', 5038),
(44, 'Ile kilometrów wynosi rekordowy dystans przejechany przez Teslę Model S na jednym ładowaniu?', 1078),
(45, 'Jaka jest maksymalna prędkość Porsche 911 Turbo S w km/h?', 330),
(46, 'Ile ton waży przeciętny samochód Formuły 1 w sezonie 2023?', 798),
(47, 'Jaka jest moc silnika Lamborghini Aventador w koniach mechanicznych?', 780),
(48, 'Ile kilometrów ma Wisła?', 1047),
(49, 'Jaka jest maksymalna prędkość motocykla Kawasaki Ninja H2R w km/h?', 420),
(50, 'Średnia wsokość Polski w metrach n.p.m?', 173),
(51, 'Jaka jest maksymalna moc silnika Tesli Model S Plaid w koniach mechanicznych?', 1020),
(52, 'Ile metrów wynosi tor wyścigowy Le Mans?', 13626),
(53, 'Jaka jest pojemność silnika BMW M5 (2023) w centymetrach sześciennych?', 4395),
(54, 'Ile koni mechanicznych ma silnik Mercedesa-AMG One?', 1063),
(55, 'Jaka jest maksymalna prędkość McLarena P1 w km/h?', 350),
(56, 'Populacja świata w grudniu 2024?', 2147483647),
(57, 'Ile osób na świecie używa internetu?', 5560000000),
(58, 'Ile litrów paliwa zużywa Boeing 747 na godzinę lotu?', 12000),
(59, 'Jaka jest maksymalna prędkość bolidu Formuły 1 w sezonie 2023 w km/h?', 360),
(60, 'Ile koni mechanicznych ma silnik Audi R8 V10?', 620),
(61, 'Jaka jest powierzchnia Sahary w kilometrach kwadratowych?', 9200000),
(62, 'Ile metrów wynosi wysokość wulkanu Kilimandżaro?', 5895),
(63, 'Jaka jest długość rzeki Jangcy w kilometrach?', 6300),
(64, 'Ile mieszkańców ma Nowy Jork według danych z 2023 roku?', 8335897),
(65, 'Jaka jest powierzchnia Madagaskaru w kilometrach kwadratowych?', 581540),
(66, 'Ile wysp wchodzi w skład archipelagu Filipin?', 7641),
(67, 'Jaka jest głębokość Morza Śródziemnego w najgłębszym punkcie w metrach?', 5267),
(68, 'Jaka jest długość rzeki Dunaj w kilometrach?', 2850),
(69, 'Ile metrów wynosi wysokość najwyższego szczytu Alp (Mont Blanc)?', 4808),
(70, 'Jaka jest powierzchnia Kanady w kilometrach kwadratowych?', 9984670),
(71, 'Ile kilogramów waży dzwon wieży Big Ben?', 13760),
(72, 'Jaka jest długość mostu Vasco da Gama w Lizbonie w metrach?', 12300),
(73, 'Ile metrów wynosi wysokość wieżowca One World Trade Center?', 541),
(74, 'Ile wynosi średnica Ziemii w kilometrach?', 12756),
(75, 'Ile metrów wynosi długość tunelu Laerdal w Norwegii?', 24500),
(76, 'Jaka jest rozpiętość skrzydeł Airbusa A380 w metrach?', 80),
(77, 'Ile pasażerów może pomieścić Boeing 737 MAX?', 230),
(78, 'Jaka jest maksymalna nośność mostu Millau we Francji w tonach?', 36000),
(79, 'Ile metrów wynosi wysokość wieży Tokyo Skytree?', 634),
(80, 'Jaka jest długość Kanału Kilońskiego w kilometrach?', 98),
(81, 'Jaka jest maksymalna prędkość Toyoty Supra (2023) w km/h?', 250),
(82, 'Ile koni mechanicznych ma silnik Dodge Viper?', 645),
(83, 'Jaka jest pojemność silnika Chevroleta Corvette Z06 (2023) w centymetrach sześciennych?', 5550),
(84, 'Ile jest mórz na ziemii?', 71),
(85, 'Jaka jest maksymalna prędkość Aston Martin DB11 AMR w km/h?', 335),
(86, 'Ile jest jezior na Ziemii?', 117000000),
(87, 'Jaka jest moc silnika Porsche Taycan Turbo S w koniach mechanicznych?', 761),
(88, 'Ile kilometrów wynosi tor wyścigowy Nürburgring?', 20700),
(89, 'Jaka jest maksymalna prędkość Hondy Civic Type R w km/h?', 275),
(90, 'Całkowita powierzchnia lądu na Ziemii (km2)?', 149000000),
(91, 'Jaka jest powierzchnia Morza Kaspijskiego w kilometrach kwadratowych?', 371000),
(92, 'Ile metrów wynosi wysokość najwyższego szczytu Andów (Aconcagua)?', 6960),
(93, 'Jaka jest długość rzeki Wołga w kilometrach?', 3530),
(94, 'Ile mieszkańców ma Meksyk według danych z 2023 roku?', 128932753),
(95, 'Jaka jest powierzchnia Nowej Zelandii w kilometrach kwadratowych?', 268021),
(96, 'Ile wysp wchodzi w skład archipelagu Malediwów?', 1190),
(97, 'Jaka jest głębokość Oceanu Atlantyckiego w najgłębszym punkcie w metrach?', 8605),
(98, 'Jaka jest długość rzeki Mekong w kilometrach?', 4350),
(99, 'Ile metrów wynosi wysokość najwyższego szczytu Kaukazu (Elbrus)?', 5642),
(100, 'Jaka jest powierzchnia Rosji w kilometrach kwadratowych?', 17125191);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
