#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        user_id    Int  Auto_increment  NOT NULL ,
        email      Varchar (345) NOT NULL UNIQUE,
        name       Varchar (128) NOT NULL ,
        surname    Varchar (128) NOT NULL ,
        hash       Varchar (255) NOT NULL ,
        birth_date Date NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (user_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: locations
#------------------------------------------------------------

CREATE TABLE locations(
        location_id   Int  Auto_increment  NOT NULL ,
        location_name Varchar (255) NOT NULL ,
        address       Varchar (255) NOT NULL ,
        description   Text NOT NULL ,
        capacity      Int
	,CONSTRAINT locations_PK PRIMARY KEY (location_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: cities
#------------------------------------------------------------

CREATE TABLE cities(
        city_id   Int  Auto_increment  NOT NULL ,
        city_name Varchar (128) NOT NULL
	,CONSTRAINT cities_PK PRIMARY KEY (city_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE roles(
        role_id  Int  Auto_increment  NOT NULL ,
        role_name Varchar (128) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (role_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: organizators
#------------------------------------------------------------

CREATE TABLE organizators(
        organizator_id   Int  Auto_increment  NOT NULL ,
        organizator_name Varchar (255) NOT NULL ,
        description      Text NOT NULL ,
        user_id          Int NOT NULL UNIQUE
	,CONSTRAINT organizators_PK PRIMARY KEY (organizator_id)

	,CONSTRAINT organizators_users_FK FOREIGN KEY (user_id) REFERENCES users(user_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
        event_id          Int  Auto_increment  NOT NULL ,
        event_name        Varchar (255) NOT NULL ,
        description       Text NOT NULL ,
	details		  Text NOT NULL ,
        event_date        Datetime NOT NULL ,
        register_deadline Datetime ,
	person_max        Int ,
        age_rating        Int ,
        location_id       Int ,
        organizator_id    Int
	,CONSTRAINT events_PK PRIMARY KEY (event_id)

	,CONSTRAINT events_locations_FK FOREIGN KEY (location_id) REFERENCES locations(location_id)
	,CONSTRAINT events_organizators0_FK FOREIGN KEY (organizator_id) REFERENCES organizators(organizator_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: images
#------------------------------------------------------------

CREATE TABLE images(
        image_id Int  Auto_increment  NOT NULL ,
        src      Varchar (255) NOT NULL
	,CONSTRAINT images_PK PRIMARY KEY (image_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: registrations
#------------------------------------------------------------

CREATE TABLE registrations(
        event_id          Int NOT NULL ,
        user_id           Int NOT NULL ,
        registration_date Datetime NOT NULL
	,CONSTRAINT registrations_PK PRIMARY KEY (event_id,user_id)

	,CONSTRAINT registrations_events_FK FOREIGN KEY (event_id) REFERENCES events(event_id)
	,CONSTRAINT registrations_users0_FK FOREIGN KEY (user_id) REFERENCES users(user_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: city_location
#------------------------------------------------------------

CREATE TABLE city_location(
	city_id     Int NOT NULL ,
        location_id Int NOT NULL UNIQUE
 
	,CONSTRAINT city_location_PK PRIMARY KEY (location_id,city_id)

	,CONSTRAINT city_location_locations_FK FOREIGN KEY (location_id) REFERENCES locations(location_id)
	,CONSTRAINT city_location_cities0_FK FOREIGN KEY (city_id) REFERENCES cities(city_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: user_role
#------------------------------------------------------------

CREATE TABLE user_role(
        user_id  Int NOT NULL ,
        role_id Int NOT NULL
	,CONSTRAINT user_role_PK PRIMARY KEY (user_id,role_id)

	,CONSTRAINT user_role_users_FK FOREIGN KEY (user_id) REFERENCES users(user_id)
	,CONSTRAINT user_role_roles0_FK FOREIGN KEY (role_id) REFERENCES roles(role_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: user_city
#------------------------------------------------------------

CREATE TABLE user_city(
        user_id Int NOT NULL ,
        city_id Int NOT NULL
	,CONSTRAINT user_city_PK PRIMARY KEY (user_id,city_id)

	,CONSTRAINT user_city_users_FK FOREIGN KEY (user_id) REFERENCES users(user_id)
	,CONSTRAINT user_city_cities0_FK FOREIGN KEY (city_id) REFERENCES cities(city_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: event_image
#------------------------------------------------------------

CREATE TABLE event_image(
        image_id Int NOT NULL ,
        event_id Int NOT NULL
	,CONSTRAINT event_image_PK PRIMARY KEY (image_id,event_id)

	,CONSTRAINT event_image_images_FK FOREIGN KEY (image_id) REFERENCES images(image_id)
	,CONSTRAINT event_image_events0_FK FOREIGN KEY (event_id) REFERENCES events(event_id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: user_image
#------------------------------------------------------------

CREATE TABLE user_image(
        image_id Int NOT NULL ,
        user_id Int NOT NULL
	,CONSTRAINT user_image_PK PRIMARY KEY (image_id,user_id)

	,CONSTRAINT user_image_images_FK FOREIGN KEY (image_id) REFERENCES images(image_id)
	,CONSTRAINT user_image_user0_FK FOREIGN KEY (user_id) REFERENCES users(user_id)
)ENGINE=InnoDB;