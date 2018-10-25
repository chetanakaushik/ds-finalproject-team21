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
