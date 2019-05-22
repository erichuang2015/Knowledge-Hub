-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2019 at 06:56 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8956522_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `q_id` int(10) NOT NULL DEFAULT 0,
  `a_id` int(10) NOT NULL DEFAULT 0,
  `a_username` varchar(20) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  `a_upvote` int(4) NOT NULL DEFAULT 0,
  `a_downvote` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`q_id`, `a_id`, `a_username`, `a_answer`, `a_datetime`, `a_upvote`, `a_downvote`) VALUES
(17, 1, 'admin', '<p>./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol MagicService service = new MagicService(); ^ symbol: class MagicService location: class Main ./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol MagicService service = new MagicService(); ^ symbol: class MagicService location: class Main 3 errors Why does the following compilation succeed? How can one compile them in one javac command? How is -cp ./src/main/java used in the compilation? What happens in the compilation process? $ javac -cp ./src/main/java ./src/main/java/com/exec/one/*.java ./src/main/java/com/exec/one/**/*.java Thanks.</p>\n', '2019-04-11 16:27:19', 1, 0),
(22, 1, 'admin', '<pre>\n<code>create() {\n            //this is normal data\n            var data = {\n                &#39;organizationName&#39;: this.search,\n                &#39;organizationDescription&#39;: this.description,\n                &#39;facebookHandle&#39;: this.facebook,\n                &#39;instagramHandle&#39;: this.instagram,\n                &#39;twitterHandle&#39;: this.twitter,\n                &#39;organizationWebsite&#39;: this.organizerWebsite,\n            };\n            //this is image I want to add to data\n            formData.append(&#39;avatar&#39;, this.avatar)\n\n            axios.post(&#39;/create-your-event/&#39; + this.event.slug + &#39;/organizer&#39;, data).catch(error =&gt; {\n                module.status = error.response.data.status;\n            });\n        },\n</code></pre>\n', '2019-04-12 03:23:04', 0, 0),
(24, 1, 'admin', '<p>uyuygggghhggjghjghggjghjgtyt</p>\n', '2019-04-12 05:33:15', 1, 0),
(29, 1, 'shivangnaik7', '<p>rewrewjrjweireiwuriewiuriew</p>\r\n', '2019-05-06 03:35:04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL DEFAULT '',
  `details` longtext NOT NULL,
  `category` varchar(65) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `views` int(10) NOT NULL DEFAULT 0,
  `answers` int(10) NOT NULL DEFAULT 0,
  `upvote` int(10) NOT NULL DEFAULT 0,
  `downvote` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `details`, `category`, `username`, `datetime`, `views`, `answers`, `upvote`, `downvote`) VALUES
(1, 'How to get default iphone information in iOS swift?', 'Want to get default iPhone information like Latitude,Longitude,Battery,Network Status:Cellular or WiFi, Used disk space, Free disk space, Phone-number,these all things. It have a separate code to get it. But i want any one library or SDK in iOS swift. Any one help me. Thanks Advance.', 'IOS', 'admin', '10/04/19 06:07:51', 4, 0, 0, 0),
(6, 'What is the range of size that a char data type can take in MySQL?', 'A string with a maximum length of 4,294,967,295 characters. Range of -128 to 127 or 0 to 255 unsigned. Range of -32,768 to 32,767 or 0 to 65535 unsigned.', 'MySQL', 'kkk', '10/04/19 06:33:17', 1, 0, 0, 0),
(7, 'What is the difference between char and varchar?', 'CHAR is fixed length and VARCHAR is variable length. ... Because varchar is a variable-length data type, the storage size of the varchar value is the actual length of the data entered, not the maximum size for this column. You can use char when the data entries in a column are expected to be the same size.', 'CHAR', 'kkk', '10/04/19 06:34:09', 1, 0, 0, 0),
(8, 'What is meant by stack overflow?', 'A stack overflow is an undesirable condition in which a particular computer program tries to use more memory space than the call stack has available. In programming, the call stack is a buffer that stores requests that need to be handled. ... It is usually defined at the start of a program.', 'StackOverflow', 'kkk', '10/04/19 06:37:06', 5, 0, 2, 0),
(15, 'How We Can Create Model Popup With Bootstrap?', 'asasasasas', 'asasasas', 'admin', '11/04/19 03:56:19', 0, 0, 0, 0),
(16, 'How We Can Create Model Popup With Bootstrap?', 'dgdfgdfg', 'gdfgdf', 'admin', '11/04/19 03:56:42', 0, 0, 0, 0),
(17, 'When there is depenency between several .java files, do we need to compile them in some order?', 'When compiling several .java files with some dependency relation between them, do we need to compile them in some order?\r\n\r\nMust a dependency be .class file? Or can a dependency be a .java file?\r\n\r\nSpecifically, when A.java depends on B.class file compiled from B.java file, but B.class hasn\'t been created (i.e. B.java file hasn\'t been compiled into B.class), can we compile A.java by specifying the directory for B.java in java -cp? Or do we need to compile B.java into B.class first, and then specify the directory for B.class in java -cp when compiling A.java?\r\n\r\nFor example, from https://dzone.com/articles/java-8-how-to-create-executable-fatjar-without-ide, ./src/main/java/com/exec/one/Main.java depends on ./src/main/java/com/exec/one/service/MagicService.java, and both haven\'t been compiled yet.\r\n\r\nWhy does the following compilation fail?\r\n\r\n$ javac  ./src/main/java/com/exec/one/*.java -d ./out/\r\n./src/main/java/com/exec/one/Main.java:3: error: package com.exec.one.service does not exist\r\nimport com.exec.one.service.MagicService;\r\n                           ^\r\n./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol\r\n        MagicService service = new MagicService();\r\n        ^\r\n  symbol:   class MagicService\r\n  location: class Main\r\n./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol\r\n        MagicService service = new MagicService();\r\n                                   ^\r\n  symbol:   class MagicService\r\n  location: class Main\r\n3 errors\r\nWhy does the following compilation succeed? How can one compile them in one javac command? How is -cp ./src/main/java used in the compilation? What happens in the compilation process?\r\n\r\n$ javac -cp ./src/main/java ./src/main/java/com/exec/one/*.java ./src/main/java/com/exec/one/**/*.java\r\nThanks.', 'JAVA', 'King', '11/04/19 04:20:47', 1, 1, 0, 0),
(19, 'When there is depenency between several .java files, do we need to compile them in some order?', '<p>When compiling several .java files with some dependency relation between them, do we need to compile them in some order?</p>\n\n<p>Must a dependency be .class file? Or can a dependency be a .java file?</p>\n\n<p>Specifically, when A.java depends on B.class file compiled from B.java file, but B.class hasn&#39;t been created (i.e. B.java file hasn&#39;t been compiled into B.class), can we compile A.java by specifying the directory for B.java in&nbsp;<code>java -cp</code>? Or do we need to compile B.java into B.class first, and then specify the directory for B.class in&nbsp;<code>java -cp</code>&nbsp;when compiling A.java?</p>\n\n<p>For example, from&nbsp;<a href=\"https://dzone.com/articles/java-8-how-to-create-executable-fatjar-without-ide\">https://dzone.com/articles/java-8-how-to-create-executable-fatjar-without-ide</a>,&nbsp;<code>./src/main/java/com/exec/one/Main.java</code>&nbsp;depends on&nbsp;<code>./src/main/java/com/exec/one/service/MagicService.java</code>, and both haven&#39;t been compiled yet.</p>\n\n<p>Why does the following compilation fail?</p>\n\n<pre>\n<code>$ javac  ./src/main/java/com/exec/one/*.java -d ./out/\n./src/main/java/com/exec/one/Main.java:3: error: package com.exec.one.service does not exist\nimport com.exec.one.service.MagicService;\n                           ^\n./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol\n        MagicService service = new MagicService();\n        ^\n  symbol:   class MagicService\n  location: class Main\n./src/main/java/com/exec/one/Main.java:8: error: cannot find symbol\n        MagicService service = new MagicService();\n                                   ^\n  symbol:   class MagicService\n  location: class Main\n3 errors</code></pre>\n\n<p>Why does the following compilation succeed? How can one compile them in one&nbsp;<code>javac</code>&nbsp;command? How is&nbsp;<code>-cp ./src/main/java</code>&nbsp;used in the compilation? What happens in the compilation process?</p>\n\n<pre>\n<code>$ javac -cp ./src/main/java ./src/main/java/com/exec/one/*.java ./src/main/java/com/exec/one/**/*.java</code></pre>\n\n<p>Thanks.</p>\n', 'dasdas', 'admin', '11/04/19 04:39:01', 8, 0, 0, 0),
(20, 'Redirect page based on the login using token verification to different SPA projects', '<p>I have 3 views which runs in different ports in the server page 1,page 2(SPA) and page 3(SPA) page 1 is the front end page and has the login screen, while clicking on the login screen and the user. I have to redirect to page 2 or page 3 and using secured token verification.</p>\r\n\r\n<p>whats the best way to implement the logic?</p>\r\n', 'JavaScript', 'admin11', '11/04/19 05:40:54', 0, 0, 0, 0),
(21, 'How to fix DeleteManyAsync returning 0 records deleted with Filter?', '<p>I have a delete method that takes in an IEnumerable of Ids that are of type string, and have a filter taking in those ids using Filter.In. However when passing in a set of ids I am getting a count of 0 for records deleted. Is my filter causing the issue?</p>\r\n\r\n<p>I&#39;ve created a test method to test my delete method and am passing in ids to try and have them deleted.</p>\r\n\r\n<hr />\r\n<p><strong>Test Project</strong></p>\r\n\r\n<p>MongodDB Test method for delete method</p>\r\n\r\n<pre>\r\n<code>    [Theory]\r\n    [InlineData(1)]\r\n    [InlineData(100)]\r\n    public async void TEST_DELETE(int quantity)\r\n    {\r\n        using (var server = StartServer())\r\n        {\r\n            // Arrange\r\n            var collection = SetupCollection(server.Database, quantity);\r\n            var dataUtility = new MongoDataUtility(server.Database, \r\n    MongoDbSettings);\r\n            var service = new MongoDatabaseService(dataUtility, Logger);\r\n\r\n            var items = \r\n    collection.FindSync(FilterDefinition&lt;BsonDocument&gt;.Empty)\r\n    .ToIdCollection();\r\n            _output.WriteLine(JsonConvert.SerializeObject(items, \r\n    Formatting.Indented));\r\n\r\n            // Act\r\n            var result = await \r\n    dataUtility.DeleteIdentifiedDataAsync(items, CollectionName);\r\n            _output.WriteLine(JsonConvert.SerializeObject(result, \r\n    Formatting.Indented));\r\n\r\n            // Assert\r\n            Assert.True(result.DeletedCount.Equals(items.Count));\r\n        }\r\n    }</code></pre>\r\n\r\n<p>Setup collection</p>\r\n\r\n<pre>\r\n<code>    public IMongoCollection&lt;BsonDocument&gt; SetupCollection(IMongoDatabase db, \r\n    int quantity)\r\n    {\r\n        var collection = db.GetCollection&lt;BsonDocument&gt;(CollectionName);\r\n\r\n        AddCreateDateIndex(collection);\r\n        SeedData(collection, quantity);\r\n\r\n        return collection;\r\n    }</code></pre>\r\n\r\n<p>Seed data</p>\r\n\r\n<pre>\r\n<code>    public void SeedData(IMongoCollection&lt;BsonDocument&gt; collection, int? \r\n    quantity = null)\r\n    {\r\n        if (quantity != null &amp;&amp; quantity &gt; 0)\r\n        {\r\n            collection.InsertMany(GenerateTestData((int)quantity));\r\n        }\r\n    }</code></pre>\r\n\r\n<hr />\r\n<p><strong>Project</strong></p>\r\n\r\n<p>MongoDB delete method</p>\r\n\r\n<pre>\r\n<code> public async Task&lt;DeleteResult&gt; \r\n DeleteIdentifiedDataAsync(IEnumerable&lt;ObjectId&gt; ids, string Resource, \r\n CancellationToken cancellationToken = default)\r\n    {\r\n        var collection = _db.GetCollection&lt;BsonDocument&gt;(Resource);\r\n        var filter = Builders&lt;BsonDocument&gt;.Filter.In(&quot;_id&quot;, ids);\r\n\r\n        if (ids != null &amp;&amp; ids.Any() )\r\n        {\r\n            return await collection.DeleteManyAsync(filter, \r\n cancellationToken);\r\n        }\r\n\r\n        return null;\r\n    }</code></pre>\r\n\r\n<p>Extensions</p>\r\n\r\n<pre>\r\n<code>    public static ICollection&lt;ObjectId&gt; ToIdCollection(this \r\n    IAsyncCursor&lt;BsonDocument&gt; @this)\r\n    {\r\n        return @this.Find(Builders&lt;BsonDocument&gt;.Filter.Empty)\r\n            .ToEnumerable()\r\n            .Select(s =&gt; s[&quot;_id&quot;].AsObjectId)\r\n            .ToList();\r\n    }</code></pre>\r\n', 'C#', 'admin11', '11/04/19 05:41:47', 3, 0, 1, 0),
(22, 'How can I submit image (formData) and string text variables (data) with one axios Post in Vue?', '<p>I am trying to submit an image and other variable fields with one axios post in vue. I am having trouble combining the formData with regular variable string data.</p>\n\n<p>I have tried append() but formData and data don&#39;t seem to work nicely together. I also tried just submitting the image right when the user adds the image as a seperate formData request but I realized that doesn&#39;t work because I need to check firstorNew() with my data submission.</p>\n', 'data', 'admin', '12/04/19 03:22:22', 20, 1, 2, 0),
(30, 'Verifying the gmail by clicking the link', '<p>I am a beginner in java and want to make a java application that can send a gmail to the user and in gmail there should be a link. When user clicks the link the java application will say that your gmail is verified. I have sent the mail using smtp but the problem is in sending link.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'gmail', 'admin', '06/05/19 06:50:30', 1, 0, 0, 1),
(31, 'weqweqweqweqeqeqeqwe', '<p>eqweqe</p>\r\n', 'eww', 'admin', '06/05/19 06:55:02', 2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `otp` int(6) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `email`, `password`, `hash`, `otp`, `active`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', '', 123456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voteanswer`
--

CREATE TABLE `voteanswer` (
  `q_id` int(4) NOT NULL,
  `a_id` int(4) NOT NULL,
  `va_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avote` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voteanswer`
--

INSERT INTO `voteanswer` (`q_id`, `a_id`, `va_name`, `avote`) VALUES
(17, 1, 'admin', 1),
(24, 1, 'admin', 1),
(29, 1, 'shivangnaik7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votequestion`
--

CREATE TABLE `votequestion` (
  `q_id` int(10) NOT NULL,
  `v_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qvote` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `votequestion`
--

INSERT INTO `votequestion` (`q_id`, `v_name`, `qvote`) VALUES
(8, 'admin', 1),
(8, 'kkk', 1),
(22, 'admin', 1),
(24, 'admin', 1),
(29, 'shivangnaik7', 1),
(22, 'shivangnaik7', 1),
(31, 'admin', 1),
(30, 'admin', 1),
(21, 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
