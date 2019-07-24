#!/bin/bash
sqlite3 "var/app.db" "DELETE FROM event";
sqlite3 "var/app.db" "DELETE FROM comment";
sqlite3 "var/app.db" "VACUUM";
sqlite3 "var/app.db" <<EOF
INSERT INTO event (id, edit_key, title, description, organizer)
VALUES
 ('e1111', 'k1111', 'Movie Night - Inception', '![Inception cover](https://glamourfame.com/uploads/movies-tv-shows/2019/06/09/will-we-ever-see-inception-sequel-heres-why-inception-2-will-never-happen-1560094041.jpg)

You are invited to watch the movie "Inception"!

### Program
1. Dinner
2. Movie
3. Dessert

### Place & time
30/09/19, 7pm, Steves home

### Support
You are welcome to bring something for dinner, desert or drinks. Please leave a comment, what you bring.', 'Jamie & Steve'),
  ('e2222', 'k2222', 'Rooftop Dance', 'You want to dance on the rooftop of Zurich? Our legendary Rooftop Dance takes place like last year. When the sun goes down, we will start dancing on Johns roof, watching the national firework.

![Zurich firework](https://static.az-cdn.ch/__ip/-_puiD49l_0kvkV70YE1CJE4DBc/58b48a4286f61c00a0181d037f3caa3e8ae318d4/remote.adjust.rotate=0&remote.size.w=3176&remote.size.h=2117&local.crop.h=1785&local.crop.w=3176&local.crop.x=0&local.crop.y=239&r=1,n-max-16x9)

### Where & when
01/08/19, 8pm, Main Street 8, Zurich. 

Please leave a note, if you join us at 6pm to prepare the floor or bring drinks or snacks. We are waiting for you', 'John & team');
EOF
sqlite3 "var/app.db" <<EOF
INSERT INTO comment (event_id, author, message)
VALUES
 ('e1111', 'Patric', 'For sure I will part of this. I will bring Sandy with me and some popcorn.'),
 ('e1111', 'Miranda', 'I will come. I will bring Coke and Fanta.'),
 ('e2222', 'John', 'Cindy and myself will participate and help to prepare the floor.');
EOF