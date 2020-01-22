CREATE TABLE Komenda_Glowna(
  Komenda_id NUMBER(32)PRIMARY KEY NOT NULL,
  adres VARCHAR(128) NOT NULL
);
CREATE TABLE Posterunki(
  posterunek_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_komendy) REFERENCES Komenda_Glowna(Komenda_id),
  FK_id_komendy NUMBER(32) NOT NULL,
  adres VARCHAR(128) NOT NULL
);
CREATE TABLE Osoby(
  osoba_id NUMBER(32) PRIMARY KEY NOT NULL,
  imie VARCHAR(64) NOT NULL,
  nazwisko VARCHAR(64) NOT NULL,
  Pesel NUMBER(11) NOT NULL UNIQUE
);
CREATE TABLE Zgloszenia(
  zgloszenie_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_osoby) REFERENCES Osoby(osoba_id),
  FK_id_osoby NUMBER(32) NOT NULL,
  typ_zdarzenia VARCHAR(32) NOT NULL,
  data_zgloszenia DATE NOT NULL
);
CREATE TABLE Zgloszenia_posterunku(
  zgloszenie_posterunku_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_zgloszenia) REFERENCES Zgloszenia(zgloszenie_id),
  FOREIGN KEY (FK_id_posterunku) REFERENCES Posterunki(posterunek_id),
  FK_id_zgloszenia NUMBER(32) NOT NULL,
  FK_id_posterunku NUMBER(32) NOT NULL  
);
CREATE TABLE Wykroczenia(
  wykroczenie_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_osoby) REFERENCES Osoby(osoba_id),
  FK_id_osoby NUMBER(32) NOT NULL,
  data_wykroczenia DATE NOT NULL,
  typ_wykroczenia VARCHAR(64) NOT NULL
);
CREATE TABLE Kary(
  kara_id NUMBER(32) PRIMARY KEY NOT NULL,
  typ_kary VARCHAR(64) NOT NULL,
  kwota NUMBER(16) NOT NULL CHECK (kwota>=0) ,
  wyrok VARCHAR (64) NOT NULL 
);
CREATE TABLE Kary_za_wykroczenia(
  kara_za_wykroczenie_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_kary) REFERENCES Kary(kara_id),
  FOREIGN KEY (FK_id_wykroczenia) REFERENCES Wykroczenia(wykroczenie_id),
  FK_id_kary NUMBER(32) NOT NULL,
  FK_id_wykroczenia NUMBER(32) NOT NULL
);
CREATE TABLE Pracownicy(
  pracownik_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_posterunku) REFERENCES Posterunki(posterunek_id),
  FK_id_posterunku NUMBER(32) NOT NULL,
  imie VARCHAR(64) NOT NULL,
  nazwisko VARCHAR (64) NOT NULL,
  pesel NUMBER(11) NOT NULL UNIQUE,
  Stanowisko VARCHAR(32) NOT NULL,
  Wiek int CHECK (Wiek>=18)
);
CREATE TABLE Wydzialy(
  wydzial_id NUMBER(32) PRIMARY KEY NOT NULL,
  nazwa VARCHAR(64) NOT NULL
);
CREATE TABLE Policjanci(
  policjant_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_pracownika) REFERENCES Pracownicy(pracownik_id),
  FOREIGN KEY (FK_id_wydzialu) REFERENCES Wydzialy(wydzial_id),
  FK_id_pracownika NUMBER(32) NOT NULL,
  CONSTRAINT UC_Policjant UNIQUE (FK_id_pracownika),
  FK_id_wydzialu NUMBER(32) NOT NULL,
  Numer_odznaki NUMBER(32) NOT NULL UNIQUE,
  Ranga VARCHAR (64) NOT NULL
);
CREATE TABLE Zasoby(
  zasob_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_pracownika) REFERENCES Pracownicy(pracownik_id),
  FK_id_pracownika NUMBER(32) NOT NULL,
  rodzaj VARCHAR(64) NOT NULL,
  nazwa VARCHAR(32) NOT NULL
);
CREATE TABLE Czynosci_Policjantow(
  Czynosci_Policjantow_id NUMBER(32) PRIMARY KEY NOT NULL,
  FOREIGN KEY (FK_id_wykroczenia) REFERENCES Wykroczenia(wykroczenie_id),
  FOREIGN KEY (FK_id_Policjanta) REFERENCES Policjanci(policjant_id),
  FK_id_wykroczenia NUMBER(32) NOT NULL,
  FK_id_Policjanta NUMBER(32) NOT NULL
);