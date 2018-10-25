create table Client (clientID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
clientName varchar(50) NOT NULL, clientDesc varchar(400) NOT NULL, gicsSector varchar(50) NOT NULL,
gicsSubIndustry varchar(100) NOT NULL, headquarters varchar(100) NOT NULL);

create table Sensors (sensorId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  sensorName varchar(50) NOT NULL,
  sensorDescription varchar(400) NOT NULL,manufacturer varchar(400) NOT NULL ,totalLifeExpentancyHours INT NOT NULL);

create table Turbine (turbineId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  turbineName varchar(50) NOT NULL,
  turbineDescription varchar(100) NOT NULL,
  capacity INT NOT NULL,rampUpTime INT NOT NULL,maintenanceInterval INT NOT NULL);

  insert into Client values (2,"Pacific Tidal Energy","Pacfici Tidal Energy makes life better for millions of people every day by providing sustainable tidal energy generation services – affordable, reliable and clean. Pacific Tidal is the largest tidal electric power holding company in the United States, supplying and delivering energy through local utilities to approximately 7.4 million U.S. customers.","Energy","Energy Service","Charlotte, NC"

  );

  insert into Sensors values (
  3,"BN350300","Dynamic Pressure Sensor","Bently Nevada",10000
  );

  insert into Turbine values (1,"3SA.01","The 3SA high efficiency, deep-water tidal turbine is an industry leader among S-class offerings.",429,12,32000
  );

  insert into Turbine values (
  2,"3SA.02","The 3SA high efficiency, deep-water tidal turbine is an industry leader among H-class offerings.",519,12,32000
  );

  insert into Turbine values (4,"SF9.06","An optimum choice for solar power generation, this series of collectors operates at the cutting edge of efficiency.",82,29,42000
  );
