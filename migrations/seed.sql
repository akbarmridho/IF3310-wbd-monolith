DELETE
FROM anime;
DELETE
FROM review;

INSERT INTO public.user_data (id, name, username, password, bio, role, created_at, updated_at)
VALUES (3, 'Akbar Maulana Ridho', 'akbarmr', '$2y$10$dogCIKln7pU6hiyxPNtMK.pRlJN2eYOOs2dDeDYFSsHRqocpSh0Fa', null,
        'ADMIN', '2023-10-08 14:40:41.651066', '2023-10-08 14:40:41.651066');
INSERT INTO public.user_data (id, name, username, password, bio, role, created_at, updated_at)
VALUES (4, 'Eugene Yap Jin Quan', 'yujin123', '$2y$10$yPx2iNuQlvKtS50qKmJo6.iq/Dgwfur86CCrOzhteBYa5voRQmuVy', null,
        'USER', '2023-10-08 14:40:52.551993', '2023-10-08 14:40:52.551993');
INSERT INTO public.user_data (id, name, username, password, bio, role, created_at, updated_at)
VALUES (5, 'John Doe', 'johndoe', '$2y$10$4cj8G8CQYO4n.Vp.KYPhQePNBglKEqPiKLIKpOOws1DfJ26EoN/sO', null, 'USER',
        '2023-10-08 14:41:19.903076', '2023-10-08 14:41:19.903076');
INSERT INTO public.user_data (id, name, username, password, bio, role, created_at, updated_at)
VALUES (6, 'Furina', 'furinalover', '$2y$10$x7Xna9QJpQMI0iR7ipFVCuZL8o9nKpGFi95hYWITVJ4FHzc.QsuS6', null, 'USER',
        '2023-10-08 14:41:29.520247', '2023-10-08 14:41:29.520247');
INSERT INTO public.user_data (id, name, username, password, bio, role, created_at, updated_at)
VALUES (7, 'Misaka Mikoto', 'misakabiribiri', '$2y$10$eQU7liu3wZB3UCbMyFkEQu7Ka2alZ0W.azdK9s4djfZkx57Q5zwdq', null,
        'USER', '2023-10-08 14:41:47.427753', '2023-10-08 14:41:47.427753');

SELECT setval('postgres.public.user_data_id_seq', 7, true);

INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (10, 'Lycoris Recoil', 'A-1 Pictures', 'Action', e'The number of terrorist acts in Japan has never been lower, thanks to the efforts of a syndicate called Direct Attack (DA). The organization raises orphaned girls as killers to carry out assassinations under their "Lycoris" program. Takina Inoue is an exceptional Lycoris with a strong sense of purpose and a penchant for perfection. Unfortunately, a hostage situation tests her patience, and the resulting act of insubordination leads to her transfer out of DA. Not thrilled about losing the only place she belonged to, she reluctantly arrives at her new base of operations—LycoReco, a cafe in disguise.

Takina\'s new partner, however, turns out to be quite different from what she imagined. Despite being the famed Lycoris prodigy, Chisato Nishikigi appears almost unconcerned with her duties. She drags Takina along on all kinds of odd jobs under the simple explanation of helping people in need. Takina is even more puzzled when Chisato takes down a group of armed assailants without killing any of them. Feeling like a fish out of water, Takina itches to get reinstated into DA—but Chisato is determined to prove to her that there is more to a life than just taking them.',
        13, '2022-07-02 12:00:00.000000', '2022-09-24 12:00:00.000000', 'sample/127311.jpg', null,
        '2023-10-08 14:54:44.810994', '2023-10-08 14:56:19.366588');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (8, 'Fate/Zero', 'ufotable', 'Fantasy', e'With the promise of granting any wish, the omnipotent Holy Grail triggered three wars in the past, each too cruel and fierce to leave a victor. In spite of that, the wealthy Einzbern family is confident that the Fourth Holy Grail War will be different; namely, with a vessel of the Holy Grail now in their grasp. Solely for this reason, the much hated "Magus Killer" Kiritsugu Emiya is hired by the Einzberns, with marriage to their only daughter Irisviel as binding contract.

Kiritsugu now stands at the center of a cutthroat game of survival, facing off against six other participants, each armed with an ancient familiar, and fueled by unique desires and ideals. Accompanied by his own familiar, Saber, the notorious mercenary soon finds his greatest opponent in Kirei Kotomine, a priest who seeks salvation from the emptiness within himself in pursuit of Kiritsugu.

Based on the light novel written by Gen Urobuchi, Fate/Zero depicts the events of the Fourth Holy Grail War—10 years prior to Fate/stay night. Witness a battle royale in which no one is guaranteed to survive.',
        13, '2011-10-02 12:00:00.000000', '2011-12-25 12:00:00.000000', 'sample/fate.jpg', null,
        '2023-10-08 14:49:06.882907', '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (7, 'Steins;Gate', 'White Fox', 'Sci-Fi', e'Eccentric scientist Rintarou Okabe has a never-ending thirst for scientific exploration. Together with his ditzy but well-meaning friend Mayuri Shiina and his roommate Itaru Hashida, Rintarou founds the Future Gadget Laboratory in the hopes of creating technological innovations that baffle the human psyche. Despite claims of grandeur, the only notable "gadget" the trio have created is a microwave that has the mystifying power to turn bananas into green goo.

However, when Rintarou decides to attend neuroscientist Kurisu Makise\'s conference on time travel, he experiences a series of strange events that lead him to believe that there is more to the "Phone Microwave" gadget than meets the eye. Apparently able to send text messages into the past using the microwave, Rintarou dabbles further with the "time machine," attracting the ire and attention of the mysterious organization SERN.

Due to the novel discovery, Rintarou and his friends find themselves in an ever-present danger. As he works to mitigate the damage his invention has caused to the timeline, he is not only fighting a battle to save his loved ones, but also one against his degrading sanity.',
        24, '2011-04-06 12:00:00.000000', '2011-09-14 12:00:00.000000', 'sample/steins.jpg', null,
        '2023-10-08 14:48:31.631217', '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (5, 'Shinsekai yori', 'A-1 Pictures', 'Fantasy', e'In the town of Kamisu 66, 12-year-old Saki Watanabe has just awakened to her psychic powers and is relieved to rejoin her friends—the mischievous Satoru Asahina, the shy Mamoru Itou, the cheerful Maria Akizuki, and Shun Aonuma, a mysterious boy whom Saki admires—at Sage Academy, a special school for psychics. However, unease looms as Saki begins to question the fate of those unable to awaken to their powers, and the children begin to get involved with secretive matters such as the rumored Tainted Cats said to abduct children.

Shinsekai yori tells the unique coming-of-age story of Saki and her friends as they journey to grow into their roles in the supposed utopia. Accepting these roles, however, might not come easy when faced with the dark and shocking truths of society, and the impending havoc born from the new world.',
        25, '2012-09-29 12:00:00.000000', '2013-03-23 12:00:00.000000', 'sample/136389.jpg', null,
        '2023-10-08 14:46:52.454338', '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (2, 'Monogatari Series: Second Season', 'Shaft', 'Romance', e'Apparitions, oddities, and gods continue to manifest around Koyomi Araragi and his close-knit group of friends: Tsubasa Hanekawa, the group\'s modest genius; Shinobu Oshino, the resident doughnut-loving vampire; athletic deviant Suruga Kanbaru; bite-happy spirit Mayoi Hachikuji; Koyomi\'s cutesy stalker Nadeko Sengoku; and Hitagi Senjougahara, Koyomi\'s aloof classmate.

Monogatari Series: Second Season revolves around these individuals and their struggle to overcome the darkness that is rapidly approaching. A new semester has begun and with graduation looming over Koyomi, he must quickly decide the paths he will walk, as well as the relationships and friends that he\'ll save. But as strange events begin to unfold, Koyomi is nowhere to be found, and a vicious tiger apparition has appeared in his absence. Hanekawa has become its target, and she must fend for herself—or bow to the creature\'s perspective on the feebleness of humanity.',
        26, '2013-07-01 12:00:00.000000', null, 'sample/121534.jpg', null, '2023-10-08 14:44:17.330724',
        '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (4, 'Saenai Heroine no Sodatekata Fine', 'CloverWorks', 'Romance', e'With the second Winter Comiket just around the corner, Blessing Software has been vigorously producing its new game, "How to Raise a Boring Girlfriend." Despite Utaha Kasumigaoka and Eriri Spencer Sawamura leaving the circle, Megumi Katou and Tomoya Aki are hopeful that, by sticking to Tomoya\'s original vision for the game, their upcoming creation will exceed Blessing Software\'s previous installment.

With the addition of new members Iori and Izumi Hashima, development ensues—but not without its share of setbacks. Things rarely go as planned in the dating sim industry, with numerous obstacles forcing Tomoya to decide between helping his friends or completing the game.

Saenai Heroine no Sodatekata Fine draws the series to a close as Tomoya selects his final route, both within his personal life and Blessing Software.',
        1, '2019-10-26 12:00:00.000000', null, 'sample/111411.jpg', null, '2023-10-08 14:46:01.923112',
        '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, global_id, studio, genre, description, episode_count, air_date_start, air_date_end,
                          poster,
                          trailer, created_at, updated_at)
VALUES (1, 'Sousou No Frieren', 'frieren-s1', 'Madhouse', 'Fantasy', e'The demon king has been defeated, and the victorious hero party returns home before disbanding. The four—mage Frieren, hero Himmel, priest Heiter, and warrior Eisen—reminisce about their decade-long journey as the moment to bid each other farewell arrives. But the passing of time is different for elves, thus Frieren witnesses her companions slowly pass away one by one.

Before his death, Heiter manages to foist a young human apprentice called Fern onto Frieren. Driven by the elf\'s passion for collecting a myriad of magic spells, the pair embarks on a seemingly aimless journey, revisiting the places that the heroes of yore had visited. Along their travels, Frieren slowly confronts her regrets of missed opportunities to form deeper bonds with her now-deceased comrades.',
        27, '2023-09-27 12:00:00.000000', null, 'sample/frieren-1.jpg', 'sample/frieren-trailer.mp4',
        '2023-10-08 14:43:36.677867', '2023-10-08 14:52:39.391095');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (3, 'Neon Genesis Evangelion: The End of Evangelion', 'Gainax', 'Sci-Fi', e'Shinji Ikari is left emotionally comatose after the death of a dear friend. With his son mentally unable to pilot the humanoid robot Evangelion Unit-01, Gendou Ikari\'s NERV races against the shadow organization SEELE to see who can enact their ultimate plan first. SEELE desires to create a godlike being by fusing their own souls into an Evangelion unit, while Gendou wishes to revert all of humanity into one primordial being so that he can be reunited with Yui, his deceased wife.

SEELE unleashes its military forces in a lethal invasion of NERV headquarters. As SEELE\'s forces cut down NERV\'s scientists and security personnel, Asuka Langley Souryuu pilots Evangelion Unit-02 in a desperate last stand against SEELE\'s heaviest weaponry.

The battle rages on, and a depressed Shinji hides deep within NERV\'s headquarters. With the fate of the world resting in Shinji\'s hands, Captain Misato Katsuragi hunts for the teenage boy as society crumbles around them.',
        1, '1997-07-19 12:00:00.000000', null, 'sample/98182.jpg', null, '2023-10-08 14:45:02.106826',
        '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (6, 'Bakuman. 2nd Season', 'J.C. Staff', 'Slice of Life', e'With the serialization of their new manga, "Detective Trap," the writer-artist team, Akito Takagi and Moritaka Mashiro, better known by their pseudonym Muto Ashirogi, are one step closer to becoming world-renowned mangaka. For Mashiro, however, serialization is just the first step. Having promised to marry his childhood sweetheart and aspiring voice actress, Azuki Miho, once his manga gets an anime adaptation, Mashiro must continue his to popularize Ashirogi\'s work. A tremendously competitive cast of ambitious mangaka—including the wild genius, Eiji Niizuma; the elegant student, Yuriko Aoki, and her older admirer and partner, Takurou Nakai; the lazy prodigy, Kazuya Hiramaru; and the abrasive artist, Shinta Fukuda—both support and compete against Muto Ashirogi in creating the next big hit.

As they adjust to their young and seemingly untested new editor, the dynamic duo struggle to maintain their current serialization, secure the top spot in Shounen Jack, and ultimately, achieve an anime adaptation of their manga. With new rivals and friends, Bakuman. 2nd Season continues Takagi and Mashiro\'s inspiring story of hard work and young love.
', 25, '2011-11-01 12:00:00.000000', '2012-03-24 12:00:00.000000', 'sample/bakuman.jpg', null,
        '2023-10-08 14:47:37.547390', '2023-10-08 14:51:57.591944');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (9, 'Masamune-kun no Revenge R', 'SILVER LINK.', 'Drama', e'With the tumultuous cultural festival behind him, Masamune Makabe continues his efforts to carry out his revenge: to make the "Cruel Princess" Aki Adagaki deeply fall for him and then immediately dump her. As his class is going on a trip to Paris, widely known as the City of Love, Masamune has the perfect opportunity to get even for his childhood heartbreak.

Before Masamune can impress Aki, the two meet Muriel Besson, a French high school otaku who aspires to create a romantic comedy manga series. Muriel believes Masamune is the ideal model for the protagonist and asks for his help. The boy reluctantly agrees, dragging Aki along to provide inspiration for the love interest\'s character. But to do so, the two must show Muriel what Japanese love is like.

To make matters more complicated, Kanetsugu Gasou is masquerading as Aki\'s childhood friend, Masamune, to trick and use her. With mix-ups and love rivals galore, Masamune\'s revenge is proving to be quite the difficult task.',
        12, '2023-07-03 12:00:00.000000', '2023-09-18 12:00:00.000000', 'sample/135587.jpg', null,
        '2023-10-08 14:53:29.785186', '2023-10-08 14:56:19.366588');
INSERT INTO public.anime (id, title, studio, genre, description, episode_count, air_date_start, air_date_end, poster,
                          trailer, created_at, updated_at)
VALUES (11, 'Sono Bisque Doll wa Koi wo Suru', 'CloverWorks', 'Romance', e'High school student Wakana Gojou spends his days perfecting the art of making hina dolls, hoping to eventually reach his grandfather\'s level of expertise. While his fellow teenagers busy themselves with pop culture, Gojou finds bliss in sewing clothes for his dolls. Nonetheless, he goes to great lengths to keep his unique hobby a secret, as he believes that he would be ridiculed were it revealed.

Enter Marin Kitagawa, an extraordinarily pretty girl whose confidence and poise are in stark contrast to Gojou\'s meekness. It would defy common sense for the friendless Gojou to mix with the likes of Kitagawa, who is always surrounded by her peers. However, the unimaginable happens when Kitagawa discovers Gojou\'s prowess with a sewing machine and brightly confesses to him about her own hobby: cosplay. Because her sewing skills are pitiable, she decides to enlist his help.

As Gojou and Kitagawa work together on one cosplay outfit after another, they cannot help but grow close—even though their lives are worlds apart.',
        12, '2022-01-09 12:00:00.000000', '2022-03-27 12:00:00.000000', 'sample/119897.jpg', null,
        '2023-10-08 14:55:21.700375', '2023-10-08 14:56:19.366588');

SELECT setval('anime_id_seq', 11, true);

INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 6, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 3, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 4, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 2, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 1, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 11, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 5, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 10, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (3, 8, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 7, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 4, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 3, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 1, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 9, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 6, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 11, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 2, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (4, 10, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 3, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 4, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 10, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 6, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 9, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 11, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 2, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 8, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (5, 5, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 10, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 2, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 9, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 3, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 1, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 6, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 7, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 4, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (6, 5, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 9, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 8, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 6, 'WISHLIST');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 3, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 7, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 2, 'WATCHING');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 5, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 4, 'WATCHED');
INSERT INTO public.user_anime (user_id, anime_id, status)
VALUES (7, 11, 'WATCHED');

INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (1, 3, 5, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:43.639081', '2023-10-08 15:07:43.639081');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (2, 3, 10, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:43.675858', '2023-10-08 15:07:43.675858');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (3, 3, 8, 'Lorem ipsum dos color sit amet', 9, '2023-10-08 15:07:43.712646', '2023-10-08 15:07:43.712646');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (4, 4, 11, 'Lorem ipsum dos color sit amet', 9, '2023-10-08 15:07:43.876118', '2023-10-08 15:07:43.876118');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (5, 4, 2, 'Lorem ipsum dos color sit amet', 9, '2023-10-08 15:07:43.915454', '2023-10-08 15:07:43.915454');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (6, 4, 10, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:43.958890', '2023-10-08 15:07:43.958890');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (7, 5, 2, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:44.110783', '2023-10-08 15:07:44.110783');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (8, 5, 8, 'Lorem ipsum dos color sit amet', 8, '2023-10-08 15:07:44.149161', '2023-10-08 15:07:44.149161');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (9, 5, 5, 'Lorem ipsum dos color sit amet', 10, '2023-10-08 15:07:44.190036', '2023-10-08 15:07:44.190036');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (10, 6, 7, 'Lorem ipsum dos color sit amet', 8, '2023-10-08 15:07:44.355253', '2023-10-08 15:07:44.355253');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (11, 6, 4, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:44.399327', '2023-10-08 15:07:44.399327');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (12, 6, 5, 'Lorem ipsum dos color sit amet', 7, '2023-10-08 15:07:44.442479', '2023-10-08 15:07:44.442479');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (13, 7, 5, 'Lorem ipsum dos color sit amet', 9, '2023-10-08 15:07:44.604936', '2023-10-08 15:07:44.604936');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (14, 7, 4, 'Lorem ipsum dos color sit amet', 10, '2023-10-08 15:07:44.647218', '2023-10-08 15:07:44.647218');
INSERT INTO public.review (id, user_id, anime_id, review, rating, created_at, updated_at)
VALUES (15, 7, 11, 'Lorem ipsum dos color sit amet', 8, '2023-10-08 15:07:44.683352', '2023-10-08 15:07:44.683352');

SELECT setval('review_id_seq', 15, true);