-- parent table: Anime
CREATE TABLE IF NOT EXISTS Anime
(
    id             SERIAL PRIMARY KEY,
    global_id      VARCHAR(255),

    title          TEXT NOT NULL,
    studio         TEXT,
    genre          TEXT,
    description    TEXT,
    episode_count  INTEGER,
    air_date_start TIMESTAMP,
    air_date_end   TIMESTAMP,

    poster         TEXT,
    trailer        TEXT,

    created_at     TIMESTAMP DEFAULT NOW(),
    updated_at     TIMESTAMP DEFAULT NOW()
);


-- USER_ROLE Type
DROP TYPE IF EXISTS USER_ROLE;
CREATE TYPE USER_ROLE AS ENUM ('ADMIN', 'USER');


-- parent table: User_Data
CREATE TABLE IF NOT EXISTS User_Data
(
    id         SERIAL PRIMARY KEY,
    name       TEXT                     NOT NULL,
    username   TEXT                     NOT NULL unique,
    password   TEXT                     NOT NULL,
    bio        TEXT,
    role       USER_ROLE DEFAULT 'USER' NOT NULL,

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);


-- WATCH_STATUS Type
DROP TYPE IF EXISTS WATCH_STATUS;
CREATE TYPE WATCH_STATUS AS ENUM ('WISHLIST', 'WATCHING', 'WATCHED');


CREATE TABLE IF NOT EXISTS User_Anime
(
    user_id  INTEGER REFERENCES User_Data (id) ON DELETE CASCADE,
    anime_id INTEGER REFERENCES Anime (id) ON DELETE CASCADE,
    status   WATCH_STATUS DEFAULT 'WISHLIST',
    PRIMARY KEY (user_id, anime_id)
);

CREATE TABLE IF NOT EXISTS Review
(
    id         SERIAL PRIMARY KEY,
    user_id    INTEGER REFERENCES User_Data (id) ON DELETE CASCADE NOT NULL,
    anime_id   INTEGER REFERENCES Anime (id) ON DELETE CASCADE     NOT NULL,
    review     TEXT,
    rating     INTEGER CHECK (rating >= 1 AND rating <= 10),

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);


-- triggers for updated_at
CREATE OR REPLACE FUNCTION update_modified_time()
    RETURNS TRIGGER AS
$$
BEGIN
    NEW.updated_at = NOW();
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER anime_modified_time
    BEFORE UPDATE
    ON Anime
    FOR EACH ROW
EXECUTE FUNCTION update_modified_time();

CREATE OR REPLACE TRIGGER user_modified_time
    BEFORE UPDATE
    ON User_Data
    FOR EACH ROW
EXECUTE FUNCTION update_modified_time();

CREATE OR REPLACE TRIGGER review_modified_time
    BEFORE UPDATE
    ON Review
    FOR EACH ROW
EXECUTE FUNCTION update_modified_time();
