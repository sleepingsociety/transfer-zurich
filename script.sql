DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INTEGER NOT NULL AUTO_INCREMENT,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
  psalt TEXT NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS driver;
CREATE TABLE driver (
  driver_id INTEGER NOT NULL AUTO_INCREMENT,
  initials VARCHAR(8) NOT NULL,
  name VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  adress VARCHAR(255) NOT NULL,
  plz VARCHAR(8) NOT NULL,
  city VARCHAR(255) NOT NULL,
  phone1 VARCHAR(15) NOT NULL,
  phone2 VARCHAR(15),
  drivers_license VARCHAR(255) NOT NULL,
  drivers_license_back VARCHAR(255) NOT NULL,
  identity_card VARCHAR(255) NOT NULL,
  identitiy_card_back VARCHAR(255) NOT NULL,
  other_tests VARCHAR(255), /*Prüfungen*/
  other_documents VARCHAR(255),
  categories VARCHAR(255),
  PRIMARY KEY (driver_id)
);

DROP TABLE IF EXISTS destinations;
CREATE TABLE destinations (
  destination_id INTEGER AUTO_INCREMENT,
  destination VARCHAR(255) NOT NULL,
  spec_mount VARCHAR(255),
  country VARCHAR(255) NOT NULL,
  region VARCHAR(255) NOT NULL,
  typ VARCHAR(255) NOT NULL,
  distance_from_zrh INTEGER NOT NULL,
  distance_from_bsl INTEGER NOT NULL,
  distance_from_alt INTEGER NOT NULL,
  route_from_zrh VARCHAR(255),
  route_from_bsl VARCHAR(255),
  route_from_alt VARCHAR(255),
  time_zrh TIME,
  time_bsl TIME,
  time_alt TIME,
  served_by VARCHAR(255),
  mount_web VARCHAR(255), /*??*/
  mount_preis VARCHAR(255), /*Maut/Mount -> ? Abklären*/
  mount_info VARCHAR(255),
  traffic_jam_surcharge TIME,
  search_on_site TIME,
  breaks TIME,
  regular1_4 VARCHAR(255),
  regular5_8 VARCHAR(255),
  regular9_14 VARCHAR(255),
  regular15_16 VARCHAR(255),
  vip1_3 VARCHAR(255),
  vip4_7 VARCHAR(255),
  PRIMARY KEY (destination_id)
);

DROP TABLE IF EXISTS origins;
CREATE TABLE origins (
  origin_id INTEGER NOT NULL AUTO_INCREMENT,
  origins VARCHAR(255),
  country VARCHAR(255),
  distance_from_altenr VARCHAR(255),
  distance_from_bsl VARCHAR(255),
  distrance_from_zrh VARCHAR(255),
  breaks INTEGER,
  region VARCHAR(255),
  PRIMARY KEY (origin_id)
);

DROP TABLE IF EXISTS driver_compensation;
CREATE TABLE driver_compensation (
  driver_compensation_id INTEGER NOT NULL AUTO_INCREMENT,
  destination_fs INTEGER NOT NULL,
  country VARCHAR(255) NOT NULL,
  distance VARCHAR(255) NOT NULL,
  regular1_4 INTEGER,
  regular5_8 INTEGER,
  regular9_14 INTEGER,
  regular15_16 INTEGER,
  PRIMARY KEY (driver_compensation_id),
  FOREIGN KEY (destination_fs) REFERENCES destinations(destination_id)
);

DROP TABLE IF EXISTS vehicle;
CREATE TABLE vehicle (
  vehicle_id INTEGER NOT NULL AUTO_INCREMENT,
  vehicle_type VARCHAR(255) NOT NULL,
  vehicle_seats INTEGER(50) NOT NULL,
  vehicle_license_plate VARCHAR(255) NOT NULL,
  created_data_on DATE NOT NULL,
  vehicle_km_stand INTEGER,
  vehicle_km_stand_maintenance INTEGER,
  vehicle_garage VARCHAR(255) NOT NULL,
  vehicle_next_service DATE NOT NULL,
  vehicle_tires VARCHAR(255) NOT NULL,
  date_emission_test DATE,
  next_emission_test DATE,
  defective VARCHAR(255),
  speedometer VARCHAR(255),
  PRIMARY KEY (vehicle_id)
);

DROP TABLE IF EXISTS income_transfer;
CREATE TABLE income_transfer (
  id INTEGER NOT NULL AUTO_INCREMENT,
  project_fs INTEGER NOT NULL,
  origin_fs INTEGER NOT NULL,
  destination_fs INTEGER NOT NULL,
  vehicle_typ INTEGER NOT NULL,
  datum date NOT NULL,
  lead_Pasenger VARCHAR(255) NOT NULL,
  start_address VARCHAR(255) NOT NULL,
  pick_up_time VARCHAR(255) NOT NULL,
  destination_address VARCHAR(255) NOT NULL,
  takeoff_time VARCHAR(255) NOT NULL,
  flight_number VARCHAR(255) NOT NULL,
  terminal VARCHAR(100) NOT NULL,
  taxi VARCHAR(255),
  commente VARCHAR(255),
  phone_passenger VARCHAR(255) NOT NULL,
  special_needs VARCHAR(255),
  driver_fs INTEGER NOT NULL,
  vehicle_fs INTEGER NOT NULL,
  number_passengers INTEGER NOT NULL,
  small_children_seats VARCHAR(255),
  children VARCHAR(255),
  booster VARCHAR(255),
  suitcase_big INTEGER,
  suitcase_medium INTEGER,
  suitcase_small INTEGER,
  ski_snowboard INTEGER,
  other_luggage VARCHAR(255),
  voucher VARCHAR(255),
  no_show VARCHAR(20),
  rejected_time VARCHAR(255),
  price_exkl_prov_eur FLOAT NOT NULL,
  price_exkl_prov_chf FLOAT NOT NULL,
  cash VARCHAR(20),
  paypal VARCHAR(20),
  bank VARCHAR(20),
  kk VARCHAR(20),
  rejected DATE,
  booking_update VARCHAR(255),
  booking_history VARCHAR(255),
  mail_inquiry_pdf VARCHAR(255), /*Mail anfrage, pfad wird hier gespeichert zum bild*/
  route VARCHAR(255) NOT NULL, /*Route anzeigen lassen*/
  price_list VARCHAR(255), /*Ungefährer Preis denke ich*/
  apt VARCHAR(255),	/*Nachfragen*/
  partner VARCHAR(255),
  price_after_list VARCHAR(255), /*Nachfragen*/
  no_show_photo VARCHAR(255), /*NF*/
  mission_completed VARCHAR(10),
  lead_passenger_big VARCHAR(255), /*NF*/
  photo_lead_passenger VARCHAR(255),
  trailer BOOLEAN NOT NULL,
  driver_departed BOOLEAN NOT NULL,			/*Theoretisch gesehen machen diese driver_... keinen Sinn da man den Auftrag ja nicht während der Fahrt bekommt 												und er dann unterwegs ist, man könnte in der DB eine Spalte machen mit status und dann villeicht per 														Button/Dropdown auf der Webseite den aktuellen Status bestimmen.*/
  driver_on_the_way BOOLEAN NOT NULL,
  driver_arrived BOOLEAN NOT NULL,
  driver_on_the_way_back BOOLEAN NOT NULL,
  driving_time VARCHAR(255),		/*Irgendwie berechnet werden oder aus der Route vom Bild genommen*/
  confirmation_date DATE,
  confirmation_time TIME,
  price_inkl_prov_eur FLOAT NOT NULL,
  price_inkl_prov_chf FLOAT NOT NULL,
  flight_from_to VARCHAR(255),
  mail_approval_pdf VARCHAR(255), /*Bild Pfad*/
  mail_definitely_pdf VARCHAR(255), /*BILD PFAD*/
  mail_rejection_pdf VARCHAR(255), /*BILD PFAD*/
  mail_cancellation_pdf VARCHAR(255), /*BILD PFAD*/
  voucher_photo VARCHAR(255), /*BILD PFAD*/
  mail_text VARCHAR(255),
  comments_to_ride VARCHAR(255),
  cancellation_date DATE,
  cancellation_time TIME,
  PRIMARY KEY (id),
  FOREIGN KEY (origin_fs) REFERENCES origins(origin_id),
  FOREIGN KEY (destination_fs) REFERENCES destinations(destination_id),
  FOREIGN KEY (project_fs) REFERENCES wid(project_id),
  FOREIGN KEY (driver_fs) REFERENCES driver(driver_id),
  FOREIGN KEY (vehicle_fs) REFERENCES vehicle(vehicle_id)
);



