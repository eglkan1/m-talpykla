--@(#) script.ddl

CREATE TABLE TEACHER
(
	id int,
	name varchar (255),
	surname varchar (255),
	username varchar (255),
	password varchar (255),
	email varchar (255),
	school varchar (255),
	PRIMARY KEY(id)
);

CREATE TABLE USER
(
	id int,
	PRIMARY KEY(id)
);

CREATE TABLE FOLDER
(
	id int,
	title varchar (255),
	password varchar (255),
	public boolean,
	fk_TEACHERid int NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT manage FOREIGN KEY(fk_TEACHERid) REFERENCES TEACHER (id)
);

CREATE TABLE FILE
(
	id int,
	title varchar (255),
	file varchar (255),
	public boolean,
	description varchar (255),
	fk_FOLDERid int NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT have FOREIGN KEY(fk_FOLDERid) REFERENCES FOLDER (id)
);

CREATE TABLE TEST
(
	title varchar (255),
	duration int,
	public boolean,
	id,
	fk_FOLDERid int NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT include FOREIGN KEY(fk_FOLDERid) REFERENCES FOLDER (id)
);

CREATE TABLE QUESTION
(
	question varchar (255),
	id int,
	image varchar (255),
	type char (0),
	fk_TESTid NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT have FOREIGN KEY(fk_TESTid) REFERENCES TEST (id)
);

CREATE TABLE RESPONSE
(
	isRight boolean,
	id_RESPONSE integer,
	fk_USERid int NOT NULL,
	fk_QUESTIONid int NOT NULL,
	fk_TESTid NOT NULL,
	PRIMARY KEY(id_RESPONSE),
	CONSTRAINT response FOREIGN KEY(fk_USERid) REFERENCES USER (id),
	CONSTRAINT question FOREIGN KEY(fk_QUESTIONid) REFERENCES QUESTION (id),
	CONSTRAINT belong FOREIGN KEY(fk_TESTid) REFERENCES TEST (id)
);

CREATE TABLE ANSWER
(
	answer varchar (255),
	isRightChoice boolean,
	id int,
	fk_QUESTIONid int NOT NULL,
	fk_RESPONSEid_RESPONSE integer NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT have FOREIGN KEY(fk_QUESTIONid) REFERENCES QUESTION (id),
	CONSTRAINT answer FOREIGN KEY(fk_RESPONSEid_RESPONSE) REFERENCES RESPONSE (id_RESPONSE)
);
