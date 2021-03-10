-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2020-06-18 20:32:50
-- 服务器版本： 5.6.36
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yangruix_sticat`
--

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE `file` (
  `fid` int(10) NOT NULL,
  `fname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `pid` int(10) NOT NULL,
  `time` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`fid`, `fname`, `pid`, `time`) VALUES
(1, 'How to Be Happy 25 Habits to Add to Your Routine.docx', 1, '2020/06/18-04:24:09pm'),
(2, '春节的来历.docx', 2, '2020/06/18-04:29:29pm'),
(3, '春节的习俗.docx', 2, '2020/06/18-04:31:22pm'),
(4, 'How To Be Successful In Life 13 Life-Changing Tips.docx', 1, '2020/06/18-04:35:59pm'),
(5, 'How to Live a Meaningful Life 10 Inspiring Ideas to Find Meaning.docx', 1, '2020/06/18-05:32:52pm'),
(6, '春晚小知识.docx', 2, '2020/06/18-05:47:03pm');

-- --------------------------------------------------------

--
-- 表的结构 `lang`
--

CREATE TABLE `lang` (
  `lid` int(10) NOT NULL,
  `lname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `code1` varchar(30) NOT NULL,
  `code2` varchar(30) NOT NULL,
  `code3` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `lang`
--

INSERT INTO `lang` (`lid`, `lname`, `code1`, `code2`, `code3`) VALUES
(1, '中文(ZH)', '', '', ''),
(2, '英文(EN)', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `langpair`
--

CREATE TABLE `langpair` (
  `id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `tid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `langpair`
--

INSERT INTO `langpair` (`id`, `sid`, `tid`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `pid` smallint(50) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `text` varchar(1000) NOT NULL COMMENT '项目描述',
  `langpairid` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL,
  `invite_code` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`pid`, `projectname`, `text`, `langpairid`, `date`, `uid`, `invite_code`, `status`) VALUES
(1, 'Life tips', 'Here are some tips for a happy life.', 2, '2020/06/18 - 16:18:17', 1, '739794f598', 1),
(2, '春节小常识', '以下为关于春节的一些小知识。', 1, '2020/06/18 - 16:26:07', 2, '5535289053', 1);

-- --------------------------------------------------------

--
-- 表的结构 `projectshare`
--

CREATE TABLE `projectshare` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `projectshare`
--

INSERT INTO `projectshare` (`id`, `pid`, `uid`, `status`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `source`
--

CREATE TABLE `source` (
  `sid` int(20) NOT NULL,
  `fid` varchar(50) NOT NULL,
  `context` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `source`
--

INSERT INTO `source` (`sid`, `fid`, `context`) VALUES
(1, '1', 'Happiness looks different for everyone.'),
(2, '1', ' For you, maybe it’s being at peace with who you are.'),
(3, '1', ' Or having a secure network of friends who accept you unconditionally.'),
(4, '1', ' Or the freedom to pursue your deepest dreams.'),
(5, '1', 'Regardless of your version of true happiness, living a happier, more satisfied life is within reach.'),
(6, '1', ' A few tweaks to your regular habits can help you get there.'),
(7, '1', 'Habits matter.'),
(8, '1', ' If you’ve ever tried breaking a bad habit, you know all too well how engrained they are.'),
(9, '1', 'Well, good habits are deeply engrained, too.'),
(10, '1', ' Why not work on making positive habits part of your routine?'),
(11, '1', 'Here’s a look at some daily, monthly, and yearly habits to help kickstart your quest.'),
(12, '1', ' Just remember that everyone’s version of happiness is a little different, and so is their path to achieving it.'),
(13, '1', 'If some of these habits create added stress or just don’t fit your lifestyle, ditch them.'),
(14, '1', ' With a little time and practice, you’ll figure out what does and doesn’t work for you.'),
(15, '1', 'Daily habits'),
(16, '1', '1.'),
(17, '1', ' Smile'),
(18, '1', 'You tend to smile when you’re happy.'),
(19, '1', ' But it’s actually a two-way street.'),
(20, '1', 'We smile because we’re happy, and smiling causes the brain to release dopamine, which makes us happier.'),
(21, '1', 'That doesn’t mean you have to go around with a fake smile plastered on your face all the time.'),
(22, '1', ' But the next time you find yourself feeling low, crack a smile and see what happens.'),
(23, '1', ' Or try starting each morning by smiling at yourself in the mirror.'),
(24, '1', '2.'),
(25, '1', ' Exercise'),
(26, '1', 'Exercise isn’t just for your body.'),
(27, '1', ' Regular exercise can help to reduce stress, feelings of anxiety, and symptoms of depression while boosting self-esteem and happiness.'),
(28, '1', 'Even a small amount of physical activity can make a difference.'),
(29, '1', ' You don’t have to train for a triathlon or scale a cliff — unless that’s what makes you happy, of course.'),
(30, '1', 'The trick is not to overexert.'),
(31, '1', ' If you suddenly throw yourself into a strenuous routine, you’ll probably just end up frustrated (and sore).'),
(32, '1', 'Consider these exercise starters:'),
(33, '1', 'Take a walk around the block every night after dinner.'),
(34, '1', 'Sign up for a beginner’s class in yoga or tai chi.'),
(35, '1', 'Start your day with 5 minutes of stretching.'),
(36, '1', ' Here’s a set of stretches to get you started.'),
(37, '1', 'Remind yourself of any fun activities you once enjoyed, but that have fallen by the wayside.'),
(38, '1', ' Or activities you always wanted to try, such as golf, bowling, or dancing.'),
(39, '1', '3.'),
(40, '1', ' Get plenty of sleep'),
(41, '1', 'No matter how much modern society steers us toward less sleep, we know that adequate sleep is vitalTrusted Source to good health, brain function, and emotional well-being.'),
(42, '1', 'Most adults need about 7 or 8 hours of sleep every night.'),
(43, '1', ' If you find yourself fighting the urge to nap during the day or just generally feel like you’re in a fog, your body may be telling you it needs more rest.'),
(44, '1', 'Here are a few tips to help you build a better sleep routine:'),
(45, '1', 'Write down how many hours of sleep you get each night and how rested you feel.'),
(46, '1', ' After a week, you should have a better idea how you’re doing.'),
(47, '1', 'Go to bed and wake up at the same time every day, including weekends.'),
(48, '1', 'Reserve the hour before bed as quiet time.'),
(49, '1', ' Take a bath, read, or do something relaxing.'),
(50, '1', ' Avoid heavy eating and drinking.'),
(51, '1', 'Keep your bedroom dark, cool, and quiet.'),
(52, '1', 'Invest in some good bedding.'),
(53, '1', 'If you have to take a nap, try to limit it to 20 minutes.'),
(54, '1', 'If you consistently have problems sleeping, talk to your doctor.'),
(55, '1', ' You may have a sleep disorder requiring treatment.'),
(56, '1', '4.'),
(57, '1', ' Eat with mood in mind'),
(58, '1', 'You already know that food choices have an impact on your overall physical health.'),
(59, '1', ' But some foods can also affect your state of mind.'),
(60, '1', 'For example:'),
(61, '1', 'Carbohydrates release serotonin, a “feel good” hormone.'),
(62, '1', ' Just keep simple carbs — foods high in sugar and starch — to a minimum, because that energy surge is short and you’ll crash.'),
(63, '1', ' Complex carbs, such as vegetables, beans, and whole grains, are better.'),
(64, '1', 'Lean meat, poultry, legumes, and dairy are high in protein.'),
(65, '1', ' These foods release dopamine and norepinephrine, which boost energy and concentration.'),
(66, '1', 'Highly processed or deep-fried foods tend to leave you feeling down.'),
(67, '1', ' So will skipping meals.'),
(68, '1', 'Start by making one better food choice each day.'),
(69, '1', 'For example, swap a big, sweet breakfast pastry for some Greek yogurt with fruit.'),
(70, '1', ' You’ll still satisfy your sweet tooth, and the protein will help you avoid a mid-morning energy crash.'),
(71, '1', ' Try adding in a new food swap each week.'),
(72, '1', '5.'),
(73, '1', ' Be grateful'),
(74, '1', 'Simply being grateful can give your mood a big boost, among other benefits.'),
(75, '1', ' For example, a recent two-part study found that practicing gratitude can have a significant impact on feelings of hope and happiness.'),
(76, '1', 'Start each day by acknowledging one thing you’re grateful for.'),
(77, '1', ' You can do this while you’re brushing your teeth or just waiting for that snoozed alarm to go off.'),
(78, '1', 'As you go about your day, try to keep an eye out for pleasant things in your life.'),
(79, '1', ' They can be big things, such as knowing that someone loves you or getting a well-deserved promotion.'),
(80, '1', 'But they can also be little things, such as a co-worker who offered you a cup of coffee or the neighbor who waved to you.'),
(81, '1', ' Maybe even just the warmth of the sun on your skin.'),
(82, '1', 'With a little practice, you may even become more aware of all the positive things around you.'),
(83, '1', '6.'),
(84, '1', ' Give a compliment'),
(85, '1', 'Research shows that performing acts of kindness can help you feel more satisfied.'),
(86, '1', 'Giving a sincere compliment is a quick, easy way to brighten someone’s day while giving your own happiness a boost.'),
(87, '1', 'Catch the person’s eye and say it with a smile so they know you mean it.'),
(88, '1', ' You might be surprised by how good it makes you feel.'),
(89, '1', 'If you want to offer someone a compliment on their physical appearance, make sure to do it in a respectful way.'),
(90, '1', ' Here are some tips to get you started.'),
(91, '1', '7.'),
(92, '1', ' Breathe deeply'),
(93, '1', 'You’re tense, your shoulders are tight, and you feel as though you just might “lose it.”'),
(94, '1', ' We all know that feeling.'),
(95, '1', 'Instinct may tell you to take a long, deep breath to calm yourself down.'),
(96, '1', 'Turns out, that instinct is a good'),
(97, '1', 'one.'),
(98, '1', ' According to Harvard Health, deep breathing exercises can help'),
(99, '1', 'reduce stress.'),
(100, '1', 'The next time you feel stressed or at your wit’s end, work through these steps:'),
(101, '1', 'Close your eyes.'),
(102, '1', ' Try to envision a happy memory or beautiful place.'),
(103, '1', 'Take a slow, deep breath in through your nose.'),
(104, '1', 'Slowly breathe out through your mouth or nose.'),
(105, '1', 'Repeat this process several times, until you start to feel yourself calm down.'),
(106, '1', 'If you’re having a hard time taking slow, deliberate breaths, try counting to 5 in your head with each inhale and exhale.'),
(107, '1', '8.'),
(108, '1', ' Acknowledge the unhappy moments'),
(109, '1', 'A positive attitude is generally a good thing, but bad things happen to everyone.'),
(110, '1', ' It’s just part of life.'),
(111, '1', 'If you get some bad news, make a mistake, or just feel like you’re in a funk, don’t try to pretend you’re happy.'),
(112, '1', 'Acknowledge the feeling of unhappiness, letting yourself experience it for a moment.'),
(113, '1', ' Then, shift your focus toward what made you feel this way and what it might take to recover.'),
(114, '1', 'Would a deep breathing exercise help?'),
(115, '1', ' A long walk outside?'),
(116, '1', ' Talking it over with someone?'),
(117, '1', 'Let the moment pass and take care of yourself.'),
(118, '1', ' Remember, no one’s happy all the time.'),
(119, '1', '9.'),
(120, '1', ' Keep a journal'),
(121, '1', 'A journal is a good way to organize your thoughts, analyze your feelings, and make plans.'),
(122, '1', ' And you don’t have to be a literary genius or write volumes to benefit.'),
(123, '1', 'It can be as simple as jotting down a few thoughts before you go to bed.'),
(124, '1', ' If putting certain things in writing makes you nervous, you can always shred it when you’ve finished.'),
(125, '1', ' It’s the process that counts.'),
(126, '1', 'Not sure what to do with all the feelings that end up on the page?'),
(127, '1', ' Our guide to organizing your feelings can help.'),
(128, '1', '10.'),
(129, '1', ' Face stress head-on'),
(130, '1', 'Life is full of stressors, and it’s impossible to avoid all of them.'),
(131, '1', 'There’s no need to.'),
(132, '1', ' Stanford psychologist Kelly McGonigal says that stress isn’t always harmful, and we can even change our attitudes about stress.'),
(133, '1', ' Learn more about the upside of stress.'),
(134, '1', 'For those stressors you can’t avoid, remind yourself that everyone has stress — there’s no reason to think it’s all on you.'),
(135, '1', ' And chances are, you’re stronger than you think you are.'),
(136, '1', 'Instead of letting yourself get overwhelmed, try to tackle the stressor head-on.'),
(137, '1', ' This might mean initiating an uncomfortable conversation or putting in some extra work, but the sooner you tackle it, the sooner the pit in your stomach will start to shrink.'),
(138, '1', 'Weekly habits'),
(139, '1', '11.'),
(140, '1', ' Declutter'),
(141, '1', 'Decluttering sounds like a big project, but setting aside just 20 minutes a week can have a big impact.'),
(142, '1', 'What can you do in 20 minutes?'),
(143, '1', ' Lots.'),
(144, '1', 'Set a timer on your phone and take 15 minutes to tidy up a specific area of one room — say, your closet or that out-of-control junk drawer.'),
(145, '1', ' Put everything in its place and toss or give away any extra clutter that’s not serving you anymore.'),
(146, '1', 'Keep a designated box for giveaways to make things a little easier (and avoid creating more clutter).'),
(147, '1', 'Use the remaining 5 minutes to do a quick walk through your living space, putting away whatever stray items end up in your path.'),
(148, '1', 'You can do this trick once a week, once a day, or anytime you feel like your space is getting out of control.'),
(149, '1', '12.'),
(150, '1', ' See friends'),
(151, '1', 'Humans are social beings, and having close friends can make us happier.'),
(152, '1', 'Who do you miss?'),
(153, '1', ' Reach out to them.'),
(154, '1', ' Make a date to get together or simply have a long phone chat.'),
(155, '1', 'In adulthood, it can feel next to impossible to make new friends.'),
(156, '1', ' But it’s not about how many friends you have.'),
(157, '1', ' It’s about having meaningful relationships — even if it’s just with one or'),
(158, '1', 'two people.'),
(159, '1', 'Try getting involved in a local volunteer group or taking a class.'),
(160, '1', ' Both can help to connect you with like-minded people in your area.'),
(161, '1', ' And chances are, they’re looking for friends, too.'),
(162, '1', 'Companionship doesn’t have to be limited to other humans.'),
(163, '1', ' Pets can offer similar benefits, according to multiple studies.'),
(164, '1', 'Love animals but can’t have a pet?'),
(165, '1', ' Consider volunteering at a local animal shelter to make some new friends — both human and animal.'),
(166, '1', '13.'),
(167, '1', ' Plan your week'),
(168, '1', 'Feel like you’re flailing about?'),
(169, '1', ' Try sitting down at the end of every week and making a basic list for the following week.'),
(170, '1', 'Even if you don’t stick to the plan, blocking out time where you can do laundry, go grocery shopping, or tackle projects at work can help to quiet your mind.'),
(171, '1', 'You can get a fancy planner, but even a sticky note on your computer or piece of scrap paper in your pocket can do the job.'),
(172, '1', '14.'),
(173, '1', ' Ditch your phone'),
(174, '1', 'Unplug.'),
(175, '1', ' Really.'),
(176, '1', 'Turn off all the electronics and put those ear buds away for at least one hour once a week.'),
(177, '1', ' They’ll still be there for you later.'),
(178, '1', ' If you still want them, that is.'),
(179, '1', 'If you haven’t unplugged in a while, you might be surprised at the difference it makes.'),
(180, '1', ' Let your mind wander free for a change.'),
(181, '1', ' Read.'),
(182, '1', ' Meditate.'),
(183, '1', ' Take a walk and pay attention to your surroundings.'),
(184, '1', ' Be sociable.'),
(185, '1', ' Or be alone.'),
(186, '1', ' Just be.'),
(187, '1', 'Sound too daunting?'),
(188, '1', ' Try doing a shorter amount of time several times a week.'),
(189, '1', '15.'),
(190, '1', ' Get into nature'),
(191, '1', 'Spending 30 minutes or more a week in green spaces can help lower blood pressure and depression, according to a 2016 studyTrusted Source.'),
(192, '1', 'Your green space could be anything from your neighborhood park, your own backyard, or a rooftop garden — anywhere you can appreciate some nature and fresh air.'),
(193, '1', 'Better yet, add some outdoor'),
(194, '1', 'exercise into the mix for extra benefit.'),
(195, '1', '16.'),
(196, '1', ' Explore meditation'),
(197, '1', 'There are many methods of meditation to explore.'),
(198, '1', ' They can involve movement, focus, spirituality, or a combination of all three.'),
(199, '1', 'Meditation doesn’t have to be complicated.'),
(200, '1', ' It can be as simple as sitting quietly with your own thoughts for 5 minutes.'),
(201, '1', ' Even the deep breathing exercises mentioned earlier can serve as a form of meditation.'),
(202, '1', '17.'),
(203, '1', ' Consider therapy'),
(204, '1', 'We’re certainly happier when we learn how to cope with obstacles.'),
(205, '1', ' When you’re faced with a problem, think about what got you through something similar in the past.'),
(206, '1', ' Would it work here?'),
(207, '1', ' What else can you try?'),
(208, '1', 'If you feel like you’re hitting a brick wall, consider speaking with a therapist on a weekly basis.'),
(209, '1', ' You don’t need to have a diagnosed mental health condition or overwhelming crisis to seek therapy.'),
(210, '1', 'Therapists are trained to help people improve coping skills.'),
(211, '1', ' Plus, there’s no obligation to continue once you start.'),
(212, '1', 'Even just a few sessions can help you add some new goodies to your emotional toolbox.'),
(213, '1', 'Worried about the cost?'),
(214, '1', ' Here’s how to afford therapy on any budget.'),
(215, '1', '18.'),
(216, '1', ' Find a self-care ritual'),
(217, '1', 'It’s easy to neglect self-care in a fast-paced world.'),
(218, '1', ' But your body carries your thoughts, passions, and spirit through this world, doesn’t it deserve a little TLC?'),
(219, '1', 'Maybe it’s unwinding your workweek with a long, hot bath.'),
(220, '1', ' Or adopting a skin care routine that makes you feel indulgent.'),
(221, '1', ' Or simply setting aside a night to put on your softest jammies and watch a movie from start to finish.'),
(222, '1', 'Whatever it is, make time for it.'),
(223, '1', ' Put it in your planner if you must, but do it.'),
(224, '1', 'Monthly habits'),
(225, '1', '19.'),
(226, '1', ' Give back'),
(227, '1', 'If you find that giving daily compliments provides a needed boost to your mood, considering making a monthly routine of giving back on a larger scale.'),
(228, '1', 'Maybe that’s helping out at a food bank on the third weekend of every month, or offering to watch your friend’s kids one night per month.'),
(229, '1', '20.'),
(230, '1', ' Take yourself out'),
(231, '1', 'No one to go out with?'),
(232, '1', ' Well, what rule says you can’t go out alone?'),
(233, '1', 'Go to your favorite restaurant, take in a movie, or go on that trip you’ve always dreamed of.'),
(234, '1', 'Even if you’re a social butterfly, spending some deliberate time alone can help you reconnect with the activities that truly make you happy.'),
(235, '1', '21.'),
(236, '1', ' Create a thought list'),
(237, '1', 'You arrive for an appointment with 10 minutes to spare.'),
(238, '1', ' What do you do with that time?'),
(239, '1', ' Pick up your cell phone to scroll through social media?'),
(240, '1', ' Worry about the busy week you have ahead of you?'),
(241, '1', 'Take control of your thoughts during these brief windows of time.'),
(242, '1', 'At the start of each month, make a short list of happy memories or things you’re looking forward to on a small piece of paper or on your phone.'),
(243, '1', 'When you find yourself waiting for a ride, standing in line at the grocery store, or just with a few minutes to kill, break out the list.'),
(244, '1', ' You can even use it when you’re just generally feeling down and need to change up your thoughts.'),
(245, '1', 'Yearly habits'),
(246, '1', '22.'),
(247, '1', ' Take time to reflect'),
(248, '1', 'The start of a new year is a good time to stop and take inventory of your life.'),
(249, '1', ' Set aside some time to catch up with yourself the way you would with an old friend:'),
(250, '1', 'How are you doing?'),
(251, '1', 'What have you been up to?'),
(252, '1', 'Are you happier than you were a year ago?'),
(253, '1', 'But try to avoid the pitfall of judging yourself too harshly for your answers.'),
(254, '1', ' You’ve made it to another year, and that’s plenty.'),
(255, '1', 'If you find that your mood hasn’t improved much over the last year, consider making an appointment with your doctor or talking to a therapist.'),
(256, '1', ' You might be dealing with depression or even an underlying physical condition that’s impacting your mood.'),
(257, '1', '23.'),
(258, '1', ' Reevaluate your goals'),
(259, '1', 'People change, so think about where you’re heading and consider if that’s still where you want to go.'),
(260, '1', ' There’s no shame in changing your game.'),
(261, '1', 'Let go of any goals that no longer serve you, even if they sound nice on paper.'),
(262, '1', '24.'),
(263, '1', ' Take care of your body'),
(264, '1', 'You hear it all the time, including several times in this article, but your physical and mental health are closely intertwined.'),
(265, '1', 'As you build habits to improve your happiness, make sure to follow up with routine appointments to take care your body:'),
(266, '1', 'see your primary care physician for an annual physical'),
(267, '1', 'take care of any chronic health conditions and see specialists as recommended'),
(268, '1', 'see your dentist for an oral exam and follow up as recommended'),
(269, '1', 'get your vision checked'),
(270, '1', '25.'),
(271, '1', ' Let go of grudges'),
(272, '1', 'This is often easier said than done.'),
(273, '1', ' But you don’t have to do it for the other person.'),
(274, '1', 'Sometimes, offering forgiveness or dropping a grudge is more about self-care than compassion for others.'),
(275, '1', 'Take stock of your relationships with others.'),
(276, '1', ' Are you harboring any resentment or ill will toward someone?'),
(277, '1', ' If so, consider reaching out to them in an effort to bury the hatchet.'),
(278, '1', 'This doesn’t have to be a reconciliation.'),
(279, '1', ' You may just need to end the relationship and move on.'),
(280, '1', 'If reaching out isn’t an option, try getting your feelings out in a letter.'),
(281, '1', ' You don’t even have to send it to them.'),
(282, '1', ' Just getting your feelings out of your mind and into the world can be freeing.'),
(283, '2', '现代民间习惯上把过春节又叫做过年。'),
(284, '2', '其实，年和春节的起源是很不相同的。'),
(285, '2', '那么\"年\"究竟是怎么样来的呢？'),
(286, '2', '民间主要有两种说法：一种说的是，古时候，有一种叫做\"年\"的凶猛怪兽，每到腊月三十，便窜村挨户，觅食人肉，残害生灵。'),
(287, '2', '有一个腊月三十晚上，\"年\"到了一个村庄，适逢两个牧童在比赛牛鞭子。\"年\"忽闻半空中响起了啪啪的鞭声，吓得望风而逃。'),
(288, '2', '它窜到另一个村庄，又迎头望到了一家门口晒着件大红衣裳，它不知其为何物，吓得赶紧掉头逃跑。'),
(289, '2', '后来它又来到了一个村庄，朝一户人家门里一瞧，只见里面灯火辉煌，刺得它头昏眼花，只好又夹着尾巴溜了。'),
(290, '2', '人们由此摸准了\"年\"有怕响，怕红，怕光的弱点，便想到许多抵御它的方法，于是逐渐演化成今天过年的风俗。'),
(291, '2', '另一种说法是，我国古代的字书把\"年\"字放禾部，以示风调雨顺，五谷丰登。'),
(292, '2', '由于谷禾一般都是一年一熟。'),
(293, '2', '所\"年\"便被引申为岁名了。'),
(294, '2', '我国古代民间虽然早已有过年的风俗，但那时并不叫做春节。'),
(295, '2', '因为那时所说的春节，指的是二十四节气中的\"立春\"。'),
(296, '2', '南北朝则把春节泛指为整个春季。'),
(297, '2', '据说，把农历新年正式定名为春节，是辛亥革命后的事。'),
(298, '2', '由于那时要改用阳历，为了区分农、阳两节，所以只好将农历正月初一改名为\"春节\"。'),
(299, '3', '春节是我国一个古老的节日，也是全年最重要的一个节日，如何过庆贺这个节日，在千百年的历史发展中，形成了一些较为固定的风俗习惯，有许多还相传至今。'),
(300, '3', '春联也叫门对、春贴、对联、对子、桃符等，它以工整、对偶、简洁、精巧的文字描绘时代背景，抒发美好愿望，是我国特有的文学形式。'),
(301, '3', '每逢春节，无论城市还是农村，家家户户都要精选一幅大红春联贴于门上，为节日增加喜庆气氛。'),
(302, '3', '这一习俗起于宋代，在明代开始盛行，到了清代，春联的思想性和艺术性都有了很大的提高，梁章矩编写的春联专著《槛联丛话》对楹联的起源及各类作品的特色都作了论述。'),
(303, '3', '春联的种类比较多，依其使用场所，可分为门心、框对、横披、春条、斗方等。'),
(304, '3', '“门心”贴于门板上端中心部位'),
(305, '3', ';“框对”贴于左右两个门框上;“横披”贴于门媚的横木上;“春条”根据不同的内容，贴于相应的地方;“斗斤”也叫“门叶”，为正方菱形，多贴在家俱、影壁中。'),
(306, '3', '在民间人们还喜欢在窗户上贴上各种剪纸——窗花。'),
(307, '3', '窗花不仅烘托了喜庆的节日气氛，也集装饰性、欣赏性和实用性于一体。'),
(308, '3', '剪纸在我国是一种很普及的民间艺术，千百年来深受人们的喜爱，因它大多是贴在窗户上的，所以也被称其为“窗花”。'),
(309, '3', '窗花以其特有的概括和夸张手法将吉事祥物、美好愿望表现得淋漓尽致，将节日装点得红火富丽。'),
(310, '3', '在贴春联、窗花的同时，一些人家要在屋门上、墙壁上、门楣上贴上大大小小的“福”字。'),
(311, '3', '春节贴“福”字，是我国民间由来已久的风俗。'),
(312, '3', '“福”字指福气、福运，寄托了人们对幸福生活的向往，对美好未来的祝愿。'),
(313, '3', '为了更充分地体现这种向往和祝愿，有的人干脆将“福”字倒过来贴，表示“幸福已到”“福气已到”。'),
(314, '3', '民间还有将“福”字精描细做成各种图案的，图案有寿星、寿桃、鲤鱼跳龙门、五谷丰登、龙凤呈祥等。'),
(315, '4', 'What is success to you?'),
(316, '4', ' How to be successful in life?'),
(317, '4', 'To some, when they think of success, they imagine wealth; others want power; some just want to make a positive impact on the world.'),
(318, '4', 'All of these are perfectly valid, indeed success is a concept that means different things to different people.'),
(319, '4', ' Though no matter what success is to you, it almost certainly isn’t something will come easily.'),
(320, '4', 'There are countless guides and books to being successful, however, as success is personal and unique to each individual.'),
(321, '4', ' The advice contained in these books can often not be relevant.'),
(322, '4', ' Therefore following the advice of a single individual can often be unhelpful.'),
(323, '4', 'With this in mind, considering the advice of a great many people, people whose ideas of success were different both to each other, and quite possibly, to you can be a good alternative.'),
(324, '4', 'What follows is a list of 13 of the best pieces of advice from some of the most successful people who have ever lived.'),
(325, '4', ' If you want to learn how to be successful, these tips are essential:'),
(326, '4', '1.'),
(327, '4', ' Think Big'),
(328, '4', 'From Michelangelo Buonarroti, Great Renaissance Artist:'),
(329, '4', '“'),
(330, '4', 'The greater danger for most of us lies not in setting our aim too high and falling short; but in setting our aim too low, and achieving our mark.”'),
(331, '4', 'There are few artists as influential as Michaelangelo.'),
(332, '4', ' Today centuries after his death, his work still inspires and connects to people.'),
(333, '4', ' His work is world famous, just think of his statue of David, or the Mural in the Sistine Chapel in the Vatican.'),
(334, '4', 'Imagine then, if he decided not to work as an artist.'),
(335, '4', 'Being a successful artist has always been extremely difficult, imagine if he decided to give up this ambition in favour of something easier?'),
(336, '4', 'Oftentimes, people often decided to put their dreams aside for something more “realistic”.'),
(337, '4', ' To give up their dream for something easier.'),
(338, '4', ' This quote teaches us the danger of such a point of view.'),
(339, '4', 'Instead be ambitious.'),
(340, '4', '2.'),
(341, '4', ' Find What You Love to Do and Do It'),
(342, '4', 'From Oprah Winfrey, Media Mogul:'),
(343, '4', '“'),
(344, '4', 'You know you are on the road to success if you would do your job and not be paid for it.”'),
(345, '4', 'This is a good quote to remember and think about when you’re at work.'),
(346, '4', 'Imagine being as successful as possible in your current job.'),
(347, '4', ' Ultimately you’ll probably find yourself working extremely hard and this it will take up much of your time.'),
(348, '4', 'If it’s a job you hate, then being successful at it might only mean filling your life with something you hate to do.'),
(349, '4', ' What’s the sense in this?'),
(350, '4', 'Instead, why not focus on doing something you love?'),
(351, '4', ' When you’ve found what you’re passionate about, you get the motivation to keep you moving.'),
(352, '4', ' Success at this means the fulfilment of your dreams.'),
(353, '4', 'Not sure what your passion is yet?'),
(354, '4', ' You should learn about this Motivation Engine first.'),
(355, '4', 'Even if you’re not successful, you still filled your time with something you love to do.'),
(356, '4', ' Many successful musicians spent years of their lives doing unpaid performances, the only reason they kept playing was because they loved to perform.'),
(357, '4', '3.'),
(358, '4', ' Learn How to Balance Life'),
(359, '4', 'From Phil Knight, CEO of Nike Inc.:'),
(360, '4', '“'),
(361, '4', 'There is an immutable conflict at work in life and in business, a constant battle between peace and chaos.'),
(362, '4', ' Neither can be mastered, but both can be influenced.'),
(363, '4', ' How you go about that is the key to success.”'),
(364, '4', 'All too often, people think that to be successful, they need to make the object of their success their life.'),
(365, '4', 'If a person thinks their job will lead them to success, then they may spend countless hours per day, and well into the evening working hard.'),
(366, '4', 'However this comes at the cost of rest, your health and having an enjoyable life.'),
(367, '4', ' Ultimately they may burn out and cease to be successful at their job anyway.'),
(368, '4', 'If success comes from having a strong social life and a good group of friends, their job may suffer; meaning that they may lose their job, and then be unable to afford going out with friends.'),
(369, '4', 'In these ways, success, as Phil Knight says above, is helped by balance.'),
(370, '4', ' Think of it as a balance between rest and work, or work and play.'),
(371, '4', 'To achieve that balance, this Ultimate Guide to Prioritizing Your Work And Life can help you.'),
(372, '4', '4.'),
(373, '4', ' Do Not Be Afraid of Failure'),
(374, '4', 'From Henry Ford, Founder of Ford Motors:'),
(375, '4', '“'),
(376, '4', 'Failure is simply the opportunity to begin again, this time more intelligently.”'),
(377, '4', 'There is a story, it’s unconfirmed whether it actually happened, yet the message within is none the less true:'),
(378, '4', 'Thomas Edison inventing the lightbulb was the result of several hundred failed attempts.'),
(379, '4', ' In an interview, he was asked “How do you feel after all of your failed attempts?”'),
(380, '4', 'His response was great, “I didn’t fail, I learned hundreds of ways not to invent the lightbulb”'),
(381, '4', 'He saw each “failure” as a lesson.'),
(382, '4', ' From that lesson he learned what won’t work, and also might work instead.'),
(383, '4', 'Each failed attempt, each rejection, were key steps on his path to success.'),
(384, '4', ' It is easy to feel like you should give up after a failure.'),
(385, '4', ' But perhaps in that failure is a lesson.'),
(386, '4', 'Pay attention to your failures, study them.'),
(387, '4', ' Perhaps then you’ll learn how to succeed.'),
(388, '4', 'If you find it difficult to fight your fear of failure, here’s a guide for you:'),
(389, '4', ' Why You Have the Fear of Failure (And How to Conquer It Step-By-Step)'),
(390, '4', '5.'),
(391, '4', ' Have an Unwavering Resolution to Succeed'),
(392, '4', 'From Colonel Sanders, Founder of KFC:'),
(393, '4', '“'),
(394, '4', 'I made a resolve then that I was going to amount to something if I could.'),
(395, '4', ' And no hours, nor amount of labor, nor amount of money would deter me from giving the best that there was in me.'),
(396, '4', ' And I have done that ever since, and I win by it.'),
(397, '4', ' I know.”'),
(398, '4', 'This, in many ways relates to the above quote about learning from your failures.'),
(399, '4', 'It’s the easiest thing in the world to give up from a failure.'),
(400, '4', ' The only way to push on is if you have the true burning desire to succeed, to not be moved or dissuaded from your goals.'),
(401, '4', 'If you are not truly dedicated towards success, then each failure will hurt more, each set back will slow you down.'),
(402, '4', 'Success is hard; without the unwavering desire to succeed, this difficulty may seem insurmountable.'),
(403, '4', ' With the desire, it is merely an obstacle to go through.'),
(404, '4', '6.'),
(405, '4', ' Be a Person of Action'),
(406, '4', 'From Leonardo da Vinci, Renaissance Genius:'),
(407, '4', '“'),
(408, '4', 'It had long since come to my attention that people of accomplishment rarely sat back and let things happen to them.'),
(409, '4', ' They went out and happened to things.”'),
(410, '4', 'Though it was said hundreds of years ago, it works just as much today as it ever had.'),
(411, '4', ' It applies to literally any successful person.'),
(412, '4', 'Think about it, picture someone like William Shakespeare:'),
(413, '4', 'When we think of the time he lived in, we think of the time in a way shaped by him.'),
(414, '4', ' When we think of Renaissance era Italy, we think of Michelangelo and Leonardo Da Vinci.'),
(415, '4', ' Or think about the present day, Bill Gates or Steve Jobs.'),
(416, '4', ' Our current way of life would simply be incomparably different if they didn’t accomplish what they did.'),
(417, '4', 'You’re probably reading this article on a device by a company that they either founded or companies influenced by them.'),
(418, '4', 'All these figures were proactive, they saw ways to do things differently and did them.'),
(419, '4', ' If they let the world shape them, then they’d simply fit into the background.'),
(420, '4', ' Instead they shaped the world.'),
(421, '4', 'Applying this to you?'),
(422, '4', 'Don’t be afraid of going outside the norm.'),
(423, '4', ' If you can think of a better way to do something, do it that way.'),
(424, '4', ' If you fail, try again.'),
(425, '4', '7.'),
(426, '4', ' Cultivate Positive Relationships'),
(427, '4', 'From Theodore Roosevelt, 26th President of America: “'),
(428, '4', 'The most important single ingredient in the formula of success is knowing how to get along with people.”'),
(429, '4', 'The best leaders and some of the most influential people (and Theodore Roosevelt is one of the best leaders and one of the most influential people to have lived) were not those who caused commotions, who fought with people or disregarded people; but were people who were friendly to those around them.'),
(430, '4', 'People liked them.'),
(431, '4', ' They wanted them to do well.'),
(432, '4', 'This is key to good leadership.'),
(433, '4', 'It’s logical.'),
(434, '4', ' If someone likes you, they want to help you; if you give them a suggestion, they’ll gladly follow through with it.'),
(435, '4', 'But if someone doesn’t like you, they may either refuse to help or actively get in your way.'),
(436, '4', 'What’s more, it’s always a good idea to cultivate good relationships.'),
(437, '4', ' You can never tell who will prove to become someone who’ll be able to help you in a big way, or even be a good and supportive friend.'),
(438, '4', 'As such, help people and they may help you; and be good to people, and they my be good to you.'),
(439, '4', '8.'),
(440, '4', ' Don’t Be Afraid of Introducing New Ideas'),
(441, '4', 'From Mark Twain, Famed Author:'),
(442, '4', '“'),
(443, '4', 'A person with a new idea is a crank until the idea succeeds.”'),
(444, '4', 'It is an unfortunate truth that those with the boldest ideas are often disregarded.'),
(445, '4', 'Most of us are taught from an early age to think and do things similarly to everyone else.'),
(446, '4', ' This can be great to fill an existing role.'),
(447, '4', ' But to truly do things differently (and all successful people did things differently), you need to think differently.'),
(448, '4', 'If you have a new idea, don’t throw it away because it’s new and different; instead, celebrate it.'),
(449, '4', ' Your strange new idea might one day be the one that leads you to success.'),
(450, '4', '9.'),
(451, '4', ' Believe in Your Capacity to Succeed'),
(452, '4', 'From Walter Disney, Founder of Walt Disney Company:'),
(453, '4', '“'),
(454, '4', 'If you can dream it, you can do it.”'),
(455, '4', 'Success has to be something you can imagine yourself achieving.'),
(456, '4', 'It is possible that you will come across those who doubt you and your ability to succeed.'),
(457, '4', ' You must not become one of these people because the moment you cease believing and dreaming is the moment these dreams fall away.'),
(458, '4', 'Keep dreaming!'),
(459, '4', '10.'),
(460, '4', ' Always Maintain a Positive Mental Attitude'),
(461, '4', 'From Thomas Jefferson, 3rd President of America:'),
(462, '4', '“'),
(463, '4', 'Nothing can stop the man with the right mental attitude from achieving his goal; nothing on earth can help the man with the wrong mental attitude.”'),
(464, '4', 'Like the above quote says, you need to trust in your ability to succeed.'),
(465, '4', ' This is the only way to cultivate the right mindset.'),
(466, '4', 'Replace negative thoughts with the positive ones.'),
(467, '4', ' You need to approach problems, not as obstacles stopping you, but merely tasks that need to be completed for you to keep going.'),
(468, '4', 'If you stay positive and think like this, setbacks won’t affect you so much, people’s doubts won’t impact you and even the biggest obstacles will seem like minor problems.'),
(469, '4', 'However with the wrong mindset of doubt, you’ll be much easier to stop.'),
(470, '4', '11.'),
(471, '4', ' Don’t Let Discouragement Stop You from Pressing On'),
(472, '4', 'From Abraham Lincoln, 16th President of America:'),
(473, '4', '“'),
(474, '4', 'Let no feeling of discouragement prey upon you, and in the end you are sure to succeed.”'),
(475, '4', 'It is an unfortunate fact of human nature — all of us in some way, doubt ourselves.'),
(476, '4', ' This can be made far worse if others doubt us too.'),
(477, '4', 'When surrounded by doubts, giving up can actually seem like a good idea.'),
(478, '4', 'Don’t pay attention to the doubts.'),
(479, '4', ' If you are discouraged, ignore it.'),
(480, '4', 'If this discouragement moves into your mind and you begin to doubt yourself.'),
(481, '4', ' It is important to ignore this too.'),
(482, '4', 'This is How Self Doubt Keeps You Stuck and How to Overcome It'),
(483, '4', '12.'),
(484, '4', ' Be Willing to Work Hard'),
(485, '4', 'From JC Penny, Founder of JC Penney Inc.:'),
(486, '4', '“'),
(487, '4', 'Unless you are willing to drench yourself in your work beyond the capacity of the average man, you are just not cut out for positions at the top.”'),
(488, '4', 'You might have heard the quote that “success is 1% inspiration, 99% perspiration” or you may have heard about the 10,000 hours idea.'),
(489, '4', 'Whichever way you frame it, they say one thing:'),
(490, '4', 'True success comes from work.'),
(491, '4', 'You’ll never become successful if you don’t work towards your goal in life and keep working towards it.'),
(492, '4', 'Check out this article and you’ll understand Why Hard Work Beats Talent.'),
(493, '4', '13.'),
(494, '4', ' Be Brave Enough to Follow Your Intuition'),
(495, '4', 'From Steve Jobs, Co-founder of Apple Inc.:'),
(496, '4', '“'),
(497, '4', 'Have the courage to follow your heart and intuition.'),
(498, '4', ' They somehow already know what you truly want to become.'),
(499, '4', ' Everything else is secondary.”'),
(500, '4', 'In ancient Greece, there was a group of Oracles who lived in Delphi.'),
(501, '4', ' Everyone who needed advice or to know their future visited them, from the poorest of society to kings.'),
(502, '4', ' Above the doorway of the temple were the words “know thyself”.'),
(503, '4', 'If you strongly believe and desire something, chances are that you already have an idea how to get there.'),
(504, '4', ' If not, you may naturally know what things will help you and what things will slow you down.'),
(505, '4', 'It’s like how your body can detect danger even when things seem safe.'),
(506, '4', 'Ultimately then, you need to trust your own instincts.'),
(507, '4', 'Final Thoughts'),
(508, '4', 'What you might have noticed is that many of the above lessons are similar — most are about developing the right state of mind.'),
(509, '4', ' This clearly suggests that the key to achieving success, in whatever you wish, comes down to the way you approach it mentally.'),
(510, '4', 'Moreover, no matter what stage of life you’re at now, you can still make a difference and pursue success.'),
(511, '4', ' You can make resetting your life possible when you do this:'),
(512, '4', ' How to Start Over and Reboot Your Life When It Seems Too Late'),
(513, '5', 'It can be easy to run through the maze of life without pausing to think of its meaning…...'),
(514, '5', 'How to live a meaningful life?'),
(515, '5', 'Does what I’m doing matter?'),
(516, '5', ' More importantly, does it matter to me?'),
(517, '5', 'Feeling that what you’re doing has a real purpose and meaning that matters to you can make a huge difference in your life.'),
(518, '5', ' It makes getting up each day the most exciting thing in the world.'),
(519, '5', 'You can’t wait to get started.'),
(520, '5', ' Forget trying to force yourself to work hard, it becomes more important to remind yourself to take breaks to eat!'),
(521, '5', 'But how can we cultivate a more meaningful life?'),
(522, '5', 'The answer is usually complicated.'),
(523, '5', ' It can depend on many factors.'),
(524, '5', 'I’ve written down 10 ideas that I believe will help you find meaning in your life every day, so that you can’t wait to get up in the morning and see what the day will bring.'),
(525, '5', '1.'),
(526, '5', ' Know What’s Important'),
(527, '5', 'Know what’s important for you.'),
(528, '5', 'Write down your top 5 things that you believe are the essence of how you want to live life.'),
(529, '5', ' This can include things like “family time,” or “sing every day.”'),
(530, '5', ' It could also include more complex ideas, like “honesty” and “simplicity.”'),
(531, '5', '2.'),
(532, '5', ' Pursue Your Passion'),
(533, '5', 'I believe everyone should pursue their passion in life.'),
(534, '5', ' It’s what makes life worth living, and gives our lives true meaning and purpose.'),
(535, '5', 'Each time you work on something you love, it creates joy inside you like nothing else.'),
(536, '5', ' Finding a way to use your passions to give back to the world will give your life ultimate meaning.'),
(537, '5', 'If you can’t manage (or aren’t ready) to work on your passion for a living, be sure and make time for it every day.'),
(538, '5', ' By working on your passion and becoming an expert in it, you will eventually have the opportunity to make money from it.'),
(539, '5', ' Be ready to seize that opportunity!'),
(540, '5', '3.'),
(541, '5', ' Discover Your Life’s Purpose'),
(542, '5', 'If you had to give yourself a reason to live, what would it be?'),
(543, '5', ' What would you stand for?'),
(544, '5', ' What principles do you hold highest?'),
(545, '5', ' Is your life’s purpose to help others?'),
(546, '5', ' Is it to inspire others with great works of art, or you words?'),
(547, '5', 'Finding your life’s purpose is a daunting task, and when I first heard the idea, I had no idea where to start.'),
(548, '5', ' For methods on discovering your life’s purpose, I recommend reading the article What Makes Life Worth Living and How to Get Motivated and Be Happy Every Day When You Wake Up.'),
(549, '5', '4.'),
(550, '5', ' Be Self-Aware'),
(551, '5', 'Be aware of yourself and your actions.'),
(552, '5', ' Remain mindful of what you do at all times, and make sure you are living life according to your principles, your life’s purpose, and what you are passionate about.'),
(553, '5', 'Review your actions each day, taking stock of those that strayed from your path.'),
(554, '5', ' Work towards correcting any incidents in the future.'),
(555, '5', 'Meditation is a great tool for accomplishing this task.'),
(556, '5', ' It helps us increase our self-awareness throughout the day.'),
(557, '5', '5.'),
(558, '5', ' Focus'),
(559, '5', 'Rather than chasing 3 or 4 goals and making very little progress on them, place all of your energy on one thing.'),
(560, '5', ' Focus.'),
(561, '5', ' Not only will you alleviate some of the stress associated with trying to juggle so many tasks, you will be much more successful.'),
(562, '5', 'Learn How to Stay Focused on Your Goals in a Distracting World.'),
(563, '5', ' Try and align your goal with something you are passionate about, so that there will be an intrinsic drive to work hard and do well.'),
(564, '5', '6.'),
(565, '5', ' Spend Money on People More Than Things'),
(566, '5', 'Often, we are faced with wanting to buy material goods.'),
(567, '5', 'I recommend you consider carefully what you purchase, and think more about spending your money on experiences with friends and family.'),
(568, '5', ' Not only will this give deeper meaning to your life by focusing on your relationships rather than material wealth, but you will be a happier person as a result.'),
(569, '5', '7.'),
(570, '5', ' Live With Compassion'),
(571, '5', 'Both for yourself, and others.'),
(572, '5', ' Keep in mind the following quote:'),
(573, '5', '\"One must be compassionate to one\'s self before external compassion\" - Dalai Lama'),
(574, '5', 'For some, compassion is the purpose of life, what gives it meaning, and what leads to ultimate happiness.'),
(575, '5', '8.'),
(576, '5', ' Find a Way to Give Back'),
(577, '5', 'Do something that both honors your beliefs and passions, while giving something back to the world.'),
(578, '5', 'By giving something back, we inevitably find purpose in the act.'),
(579, '5', ' By cultivating more of these activities, you will find your life has more meaning and purpose behind it.'),
(580, '5', '9.'),
(581, '5', ' Simplify Your Life'),
(582, '5', 'By simplifying your life, you’ll have more time to do what fulfills you and gives your life meaning.'),
(583, '5', ' It can also help reduce stress and make your overall life easier to manage.'),
(584, '5', ' It can also greatly improve your productivity.'),
(585, '5', 'If you’ve never tried to simplify things before, it really is a great feeling.'),
(586, '5', ' Here’re some tips from Leo Babauta:'),
(587, '5', ' 72 Ideas to Simplify Your Life Today'),
(588, '5', '10.'),
(589, '5', ' Set Daily Goals'),
(590, '5', 'In the morning, before you start your day, create a list of 3 goals that you find fulfilling and meaningful.'),
(591, '5', ' Make sure they adhere to your set of principles and beliefs.'),
(592, '5', 'Tackle the hardest things first!'),
(593, '5', ' Don’t make this list too long.'),
(594, '5', ' By placing too many things on the list, you’ll feel the urge to multi-task, which is not good, or you’ll feel overwhelmed, which isn’t good either.'),
(595, '5', 'By trying to do less, you’ll end up doing more.'),
(600, '6', '春晚的由来'),
(601, '6', '：'),
(602, '6', '春晚，即中国中央电视台du春节联欢晚会（通常简称为央视zhi春晚或dao春晚），起初是中国中央电视台在每年农历除夕 晚上为庆祝农历新年 在其第一套节目直播的综艺晚会。'),
(603, '6', '1983年，适应改革开放的形势和文化领域呈现的活跃氛围以及国人思想解放、振奋激扬的心理态势，中央电视台制造推出了首届春节联欢晚会。'),
(604, '6', '春节联欢晚会一经推出，令全国人民耳目一新，受到普遍的欢迎和称赞。'),
(605, '6', '春晚的意义：'),
(606, '6', '从1983年第一届央视春晚举行之后，春晚慢慢成为了中国人的新民俗，每年除夕夜必看的电视大餐。'),
(607, '6', '从文化发展的角度看，中央电视台春节联欢晚会开创了电视综艺节目的先河，且引发了中国电视传媒表达内容和表达方式等方面的重大变革。'),
(608, '6', '2014年，马年春晚首次被定位为国家项目，与奥运会开幕式同级。');

-- --------------------------------------------------------

--
-- 表的结构 `sourcesplit`
--

CREATE TABLE `sourcesplit` (
  `ssid` int(10) NOT NULL COMMENT 'source split id',
  `zh_split` varchar(1000) NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sourcesplit`
--

INSERT INTO `sourcesplit` (`ssid`, `zh_split`, `sid`) VALUES
(1, '[\"u73b0u4ee3\",\"u6c11u95f4\",\"u4e60u60ef\",\"u4e0a\",\"u628a\",\"u8fc7\",\"u6625u8282\",\"u53c8\",\"u53ebu505a\",\"u8fc7u5e74\"]', 283),
(2, '[\"u5176u5b9e\",\"\",\"\",\"u5e74\",\"u548c\",\"u6625u8282\",\"u7684\",\"u8d77u6e90\",\"u662f\",\"u5f88\",\"u4e0d\",\"u76f8u540c\",\"u7684\"]', 284),
(3, '[\"u90a3u4e48\",\"\",\"\",\"u5e74\",\"\",\"\",\"u7a76u7adf\",\"u662f\",\"u600eu4e48u6837\",\"u6765\",\"u7684\",\"u5462\"]', 285),
(4, '[\"u6c11u95f4\",\"u4e3bu8981\",\"u6709\",\"u4e24u79cd\",\"u8bf4u6cd5\",\"\",\"\",\"u4e00u79cd\",\"u8bf4\",\"u7684\",\"u662f\",\"\",\"\",\"u53e4\",\"u65f6u5019\",\"\",\"\",\"u6709\",\"u4e00u79cd\",\"u53ebu505a\",\"\",\"\",\"u5e74\",\"\",\"\",\"u7684\",\"u51f6u731b\",\"u602au517d\",\"\",\"\",\"u6bcf\",\"u5230\",\"u814au6708u4e09u5341\",\"\",\"\",\"u4fbf\",\"u7a9c\",\"u6751\",\"u6328u6237\",\"\",\"\",\"u89c5\",\"u98dfu4eba\",\"u8089\",\"\",\"\",\"u6b8bu5bb3\",\"u751fu7075\"]', 286),
(5, '[\"u6709\",\"u4e00u4e2a\",\"u814au6708u4e09u5341\",\"u665au4e0a\",\"\",\"\",\"u5e74\",\"\",\"\",\"u5230\",\"u4e86\",\"u4e00u4e2a\",\"u6751u5e84\",\"\",\"\",\"u9002u9022\",\"u4e24u4e2a\",\"u7267u7ae5\",\"u5728\",\"u6bd4u8d5b\",\"u725b\",\"u97adu5b50\",\"\",\"\",\"u5e74\",\"\",\"\",\"u5ffd\",\"u95fb\",\"u534au7a7au4e2d\",\"u54cdu8d77\",\"u4e86\",\"u556au556a\",\"u7684\",\"u97adu58f0\",\"\",\"\",\"u5413\",\"u5f97\",\"u671bu98ceu800cu9003\"]', 287),
(6, '[\"\"]', 288),
(7, '[\"u540eu6765\",\"u5b83\",\"u53c8\",\"u6765u5230\",\"u4e86\",\"u4e00u4e2a\",\"u6751u5e84\",\"\",\"\",\"u671d\",\"u4e00u6237\",\"u4ebau5bb6\",\"u95e8u91cc\",\"u4e00\",\"u77a7\",\"\",\"\",\"u53eau89c1\",\"u91ccu9762\",\"u706fu706bu8f89u714c\",\"\",\"\",\"u523a\",\"u5f97\",\"u5b83\",\"u5934u660fu773cu82b1\",\"\",\"\",\"u53eau597d\",\"u53c8\",\"u5939\",\"u7740\",\"u5c3eu5df4\",\"u6e9c\",\"u4e86\"]', 289),
(8, '[\"u4ebau4eec\",\"u7531u6b64\",\"u6478\",\"u51c6\",\"u4e86\",\"\",\"\",\"u5e74\",\"\",\"\",\"u6709\",\"u6015\",\"u54cd\",\"\",\"\",\"u6015\",\"u7ea2\",\"\",\"\",\"u6015\",\"u5149\",\"u7684\",\"u5f31u70b9\",\"\",\"\",\"u4fbf\",\"u60f3u5230\",\"u8bb8u591a\",\"u62b5u5fa1\",\"u5b83\",\"u7684\",\"u65b9u6cd5\",\"\",\"\",\"u4e8eu662f\",\"u9010u6e10\",\"u6f14u5316\",\"u6210\",\"u4ecau5929\",\"u8fc7u5e74\",\"u7684\",\"u98ceu4fd7\"]', 290),
(9, '[\"u53e6u4e00u79cd\",\"u8bf4u6cd5\",\"u662f\",\"\",\"\",\"u6211\",\"u56fd\",\"u53e4u4ee3\",\"u7684\",\"u5b57\",\"u4e66\",\"u628a\",\"\",\"\",\"u5e74\",\"\",\"\",\"u5b57\",\"u653e\",\"u79beu90e8\",\"\",\"\",\"u4ee5u793a\",\"u98ceu8c03u96e8u987a\",\"\",\"\",\"u4e94u8c37u4e30u767b\"]', 291),
(10, '[\"u7531u4e8e\",\"u8c37u79be\",\"u4e00u822c\",\"u90fdu662f\",\"u4e00u5e74\",\"u4e00\",\"u719f\"]', 292),
(11, '[\"u6240\",\"\",\"\",\"u5e74\",\"\",\"\",\"u4fbf\",\"u88ab\",\"u5f15u7533\",\"u4e3a\",\"u5c81u540d\",\"u4e86\"]', 293),
(12, '[\"u6211\",\"u56fd\",\"u53e4u4ee3\",\"u6c11u95f4\",\"u867du7136\",\"u65e9u5df2\",\"u6709\",\"u8fc7u5e74\",\"u7684\",\"u98ceu4fd7\",\"\",\"\",\"u4f46\",\"u90a3u65f6\",\"u5e76u4e0d\",\"u53ebu505a\",\"u6625u8282\"]', 294),
(13, '[\"u56e0u4e3a\",\"u90a3u65f6\",\"u6240u8bf4\",\"u7684\",\"u6625u8282\",\"\",\"\",\"u6307\",\"u7684\",\"u662f\",\"u4e8cu5341u56dbu8282u6c14\",\"u4e2d\",\"u7684\",\"\",\"\",\"u7acbu6625\"]', 295),
(14, '[\"u5357u5317u671d\",\"u5219\",\"u628a\",\"u6625u8282\",\"u6cdbu6307\",\"u4e3a\",\"u6574u4e2a\",\"u6625u5b63\"]', 296),
(15, '[\"u636eu8bf4\",\"\",\"\",\"u628a\",\"u519cu5386\",\"u65b0u5e74\",\"u6b63u5f0f\",\"u5b9au540d\",\"u4e3a\",\"u6625u8282\",\"\",\"\",\"u662f\",\"u8f9bu4ea5u9769u547d\",\"u540e\",\"u7684\",\"u4e8b\"]', 297),
(16, '[\"u7531u4e8e\",\"u90a3u65f6\",\"u8981\",\"u6539u7528\",\"u9633u5386\",\"\",\"\",\"u4e3au4e86\",\"u533au5206\",\"u519c\",\"\",\"\",\"u9633\",\"u4e24u8282\",\"\",\"\",\"u6240u4ee5\",\"u53eau597d\",\"u5c06\",\"u519cu5386u6b63u6708u521du4e00\",\"u6539u540d\",\"u4e3a\",\"\",\"\",\"u6625u8282\"]', 298),
(17, '[\"u6625u8282\",\"u662f\",\"u6211\",\"u56fd\",\"u4e00u4e2a\",\"u53e4u8001\",\"u7684\",\"u8282u65e5\",\"\",\"\",\"u4e5fu662f\",\"u5168u5e74\",\"u6700\",\"u91cdu8981\",\"u7684\",\"u4e00u4e2a\",\"u8282u65e5\",\"\",\"\",\"u5982u4f55\",\"u8fc7\",\"u5e86u8d3a\",\"u8fd9u4e2a\",\"u8282u65e5\",\"\",\"\",\"u5728\",\"u5343\",\"u767eu5e74\",\"u7684\",\"u5386u53f2\",\"u53d1u5c55\",\"u4e2d\",\"\",\"\",\"u5f62u6210\",\"u4e86\",\"u4e00u4e9b\",\"u8f83u4e3a\",\"u56fau5b9a\",\"u7684\",\"u98ceu4fd7u4e60u60ef\",\"\",\"\",\"u6709u8bb8u591a\",\"u8fd8\",\"u76f8u4f20\",\"u81f3u4eca\"]', 299),
(18, '[\"u6625u8054\",\"u4e5f\",\"u53eb\",\"u95e8\",\"u5bf9\",\"\",\"\",\"u6625u8d34\",\"\",\"\",\"u5bf9u8054\",\"\",\"\",\"u5bf9u5b50\",\"\",\"\",\"u6843u7b26\",\"u7b49\",\"\",\"\",\"u5b83\",\"u4ee5\",\"u5de5u6574\",\"\",\"\",\"u5bf9u5076\",\"\",\"\",\"u7b80u6d01\",\"\",\"\",\"u7cbeu5de7\",\"u7684\",\"u6587u5b57\",\"u63cfu7ed8\",\"u65f6u4ee3\",\"u80ccu666f\",\"\",\"\",\"u6292u53d1\",\"u7f8eu597d\",\"u613fu671b\",\"\",\"\",\"u662f\",\"u6211\",\"u56fd\",\"u7279u6709\",\"u7684\",\"u6587u5b66\",\"u5f62u5f0f\"]', 300),
(19, '[\"u6bcfu9022\",\"u6625u8282\",\"\",\"\",\"u65e0\",\"u8bba\",\"u57ceu5e02\",\"u8fd8u662f\",\"u519cu6751\",\"\",\"\",\"u5bb6u5bb6u6237u6237\",\"u90fd\",\"u8981\",\"u7cbeu9009\",\"u4e00u5e45\",\"u5927u7ea2\",\"u6625u8054\",\"u8d34\",\"u4e8e\",\"u95e8u4e0a\",\"\",\"\",\"u4e3a\",\"u8282u65e5\",\"u589eu52a0\",\"u559cu5e86\",\"u6c14u6c1b\"]', 301),
(20, '[\"u8fd9\",\"u4e00\",\"u4e60u4fd7\",\"u8d77u4e8e\",\"u5b8bu4ee3\",\"\",\"\",\"u5728\",\"u660eu4ee3\",\"u5f00u59cb\",\"u76dbu884c\",\"\",\"\",\"u5230\",\"u4e86\",\"u6e05u4ee3\",\"\",\"\",\"u6625u8054\",\"u7684\",\"u601du60f3u6027\",\"u548c\",\"u827au672fu6027\",\"u90fd\",\"u6709\",\"u4e86\",\"u5f88u5927\",\"u7684\",\"u63d0u9ad8\",\"\",\"\",\"u6881u7ae0u77e9\",\"u7f16u5199\",\"u7684\",\"u6625u8054\",\"u4e13u8457\",\"u300a\",\"u69dbu8054u4e1bu8bdd\",\"u300b\",\"u5bf9\",\"u6979u8054\",\"u7684\",\"u8d77u6e90\",\"u53ca\",\"u5404u7c7b\",\"u4f5cu54c1\",\"u7684\",\"u7279u8272\",\"u90fd\",\"u4f5c\",\"u4e86\",\"u8bbau8ff0\"]', 302),
(21, '[\"u6625u8054\",\"u7684\",\"u79cdu7c7b\",\"u6bd4u8f83\",\"u591a\",\"\",\"\",\"u4f9d\",\"u5176\",\"u4f7fu7528\",\"u573au6240\",\"\",\"\",\"u53ef\",\"u5206u4e3a\",\"u95e8\",\"u5fc3\",\"\",\"\",\"u6846\",\"u5bf9\",\"\",\"\",\"u6a2au62ab\",\"\",\"\",\"u6625\",\"u6761\",\"\",\"\",\"u6597u65b9\",\"u7b49\"]', 303),
(22, '[\"u95e8\",\"u5fc3\",\"\",\"\",\"u8d34\",\"u4e8e\",\"u95e8u677f\",\"u4e0au7aef\",\"u4e2du5fc3\",\"u90e8u4f4d\"]', 304),
(23, '[\"u6846\",\"u5bf9\",\"\",\"\",\"u8d34\",\"u4e8e\",\"u5de6u53f3\",\"u4e24u4e2a\",\"u95e8u6846\",\"u4e0a\",\"\",\"\",\"\",\"u6a2au62ab\",\"\",\"\",\"u8d34\",\"u4e8eu95e8u5a9a\",\"u7684\",\"u6a2au6728\",\"u4e0a\",\"\",\"\",\"\",\"u6625\",\"u6761\",\"\",\"\",\"u6839u636e\",\"u4e0du540c\",\"u7684\",\"u5185u5bb9\",\"\",\"\",\"u8d34\",\"u4e8e\",\"u76f8u5e94\",\"u7684\",\"u5730u65b9\",\"\",\"\",\"\",\"u6597\",\"u65a4\",\"\",\"\",\"u4e5f\",\"u53eb\",\"\",\"\",\"u95e8u53f6\",\"\",\"\",\"u4e3a\",\"u6b63u65b9\",\"u83f1u5f62\",\"\",\"\",\"u591a\",\"u8d34\",\"u5728\",\"u5bb6u4ff1\",\"\",\"\",\"u5f71u58c1\",\"u4e2d\"]', 305),
(24, '[\"u5728\",\"u6c11u95f4\",\"u4ebau4eec\",\"u8fd8\",\"u559cu6b22\",\"u5728\",\"u7a97u6237\",\"u4e0a\",\"u8d34u4e0a\",\"u5404u79cd\",\"u526au7eb8\",\"u2014\",\"u2014\",\"u7a97u82b1\"]', 306),
(25, '[\"u7a97u82b1\",\"u4e0du4ec5\",\"u70d8u6258\",\"u4e86\",\"u559cu5e86\",\"u7684\",\"u8282u65e5\",\"u6c14u6c1b\",\"\",\"\",\"u4e5f\",\"u96c6\",\"u88c5u9970u6027\",\"\",\"\",\"u6b23u8d4fu6027\",\"u548c\",\"u5b9eu7528u6027\",\"u4e8e\",\"u4e00u4f53\"]', 307),
(26, '[\"u526au7eb8\",\"u5728\",\"u6211\",\"u56fd\",\"u662f\",\"u4e00u79cd\",\"u5f88\",\"u666eu53ca\",\"u7684\",\"u6c11u95f4u827au672f\",\"\",\"\",\"u5343\",\"u767eu5e74\",\"u6765\",\"u6df1u53d7\",\"u4ebau4eec\",\"u7684\",\"u559cu7231\",\"\",\"\",\"u56e0\",\"u5b83\",\"u5927u591a\",\"u662f\",\"u8d34\",\"u5728\",\"u7a97u6237\",\"u4e0a\",\"u7684\",\"\",\"\",\"u6240u4ee5\",\"u4e5f\",\"u88ab\",\"u79f0\",\"u5176\",\"u4e3a\",\"\",\"\",\"u7a97u82b1\"]', 308),
(27, '[\"u7a97u82b1\",\"u4ee5\",\"u5176\",\"u7279u6709\",\"u7684\",\"u6982u62ec\",\"u548c\",\"u5938u5f20\",\"u624bu6cd5\",\"u5c06\",\"u5409\",\"u4e8b\",\"u7965u7269\",\"\",\"\",\"u7f8eu597d\",\"u613fu671b\",\"u8868u73b0\",\"u5f97\",\"u6dcbu6f13u5c3du81f4\",\"\",\"\",\"u5c06\",\"u8282u65e5\",\"u88c5u70b9\",\"u5f97\",\"u7ea2u706b\",\"u5bccu4e3d\"]', 309),
(28, '[\"u5728\",\"u8d34u6625u8054\",\"\",\"\",\"u7a97u82b1\",\"u7684\",\"u540cu65f6\",\"\",\"\",\"u4e00u4e9b\",\"u4ebau5bb6\",\"u8981\",\"u5728\",\"u5c4b\",\"u95e8u4e0a\",\"\",\"\",\"u5899u58c1\",\"u4e0a\",\"\",\"\",\"u95e8u6963\",\"u4e0a\",\"u8d34u4e0a\",\"u5927u5927u5c0fu5c0f\",\"u7684\",\"\",\"\",\"u798f\",\"\",\"\",\"u5b57\"]', 310),
(29, '[\"u6625u8282\",\"u8d34\",\"\",\"\",\"u798f\",\"\",\"\",\"u5b57\",\"\",\"\",\"u662f\",\"u6211\",\"u56fd\",\"u6c11u95f4\",\"u7531u6765u5df2u4e45\",\"u7684\",\"u98ceu4fd7\"]', 311),
(30, '[\"u798f\",\"\",\"\",\"u5b57\",\"u6307\",\"u798fu6c14\",\"\",\"\",\"u798fu8fd0\",\"\",\"\",\"u5bc4u6258\",\"u4e86\",\"u4ebau4eec\",\"u5bf9\",\"u5e78u798fu751fu6d3b\",\"u7684\",\"u5411u5f80\",\"\",\"\",\"u5bf9\",\"u7f8eu597d\",\"u672au6765\",\"u7684\",\"u795du613f\"]', 312),
(31, '[\"u4e3au4e86\",\"u66f4\",\"u5145u5206u5730\",\"u4f53u73b0\",\"u8fd9u79cd\",\"u5411u5f80\",\"u548c\",\"u795du613f\",\"\",\"\",\"u6709\",\"u7684\",\"u4eba\",\"u5e72u8106\",\"u5c06\",\"\",\"\",\"u798f\",\"\",\"\",\"u5b57\",\"u5012\",\"u8fc7u6765\",\"u8d34\",\"\",\"\",\"u8868u793a\",\"\",\"\",\"u5e78u798f\",\"u5df2\",\"u5230\",\"\",\"\",\"u798fu6c14\",\"u5df2\",\"u5230\"]', 313),
(32, '[\"u6c11u95f4\",\"u8fd8u6709\",\"u5c06\",\"\",\"\",\"u798f\",\"\",\"\",\"u5b57\",\"u7cbe\",\"u63cf\",\"u7ec6\",\"u505au6210\",\"u5404u79cd\",\"u56feu6848\",\"u7684\",\"\",\"\",\"u56feu6848\",\"u6709\",\"u5bffu661f\",\"\",\"\",\"u5bffu6843\",\"\",\"\",\"u9ca4u9c7cu8df3u9f99u95e8\",\"\",\"\",\"u4e94u8c37u4e30u767b\",\"\",\"\",\"u9f99u51e4u5448u7965\",\"u7b49\"]', 314),
(33, '[\"u6625u665a\",\"u7684\",\"u7531u6765\"]', 600),
(34, '[\"\"]', 601),
(35, '[\"u6625u665a\",\"\",\"\",\"u5373\",\"u4e2du56fdu4e2du592eu7535u89c6u53f0\",\"du\",\"u6625u8282u8054u6b22u665au4f1a\",\"\",\"\",\"u901au5e38\",\"u7b80u79f0\",\"u4e3a\",\"u592eu89c6\",\"zhi\",\"u6625u665a\",\"u6216\",\"dao\",\"u6625u665a\",\"uff09\",\"\",\"\",\"u8d77u521d\",\"u662f\",\"u4e2du56fdu4e2du592eu7535u89c6u53f0\",\"u5728\",\"u6bcfu5e74\",\"u519cu5386\",\"u9664u5915\",\"\",\"\",\"u665au4e0a\",\"u4e3a\",\"u5e86u795d\",\"u519cu5386\",\"u65b0u5e74\",\"\",\"\",\"u5728\",\"u5176\",\"u7b2cu4e00u5957\",\"u8282u76ee\",\"u76f4u64ad\",\"u7684\",\"u7efcu827a\",\"u665au4f1a\"]', 602),
(36, '[\"1983u5e74\",\"\",\"\",\"u9002u5e94\",\"u6539u9769u5f00u653e\",\"u7684\",\"u5f62u52bf\",\"u548c\",\"u6587u5316\",\"u9886u57df\",\"u5448u73b0\",\"u7684\",\"u6d3bu8dc3\",\"u6c1bu56f4\",\"u4ee5u53ca\",\"u56fdu4eba\",\"u601du60f3u89e3u653e\",\"\",\"\",\"u632fu594b\",\"u6fc0u626c\",\"u7684\",\"u5fc3u7406\",\"u6001u52bf\",\"\",\"\",\"u4e2du592eu7535u89c6u53f0\",\"u5236u9020\",\"u63a8u51fa\",\"u4e86\",\"u9996u5c4a\",\"u6625u8282u8054u6b22u665au4f1a\"]', 603),
(37, '[\"u6625u8282u8054u6b22u665au4f1a\",\"u4e00u7ecf\",\"u63a8u51fa\",\"\",\"\",\"u4ee4\",\"u5168u56fd\",\"u4ebau6c11\",\"u8033u76eeu4e00u65b0\",\"\",\"\",\"u53d7u5230\",\"u666eu904d\",\"u7684\",\"u6b22u8fce\",\"u548c\",\"u79f0u8d5e\"]', 604),
(38, '[\"u6625u665a\",\"u7684\",\"u610fu4e49\"]', 605),
(39, '[\"u4ece\",\"1983u5e74\",\"u7b2cu4e00u5c4a\",\"u592eu89c6u6625u665a\",\"u4e3eu884c\",\"u4e4bu540e\",\"\",\"\",\"u6625u665a\",\"u6162u6162\",\"u6210u4e3a\",\"u4e86\",\"u4e2du56fd\",\"u4eba\",\"u7684\",\"u65b0\",\"u6c11u4fd7\",\"\",\"\",\"u6bcfu5e74\",\"u9664u5915\",\"u591c\",\"u5fc5u770b\",\"u7684\",\"u7535u89c6\",\"u5927u9910\"]', 606),
(40, '[\"u4ece\",\"u6587u5316\",\"u53d1u5c55\",\"u7684\",\"u89d2u5ea6\",\"u770b\",\"\",\"\",\"u4e2du592eu7535u89c6u53f0u6625u8282u8054u6b22u665au4f1a\",\"u5f00u521b\",\"u4e86\",\"u7535u89c6\",\"u7efcu827a\",\"u8282u76ee\",\"u7684\",\"u5148u6cb3\",\"\",\"\",\"u4e14\",\"u5f15u53d1\",\"u4e86\",\"u4e2du56fd\",\"u7535u89c6\",\"u4f20u5a92\",\"u8868u8fbe\",\"u5185u5bb9\",\"u548c\",\"u8868u8fbe\",\"u65b9u5f0f\",\"u7b49\",\"u65b9u9762\",\"u7684\",\"u91cdu5927\",\"u53d8u9769\"]', 607),
(41, '[\"2014u5e74\",\"\",\"\",\"u9a6cu5e74\",\"u6625u665a\",\"u9996u6b21\",\"u88ab\",\"u5b9au4f4d\",\"u4e3a\",\"u56fdu5bb6\",\"u9879u76ee\",\"\",\"\",\"u4e0e\",\"u5965u8fd0u4f1a\",\"u5f00u5e55u5f0f\",\"u540cu7ea7\"]', 608);

-- --------------------------------------------------------

--
-- 表的结构 `target`
--

CREATE TABLE `target` (
  `tid` int(50) NOT NULL,
  `context` varchar(1000) NOT NULL,
  `sid` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `target`
--

INSERT INTO `target` (`tid`, `context`, `sid`, `date`, `uid`) VALUES
(1, '幸福对于大家而言各不相同。', 1, '20200618165239', 1),
(2, '抑或追寻梦想的自由。', 4, '20200618165336', 1),
(3, '不管你觉得幸福是什么，我们都能追求更快乐、更满足的人生。', 5, '20200618165453', 1),
(4, '也许，是与自己的和平相处。', 2, '20200618165519', 1),
(5, '或者，是有一个让你舒适的朋友圈。', 3, '20200618165558', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tb`
--

CREATE TABLE `tb` (
  `tbid` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `text` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uid` int(10) NOT NULL,
  `date` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tb`
--

INSERT INTO `tb` (`tbid`, `name`, `text`, `uid`, `date`) VALUES
(1, 'TB', 'Here are some terms for project-life tips', 1, '2020/06/18 - 17:07:16'),
(3, '春节术语', '', 2, '2020/06/18 - 17:55:47'),
(4, 'test', '', 0, '2020/06/18 - 20:14:13');

-- --------------------------------------------------------

--
-- 表的结构 `tbdetail`
--

CREATE TABLE `tbdetail` (
  `tbdid` int(11) NOT NULL COMMENT 'tb detail id',
  `zh` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `en` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `tbid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `tbshare`
--

CREATE TABLE `tbshare` (
  `tbsid` int(10) NOT NULL,
  `tbid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbshare`
--

INSERT INTO `tbshare` (`tbsid`, `tbid`, `pid`, `status`) VALUES
(10, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tm`
--

CREATE TABLE `tm` (
  `tmid` int(10) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '对这个术语库进行描述',
  `status` int(10) NOT NULL DEFAULT '1',
  `uid` int(10) NOT NULL,
  `date` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tm`
--

INSERT INTO `tm` (`tmid`, `name`, `text`, `status`, `uid`, `date`) VALUES
(1, 'Life tips', '默认翻译记忆库/Default TM', 0, 1, '2020/06/18 - 16:18:17'),
(2, '春节小常识', '默认翻译记忆库/Default TM', 0, 2, '2020/06/18 - 16:26:07'),
(3, 'TM for life tips.', 'Here is the TM for life\'s tips.', 1, 1, '2020/06/18 - 17:26:56');

-- --------------------------------------------------------

--
-- 表的结构 `tmdetail`
--

CREATE TABLE `tmdetail` (
  `tmdid` int(10) NOT NULL COMMENT 'tm detail id',
  `zh` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `zh_split` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '分句后的中文',
  `en` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `tmid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tmdetail`
--

INSERT INTO `tmdetail` (`tmdid`, `zh`, `zh_split`, `en`, `tmid`) VALUES
(1, '幸福对于大家而言各不相同。', '[\"u5e78u798f\",\"u5bf9u4e8e\",\"u5927u5bb6\",\"u800cu8a00\",\"u5404u4e0du76f8u540c\"]', 'Happiness looks different for everyone.', 1),
(2, '抑或追寻梦想的自由。', '[\"u6291u6216\",\"u8ffdu5bfb\",\"u68a6u60f3\",\"u7684\",\"u81eau7531\"]', ' Or the freedom to pursue your deepest dreams.', 1),
(3, '不管你觉得幸福是什么，我们都能追求更快乐、更满足的人生。', '[\"u4e0du7ba1\",\"u4f60\",\"u89c9u5f97\",\"u5e78u798f\",\"u662fu4ec0u4e48\",\"\",\"\",\"u6211u4eec\",\"u90fd\",\"u80fd\",\"u8ffdu6c42\",\"u66f4u5febu4e50\",\"\",\"\",\"u66f4\",\"u6ee1u8db3\",\"u7684\",\"u4ebau751f\"]', 'Regardless of your version of true happiness, living a happier, more satisfied life is within reach.', 1),
(4, '也许，是与自己的和平相处。', '[\"u4e5fu8bb8\",\"\",\"\",\"u662f\",\"u4e0e\",\"u81eau5df1\",\"u7684\",\"u548cu5e73u76f8u5904\"]', ' For you, maybe it’s being at peace with who you are.', 1),
(5, '或者，是有一个让你舒适的朋友圈。', '[\"u6216u8005\",\"\",\"\",\"u662f\",\"u6709\",\"u4e00u4e2a\",\"u8ba9\",\"u4f60\",\"u8212u9002\",\"u7684\",\"u670bu53cbu5708\"]', ' Or having a secure network of friends who accept you unconditionally.', 1),
(6, '\n\n\n当谈论成功时，有些人幻想财富，有些人梦想权力，还有些人想要名垂青史。', '[\"u5f53\",\"u8c08u8bba\",\"u6210u529f\",\"u65f6\",\"\",\"\",\"u6709u4e9bu4eba\",\"u5e7bu60f3\",\"u8d22u5bcc\",\"\",\"\",\"u6709u4e9bu4eba\",\"u68a6u60f3\",\"u6743u529b\",\"\",\"\",\"u8fd8\",\"u6709u4e9bu4eba\",\"u60f3u8981\",\"u540du5782u9752u53f2\"]', '\n\n\nWhen people think of success, some imagine wealth; others want power; some want to make a positive impact on the world.', 3),
(7, '每天起床变成了最开心的事情。', '[\"u6bcfu5929\",\"u8d77u5e8a\",\"u53d8u6210\",\"u4e86\",\"u6700\",\"u5f00u5fc3\",\"u7684\",\"u4e8bu60c5\"]', 'It makes getting up each day the happiest thing in the world.', 3),
(8, '在生活的迷宫中行走，很容易对生活的意义停止探究。', '[\"u5728\",\"u751fu6d3b\",\"u7684\",\"u8ff7u5bab\",\"u4e2d\",\"u884cu8d70\",\"\",\"\",\"u5f88u5bb9u6613\",\"u5bf9\",\"u751fu6d3b\",\"u7684\",\"u610fu4e49\",\"u505cu6b62\",\"u63a2u7a76\"]', 'It can be easy to run through the maze of life without pausing to think of its meaning and sense.', 3);

-- --------------------------------------------------------

--
-- 表的结构 `tmshare`
--

CREATE TABLE `tmshare` (
  `tmsid` int(11) NOT NULL COMMENT 'tm share id',
  `pid` int(11) NOT NULL,
  `tmid` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tmshare`
--

INSERT INTO `tmshare` (`tmsid`, `pid`, `tmid`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 1, 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `uid` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `status`) VALUES
(1, 'yrx', '202cb962ac59075b964b07152d234b70', '1435574480@qq.com', 1),
(2, '杨瑞霞', '6d4364ea7395a7b639f8cc160ae211a9', '18810800186@163.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `langpair`
--
ALTER TABLE `langpair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `projectshare`
--
ALTER TABLE `projectshare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sourcesplit`
--
ALTER TABLE `sourcesplit`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tb`
--
ALTER TABLE `tb`
  ADD PRIMARY KEY (`tbid`);

--
-- Indexes for table `tbdetail`
--
ALTER TABLE `tbdetail`
  ADD PRIMARY KEY (`tbdid`);

--
-- Indexes for table `tbshare`
--
ALTER TABLE `tbshare`
  ADD PRIMARY KEY (`tbsid`);

--
-- Indexes for table `tm`
--
ALTER TABLE `tm`
  ADD PRIMARY KEY (`tmid`);

--
-- Indexes for table `tmdetail`
--
ALTER TABLE `tmdetail`
  ADD PRIMARY KEY (`tmdid`);

--
-- Indexes for table `tmshare`
--
ALTER TABLE `tmshare`
  ADD PRIMARY KEY (`tmsid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `lang`
--
ALTER TABLE `lang`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `langpair`
--
ALTER TABLE `langpair`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `pid` smallint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `projectshare`
--
ALTER TABLE `projectshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `source`
--
ALTER TABLE `source`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;
--
-- 使用表AUTO_INCREMENT `sourcesplit`
--
ALTER TABLE `sourcesplit`
  MODIFY `ssid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'source split id', AUTO_INCREMENT=42;
--
-- 使用表AUTO_INCREMENT `target`
--
ALTER TABLE `target`
  MODIFY `tid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tb`
--
ALTER TABLE `tb`
  MODIFY `tbid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tbdetail`
--
ALTER TABLE `tbdetail`
  MODIFY `tbdid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tb detail id', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tbshare`
--
ALTER TABLE `tbshare`
  MODIFY `tbsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `tm`
--
ALTER TABLE `tm`
  MODIFY `tmid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tmdetail`
--
ALTER TABLE `tmdetail`
  MODIFY `tmdid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'tm detail id', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `tmshare`
--
ALTER TABLE `tmshare`
  MODIFY `tmsid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tm share id', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
