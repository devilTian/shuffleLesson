use shuffleLesson;

DELIMITER //
CREATE PROCEDURE getBookId(
    OUT bId INT
)
BEGIN
   SELECT id from book where name = 'NEW CONCEPT ENGLISH 2' INTO bId;
END;

CREATE PROCEDURE setNewLesson(
    IN num INT,
    IN name CHAR(50),
    IN bId INT
)
BEGIN
    INSERT INTO lesson value (NULL, num, name, NULL , NULL, NULL, bId );
END; //
DELIMITER ;

INSERT INTO book value(NULL, 'NEW CONCEPT ENGLISH 1', 'N');
INSERT INTO book value(NULL, 'NEW CONCEPT ENGLISH 2', 'N');

CALL getBookId(@bId);

CALL setNewLesson(1, 'A private conversation', @bId);
CALL setNewLesson(2, 'Breakfast or lunch?', @bId);
CALL setNewLesson(3, 'Please send me a card', @bId);
CALL setNewLesson(4, 'An exciting trip', @bId);
CALL setNewLesson(5, 'No wrong numbers', @bId);
CALL setNewLesson(6, 'Percy Buttons', @bId);
CALL setNewLesson(7, 'Too late', @bId);
CALL setNewLesson(8, 'The best and the worst', @bId);
CALL setNewLesson(9, 'A cold welcome', @bId);
CALL setNewLesson(10, 'Not for jazz', @bId);

CALL setNewLesson(11, 'One good turn deserves another', @bId);
CALL setNewLesson(12, 'Goodbye and good luck', @bId);
CALL setNewLesson(13, 'The Greenwood Boys', @bId);
CALL setNewLesson(14, 'Do you speak English?', @bId);
CALL setNewLesson(15, 'Good news', @bId);
CALL setNewLesson(16, 'A polite request', @bId);
CALL setNewLesson(17, 'Always young', @bId);
CALL setNewLesson(18, 'He often does this!', @bId);
CALL setNewLesson(19, 'Sold out', @bId);
CALL setNewLesson(20, 'One man in a boat', @bId);
CALL setNewLesson(21, 'Mad or', @bId);
CALL setNewLesson(22, 'A glass envelope', @bId);
CALL setNewLesson(23, 'A new house', @bId);
CALL setNewLesson(24, 'If could be worse', @bId);
CALL setNewLesson(25, 'Do the English speak English?', @bId);
CALL setNewLesson(26, 'The best art critics', @bId);
CALL setNewLesson(27, 'A wet night', @bId);
CALL setNewLesson(28, 'No parking', @bId);
CALL setNewLesson(29, 'Taxi!', @bId);
CALL setNewLesson(30, 'Football or polo?', @bId);
CALL setNewLesson(31, 'Success story', @bId);
CALL setNewLesson(32, 'Shopping made easy', @bId);
CALL setNewLesson(33, 'Out of the darkness', @bId);
CALL setNewLesson(34, 'Quick work', @bId);
CALL setNewLesson(35, 'Stop thief!', @bId);
CALL setNewLesson(36, 'Across the Channel', @bId);
CALL setNewLesson(37, 'The Olympic Games', @bId);
CALL setNewLesson(38, 'Everything except the weather', @bId);
CALL setNewLesson(39, 'Am I all right?', @bId);
CALL setNewLesson(40, 'Food and talk', @bId);
CALL setNewLesson(41, 'Do you call that a hat?', @bId);
CALL setNewLesson(42, 'Not very musical', @bId);
CALL setNewLesson(43, 'Over the South Pole', @bId);
CALL setNewLesson(44, 'Through the forest', @bId);
CALL setNewLesson(45, 'A clear conscience', @bId);
CALL setNewLesson(46, 'Expensive and uncomfortable', @bId);
CALL setNewLesson(47, 'A thirsty ghost', @bId);
CALL setNewLesson(48, 'Did you want to tell me something?', @bId);
CALL setNewLesson(49, 'The end of a dream', @bId);
CALL setNewLesson(50, 'Taken for a ride', @bId);
CALL setNewLesson(51, 'Reward for virtue', @bId);
CALL setNewLesson(52, 'A pretty carpet', @bId);
CALL setNewLesson(53, 'Hot snake', @bId);
CALL setNewLesson(54, 'Sticky fingers', @bId);
CALL setNewLesson(55, 'Not a gold mine', @bId);
CALL setNewLesson(56, 'Faster than sound!', @bId);
CALL setNewLesson(57, 'Can I help you, madam?', @bId);
CALL setNewLesson(58, 'A blessing in disguise?', @bId);
CALL setNewLesson(59, 'In or out?', @bId);
CALL setNewLesson(60, 'The future', @bId);
CALL setNewLesson(61, 'Trouble with the Hubble', @bId);
CALL setNewLesson(62, 'After the fire', @bId);
CALL setNewLesson(63, 'She was not amused', @bId);
CALL setNewLesson(64, 'The Channel Tunnel', @bId);
CALL setNewLesson(65, 'Jumbo versus the police', @bId);
CALL setNewLesson(66, 'Sweet as honey!', @bId);
CALL setNewLesson(67, 'Volcanoes', @bId);
CALL setNewLesson(68, 'Persistent', @bId);
CALL setNewLesson(69, 'But not murder!', @bId);
CALL setNewLesson(70, 'Red for danger', @bId);
CALL setNewLesson(71, 'A famous clock', @bId);
CALL setNewLesson(72, 'A car called bluebird', @bId);
CALL setNewLesson(73, 'The record-holder', @bId);
CALL setNewLesson(74, 'Out of the limelight', @bId);
CALL setNewLesson(75, 'SOS', @bId);
CALL setNewLesson(76, 'April Fools\' Day', @bId);
CALL setNewLesson(77, 'A successful operation', @bId);
CALL setNewLesson(78, 'The last one?', @bId);
CALL setNewLesson(79, 'By air', @bId);
CALL setNewLesson(80, 'The Crystal Palace', @bId);
CALL setNewLesson(81, 'Escape', @bId);
CALL setNewLesson(82, 'Monster or fish?', @bId);
CALL setNewLesson(83, 'After the elections', @bId);
CALL setNewLesson(84, 'On strike', @bId);
CALL setNewLesson(85, 'Never too old to learn', @bId);
CALL setNewLesson(86, 'Out of control', @bId);
CALL setNewLesson(87, 'A perfect alibi', @bId);
CALL setNewLesson(88, 'Trapped in a mine', @bId);
CALL setNewLesson(89, 'A slip of the tongue', @bId);
CALL setNewLesson(90, 'What\'s for supper?', @bId);
CALL setNewLesson(91, 'Three men in a basket', @bId);
CALL setNewLesson(92, 'Asking for trouble', @bId);
CALL setNewLesson(93, 'A noble gift', @bId);
CALL setNewLesson(94, 'Future champions', @bId);
CALL setNewLesson(95, 'A fantasy', @bId);
CALL setNewLesson(96, 'The dead return', @bId);


update lesson set les_unit=1 where les_num < 25;
update lesson set les_unit=2 where les_num between 25 and 48;
update lesson set les_unit=3 where les_num between 49 and 72;
update lesson set les_unit=4 where les_num between 73 and 96;
