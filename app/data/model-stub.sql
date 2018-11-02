
create table Client (clientID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
clientName varchar(50) NOT NULL, clientDesc varchar(400) NOT NULL, gicsSector varchar(50) NOT NULL,
gicsSubIndustry varchar(100) NOT NULL, headquarters varchar(100) NOT NULL);

create table Sensors (sensorId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  sensorName varchar(50) NOT NULL,
  sensorDescription varchar(400) NOT NULL,manufacturer varchar(400) NOT NULL
   ,totalLifeExpentancyHours INT NOT NULL);

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

  create table SensorsDeployed (sensorDeployedID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
sensorId INT NOT NULL, turbineDeployedId INT NOT NULL,serialNumber varchar (100),deployedDate varchar(50),
CONSTRAINT FK_SensorDep1 FOREIGN KEY (sensorId)
  REFERENCES Sensors(sensorId),
  CONSTRAINT FK_SensorDep2 FOREIGN KEY (turbineDeployedId)
    REFERENCES TurbineDeployed(turbineDeployedId));


  create table Site (siteId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,clientId INT,
    siteName varchar(50),siteDescription varchar(100),
    primaryContact varchar(100),capacity INT NOT NULL,
    commercialDate varchar (100),addrLine1 varchar (100),addrLine2 varchar (100),
    addrCity varchar (100),addrState varchar (100),
    addrZip varchar (100),addrCountry varchar (100),
    CONSTRAINT FK_SiteClient FOREIGN KEY (clientId)
      REFERENCES Client(clientID)
  );

  insert into Site values (
3,2,"King County Farm",
"The 520-megawatt King County Wind Farm consists of five
fields of wind turbine units, and is part of the Tesla Energy
Complex near Saphire Lake, Iowa.
The plant began operation in 2000 with an addition in 2009.","Jean X",
863,"2000-01-01","807 Green Field Rd",NULL,"Titonka","IA","50480","US"
);

create table TurbineDeployed(turbineDeployedId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,turbineId INT NOT NULL,siteId INT NOT NULL,serialNumber varchar(50),
    deployedDate varchar(50),
    totalFiredHours INT NOT NULL,totalStarts INT NOT NULL,
    lastPlannedOutageDate varchar(40),lastUnplannedOutageDate varchar(40),
    CONSTRAINT FK_TurbineDep1 FOREIGN KEY (turbineId)
      REFERENCES Turbine(turbineId),
      CONSTRAINT FK_TurbineDep2 FOREIGN KEY (siteId)
        REFERENCES Site(siteId));

insert into TurbineDeployed values
  (1,4,3,"9F-06-IU0021","2000-02-16",123543,119,"2016-06-01","2015-04-13"
);
