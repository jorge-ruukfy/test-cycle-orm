create table users
(
    id   uuid not null
        constraint users_pk
            primary key,
    name varchar
);


create table posts
(
    id      uuid not null
        constraint posts_pk
            primary key,
    user_id uuid
        constraint posts_users_id_fk
            references users,
    entry   text
);


create table comments
(
    id      uuid not null
        constraint comments_pk
            primary key,
    user_id uuid
        constraint comments_users_id_fk
            references users,
    comment text
);

create table posts_x_comments
(
    post_id    uuid
        constraint posts_comments_posts_id_fk
            references posts,
    comment_id uuid
        constraint posts_comments_comments_id_fk
            references comments
);

