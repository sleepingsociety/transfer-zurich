DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INTEGER NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
DROP TABLE IF EXISTS places;
CREATE TABLE places (
  places_id INTEGER NOT NULL AUTO_INCREMENT,
  plz VARCHAR(20) NOT NULL UNIQUE,
  city VARCHAR(100) NOT NULL NULL,
  PRIMARY KEY (places_id)
);
DROP TABLE IF EXISTS transfer_type;
CREATE TABLE transfer_type (
  transfer_id INTEGER NOT NULL AUTO_INCREMENT,
  transfer_type VARCHAR(30) NOT NULL,
  PRIMARY KEY (transfer_id)
);

insert into transfer_type (transfer_type) VALUE ('cash');
DROP TABLE IF EXISTS partner;
CREATE TABLE partner (
  partner_id INTEGER NOT NULL AUTO_INCREMENT,
  partner_name VARCHAR(100) NOT NULL UNIQUE,
  PRIMARY KEY (partner_id)
);

DROP TABLE IF EXISTS country;
CREATE TABLE country (
  country_id INTEGER NOT NULL AUTO_INCREMENT,
  country VARCHAR(100) NOT NULL UNIQUE,
  short VARCHAR(10) NOT NULL UNIQUE,
  PRIMARY KEY (country_id)
);

DROP TABLE IF EXISTS task_entry;
CREATE TABLE task_entry (
  id_task_entry int(11) NOT NULL,
  contractor varchar(45) DEFAULT NULL,
  project_number varchar(45) DEFAULT NULL,
  accept_link varchar(255) NOT NULL,
  decline_link varchar(255) NOT NULL,
  lead_passenger varchar(45) DEFAULT NULL,
  datum varchar(45) DEFAULT NULL,
  transfer_type varchar(150) DEFAULT NULL,
  special_needs varchar(45) DEFAULT NULL,
  phone_passenger varchar(45) DEFAULT NULL,
  comments varchar(45) DEFAULT NULL,
  number_passengers varchar(45) DEFAULT NULL,
  baby_passengers varchar(45) DEFAULT NULL,
  toddler_passengers varchar(45) DEFAULT NULL,
  kid_passengers varchar(45) DEFAULT NULL,
  suitcase_big varchar(45) DEFAULT NULL,
  suitcase_medium varchar(45) DEFAULT NULL,
  suitcase_small varchar(45) DEFAULT NULL,
  ski_snowboard varchar(45) DEFAULT NULL,
  other_luggage varchar(45) DEFAULT NULL,
  origin varchar(150) DEFAULT NULL,
  origin_address varchar(255) NOT NULL,
  pickup_time varchar(45) DEFAULT NULL,
  destination varchar(100) DEFAULT NULL,
  destination_address varchar(255) NOT NULL,
  landing_takeoff_time varchar(45) DEFAULT NULL,
  flight_from_to varchar(20) DEFAULT NULL,
  flightnumber varchar(45) DEFAULT NULL,
  terminal varchar(45) DEFAULT NULL
);

DROP TABLE IF EXISTS maut;
CREATE TABLE maut (
  maut_id INTEGER NOT NULL AUTO_INCREMENT,
  maut_strecke VARCHAR(100) NOT NULL,
  maut_preis_saison_pw FLOAT NOT NULL,
  maut_preis_ohne_saison_pw FLOAT NOT NULL,
  maut_preis_saison_bus FLOAT NOT NULL,
  maut_preis_ohne_saison_bus FLOAT NOT NULL,
  maut_preis_saison_bus_anhaenger FLOAT NOT NULL,
  maut_preis_ohne_saison_bus_anhaenger FLOAT NOT NULL,
  maut_bemerkung VARCHAR(100),
  PRIMARY KEY (maut_id)
);

DROP TABLE IF EXISTS vehicle;
CREATE TABLE vehicle (
  vehicle_id INTEGER NOT NULL AUTO_INCREMENT,
  vehicle_type VARCHAR(60) NOT NULL,
  vehicle_seats INTEGER(50) NOT NULL,
  vehicle_license_plate VARCHAR(255) NOT NULL UNIQUE,
  created_data_on DATE NOT NULL,
  vehicle_km_stand INTEGER,
  vehicle_garage VARCHAR(200) NOT NULL,
  vehicle_next_service DATE,
  PRIMARY KEY (vehicle_id)
);

DROP TABLE IF EXISTS region;
CREATE TABLE region (
  region_id INTEGER NOT NULL AUTO_INCREMENT,
  region VARCHAR(50) NOT NULL,
  country_fs INTEGER NOT NULL,
  PRIMARY KEY (region_id),
  FOREIGN KEY (country_fs) REFERENCES country (country_id)
);


DROP TABLE IF EXISTS driver;
CREATE TABLE driver (
  driver_id INTEGER NOT NULL AUTO_INCREMENT,
  initials VARCHAR(8) NOT NULL UNIQUE,
  firstname VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  adress VARCHAR(255) NOT NULL,
  places_fs INTEGER NOT NULL,
  phone VARCHAR(15) NOT NULL,
  drivers_license VARCHAR(255) NOT NULL UNIQUE ,
  drivers_license_back VARCHAR(255) NOT NULL UNIQUE,
  identity_card VARCHAR(255) NOT NULL UNIQUE,
  identitiy_card_back VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY (driver_id),
  FOREIGN KEY (places_fs) REFERENCES places (places_id)
);

DROP TABLE IF EXISTS destination;
CREATE TABLE destination (
  destination_id INTEGER NOT NULL AUTO_INCREMENT,
  destination VARCHAR(80) NOT NULL,
  country_fs INTEGER,
  region_fs INTEGER,
  dist_from_zrh INTEGER,
  dist_from_bsl INTEGER,
  dist_from_alt INTEGER,
  route_from_zrh VARCHAR(255),
  route_from_bsl VARCHAR(255),
  route_from_alt VARCHAR(255),
  time_zrh TIME,
  time_bsl TIME,
  time_alt TIME,
  breaks TIME,
  traffic_jam_surcharge TIME,
  search_at_place TIME,
  type VARCHAR(30),
  maut_fs INTEGER,
  suntransfers BOOLEAN DEFAULT FALSE,
  foxtravels BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (destination_id),
  FOREIGN KEY (country_fs) REFERENCES country (country_id),
  FOREIGN KEY (region_fs) REFERENCES region (region_id),
  FOREIGN KEY (maut_fs) REFERENCES maut (maut_id)
);


DROP TABLE IF EXISTS hotel;
CREATE TABLE hotel (
  hotel_id INTEGER NOT NULL AUTO_INCREMENT,
  hotel VARCHAR(150) NOT NULL,
  hotel_url VARCHAR(255) NOT NULL,
  adresse VARCHAR(200) NOT NULL,
  places_fs INTEGER NOT NULL,
  country_fs INTEGER NOT NULL,
  destination_fs INTEGER,
  PRIMARY KEY (hotel_id),
  FOREIGN KEY (places_fs) REFERENCES places(places_id),
  FOREIGN KEY (country_fs) REFERENCES country (country_id),
  FOREIGN KEY (destination_fs) REFERENCES destination (destination_id)
);

DROP TABLE IF EXISTS income_transfer;
CREATE TABLE income_transfer (
  id INTEGER NOT NULL AUTO_INCREMENT,
  lead_passenger VARCHAR(255) NOT NULL,
  datum VARCHAR(50) NOT NULL,
  origin VARCHAR(255) NOT NULL, /*Destinations_fs*/
  pick_up_time VARCHAR(50) NOT NULL,
  flight_from_to VARCHAR(255),
  transfer_type_fs INTEGER,
  special_needs VARCHAR(255),
  number_passengers VARCHAR(10) NOT NULL,
  baby_passengers VARCHAR(60),
  toddler_passengers VARCHAR(60),
  kid_passengers VARCHAR(60),
  destination_fs INTEGER NOT NULL,
  landing_takeoff_time VARCHAR(30),
  flight_number VARCHAR(15),
  terminal VARCHAR(15),
  phone_passenger VARCHAR(20) NOT NULL,
  suitcase_big INTEGER,
  suitcase_medium INTEGER,
  suitcase_small INTEGER,
  ski_snowboard INTEGER,
  other_luggage VARCHAR(255),
  comments VARCHAR(255),
  accept_link VARCHAR(255) NOT NULL,
  decline_link VARCHAR(255) NOT NULL,
  hotel_fs INTEGER,
  driver_fs INTEGER,
  vehicle_fs INTEGER,
  trailer BOOLEAN,
  partner_fs INTEGER,
  project_status VARCHAR(30),
  PRIMARY KEY (id),
  FOREIGN KEY (partner_fs) REFERENCES partner (partner_id),
  FOREIGN KEY (vehicle_fs) REFERENCES vehicle (vehicle_id),
  FOREIGN KEY (driver_fs) REFERENCES driver (driver_id),
  FOREIGN KEY (hotel_fs) REFERENCES hotel (hotel_id),
  FOREIGN KEY (destination_fs) REFERENCES  destination (destination_id),
  FOREIGN KEY (transfer_type_fs) REFERENCES transfer_type (transfer_id)
);








/*Inserts*/


INSERT INTO maut (maut_strecke, maut_preis_saison_pw, maut_preis_ohne_saison_pw,
                  maut_preis_saison_bus, maut_preis_ohne_saison_bus, maut_preis_saison_bus_anhaenger,
                  maut_preis_ohne_saison_bus_anhaenger, maut_bemerkung) VALUES ('Keine', 0.0,0.0,0.0,0.0,0.0,0.0,'Keine');


INSERT into destination (destination) VALUES ('Strausburg');

INSERT INTO region (region, country_fs) VALUES ('Keine', 1);
/*DELETE FROM users WHERE username='dmutluay';*/


INSERT INTO country (country, short) VALUES ('Schweiz','CH'), ('Deutschland','D'), ('Östereich','A'), ('Frankreich','F'), ('Italien','I'), ('Lichtenstein', 'LI');
/*Alle Werte für Country Tabelle*/




/*
Zum Problem bezüglich z.b Payent method das es den richtigen fs in die haupttabelle speichert. -> select statement wo aus der tabelle die ID hollt,
 where payment_methode = $payment_method (variabel die vorhin beim absenden des Formulars gefüllt wird).

 Bei all diesen Anliegen zuerst ein Select Statement machen und die entsprechenden Variabeln richtig füllen, nachher alles in die Haupttabelle.
 */

/* Falls eine Typ Tabelle erstellt wird: hier die Einträge die es gibt:

City
Resort

INSERT INTO type (type_name) VALUE ('City'), ('Resort');

 */

/* Alle Regionen

Berneroberland
Tessin
Zentralschweiz
Wallis
Graubünden
Westschweiz
Arlberg
Salzburg
Kärnten
Vorarlberg
Gallenkirch
Insbruck / Innsbruck
Laneck
Pintzgau
Tirol
Savoy
Norditalien
Südtirol
Torino
Mittelland
Ostschweiz
Nordostschweiz
Baden-Wütemberg / Baden-Württemberg
Breisgau
Lichtenstein
Rügen
Bodensee
Breisach
Elsass
Schwarzwald
Landeck
Niedersachsen
Montafon
Baselland

 */
