--DROP TABLE public.forum;
--DROP TABLE public.person_company;
--DROP TABLE public.message;
--DROP TABLE public.publication;
--DROP TABLE public.program_language;
--DROP TABLE public.friend;
--DROP TABLE public.person;
--DROP TABLE public.company;

CREATE TABLE public.person
(
  first_name character(50),
  last_name character(50),
  id_person integer NOT NULL,
  username character(50),
  pass character(50),
  email character(50),
  admission_date date,
  type_user character(20),
  gender character(10),
  CONSTRAINT "pk_idPerson" PRIMARY KEY (id_person)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.person
  OWNER TO postgres;



CREATE TABLE public.message
(
  id_message SERIAL ,
  id_first_person integer NOT NULL,
  id_second_person integer NOT NULL,
  message character(100),
  message_date date,
  CONSTRAINT message_pkey PRIMARY KEY (id_message),
  CONSTRAINT message_id_first_person_fkey FOREIGN KEY (id_first_person)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT message_id_second_person_fkey FOREIGN KEY (id_second_person)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.message
  OWNER TO postgres;


CREATE TABLE public.friend
(
  id_user1 integer NOT NULL,
  id_user2 integer NOT NULL,
  friends smallint,
  CONSTRAINT friend_id_friend_fkey FOREIGN KEY (id_user1)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT friend_id_user_fkey FOREIGN KEY (id_user2)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
     PRIMARY KEY (id_user1,id_user2)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.friend
  OWNER TO postgres;



CREATE TABLE public.forum
(
  id_forum SERIAL NOT NULL,
  id_person integer NOT NULL,
  description character(200),
  title character(20),
  CONSTRAINT forum_pkey PRIMARY KEY (id_forum),
  CONSTRAINT forum_id_person_fkey FOREIGN KEY (id_person)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.forum
  OWNER TO postgres;




CREATE TABLE public.company
(
  id_company SERIAL NOT NULL,
  company_name character(50),
  CONSTRAINT company_pkey PRIMARY KEY (id_company)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.company
  OWNER TO postgres;



CREATE TABLE public.person_company
(
  id_person integer NOT NULL,
  id_company integer NOT NULL,
  CONSTRAINT person_company_id_company_fkey FOREIGN KEY (id_company)
      REFERENCES  public.company (id_company) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT person_company_id_person_fkey FOREIGN KEY (id_person)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.person_company
  OWNER TO postgres;



CREATE TABLE public.program_language
(
  id_language SERIAL NOT NULL,
  language_name character(50),
  CONSTRAINT program_language_pkey PRIMARY KEY (id_language)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.program_language
  OWNER TO postgres;


CREATE TABLE public.publication
(
  id_language integer NOT NULL,
  id_person integer NOT NULL,
  publication_name character(100),
  description character(200),
  code character(5000),
  CONSTRAINT publication_id_language_fkey FOREIGN KEY (id_language)
      REFERENCES public.program_language (id_language) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT publication_id_person_fkey FOREIGN KEY (id_person)
      REFERENCES public.person (id_person) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.publication
  OWNER TO postgres;
--------------------------------------------------------------------------------------------------
insert into person (first_name,last_name,id_person,username,pass,email,admission_date,type_user,gender)
values ('Yorbi','Mendez','207160775','ymendez','123','yorbigmendez@gmail.com','1993-08-26','admin','M'),
('Alejandro','Hernandez','111111111','alejandro','123','alejandro@gmail.com','1993-09-30','admin','M');

insert into company (id_company,company_name)
values (1,'Avantica'),(2,'OpenPuerta'),(3,'GAP');

insert into person_company(id_person,id_company)
values ('207160775',1),('111111111',2);

select * from company;
select * from person;
select * from person_company;

--Insert program language
insert into program_language (language_name)
values ('Javascript'),('PHP'),('Ruby');

--Program language
select * from program_language
select id_language from program_language where language_name = 'PHP'

--insert publication
insert into publication (id_language, id_person, publication_name , description, code)
                     values (1,12333,'Publicatoin Name','This is my bit description','This is my sample code')

select * from person

--add friends
insert into friend (id_user1,id_user2,friends)
values (22,12333,0)--(123,22,0)

select * from friend

select * from friend

select * from friend
select * from person

--Get my publications
select pg.language_name,pub.publication_name,pub.description,pub.code from person p inner join publication pub  on p.id_person = pub.id_person inner join program_language pg on pub.id_language = pg.id_language
            where p.id_person = '22'

--Get my friends publications
SELECT  p.first_name, p.last_name, pg.language_name, pub.publication_name, pub.description, pub.code
FROM    person p
INNER JOIN friend f
ON      p.id_person = f.id_user2
INNER JOIN 	publication pub
ON	pub.id_person = f.id_user2
INNER JOIN 	program_language pg
ON 	pg.id_language = pub.id_language
WHERE	p.id_person = 22 AND f.friends = 1
UNION
SELECT  p.first_name, p.last_name, pg.language_name, pub.publication_name, pub.description, pub.code
FROM    person p
INNER JOIN friend f
ON      p.id_person = f.id_user1
INNER JOIN publication pub
ON	pub.id_person = f.id_user1
INNER JOIN 	program_language pg
ON 	pg.id_language = pub.id_language
WHERE	p.id_person = 22 AND f.friends = 1

--Accept friend request, user 1 is the one pending the request, user2 recieves it
update friend
set friends = 1
where id_user2 = 12333



