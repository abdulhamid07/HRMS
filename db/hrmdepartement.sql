-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jul 2018 pada 00.39
-- Versi server: 5.6.39
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `varashfl_hrmdepartment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `clientdetails`
--

CREATE TABLE `clientdetails` (
  `ClientID` int(11) NOT NULL,
  `ClientName` varchar(25) DEFAULT NULL,
  `CompanyName` varchar(25) DEFAULT NULL,
  `Address` varchar(25) DEFAULT NULL,
  `ContactNumber` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `clientdetails`
--

INSERT INTO `clientdetails` (`ClientID`, `ClientName`, `CompanyName`, `Address`, `ContactNumber`) VALUES
(2, 'sasa susanti ', 'akakom', 'bantul', '12345678'),
(4, 'Aprilia Citra ', 'akakom', 'Jl. Raya Janti Karang Jam', '081266301224'),
(5, 'paijo lestari', 'spesial sambel', 'bantul', '086623113212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employeecredentials`
--

CREATE TABLE `employeecredentials` (
  `CredentialsID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `EmployeeUserName` varchar(25) DEFAULT NULL,
  `EmployeePassword` varchar(50) DEFAULT NULL,
  `EmployeePasswordEncryptor` varchar(50) DEFAULT NULL,
  `EmployeeLoginType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employeecredentials`
--

INSERT INTO `employeecredentials` (`CredentialsID`, `EmployeeID`, `EmployeeUserName`, `EmployeePassword`, `EmployeePasswordEncryptor`, `EmployeeLoginType`) VALUES
(3, 8, 'yuli', 'yuli', '4a01a05a350e1c7710c989f1211245a8', 1),
(5, 10, 'putri', 'putri', '4093fed663717c843bea100d17fb67c8', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employeedetails`
--

CREATE TABLE `employeedetails` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeName` varchar(25) DEFAULT NULL,
  `EmployeeAddress` varchar(25) DEFAULT NULL,
  `EmployeeContactNumber` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employeedetails`
--

INSERT INTO `employeedetails` (`EmployeeID`, `EmployeeName`, `EmployeeAddress`, `EmployeeContactNumber`) VALUES
(6, 'Abdul Hamid ', 'Jl. Raya Janti Karang Jam', '081266301224'),
(7, 'Abdul ', 'Jl. Raya Janti Karang Jam', '081266301224'),
(8, 'Yuli ', 'Piyungan', '08123768965'),
(10, 'Putri Ayu', 'janti', '081266301224'),
(13, ' sinta', 'janti', '09876'),
(14, ' Rara mendut', 'sleman', '12345'),
(15, ' paijo', 'bantul', '081220578437'),
(16, ' painem tarno', 'Jl. Raya Janti Karang Jam', '081266301224');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employeetype`
--

CREATE TABLE `employeetype` (
  `EmployeeTypeID` int(11) NOT NULL,
  `EmployeeType` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employeetype`
--

INSERT INTO `employeetype` (`EmployeeTypeID`, `EmployeeType`) VALUES
(1, 'HRD'),
(2, 'Programmer web'),
(5, 'Sistem analisis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projectallocationdetails`
--

CREATE TABLE `projectallocationdetails` (
  `ProjectAllocationID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `ProjectAllocatedDate` date DEFAULT NULL,
  `ExpectedDeliveryDate` date DEFAULT NULL,
  `Remaks` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projectallocationdetails`
--

INSERT INTO `projectallocationdetails` (`ProjectAllocationID`, `ProjectID`, `EmployeeID`, `ProjectAllocatedDate`, `ExpectedDeliveryDate`, `Remaks`) VALUES
(24, 1, 13, '2018-07-28', '2018-08-09', 'proses'),
(25, 1, 8, '2018-07-28', '2018-08-09', 'proses'),
(26, 1, 6, '2018-07-28', '2018-08-09', 'proses'),
(27, NULL, 8, '2018-07-28', '2018-08-01', 'proses'),
(28, 5, NULL, '2018-07-28', '2018-08-28', 'proses'),
(29, 5, 8, '2018-07-28', '2018-08-28', 'proses'),
(32, NULL, 15, '2018-07-30', '2018-08-20', 'proses'),
(33, NULL, 14, '2018-07-30', '2018-08-20', 'proses'),
(34, NULL, 16, '2018-07-30', '2018-08-20', 'proses'),
(35, 4, 7, '2018-07-28', '2018-08-28', 'proses'),
(36, 4, 10, '2018-07-28', '2018-08-28', 'proses'),
(37, 4, 13, '2018-07-28', '2018-08-28', 'proses'),
(38, NULL, 7, '2018-07-30', '2018-08-30', 'proses'),
(39, NULL, 10, '2018-07-30', '2018-08-30', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projectdetails`
--

CREATE TABLE `projectdetails` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(40) DEFAULT NULL,
  `ProjectStartDate` date DEFAULT NULL,
  `ProjectEndDate` date DEFAULT NULL,
  `ProjectAssignedDate` date DEFAULT NULL,
  `ProjectCost` varchar(25) DEFAULT NULL,
  `ClientID` int(11) NOT NULL,
  `Remaks` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projectdetails`
--

INSERT INTO `projectdetails` (`ProjectID`, `ProjectName`, `ProjectStartDate`, `ProjectEndDate`, `ProjectAssignedDate`, `ProjectCost`, `ClientID`, `Remaks`) VALUES
(1, 'Website E-Commerce', '2018-06-26', '2018-08-26', '2018-06-24', '5000000', 2, 'proses'),
(4, ' SIAKAD', '2018-07-28', '2018-08-28', '2018-07-26', '4000000', 2, 'proses'),
(5, ' Aplikasi Parkir supermarket', '2018-07-28', '2018-08-28', '2018-07-25', '5000000', 4, 'proses');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `clientdetails`
--
ALTER TABLE `clientdetails`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indeks untuk tabel `employeecredentials`
--
ALTER TABLE `employeecredentials`
  ADD PRIMARY KEY (`CredentialsID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `EmployeeLoginType` (`EmployeeLoginType`);

--
-- Indeks untuk tabel `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indeks untuk tabel `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`EmployeeTypeID`);

--
-- Indeks untuk tabel `projectallocationdetails`
--
ALTER TABLE `projectallocationdetails`
  ADD PRIMARY KEY (`ProjectAllocationID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indeks untuk tabel `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `clientdetails`
--
ALTER TABLE `clientdetails`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `employeecredentials`
--
ALTER TABLE `employeecredentials`
  MODIFY `CredentialsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `EmployeeTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `projectallocationdetails`
--
ALTER TABLE `projectallocationdetails`
  MODIFY `ProjectAllocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `projectdetails`
--
ALTER TABLE `projectdetails`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `employeecredentials`
--
ALTER TABLE `employeecredentials`
  ADD CONSTRAINT `employeecredentials_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employeedetails` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employeecredentials_ibfk_2` FOREIGN KEY (`EmployeeLoginType`) REFERENCES `employeetype` (`EmployeeTypeID`);

--
-- Ketidakleluasaan untuk tabel `projectallocationdetails`
--
ALTER TABLE `projectallocationdetails`
  ADD CONSTRAINT `projectallocationdetails_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `projectdetails` (`ProjectID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `projectallocationdetails_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employeedetails` (`EmployeeID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD CONSTRAINT `projectdetails_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clientdetails` (`ClientID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
