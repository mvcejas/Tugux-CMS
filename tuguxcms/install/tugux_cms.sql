-- phpMyAdmin SQL Dump
-- version 2.11.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2011 at 11:08 AM
-- Server version: 5.0.91
-- PHP Version: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugux_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `last_log_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `account_type` enum('a','b','c') NOT NULL default 'c',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `last_log_date`, `account_type`, `password`) VALUES
(1, 'tugux', '2011-02-13 20:17:59', 'a', '972923e0aae0784e770af87403e95517'),
(37, 'ali', '2011-02-22 19:11:51', 'a', 'e10adc3949ba59abbe56e057f20f883e'),
(36, 'Ali', '2011-02-16 23:56:39', 'a', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `client_email`
--

CREATE TABLE IF NOT EXISTS `client_email` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `client_email`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `topic_id`, `name`, `email`, `comment`, `date`) VALUES
(77, 10, 'Jhony', 'info@tugux.com', 'This is the CMS which i am looking for thanks to tugux CMS', '2011-03-08 20:20:11'),
(76, 9, 'fiza', 'fia', 'Its a very very cool site i am loving it ', '2011-03-07 18:58:03'),
(78, 10, 'Meeboo', 'meeboo@yahoo.com', 'Oh my God I am loving this', '2011-03-08 20:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `aboutcompany` text NOT NULL,
  `showing` enum('0','1') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `mobile`, `telefone`, `adress`, `country`, `city`, `aboutcompany`, `showing`) VALUES
(1, 'Your email', 'Your mobile', 'Your telefone', 'Your address', 'Your country', 'Your city', 'Need help? We will be happy to hear from you. For contacting us please use our contact form or the email and phone info below.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `email`
--


-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL auto_increment,
  `pagetitle` varchar(255) NOT NULL,
  `pagebody` text NOT NULL,
  `pageorder` int(11) NOT NULL,
  `showing` enum('0','1') NOT NULL default '1',
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `linklabel` varchar(255) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `admin` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `pagetitle`, `pagebody`, `pageorder`, `showing`, `keywords`, `description`, `extra`, `linklabel`, `date`, `admin`) VALUES
(1, 'Home', '<h1><font style="font-weight: bold; color: #0099FF;" size="4"><span class="heading2"></span></font><span style="color: #0099FF;">Welcome to the Tugux Studios.</span></h1>If you want to improve your business,making money fast and want to develop your business fast and rapidly? than you are on right place. But still question is how?. To promote your business in this 21th century is by making your own website of your company and most important is the professional and eye catching and decent looking website of your business with fully functional admin powers. We claim that we are best in promoting business by developing your websites.Contact us know and become a successful business man.', 1, '1', 'Home', 'Home', 'Home', 'Home', '2011-02-20 17:07:04', 'tugux');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `modulebody` text NOT NULL,
  `showing` enum('0','1') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `modulebody`, `showing`) VALUES
(1, 'footer', 'Copyright 2010-2011 Tugux CMS', '1'),
(2, 'custummodule', 'Custom Module', '1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `admin` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `news`, `admin`) VALUES
(9, '2011-02-28 22:51:41', 'Features of Tugux CMS.', 'Tugux CMS has a lot of built in features and cool about This CMS is that you can easily modify any thing in this CMS if you know PHP you can add any thing in this CMS. Some of the features are as follows.<br><ul><li>Powerful multiuser Admin Panel.(valid CSS and xhtml).</li><li>Cool and professional front end .(valid CSS and xhtml).</li><li>Free javascript image slider for main page.</li><li>Email management.(with admin control)</li><ul><li>News letter</li><li>feedback management.</li><li>Send mail system.</li><li>ect.<br></li></ul><li>News/Blog posts system.(with admin control)</li><li>Commenting system. &nbsp; <br></li></ul>', 'tugux'),
(10, '2011-03-01 00:46:05', 'Tugux CMS is released...', 'The Cms is open source and released under GPL. You can edit and redistribute it as you wish and as you want under GPL license. Tugux CMS has a lot of features and it is first CMS that you can get and understand easily it is programmed in pure and easy PHP/MYSQLI the improved version of mysql database if you find and errors and bugs please report on tugux studios, and help improve Tugux CMS by your reporting through contact form on our site. &nbsp; ', 'tugux');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL auto_increment,
  `linklabel` varchar(255) NOT NULL,
  `pagetitle` varchar(255) NOT NULL,
  `pagebody` text NOT NULL,
  `pageorder` int(11) NOT NULL,
  `showing` enum('0','1') NOT NULL default '1',
  `lastmodified` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `linklabel`, `pagetitle`, `pagebody`, `pageorder`, `showing`, `lastmodified`, `description`, `admin`) VALUES
(47, 'License', 'Tugux License', '<div class="article-content">\r\n<h1><span style="font-weight: bold; color: #0099FF;">Tugux License</span><br></h1><p>This Web site is powered by <a name="" target="" classname="" class="" href="http://www.tugux.com">Tugux Studios! </a>The software and default \r\ntemplates on which it runs are Copyright 2011 <a href="http://www.opensourcematters.org/" target="_blank" title="Open \r\nSource Matters">Open Source Matters</a>. The sample content distributed \r\nwith Tugux! is licensed under the <a name="" classname="" class="" href="http://tugux.com/doc" target="_blank" title="Joomla! Electronic Document License">Tugux! \r\nElectronic Documentation License.</a> All data entered into this Web \r\nsite and templates added after installation, are copyrighted by their \r\nrespective copyright owners.</p> <p>If you want to distribute, copy, or \r\nmodify Tugux!, you are welcome to do so under the terms of the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1" target="_blank" title="GNU General Public License"> GNU General Public \r\nLicense</a>. If you are unfamiliar with this license, you might want to \r\nread <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4" target="_blank" title="How To Apply These Terms To Your Program">''How To\r\n Apply These Terms To Your Program''</a> and the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html" target="_blank" title="GNU General Public License FAQ">''GNU General \r\nPublic License FAQ''</a>.</p> <p>The Tugux! licence has always been GPL.</p>\r\n\r\n</div>\r\n\r\n	<span class="modifydate">\r\n		</span>', 0, '1', '2011-02-27 14:30:51', '', 'tugux'),
(46, 'Overview', 'Overview', '<DIV class="article-content"><DIV class="article-content">\r\n<H1><SPAN style="font-weight: bold; font-family: Arial; color: #0099FF; background-color: #FFFFFF;">Tugux! Overview</SPAN><BR></H1><P>If you''re new to Web publishing systems, you''ll find that Tugux! \r\ndelivers sophisticated solutions to your online needs. It can deliver a \r\nrobust enterprise-level Web site, empowered by endless extensibility for\r\n your bespoke publishing needs. Moreover, it is often the system of \r\nchoice for small business or home users who want a professional looking \r\nsite that''s simple to deploy and use. <EM>We do content right</EM>.<BR> </P><P>So\r\n what''s the catch? How much does this system cost?</P><P> Well, there''s \r\ngood news ... and more good news! Tugux! (1.0) is free, it is released \r\nunder an Open Source license - the GNU/General Public License v 2.0. Had\r\n you invested in a mainstream, commercial alternative, there''d be \r\nnothing but moths left in your wallet and to add new functionality would\r\n probably mean taking out a second mortgage each time you wanted \r\nsomething adding!</P><P>Tugux! changes all that ... <BR>Tugux! is \r\ndifferent from the normal models for content management software. For a \r\nstart, it''s not complicated. Tugux! has been developed for everybody, \r\nand anybody can develop it further. It is designed to work (primarily) \r\nwith other Open Source, free, software such as PHP, MySQL, and Apache. </P><P>It\r\n is easy to install and administer, and is reliable. </P><P>Tugux! \r\ndoesn''t even require the user or administrator of the system to know \r\nHTML to operate it once it''s up and running.Â </P>\r\n\r\n</DIV></DIV>', 0, '1', '2011-02-23 18:24:15', '', 'tugux');

-- --------------------------------------------------------

--
-- Table structure for table `sent_emails`
--

CREATE TABLE IF NOT EXISTS `sent_emails` (
  `id` int(11) NOT NULL auto_increment,
  `webmaster` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sent_emails`
--

