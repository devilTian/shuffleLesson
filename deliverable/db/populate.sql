use shuffleLesson;

DELIMITER //
CREATE PROCEDURE getBookId(
    OUT bId INT
)
BEGIN
   SELECT id from book where name = 'NEW CONCEPT ENGLISH 2 (New Edition)' INTO bId;
END;

CREATE PROCEDURE setNewLesson(
    IN num INT,
    IN name CHAR(50),
    IN bId INT
)
BEGIN
    INSERT INTO lesson value (NULL, num, name, NULL , NULL, bId );
END; //
DELIMITER ;

INSERT INTO book value('', 'NEW CONCEPT ENGLISH 1 (New Edition)', 'N', '特色/品牌英语', '朗文•外研社•新概念英语1:英语初阶(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能——理解、口语、阅读和写作——方面最大限度地发挥自己的潜能。新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学。');
INSERT INTO book value('', 'NEW CONCEPT ENGLISH 2 (New Edition)', 'N', '特色/品牌英语', '《朗文•外研社•新概念英语2:实践与进步(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能--理解、口语、阅读和写作--方面最大限度地发挥自己的潜能。 新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学');
INSERT INTO book value('', 'NEW CONCEPT ENGLISH 3 (New Edition)', 'N', '特色/品牌英语', '《朗文•外研社•新概念英语3:培养技能(新版)》是该教材首次出版以来第一次推出的新版本。这套经典教材一如既往地向读者提供一个完整的、经过实践检验的英语学习体系，使学生 有可能在英语的四项基本技能--理解、口语、阅读和写作--方面最大限度地发挥自己的潜能。 新版本保留了《新概念英语》得以成为世界闻名英语教程的一套基本原则，同时又包含了以下重要特色：专为中国的英语学习人士而改编，根据中国读者的需要增添了词汇表、课文注释、练习讲解和课文的参考译文。剔出了所有过时的内容，其中过时的课文有新课文取代，并配以全新的练习和插图。对原有教学法进行调整，更利于学生加强交际能力。内容更简洁精练，取消过去单独出版的繁琐补充材料，将其精华纳入主要教材。版面加大，方便翻阅；每课书相对独立，以利课堂教学');
INSERT INTO book value('', 'NEW CONCEPT ENGLISH 4 (New Edition)', 'N', '特色/品牌英语', '作为一套世界闻名的英语教程，《新概念英语》以其全新的教学理念，有趣的课文内容和全面的技能训练，深受广大英语学习者的欢迎和喜爱。进入中国以后，《新概念英语》历经了数次重印，而为了最大限度地满足不同层次、不同类型英语学习者的需求，与本教程相配套的系列辅导用书和音像产品也是林林总总，不一而足。');
INSERT INTO book value('', '英语初级听力教师用书', 'N', 'Listen To This', '《英语初级听力教师用书》整套教程共分为三册。第一册适合大学一年级学生或英语初学者使用；第二册的对象是大学二年级学生和有中等英语水平的自学者；第三册可供大学三、四年级学生和有较高英语水平的自学者使用。每册均含《学生用书》（Student\'s Book）和《教师用书》（Teacher\'s Book）,功用不同，相辅相成。《学生用书》以录音材料中的生词表、文化背景注释和配套的练习为主。《教师用书》则包含录音的书面材料、练习答案和相关文化背景知识的补充读物。');
INSERT INTO book value('', '英语中级听力教师用书', 'N', 'Listen To This', '整套教程共分为三册。第一册适合大学一年级学生或英语初学者使用；第二册的对象是大学二年级学生和有中等英语水平的自学者；第三册可供大学三、四年级学生和有较高英语水平的自学者使用。每册均含《学生用书》（Student\'s Book）和《教师用书》（Teacher\'s Book）,功用不同，相辅相成。《学生用书》以录音材料中的生词表、文化背景注释和配套的练习为主。《教师用书》则包含录音的书面材料、练习答案和相关文化背景知识的补充读物。');

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
