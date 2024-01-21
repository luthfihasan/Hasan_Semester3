-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 04:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temancoffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
('AD001', 'wahyudi', '123', 'Wahyudi MIS');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transaksi`
--

CREATE TABLE `bukti_transaksi` (
  `id_bukti` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `bukti_transaksi` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_transaksi`
--

INSERT INTO `bukti_transaksi` (`id_bukti`, `id_transaksi`, `bukti_transaksi`, `status`) VALUES
(1, 'trans_2', 'WhatsApp Image 2019-05-29 at 20.26.18.jpeg', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(30) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `email`, `password`, `telp`) VALUES
('Customer_1', 'Wahyudi MIS', 'Di Kota Bogor, Jawa Barat', 'wahyudi@gmail.com', '123', '08776521234'),
('Customer_2', 'Bayu Junis Pribadi', 'Perumahan GDC Sektor Melati Blok C-2/No.52 Kota Depok, Jawa Barat', 'bayujunisp@gmail.com', '123', '085782305163');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Biji Kopi'),
(2, 'Minuman  Teh'),
(3, 'Minuman  Kopi');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` varchar(30) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `id_customer` varchar(30) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `nama_product` varchar(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `subtotal` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_transaksi`, `id_customer`, `id_product`, `nama_product`, `qty`, `harga`, `subtotal`) VALUES
('Keranjang_1', 'trans_1', 'Customer_2', 'Product_3', 'Thai Thea', 1, 6000, 6000),
('Keranjang_2', 'trans_2', 'Customer_1', 'Product_3', 'Thai Thea', 6, 6000, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(30) NOT NULL,
  `biaya_kurir` int(30) NOT NULL,
  `waktu_pengiriman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `biaya_kurir`, `waktu_pengiriman`) VALUES
(1, 'JNE', 9000, '2-4 Hari'),
(3, 'J&T Expresss', 10000, '2-4 Hari');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(30) NOT NULL,
  `nama_product` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `description` text NOT NULL,
  `stok` int(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `harga`, `description`, `stok`, `kategori`, `gambar`) VALUES
('Product_1', 'Biji Kopi Toraja', 50000, 'Kopi Toraja, kopi yang berasal dari Toraja (sebuah daerah pegunungan di Sulawesi tempat tumbuhnya kopi ini) merupakan salah satu kopi khas Indonesia yang sudah terkenal akan aroma dan rasanya. ', 9, 'Biji Kopi', 'biji_toraja_1.jpg'),
('Product_2', 'Biji Kopi Robusta', 70000, 'Kopi Robusta, sesuai dengan asal kata namanya (robust) yang berarti kuat. Kopi ini memang memiliki ciri khas aroma dan rasa yang cukup kuat. Bagi anda penggemar kopi, pasti akan sangat menikmati kopi robusta ini.', 28, 'Biji Kopi', 'biji_robusta_1.jpg'),
('Product_3', 'Thai Thea', 6000, 'Thai Tea memang salah satu jenis minuman yang rasanya bikin ketagihan. Sesuai dengan namanya, minuman ini adalah minuman khas dari Thailand dengan campuran teh dipadu dengan rasa manis yang pas dari susu dan gula dan biasanya ditambah es batu untuk memberi kesegaran. Nggak hanya digemari di negara asalnya, Thai Tea juga diminati hampir di seluruh negara Asia Tenggara, termasuk Indonesia. ', 1, 'Minuman  Teh', 'thai tea.jpg'),
('Product_4', 'Kopi Susu', 15000, 'Kopi dicampur dengan susu asli dari boyolali', 18, 'Minuman  Kopi', 'rahasia-kenikmatan-kopi-susu-kekinian-ya-ada-di-susunya-jv1LLOJBUS.jpg'),
('Product_5', 'Biji Kopi Arabica', 20000, 'Kopi Arabika adalah salah satu dari dua spesies tanaman kopi yang ada berada dalam budidaya secara global. (yang lainnya adalah C. Canephora, atau yang biasa kita kenal dengan sebutan Kopi Robusta). Arabika adalah spesies kopi yang dominan di Amerika Tengah, dan selatan, dan sebagian besar Negara Afrika Timur, dan dianggap menghasilkan kualitas cup tertinggi.  Spesies Arabika terdiri dari banyak varietas atau kultivar/jenis-jenis yang berbeda yang dapat bereproduksi secara seksual satu sama lain.', 50, 'Biji Kopi', 'biji_arabica1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `logo_bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`, `logo_bank`) VALUES
(2, 'BCA', '12321321', 'Supriyadi', 'logo-bca.jpg'),
(3, 'BNI', '12321313', 'Suryono', 'logo-bni.jpg'),
(5, 'Mandiri', '140411234', 'Eka Wijaya', 'logo-mandiri.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_customer` varchar(30) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `telepon` int(30) NOT NULL,
  `catatan_pembelian` text NOT NULL,
  `alamat` text NOT NULL,
  `total` int(30) NOT NULL,
  `no_rek` int(30) NOT NULL,
  `kurir` varchar(30) NOT NULL,
  `no_resi` varchar(30) NOT NULL,
  `tgl_transaksi` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `nama_customer`, `telepon`, `catatan_pembelian`, `alamat`, `total`, `no_rek`, `kurir`, `no_resi`, `tgl_transaksi`, `status`) VALUES
('trans_1', 'Customer_2', 'Bayu Junis Pribadi', 2147483647, 'jangan ada yang lecet', 'Perumahan GDC Sektor Melati Blok C-2/No.52 Kota Depok, Jawa Barat', 15000, 12321321, 'JNE', 'Belum Dikirim', '15 Jul 2019 10:04', 'Menunggu Pembayaran'),
('trans_2', 'Customer_1', 'Wahyudi MIS', 2147483647, 'tidak boleh lecet', 'Di Kota Bogor, Jawa Barat', 45000, 12321321, 'JNE', '12312312', '07 Aug 2019 01:19', 'Transaksi Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
