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
DROP TABLE IF EXISTS payment_methods;
CREATE TABLE payment_methods (
  payment_id INTEGER NOT NULL AUTO_INCREMENT,
  method VARCHAR(20) NOT NULL,
  PRIMARY KEY (payment_id)
);

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

DROP TABLE IF EXISTS vehicle;
CREATE TABLE vehicle (
  vehicle_id INTEGER NOT NULL AUTO_INCREMENT,
  vehicle_type VARCHAR(60) NOT NULL,
  vehicle_seats INTEGER(50) NOT NULL,
  vehicle_license_plate VARCHAR(255) NOT NULL UNIQUE,
  created_data_on DATE NOT NULL,
  vehicle_km_stand INTEGER,
  vehicle_garage VARCHAR(200) NOT NULL,
  vehicle_next_service DATE NOT NULL,
  PRIMARY KEY (vehicle_id)
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

DROP TABLE IF EXISTS hotel;
CREATE TABLE hotel (
  hotel_id INTEGER NOT NULL AUTO_INCREMENT,
  hotel VARCHAR(150) NOT NULL,
  hotel_url VARCHAR(255) NOT NULL,
  adresse VARCHAR(200) NOT NULL,
  places_fs INTEGER NOT NULL,
  country_fs INTEGER NOT NULL,
  distance_from_zrh INTEGER NOT NULL,
  route_from_zrh VARCHAR(255),
  time_zrh TIME,
  PRIMARY KEY (hotel_id),
  FOREIGN KEY (places_fs) REFERENCES places(places_id),
  FOREIGN KEY (country_fs) REFERENCES country (country_id)
);

DROP TABLE IF EXISTS region;
CREATE TABLE region (
  region_id INTEGER NOT NULL AUTO_INCREMENT,
  region VARCHAR(50) NOT NULL,
  country_fs INTEGER NOT NULL,
  PRIMARY KEY (region_id)
);

DROP TABLE IF EXISTS destination;
CREATE TABLE destination (
  destination_id INTEGER NOT NULL AUTO_INCREMENT,
  country_fs INTEGER NOT NULL,
  destination VARCHAR(80) NOT NULL,
  dist_from_alt INTEGER,
  dist_from_bsl INTEGER,
  dist_from_zrh INTEGER,
  breaks TIME,
  region_fs INTEGER,
  served_by VARCHAR(30),
  traffic_jam_surcharge TIME,
  search_at_place TIME,
  time_alt TIME,
  time_bsl TIME,
  time_zrh TIME,
  type VARCHAR(30),
  maut_fs INTEGER,
  PRIMARY KEY (destination_id),
  FOREIGN KEY (country_fs) REFERENCES country (country_id),
  FOREIGN KEY (region_fs) REFERENCES region (region_id),
  FOREIGN KEY (maut_fs) REFERENCES maut (maut_id)
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

DROP TABLE IF EXISTS income_transfer;
CREATE TABLE income_transfer (
  id INTEGER NOT NULL AUTO_INCREMENT,
  lead_Pasenger VARCHAR(255) NOT NULL,
  datum date NOT NULL,
  start_address VARCHAR(255) NOT NULL,
  pick_up_time TIME NOT NULL,
  flight_from_to VARCHAR(255),
  payment_methods_fs INTEGER NOT NULL,
  special_needs VARCHAR(255),
  number_passengers INTEGER NOT NULL,
  small_children_seats INTEGER DEFAULT 0,
  children INTEGER DEFAULT 0,
  booster INTEGER DEFAULT 0,
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
  commente VARCHAR(255),
  link_to_accept VARCHAR(255) NOT NULL,
  link_to_decline VARCHAR(255) NOT NULL,
  hotel_fs INTEGER,
  driver_fs INTEGER,
  vehicle_fs INTEGER,
  trailer BOOLEAN,
  partner_fs INTEGER,
  PRIMARY KEY (id)
);





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




















/*
INSERT INTO users (username, password) VALUES ('daka','*****'), ('luau', '*****'), ('maku', '*****'), ('dook', '*****');

INSERT INTO places (plz, city) VALUES ('8706', 'Meilen'), ('8193', 'Eglisau'), ('8810', 'Horgen'),
  ('8400','Winterthur'), ('8907','Wettswil'), ('8854','Galgenen'), ('8001', 'Zürich');

INSERT INTO payment_methods (method) VALUES ('cash'), ('paypal'), ('bank'), ('creditcard');



INSERT INTO driver (initials, firstname, surname, adress, places_fs, phone,
drivers_license, drivers_license_back, identity_card, identitiy_card_back) VALUES
('daka', 'David', 'Kalchofner', 'Genereal Wille Str 304', 1, '+41763892032',
  'dl-front1', 'dl-back1', 'id-front1', 'id-back1'), ('luau', 'Lukas', 'Auriquio',
 'Eglisstrasse 2', 2 ,'+41964591192', 'dl-front2',
  'dl-back2', 'id-front2', 'id-back2'), ('dook', 'Dominik', 'O Kerwin','Hinterlandstrasse 42', 3,
'+41933591279',  'dl-front3','dl-back3', 'id-front3', 'id-back3'), ('maku',
  'Martin', 'Kubli','Militärstrasse 42', 4 ,'+41928541270',
  'dl-front4','dl-back4', 'id-front4', 'id-back4'), ('olam', 'Olivier', 'Amez Droz','Outbackstrasse 91', 5 ,'+41931818270',
   'dl-front5','dl-back5', 'id-front5', 'id-back5'),('olka', 'Oliver',
  'Kaelin','Irgendwo im Nirgendwo 11', 6, '+41931818911',  'dl-front6','dl-back6',
  'id-front6', 'id-back6');

INSERT INTO passenger (firstname, surname, phone) VALUES ('Tim', 'Tester','+352345234'), ('Briggite', 'Schlumpf', '+234234542'),
  ('Donald','Mcronald','+4253426235'), ('Buruck','Malalu','+43253452'), ('Max','Muster','+5324663345');


INSERT INTO partner (partner_name) VALUE ('easyyet'), ('jimdo'), ('travel24'), ('swiss'), ('ebookers');

INSERT INTO hotel (hotel,adresse,places_fs,country_fs,distance_from_zrh,
                          route_from_zrh,time_zrh) VALUES ('Hotel Löwen', 'Seestrasse 21',1,1,17,'Pfad zum Bild','00:30:00'),('Hotel xy','Eglaustrasse 412'
,2,1,30,'Pfad zum Bild','00:40:00'), ('Hotel Dolder','Dolderstrasse 12',7,1,2,'Pfad zum Bild','00:20:00'),('Hotel Winti','Bahnhofplatz 3',4,1,20,
'Pfad zum Bild','00:30:00'), ('Hotel im Dörfli', 'Galgenenstrasse 3', 6,1,50,'Pfad zum Bild','01:10:00');


INSERT INTO vehicle (vehicle_type,vehicle_seats,vehicle_license_plate,created_data_on,vehicle_km_stand,
                     vehicle_garage,vehicle_next_service)
    VALUES ('BMW',4,'ZH 676888','2016-02-02',5463,'autopro','2017-05-23'), ('BMW',4,'ZH 234568','2016-05-22',16433,'autopro','2017-02-17'),
      ('Audi',3,'ZH 747293','2016-12-12',11353,'autopro','2017-04-20'),('VW',8,'ZH 174295','2016-01-02',20054,'autopro','2017-12-01'),
      ('Mercedes',2,'ZH 174020','2016-11-12',1002,'autopro','2017-06-01');


INSERT INTO income_transfer (hotel_fs, passenger_fs, datum,start_address,pick_up_time,landing_time,flight_number,terminal,
                             partner_fs,status,special_needs,driver_fs,vehicle_fs,trailer,number_passengers,small_children_seats,
                             children,booster,luggage_amount,payment_methods_fs,price_chf) VALUES (1,1,'2017-02-05','Zürich Flughafen','14:15:00',
'14:10:00','A1394','A3',1,'In progress','Nice Car',1,1,FALSE,2,0,0,0,2,1,40.5),(1,2,'2017-01-15','Zürich Flughafen','08:15:00',
'08:05:00','A2344','A2',3,'DONE','Some Water',2,4,FALSE,2,0,0,0,2,2,50.9),(2,3,'2017-02-15','Zürich Flughafen','20:20:00',
'20:10:00','A1353','B1',4,'In progress','Aux Cord',3,2,FALSE,1,0,0,0,2,1,39.5),(4,4,'2017-02-12','Zürich Flughafen','19:00:00',
'18:55:00','A2345','A4',2,'OPEN','Heated Seats',4,1,TRUE,6,2,1,1,12,3,150.1),(5,5,'2017-04-04','Zürich Flughafen','12:50:00',
 '12:40:00','A1252','C6',5,'OPEN','Nice Car',5,2,FALSE,3,0,0,0,5,4,70.5);*/




