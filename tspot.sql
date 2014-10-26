-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2013 at 01:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`AdminID`, `Username`, `Password`) VALUES
(1, 'earth', '7b1b7e864afdaa361654b3a2e99bb9aa'),
(6, 'balot', '7b747600386fe405f2a03270cfdf1044');

-- --------------------------------------------------------

--
-- Table structure for table `Regions`
--

CREATE TABLE IF NOT EXISTS `Regions` (
  `RegionID` int(11) NOT NULL AUTO_INCREMENT,
  `RegionName` varchar(45) NOT NULL,
  PRIMARY KEY (`RegionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Regions`
--

INSERT INTO `Regions` (`RegionID`, `RegionName`) VALUES
(1, 'Luzon'),
(2, 'Visayas'),
(3, 'Mindanao');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE IF NOT EXISTS `Reviews` (
  `ReviewID` int(11) NOT NULL AUTO_INCREMENT,
  `SpotID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Source` varchar(100) NOT NULL,
  PRIMARY KEY (`ReviewID`),
  KEY `fk_Reviews_Spot` (`SpotID`),
  KEY `fk_Reviews_Admin` (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Spots`
--

CREATE TABLE IF NOT EXISTS `Spots` (
  `SpotID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `RegionID` int(11) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Images` varchar(500) NOT NULL,
  `Tags` varchar(500) NOT NULL,
  PRIMARY KEY (`SpotID`),
  KEY `fk_Spots_Admin` (`AdminID`),
  KEY `fk_Spots_Region` (`RegionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Spots`
--

INSERT INTO `Spots` (`SpotID`, `AdminID`, `Name`, `Description`, `Location`, `Latitude`, `Longitude`, `RegionID`, `Source`, `Images`, `Tags`) VALUES
(1, 1, 'Biri Rock Formations', 'Dwarfed by the spectacular rock formations in Biri Island, Northern Samar\n"The harshness of the elements created a spectacular formation. You will be surprised on how this was formed. It was as if a master craftsman did his obra maestra so massive for everyone to see. Standing atop the rock formation I experienced the strong winds that can even blow myself if lose balance. Its colors make it more beautiful as the elements make it gray, black, green and yellow."', 'Northern Samar', 12.6854, 124.385, 2, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/a.jpg', 'rock, samar'),
(2, 1, 'Bucas Grande Island', 'Can be reached only duringÂ low-tide, this is the Sohoton Cave Opening. Sohoton means â€œto stoop or get downâ€\r\nIf you think Coron, Palawan is beautiful wait until you visit Sohoton Caves and Bucas Grande Island.Â I was actually hesitant to write about the Sohoton Cove because this would mean more tourists to this piece of paradise on earth; more tourists means more trash right? But then again, the secret is out and all I can do is implore the readers to â€œleave nothing but footprints.â€ I hope you do this not only here but in every place you visit. I hope this will not be another Boracay. Be dumbfounded withÂ clean lakes, secret coves, enchanting lagoons, spectacular rock and coral formations and incredible sea creatures like the stingless jellyfish.', 'Surigao del Norte', 9.42095, 126.011, 3, 'http://journeyingjames.com', 'uploads/b.jpg', 'island, lagoon'),
(3, 1, 'Gumasa White Beach', 'Serenity at the far end of Gumasa. ZZZzzzzâ€¦â€¦\r\nSome call it the next Boracay or the Boracay of the South. I wonder why they compare this little paradise to theÂ dirtyÂ island of Bora.Gumasa white beach was love at first sight. Heart pumped fast as I hurriedly went off the motorcycle. I looked for a place to set-up my hammock so I can have some snooze.Â I tied my hammock and slept for almost 2 hours, I didnâ€™t mind if people are walking to and fro. I slept without any fear of being mugged or anything. The place was serene and peaceful. Contrary to what many in Manila think of Mindanao.', 'Saranggani', 6.05726, 125.28, 3, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/c.jpg', 'white beach'),
(4, 1, 'Cantilan', 'Surigao del Sur. Cantilan is not really part of my itinerary, I just planned a quick lunch there and continue going southwards until I arrive at Agusan del Sur to see the giant crocodile â€œLolong.â€ But Cantilan is just too beautiful to leave, too charming not to explore.\r\n	I was in love with the place. The locals are so warm and friendly. I became friends with 	Cathe and she welcomed me into their house. I was able to enjoy Cantilan and the 	surrounding islands which to me are secret jewels of this little town.', 'Cantilan', 9.29392, 125.996, 3, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/d.jpg', 'beach'),
(6, 1, 'Calauit Island', 'The Philippines has its own little wildlife preserve on Calauit Island, a sanctuary for amazing animals which are not native to the country. Located in the Northwestern coast of Palawan, Calauit was declared a game preserve and wildlife sanctuary in 1977. This was done in response to an appeal made by the International Union of Conservation of Nature (IUCN) to capable countries to help save endangered animals in Africa.\r\n	Visitors come here for the African experience without the price of intercontinental travel. Tourists can 	see giraffes and zebras run across the land as though they were at home, and observe their natural 	behaviors. All travellers must, however, comply with strict visitor conduct guidelines to ensure the 	well-being of the plants and animals.', 'Busuanga', 12.3018, 119.905, 2, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/g.jpg', 'Island, animals'),
(7, 1, 'Anawangin Cove', 'Zambales has become increasingly popular in the recent years, and today itâ€™s recognized as one of the bestÂ places to visitÂ in the archipelago. Only roughly four hours from Manila, itâ€™s easy enough to reach. It is happily unspoilt, and many visitors choose to camp along its pristine shores overnight.', 'Zambales', 14.9221, 120.062, 1, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/h.jpg', 'beach'),
(8, 1, 'Donsol', 'Come May, Donsol becomes one of the few places where people can observe the rare gentle giant of the marine world, the whale shark. The worldâ€™s largest fish species, these sharks come every year, swimming and feeding right in the local bay. Local fishermen have adjusted to the tourist market, and now assist in taking visitors to swim with the amazing animals.', 'Sorsogon', 12.9069, 123.603, 2, 'http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-philippines', 'uploads/j.jpg', 'whale, beach'),
(9, 1, 'Puraran Beach', 'In 1979, when two Australian surfers visited Baras, Catanduanes, they â€œdiscoveredâ€ what they called the â€œmajesticâ€ waves of Puraran Beach. Since then, the surfers come every year for the surfing season around August to November.And since then, many well-known surfersÂ have followed. Surfing competitions are held every year in August for the town fiesta, and in October for the national and international surfers.\r\nWhat â€œCloud Nineâ€ is to Siargao, â€œMajesticâ€ is to Puraran. The strong gusts of wind push the wave to take majestic shapes, at once fascinating and frightening. While giant waves curl and crash, surfers dash to face the wrath of the mighty sea, armed only with their colorful surfboards. It is when Puraran, wet and wild, is at its glorious best. Its waves are comparable to Siargaoâ€™s, the surfing mecca of the Philippine archipelago.\r\nClean and white, Puraran is invigorating to those who want to bask in the glory of sea, sand, and sky. This is the most famous beac', 'Catanduanes', 13.8594, 124.418, 1, 'http://vigattintourism.com/tourism/articles/Puraran-Beach-The-Surfing-Capital-of-Catanduanes', 'uploads/k.jpg', 'beach'),
(10, 1, 'Ligpo Island', 'Island and Beach Resort Located in Batangas. This Island is one of the best diving spot in the Philippines. Corals of different types and huge gorgonians in the area. The locations is on the west side of the island.\r\n\r\nApproximately 75 feet south of the Dive 7000 Resort area and about 450 feet, lies a giant rock formation that looks like an underwater amphitheater. Originally virtually barren, the cathedral has been seeded with coral from other sites. Throngs of eager fish around visiting divers waiting to be fed.', 'Batangas', 13.8214, 120.903, 1, 'http://www.ligpoisland.com/', 'uploads/l.jpg', 'island, lagoon'),
(11, 1, 'Hinulugang Taktak', 'Hinulugang TaktakÂ is a waterfall in theÂ PhilippinesÂ seen inÂ the provinceÂ of Rizal on Luzon island. The waterfall area has been designated as a National Park by the Department of Environment and Natural Resources and is 1 of the two most favouriteÂ tourist spotsÂ in Antipolo City, Rizalâ€™s capital, the other being the Antipolo Cathedral. In 1990, the waterfall has also been announced as a National Historical Shrine under Republic Act No. 6964.', 'Rizal', 14.5952, 121.168, 1, 'http://www.travelphilippinesnow.com/waterfalls/hinulugang-taktak/', 'uploads/m.jpg', 'beach'),
(12, 1, 'Apo Island Rock', 'Negros Oriental, also called Oriental Negros or "Eastern Negros", is a province of the Philippines located in the Central Visayas region. It occupies the southeastern half of the island of Negros, with Negros Occidental comprising the northwestern half. It also includes Apo Island, a popular dive site for both local and foreign tourists. Negros Oriental faces Cebu to the east across the TaÃ±on Strait and Siquijor to the south east. The primary spoken language is Cebuano, and the predominant religious denomination is Roman Catholicism. Dumaguete City is the capital, seat of government, and most populous city.', 'Negros Oriental', 11.9775, 120.123, 2, 'http://vigattintourism.com/tourism/destinations/99', 'uploads/r.jpg', 'rock formation'),
(13, 1, 'Dibagat River', 'Founded more than a decade ago in 1995, Apayao Province dubs itself the â€œCordilleraâ€™s Last Frontier for Nature Richnessâ€. Apart from the two ancient Spanish churches at Pudtol, the attractions are purely natural.', 'Apayao', 17.9813, 121.209, 2, 'http://www.touristspotsphilippines.com/luzon-tourist-attractions/apayao-province-and-its-natural-tou', 'uploads/n.jpg', 'river'),
(14, 1, 'Hoyhoy Island', 'The city of ozamiz grew out of an old Spanish town called Misamisâ€”a name believed to have been derived from the Subanen word "Kuyamis," a variety of coconut. The origin and the growth of the old Spanish town, Misamis, was due to the presence of the Spanish garrison stationed at the stone fort named Nuestra Senora dela Concepcion del Triunfo which was constructed sometimes the 18th century in order to control the piratical activities originating in the nearby Lanao area.', 'Ozamis City', 8.13911, 123.847, 3, 'http://www.theviewingdeck.com/2011/03/ozamiz-and-iligan-city-next-emerging.html', 'uploads/o.jpg', 'island, beach'),
(15, 1, 'Siquijor Island', 'Siquijor is famous for being a mystical island, said to be full of shamans, witches and natural phenomena. This belief gives an attraction for travelers the most exciting adventure This picturesque island not only gives you an exciting adventure, but also a relaxing holiday because of their-mostly-undisturbed beaches and reef that are good for snorkeling and diving adventures as well as virgin forests for hiking and trips.\r\n\r\nThis island was previously called â€œIsland of Fireâ€ or â€œIsland del fuegoâ€ by the Spaniards. During their exploration, they saw an island that gave off the strange glow which hypnotized them to come. The flashes came from a large number of fireflies that sheltered in the molave trees on the island. This is one explanation why it is recognized as a mystical island full of mysterious attracting stories.', 'Siquijor', 9.20107, 123.595, 3, 'http://www.phil-islands.com/how-to-go-to-siquijor-island-siquijor-travel-information', 'uploads/p.jpg', 'island, beach'),
(17, 1, 'Tinglaya', 'The last Kalinga Tattoo artist- Fang-od/Fhang-od, 89, she carefully tattoos Dr. Vene of Ateneo with the ancient method she learned during her teen years. She was featured by Discovery Channelâ€™s Tattoo Hunter by Lars Krutak. The ancient form of tattooing, using charcoal from the pinewoods mixed with water made permanent with the help of a makeshift needle from the thorn of calamansi tree. Hidden among the mountains of Sierra Madre is the province of Kalinga. Civilization here dates back centuries ago but its just 17 years old as it was part of a bigger province before- Kalinga-Apayao. Its one province that would forever be etched on my mind as I experienced true hospitality and saw the living heritage it offers the world. Tinglayan is also known for Whang-od, the last Kalinga Tattoo artist, age 89. In the photo above she tattoes Dr. Vene of Ateneo with the ancient method she learned during her teen years. She was already featured in Discovery Channelâ€™s Tattoo Hunter by Lars Krutak', 'Kalinga', 17.2903, 121.166, 1, 'Source: http://journeyingjames.com/2012/12/10-must-visit-off-the-beaten-path-destinations-in-the-phi', 'uploads/f.jpg', 'tattoo');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `fk_Reviews_Admin` FOREIGN KEY (`AdminID`) REFERENCES `Admin` (`AdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reviews_Spot` FOREIGN KEY (`SpotID`) REFERENCES `Spots` (`SpotID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Spots`
--
ALTER TABLE `Spots`
  ADD CONSTRAINT `fk_Spots_Admin` FOREIGN KEY (`AdminID`) REFERENCES `Admin` (`AdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Spots_Region` FOREIGN KEY (`RegionID`) REFERENCES `Regions` (`RegionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
