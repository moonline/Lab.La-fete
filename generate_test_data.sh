#!/bin/bash
sqlite3 "var/app.db" <<EOF
INSERT INTO event (id, public_id, title, description, organizer)
VALUES
 ('e1111', 'p1111', 'Movie Night - Inception', 'You are invited to watch the movie "Inception". We will meet at 7pm at Steves home, have dinner, watch the movie and have desert. You are welcome to bring something for dinner, desert or drinks. Pleaseleave a comment, what you bing.', 'Jamie & Steve'),
  ('e2222', 'p2222', 'Rooftop Dance', 'You want to dance on the rooftop of Zurich? Our legendary Rooftop Dance takes place like last year. When the sun goes down, we will start dancing on Johns roof, at Main Street 8, Zurich. Please leave a note, if you join us at 6pm to prepare the floor or bring drinks or snacks. We are waiting for you', 'John & team');
EOF