INSERT INTO users (id, name) VALUES ('00b3ded2-fca5-4006-9623-42bad91df0d1', 'jorge');
INSERT INTO users (id, name) VALUES ('0faaaceb-c025-4775-beea-060dfa31b03b', 'albert');

INSERT INTO posts (id, entry, user_id) VALUES ('5d6f715f-335a-410c-bf6d-5be08433c350', 'asdasdasd', '00b3ded2-fca5-4006-9623-42bad91df0d1');
INSERT INTO comments (id, comment, user_id) VALUES ('6dbac295-c4cb-4d25-be43-8c639eb2a2b8', 'Wehehehe', '0faaaceb-c025-4775-beea-060dfa31b03b');
INSERT INTO posts_x_comments (post_id, comment_id) VALUES ('5d6f715f-335a-410c-bf6d-5be08433c350', '6dbac295-c4cb-4d25-be43-8c639eb2a2b8');