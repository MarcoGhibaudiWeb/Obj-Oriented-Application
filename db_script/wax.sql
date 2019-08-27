

CREATE DATABASE  IF NOT EXISTS waxDB;
USE waxDB;


CREATE TABLE IF NOT EXISTS profile (
  uID int(10) unsigned NOT NULL AUTO_INCREMENT,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (uID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS product (
  pID int(10) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  pic varchar(100) NOT NULL,
  description TEXT NOT NULL,
  date VARCHAR(100) NOT NULL,
  city VARCHAR(50) NOT NULL,
  price int(10) NOT NULL,
  countdown int(5) DEFAULT 50,
  PRIMARY KEY (pID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS orders (
  oID int(10) unsigned NOT NULL AUTO_INCREMENT,
  uID int(10) NOT NULL ,
  date DATETIME,
  status VARCHAR(50) DEFAULT 'active',
  PRIMARY KEY (oID),
  FOREIGN KEY (uID) REFERENCES user(uID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS orderline (
  oID int(10) NOT NULL ,
  pID int(10) NOT NULL ,
  qt int(10) NOT NULL,
  FOREIGN KEY (oID)  REFERENCES orders(oID),
  FOREIGN KEY (pID)  REFERENCES product(pID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS cart (
  uID int(10) NOT NULL ,
  pID int(10) NOT NULL ,
  qt int(10) NOT NULL,
  status VARCHAR(50) DEFAULT 'hold',
  FOREIGN KEY (uID)  REFERENCES user(uID),
  FOREIGN KEY (pID)  REFERENCES product(pID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `product` (`pId`, `title`, `pic`, `description`, `date`, `city`, `price`) VALUES
(2, 'REIBU ãƒ¬ã‚¤ãƒ–', 'assets/event3.jpg', 'A new vibrant italian Party is growing in Milan keeping throwing amazing parties with names from all Europe.\r\n\r\nThis Saturday Reibu in the box meets Undersound to delight the italian audience with the talent of our Resident Harry McCanna.', '1212-12-12', 'Madrid', '20£'),
(3, 'CARTULIS VA', 'assets/event4.jpg', 'CARTULIS Sunday VA consists on showcasing djs around the music we believe in and with that deliver to the dance floor the biggest variety on house and techno with all their sub genres.\r\n\r\nThe night will consist in extended sets from all the ones involved in the line up and give the opportunity to each artist to develop their set into a journey. You will be able to really know what each of them are all about.\r\n\r\nThe Pickle Factory is an intimate venue with what is most important, a warm, clear and loud sound system.\r\n\r\nWell, thatâ€™s all, simple but with good intention. \r\nWe see you at The Pickle Factory.', '1311-03-12', 'London', '15£'),
(4, 'UNDERSOUND #26', 'assets/event1.jpg', 'After months in the making, we have finally invited Madrid based artist DJF Aka Ideograma to play at our party. Whilst the music heads will know him for his amazing production skills and releases on labels such as Semantica Records. Ideograma is also an amazing dj with more than 20 years of experience. Since his debut in 1992 he has never stopped delighting audiences with his talent, good taste and ability to do magic on the decks.\r\n\r\nQuest is one of the most talented young djs we have come across on our journey. He has exceptional music taste, solid mixing skills, and a very positive personality. It is a rarity to come across a dj that is so young but so confident on the decks at the same time. We are very happy to welcome him to our party.\r\n\r\nSohrab is steadily becoming a regular at our events, he is a skilled selector with great technique and one of our local favourites, and it\'s always a pleasure to have him with us.\r\n\r\nSee you on the dancefloor!', '1313-03-12', 'London', '10£'),
(5, 'Harry\' Showcase', 'assets/harry.jpg', 'The development of his forward-pushing sound was then marked by the \'Schraper\' EP in 2012 on Ostgut, emphasising Harry\'s ability to produce flowing, bass-heavy club tracks, floating between classic House and contemporary Techno.\r\n\r\nHarry also releases music as \'Third Side\' alongside Lucretio and Marieu - better known as the Analogue Cops. Together in 2012 they released their \'Unified Fields\' LP on Restoration Records, exploring the dynamics of a live-jam studio environment. To the \'Cops dirt and raw punch, Harry brings clarity and poise, and the team continue to take their hardware-only Live show to clubs worldwide. Continuing the trend of working with strong, cultured labels, Steffi also released original material on labels like NYC\'s Underground Quality, or Holland\'s Field Recordings.\r\n\r\nAlways looking forward, Harry\'s field of influence continues to expand. His work as a DJ, distinctive productions, and sought after releases on her own labels, all reflect the love he has for vinyl and help to celebrate the culture of underground dance music.', '1313-03-21', 'Berlin', '5£'),
(6, 'ADG\'s Showcase', 'assets/etienne.jpg', 'Born in 1967 in Mexico City, Harry is the leading Mexican artist of the generation that emerged in the wake of the influence of Gabriel Orozco and Francis AlÃ¿s. Ortega studied with Orozco in the informal studio class established in the older artistâ€™s atelier in the late 1980s. There, he absorbed the acute attention to form associated with Orozcoâ€™s sculpture and photography, subsequently refining his own visual and conceptual vocabulary that emerged through his focus on the points of intersection between architecture, sculpture, and spatial analysis.\r\n\r\nHarryâ€™s work can be found in myriad of public and private art collections both in the United States and abroad, and has been seen in numerous exhibitions worldwide. He currently lives and works in Berlin, Germany, and Mexico City.', '3131-03-12', 'London', '25£'),
(7, 'SEEKERS IBIZA', 'assets/event2.jpg', 'This week the european scene is gathering for the birthday of Alex Picone\'s beatiful creation, Seekers is back in Ibiza!\r\n\r\nSunday the party will start at 16:00 in the beautiful Sunset Ashram Ibiza ( Cala Comte Beach, Ibiza ) and we continue from Midnight at Eden Ibiza( San Antonio Ibiza) where we found the best sound system on the island made by Void.\r\n\r\nBoth venues are close to each other....10 minutes drive!', '3313-03-12', 'Berlin', '10£');


























