# ListWibuKu

ListWibuKu is a site where you could explore anime and find anime review online

## Contributors

1. Akbar Maulana Ridho, 13521093
2. Eugene Yap Jin Quan, 13521074

## Requirement

1. Docker Installed

## Installation Guide

1. Clone repo
2. Inside the repository, run `docker compose up`
3. If you are on Linux, make sure storage folder could be modified by another user. This is chaotic, but you could just
   run `chmod -R 777 storage`
4. Run migration `PGPASSWORD=pgpassword psql -h localhost -U postgres -d postgres -f migrations/listwibuku.sql`
5. (Optional) run seeder `PGPASSWORD=pgpassword psql -h localhost -U postgres -d postgres -f migrations/seed.sql`

## How to Run

Make sure the docker container are up and running. Open the website on http://localhost:8000

## Features (Milestone 1)

### Home

![Home](readme/home.png)

### Add anime

![Image](readme/add-anime.png)

### Anime Detail

![Image](readme/detail.png)

### Edit Profile

![Image](readme/edit-profile.png)

### Login

![Image](readme/login.png)

### Change Password

![Image](readme/password.png)

### Profile

![Image](readme/profile.png)

### Register

![Image](readme/register.png)

## Features (Milestone 2)

### Watch Anime
![Image](readme/anime-watch.png)
![Image](readme/stream.png)

### Watch Episode

![Image](readme/episode.png)

### Subscription Profile

![Image](readme/subscription-profile.png)
![Image](readme/subscription-profile-2.png)

### Subscription Management

![Image](readme/subscription-create.png)
![Image](readme/subscription-renew.png)

## Bonus Features

- All responsive view
- Docker compose configuration
- Lighthouse
  ![Image](readme/lighthouse-home.png)
  ![Image](readme/lighthouse-detail.png)

## Contributions

Each task includes server side and client side development

### Milestone 1

| Tugas                          | NIM                |
| ------------------------------ | ------------------ |
| Login, Logout                  | 13521093           |
| Register                       | 13521093           |
| Profile                        | 13521074, 13521093 |
| Add and update anime           | 13521074           |
| Update and delete anime status | 13521093           |
| Anime detail                   | 13521074           |
| Anime list page                | 13521093           |
| Add and edit review            | 13521074           |

### Milestone 2

| Tugas           | NIM      |
| --------------- | -------- |
| Streaming anime | 13521093 |
| Subscription    | 13521074 |
