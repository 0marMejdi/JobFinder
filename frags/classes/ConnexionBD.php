<?php
// create a class that lets me connect to the phpmyadmin database in the constructor using PDO
class ConnexionBD
{
    private static  $_dbname = "JobFinder";
    private static $_user = "root";
    private static $_pwd = "";
    private static $_host = "localhost";
    private static $_bdd = null;
    private function __construct()
    {
        try {
            self::$_bdd = new PDO("mysql:host=".self::$_host.";dbname=".self::$_dbname.";charset=utf8", self::$_user, self::$_pwd);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public static function GetInstance()
    {
        if (!self::$_bdd) {
            new ConnexionBD();
        }
        return self::$_bdd;
    }
    public static function checkTables(){
        $tableCompanies =
            "CREATE TABLE IF NOT EXISTS Company (
                  companyName VARCHAR(255) ,
                  email VARCHAR(320) ,
                  password VARCHAR(255) ,
                  description VARCHAR(65535),
                  sector VARCHAR(255),
                  subSector VARCHAR(255),
                  size INT,
                  foundationDate DATE,
                  phone VARCHAR(255),
                  country VARCHAR(255),
                  region VARCHAR(255),
                  address VARCHAR(255),
                  hasLogo BOOLEAN,
                  userType VARCHAR(255)
                 
                );
";
        $tableJobSeekers =
            "CREATE TABLE IF NOT EXISTS JobSeeker(
                    
                    email VARCHAR(320),
                    firstName VARCHAR(30),
                    lastName VARCHAR(255),
                    password VARCHAR(255),
                    userType VARCHAR(255),
                    gender VARCHAR(255),
                    number VARCHAR(255),
                    birthdate DATE,
                    country VARCHAR(255),
                    region VARCHAR(255),
                    address VARCHAR(255),
                    education VARCHAR(255),
                    section VARCHAR(255),
                    subSection VARCHAR(255),
                    experience int,
                    bio VARCHAR(65535),
                    hasPhoto BOOLEAN,
                    title VARCHAR(255)
);
            
            ";
        $sectorTables =
            "CREATE TABLE IF NOT EXISTS Sector  (
                  id INT PRIMARY KEY,
                  description VARCHAR(255)
            );
                
            CREATE TABLE IF NOT EXISTS SubSector  (
                  id INT NOT NULL AUTO_INCREMENT,
                  description VARCHAR(255) NOT NULL,
                  sectorID INT NOT NULL,
                  PRIMARY KEY (id),
                  FOREIGN KEY (sectorID) REFERENCES Sector(id)
                );
            ";
        $fillSectors ="
                       
            INSERT INTO Sector (id, description)
            VALUES (1, 'Advertising / Marketing / Agency'),
                   (2, 'Architecture'),
                   (3, 'Banking / Insurance / Finance'),
                   (4, 'Consulting / Audit'),
                   (5, 'Corporate Services'),
                   (6, 'Culture / Media / Entertainment'),
                   (7, 'Distribution'),
                   (8, 'Education / Training / Recruitment'),
                   (9, 'Engineering'),
                   (10, 'Fashion / Luxury / Beauty / Lifestyle'),
                   (11, 'Food and Beverage'),
                   (12, 'Health / Social / Environment'),
                   (13, 'Hotel / Tourism / Leisure'),
                   (14, 'Industry'),
                   (15, 'Legal / Law'),
                   (16, 'Mobility / Transport'),
                   (17, 'Logistics'),
                   (18, 'Nonprofit / Association'),
                   (19, 'Public Administration'),
                   (20, 'Real Estate'),
                   (21, 'Tech');
            
            -- Insert subsectors
             INSERT INTO subSector (id, description, sectorID) VALUES
              (1, 'Digital', 1),
              (2, 'Marketing / Communications', 1),
              (3, 'AdTech / MarTech', 1),
              (4, 'Event Management', 1),
              (5, 'Design', 1),
              (6, 'Public Relations', 1),
              (7, 'Interior Design', 2),
              (8, 'Architecture', 2),
              (9, 'Finance', 3),
              (10, 'Banking', 3),
              (11, 'FinTech / InsurTech', 3),
              (12, 'Insurance', 3),
              (13, 'IT / Digital', 4),
              (14, 'Strategy', 4),
              (15, 'Organization / Management', 4),
              (16, 'Change Management', 4),
              (17, 'Audit', 4),
              (18, 'Accounting', 4),
              (19, 'Digital Marketing / Data Marketing', 5),
              (20, 'Transaction Services', 5),
              (21, 'Supply Chain', 5),
              (22, 'Corporate Support', 6),
              (23, 'Incubator / Accelerator', 6),
              (24, 'Coworking', 6),
              (25, 'Corporate Concierge Services', 6),
              (26, 'Media', 7),
              (27, 'Sports', 7),
              (28, 'Television & Film Production', 7),
              (29, 'Video Games', 7),
              (30, 'Music', 7),
              (31, 'Publishing', 7),
              (32, 'Print Media', 7),
              (33, 'Lotteries / Gambling', 7),
              (34, 'Radio', 7),
              (35, 'Film', 7),
              (36, 'Museums / Cultural Institutions', 7),
              (37, 'Art / Art Market', 7),
              (38, 'Theater', 7),
              (39, 'E-commerce', 8),
              (40, 'Mass Distribution', 8),
              (41, 'Selective Distribution', 8),
              (42, 'Job Training', 9),
              (43, 'Recruitment', 9),
              (44, 'Human Resources', 9),
              (45, 'Education', 9),
              (46, 'EdTech', 9),
              (47, 'Specialised Engineering', 10),
              (48, 'Design & Engineering Office', 10),
              (49, 'Luxury', 11),
              (50, 'Fashion', 11),
              (51, 'Cosmetics', 11),
              (52, 'Lifestyle', 11),
              (53, 'Jewelry', 11),
              (54, 'Consumer Goods', 12),
              (55, 'Foodservice', 12),
              (56, 'FoodTech', 12),
              (57, 'Beverage', 12),
              (58, 'Gourmet Grocery', 12),
              (59, 'Food Craft', 12),
              (60, 'Environment / Sustainable Development', 13),
              (61, 'Health', 13),
              (62, 'SocialTech / GreenTech', 13),
              (63, 'Home Care Services', 13),
              (64, 'Collaborative Economy', 13),
              (65, 'Hotel', 14),
              (66, 'Tourism', 14),
              (67, 'Leisure', 14),
              (68, 'Energy', 15),
              (69, 'Building / Public Works', 15),
              (70, 'Aeronautics / Space', 15),
              (71, 'Electronics / Telecommunications', 15),
              (72, 'Pharmaceutical / Biotech', 15),
              (73, 'Automotive', 15),
              (74, 'Metallurgy', 15),
              (75, 'Agri-food / Animal Nutrition', 15),
              (76, 'Rail', 15),
              (77, 'Legal Department', 16),
              (78, 'Law', 16),
              (79, 'Mobility', 17),
              (80, 'Shipping and Ground Transport', 17),
              (81, 'Nonprofit', 18),
              (82, 'NGO', 18),
              (83, 'Foundation', 18),
              (84, 'Public Administration', 19),
              (85, 'Public and Local Agencies', 19),
              (86, 'Academic Administration', 19),
              (87, 'Residential Real Estate', 20),
              (88, 'Commercial Real Estate', 20),
              (89, 'Software', 21),
              (90, 'SaaS / Cloud Services', 21),
              (91, 'Cyber Security', 21),
              (92, 'Big Data', 21),
              (93, 'Mobile Apps', 21),
              (94, 'Artificial Intelligence / Machine Learning', 21),
              (95, 'Connected Objects', 21),
              (96, 'Robotics', 21),
              (97, 'Blockchain', 21);    
        ";
        $tableJobOffers =
            "CREATE TABLE IF NOT EXISTS joboffer(
             id varchar(255) PRIMARY KEY ,
            title varchar(255) ,
            description varchar(255) ,
            salary int ,
            workType varchar(255),
            publishDate date,
            workTime varchar(255),
            location varchar(255),
            companyEmail varchar(255),
            education varchar(255),
            experience varchar(255),
            contractType varchar(255)
        );
        ";
        self::GetInstance()->query($tableJobOffers);
        self::GetInstance()->query($tableCompanies);
        self::GetInstance()->query($tableJobSeekers);
        self::GetInstance()->query($sectorTables);
        if (!ObjectRepository::selectEqualsAnd("sector")){
            self::GetInstance()->query($fillSectors);
        }

    }
}
?>