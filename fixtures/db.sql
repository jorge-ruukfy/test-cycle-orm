INSERT INTO users (id, name) VALUES (1, 'jorge');
INSERT INTO users (id, name) VALUES (2, 'albert');

INSERT INTO posts (id, entry, user_id) VALUES (1, 'asdasdasd', 1);
INSERT INTO comments (id, comment, user_id) VALUES (5, 'Wehehehe', 2);
INSERT INTO post_comments (post_id, comment_id) VALUES (1, 5);