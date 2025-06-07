use urutauestudos;

create if not exists semanal(

    idSem int(10) primary key not null auto_increment,
    dateSem date not null,
    taskSem varchar(200),
    cod_estudante int(10) not null,
    foreign key (cod_estudante) references usuario(cod_estudante)

);