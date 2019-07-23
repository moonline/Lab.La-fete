#!/bin/bash
sqlite3 "var/app.db" "DELETE FROM event";
sqlite3 "var/app.db" "DELETE FROM comment";
sqlite3 "var/app.db" "VACUUM";
sqlite3 "var/app.db" <<EOF
INSERT INTO event (id, edit_key, title, description, organizer)
VALUES
 ('e1111', 'k1111', 'Movie Night - Inception', 'You are invited to watch the movie "Inception". We will meet at 7pm at Steves home, have dinner, watch the movie and have desert. You are welcome to bring something for dinner, desert or drinks. Please leave a comment, what you bring.', 'Jamie & Steve'),
  ('e2222', 'k2222', 'Rooftop Dance', 'You want to dance on the rooftop of Zurich? Our legendary Rooftop Dance takes place like last year. When the sun goes down, we will start dancing on Johns roof, at Main Street 8, Zurich. Please leave a note, if you join us at 6pm to prepare the floor or bring drinks or snacks. We are waiting for you', 'John & team');
EOF
sqlite3 "var/app.db" <<EOF
INSERT INTO comment (event_id, author, message)
VALUES
 ('e1111', 'Patric', 'For sure I will part of this. I will bring Sandy with me and some popcorn.'),
 ('e1111', 'Miranda', 'I will come. I will bring Coke and Fanta.'),
 ('e2222', 'John', 'Cindy and myself will participate and help to prepare the floor.');
EOF