-- Create table
CREATE TABLE IF NOT EXISTS `Customer` (
    `orderID` VARCHAR(7) CHARACTER SET utf8,
    `Name` VARCHAR(15) CHARACTER SET utf8,
    `phoneNumber` VARCHAR(12) CHARACTER SET utf8
);

-- Insert data
INSERT INTO `Customer` (`orderID`, `Name`, `phoneNumber`)
VALUES 
('1','John','123-456-7890'),
	('2','Emily','987-654-3210'),
	('3','James','567-890-1234'),
	('4','Sarah','432-109-8765'),
	('5','Michael','876-543-2109'),
	('6','Jessica','210-987-6543'),
	('7','David','345-678-9012'),
	('8','Jennifer','890-123-4567'),
	('9','Daniel','654-321-0987'),
	('10','Ashley','109-876-5432'),
	('11','Robert','234-567-8901'),
	('12','Amanda','789-012-3456'),
	('13','William','543-210-9876'),
	('14','Elizabeth','678-901-2345'),
	('15','Matthew','012-345-6789'),
	('16','Samantha','456-789-0123'),
	('17','Christopher','321-098-7654'),
	('18','Melissa','765-432-1098'),
	('19','Joshua','901-234-5678'),
	('20','Andrew','890-123-4567'),
	('21','Stephanie','345-678-9012'),
	('22','Nicole','210-987-6543'),
	('23','Kimberly','654-321-0987'),
	('24','Blake','876-543-2109'),
	('25','Benjamin','123-456-7890'),
	('26','Olivia','567-890-1234'),
	('27','Ethan','432-109-8765'),
	('28','Sophia','987-654-3210'),
	('29','Alexander','109-876-5432'),
	('30','Isabella','234-567-8901'),
	('31','Mason','789-012-3456'),
	('32','Emma','543-210-9876'),
	('33','Elijah','678-901-2345'),
	('34','Mia','012-345-6789'),
	('35','Aiden','456-789-0123'),
	('36','Abigail','321-098-7654'),
	('37','Logan','765-432-1098'),
	('38','Charlotte','901-234-5678'),
	('39','Lucas','890-123-4567'),
	('40','Amelia','345-678-9012'),
	('41','Jacob','210-987-6543'),
	('42','Evelyn','654-321-0987'),
	('43','Jackson','876-543-2109'),
	('44','Harper','123-456-7890'),
	('45','Jack','567-890-1234');
