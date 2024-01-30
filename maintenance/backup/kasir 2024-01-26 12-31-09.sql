
-- Database Backup --
-- Ver. : 1.0.1
-- Host : Server Host
-- Generating Time : Jan 26, 2024 at 12:31:09:PM


CREATE TABLE `detailpenjualan` (
  `detailid` int(11) NOT NULL AUTO_INCREMENT,
  `penjualanid` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `jumlahproduk` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`detailid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO detailpenjualan VALUES
("6","2","13","1","98000.00"),
("7","2","14","1","6000.00"),
("8","2","15","2","24000.00"),
("9","2","17","1","5000.00"),
("10","2","18","1","7000.00"),
("11","3","18","2","7000.00"),
("12","3","19","1","8000.00"),
("13","3","20","1","5000.00"),
("14","3","22","1","20000.00"),
("15","3","12","1","24000.00"),
("16","4","23","1","12000.00"),
("17","4","24","1","20000.00"),
("18","4","25","1","6000.00"),
("19","4","22","1","20000.00"),
("20","4","21","1","14000.00"),
("21","5","6","1","13000.00"),
("22","5","11","1","37000.00"),
("23","5","18","1","7000.00"),
("24","5","16","1","5000.00"),
("25","5","13","1","98000.00"),
("26","6","4","1","12000.00");

CREATE TABLE `keranjang` (
  `keranjangid` int(10) NOT NULL AUTO_INCREMENT,
  `produkid` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`keranjangid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `pelanggan` (
  `pelangganid` int(11) NOT NULL AUTO_INCREMENT,
  `namapelanggan` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `nomortelepon` varchar(15) NOT NULL,
  PRIMARY KEY (`pelangganid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO pelanggan VALUES
("1","yoga","dalung","08534652335"),
("2","tya","canggu","08456735773"),
("3","dika","badung","087860052445"),
("4","indah","denpasar","08746379446"),
("5","lutfhi","dalung","08575345774"),
("6","umum","rahasia","54364788");

CREATE TABLE `penjualan` (
  `penjualanid` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalpenjualan` date NOT NULL,
  `totalharga` decimal(10,2) NOT NULL,
  `pelangganid` int(11) NOT NULL,
  PRIMARY KEY (`penjualanid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO penjualan VALUES
("2","2024-01-17","164000.00","2"),
("3","2024-01-19","71000.00","3"),
("4","2024-01-19","72000.00","4"),
("5","2024-01-26","160000.00","6"),
("6","2024-01-17","12000.00","1");

CREATE TABLE `produk` (
  `produkid` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(25) NOT NULL,
  `namaproduk` varchar(225) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`produkid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO produk VALUES
("2","2222","tas","324.00","1"),
("4","8886008101053","aqua 600ml","12000.00","1"),
("5","8999999042462","Kecap Bango Tempe&Tahu Bacem 60g","30000.00","2"),
("6","8713108000781","yakul 6x65ml","13000.00","8"),
("7","xx","22","22.00","22"),
("8","xx","22","22.00","22"),
("9"," 	8003520018588","PALMOLIVE SHAMPOO HAIR SHAMPOO","21000.00","4"),
("10","80874997","KINDER JOY CHOCOLATE GIRLS 20 G","20000.00","6"),
("11","8993496106870","SANIA ROYALE 2LT REFFIL","37000.00","7"),
("12","8992628026147","BIMOLI 250ML CLASSIC","24000.00","4"),
("13","8992696415034","DANCOW 1+ 800G CHOCO","98000.00","8"),
("14"," 8998009010231","Ultra Milk Chocolate 250 mL","6000.00","5"),
("15","8999909096004","SAMPOERNA MILD FILTER 16","24000.00","8"),
("16","8999999000066","TARO POTATO 40G","5000.00","4"),
("17","89686600247","CHEETOS JAGUNG BAKAR 40G","5000.00","11"),
("18","653314503561","KUSUKA SINGKONG SAOS BLD 60G","7000.00","9"),
("19","8888166607927","KHONG GUAN MALKIST SEAWEED","8000.00","7"),
("20","8886015414061 ","NYAM-NYAM BUBBLEPUFF CHOCO CUP 18G","5000.00","15"),
("21","8886022971298","ALKALINE AA-LR6","14000.00","15"),
("22","711844120563","ABC SAMBAL BAJAKBTL 190g","20000.00","22"),
("23","9556001051509 ","MILO ORI KLG 240ML","12000.00","26"),
("24","220","AIR CUP CUP DUS","20000.00","23"),
("25","8993498210230","ANTIMO 10’SSTR","6000.00","44");

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES
("1","dwiswd","admin","admin","1"),
("2","dwi","dwi","1234","2"),
("3","dwix","dwix","1234","1");