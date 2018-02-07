-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 07, 2018 at 04:22 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phdhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `ArticleID` int(11) NOT NULL,
  `Main_Figure` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` longtext NOT NULL,
  `Score` int(11) DEFAULT NULL,
  `SubmitDate` datetime NOT NULL,
  `SubTitle` text,
  `ApprovedFlag` varchar(1) NOT NULL DEFAULT 'F',
  `ApprovedDate` datetime DEFAULT NULL,
  `ApprovedBy` int(11) DEFAULT NULL,
  `ApprovedComment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`ArticleID`, `Main_Figure`, `Title`, `Content`, `Score`, `SubmitDate`, `SubTitle`, `ApprovedFlag`, `ApprovedDate`, `ApprovedBy`, `ApprovedComment`) VALUES
(1, 1, 'Retinal Detachment in a Nut Shell', 'Inside our eyes, there is a transparent jelly called the “vitreous humour” and a tissue layer at the back called the “retina”[1]. The retina acts like a screen: it absorbs light entering the eye, then relays the light information to the brain, allowing us to see the world[1]. That is how we can see the world around us. As we grow older, proteins in the vitreous humour will lose its transparency and begin to clump up into solid flakes or strands that float around in the eye[3]. The shadows formed by these flakes or strands are what we call “floaters”[3]. Some people start noticing floaters in their 20s; this is completely normal.', 85, '2017-12-04 00:00:00', 'Retinal Detachment in a Nut Shell', 'T', '2018-02-05 00:00:00', 2, ''),
(2, 2, 'Recent Advances And Novel Strategies in Liposome Formations for Drug And Nutraceutical Delivery', 'Recently, the development of novel encapsulation systems to deliver drugs and nutraceuticals for enhanced stability and bioavailability has drawn growing attention [1]. Liposome is one of promising encapsulation systems to deliver a number of drugs, bioactives and nutraceuticals. Liposomes are versatile colloidal nanovesicles composed of one (or more) bilayer of phospholipids surrounding an aqueous core. Hydrophobic, hydrophilic and/or amphiphilic compounds can be encapsulated into liposomes for various applications. Due to the similarity to natural cell membranes, liposomes show great biocompatibility and biodegradability for delivery purposes. Liposomes have played significant roles in diagnosis and treatment of a variety of diseases as one of most powerful delivery systems, and quire recently, have also drawn increasing attention in nutraceutical, food and cosmetic industry [2-3].', 79, '2017-12-18 00:00:00', 'Recent Advances And Novel Strategies in Liposome Formations for Drug And Nutraceutical Delivery', 'T', '2018-02-01 00:00:00', 2, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `CommentID` int(11) NOT NULL,
  `Title` text,
  `SubmitDate` datetime NOT NULL,
  `Content` text NOT NULL,
  `Author` int(11) NOT NULL,
  `ParentCommentID` int(11) DEFAULT NULL,
  `ArticleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`CommentID`, `Title`, `SubmitDate`, `Content`, `Author`, `ParentCommentID`, `ArticleID`) VALUES
(1, 'CommentTitle1', '2017-12-19 00:00:00', 'ContentCommentContentCommentContentComment', 1, NULL, 1),
(2, 'CommentTitle2', '2017-12-22 00:00:00', 'ContentCommentContentCommentContentComment222222222222222', 3, NULL, 1),
(3, 'CommentTitle3', '2017-12-25 00:00:00', 'ContentCommentContentCommentContentComment33333333333333333', 3, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `DefCollectionTag`
--

CREATE TABLE `DefCollectionTag` (
  `TagID` int(11) NOT NULL,
  `TagName` text NOT NULL,
  `TagDesc` text,
  `TagProperty` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DefTag`
--

CREATE TABLE `DefTag` (
  `TagID` int(11) NOT NULL,
  `TagName` text NOT NULL,
  `TagProperty` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DefTag`
--

INSERT INTO `DefTag` (`TagID`, `TagName`, `TagProperty`) VALUES
(1, 'Iamtag1', 'label-default'),
(2, 'Iamtag2', 'label-primary'),
(3, 'Iamtag3', 'label-success'),
(4, 'Iamtag4', 'label-info'),
(5, 'Iamtag5', 'label-warning'),
(6, 'Iamtag6', 'label-danger');

-- --------------------------------------------------------

--
-- Table structure for table `Figures`
--

CREATE TABLE `Figures` (
  `FigureID` int(11) NOT NULL,
  `Content` longblob NOT NULL,
  `SubmitDate` datetime NOT NULL,
  `Title` text,
  `StoreLocation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RefArticleAuthor`
--

CREATE TABLE `RefArticleAuthor` (
  `Pkey` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefArticleAuthor`
--

INSERT INTO `RefArticleAuthor` (`Pkey`, `ArticleID`, `AuthorID`) VALUES
(1, 1, 1),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `RefArticleFigure`
--

CREATE TABLE `RefArticleFigure` (
  `Pkey` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `FigureID` int(11) NOT NULL,
  `FigureLocation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RefArticleLike`
--

CREATE TABLE `RefArticleLike` (
  `Pkey` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefArticleLike`
--

INSERT INTO `RefArticleLike` (`Pkey`, `ArticleID`, `UserID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `RefArticleTag`
--

CREATE TABLE `RefArticleTag` (
  `Pkey` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefArticleTag`
--

INSERT INTO `RefArticleTag` (`Pkey`, `ArticleID`, `TagID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `RefCommentLike`
--

CREATE TABLE `RefCommentLike` (
  `Pkey` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefCommentLike`
--

INSERT INTO `RefCommentLike` (`Pkey`, `CommentID`, `UserID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 1),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `RefUserArticleCollection`
--

CREATE TABLE `RefUserArticleCollection` (
  `Pkey` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `CollectionTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefUserArticleCollection`
--

INSERT INTO `RefUserArticleCollection` (`Pkey`, `UserID`, `ArticleID`, `CollectionTag`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 3, 1, 1),
(4, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `RefUserAuthorFollow`
--

CREATE TABLE `RefUserAuthorFollow` (
  `Pkey` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `FollowerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RefUserAuthorFollow`
--

INSERT INTO `RefUserAuthorFollow` (`Pkey`, `AuthorID`, `FollowerID`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `User_Name` varchar(500) NOT NULL,
  `First_Name` varchar(500) DEFAULT NULL,
  `Last_Name` varchar(500) DEFAULT NULL,
  `Password` varchar(1000) NOT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `PhoneNumber` varchar(250) DEFAULT NULL,
  `Email` varchar(350) DEFAULT NULL,
  `Level` int(11) NOT NULL,
  `Photo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `User_Name`, `First_Name`, `Last_Name`, `Password`, `Country`, `PhoneNumber`, `Email`, `Level`, `Photo`) VALUES
(1, 'grace.li', 'Siyuan', 'Li', '920328', 'Canada', '12269781254', 'zoujinshenhai@gmail.com', 1, ''),
(2, 'pan', 'Jialei', 'Pan', '12345', 'Canada', '15197216860', 'jocelypan@gmail.com', 1, ''),
(3, 'Chao', 'Chao', 'Li', '11111111', 'Canada', '2269781254', 'Jeremy3Markhan3@gmail.com', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ArticleID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `DefCollectionTag`
--
ALTER TABLE `DefCollectionTag`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `DefTag`
--
ALTER TABLE `DefTag`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `Figures`
--
ALTER TABLE `Figures`
  ADD PRIMARY KEY (`FigureID`);

--
-- Indexes for table `RefArticleAuthor`
--
ALTER TABLE `RefArticleAuthor`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefArticleFigure`
--
ALTER TABLE `RefArticleFigure`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefArticleLike`
--
ALTER TABLE `RefArticleLike`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefArticleTag`
--
ALTER TABLE `RefArticleTag`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefCommentLike`
--
ALTER TABLE `RefCommentLike`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefUserArticleCollection`
--
ALTER TABLE `RefUserArticleCollection`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `RefUserAuthorFollow`
--
ALTER TABLE `RefUserAuthorFollow`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DefCollectionTag`
--
ALTER TABLE `DefCollectionTag`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DefTag`
--
ALTER TABLE `DefTag`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Figures`
--
ALTER TABLE `Figures`
  MODIFY `FigureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RefArticleAuthor`
--
ALTER TABLE `RefArticleAuthor`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `RefArticleFigure`
--
ALTER TABLE `RefArticleFigure`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RefArticleLike`
--
ALTER TABLE `RefArticleLike`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RefArticleTag`
--
ALTER TABLE `RefArticleTag`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RefCommentLike`
--
ALTER TABLE `RefCommentLike`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RefUserArticleCollection`
--
ALTER TABLE `RefUserArticleCollection`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `RefUserAuthorFollow`
--
ALTER TABLE `RefUserAuthorFollow`
  MODIFY `Pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
