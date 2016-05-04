select * from person where type_user = 'admin'

delete from person where first_name = 'Yorbi'
select * from person

update person
set first_name = fName, last_name

select * from person where username = 'alejandro' and pass = '123'

select id_forum, description, title from forum f inner join person p
                       on f.id_person = p.id_person
                       where p.id_person = 111111111

select publication_name, description, code, language_name from publication p inner join program_language pg on p.id_language = pg.id_language
            where p.id_person = 111111111
select * from person where lower(CONCAT(first_name,last_name)) like lower('%ale%')

insert into person (first_name,last_name,id_person,username,pass,email,admission_date,type_user,gender) values (yorbi,mendez,207160775,yorbigmendez,81dc9bdb52d04dc20036dbd8313ed055,ymenderz,1993-09-30,admin,Male);
