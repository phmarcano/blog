
# BLOG

 An small blog project for testing purpose

## Requirements

- PHP ^7.0
- Symfony ^4.0
- Docker ^1.10
- Docker Compose ^1.8.0

## Installation Instructions

1. In the same folder, download the repositories from github:
    - git clone https://github.com/phmarcano/blog.git
    - git clone https://github.com/phmarcano/blog-enviroment.git

2. Inside the folder blog-enviroment, execute:
    - docker-compose up -d

3. Execute the container:
    - docker exec -it symfony4-php-fpm bash

4. Inside the docker containter, execute the next commands:
    - composer install
    - ./bin/console doctrine:migrations:migrate
    - exit

5. Go to the folder blog and execute the commands:
    - sudo chown -R $USER:$USER vendor
    - sudo chown -R $USER:$USER var
    - sudo chmod -R 777 var

6. Open the web browser and go to the URL:
    - http://localhost:8000/

## Restful API

##### List Posts
`[GET] /api/blogs/`

```json
{
    "data": [
        {
            "id": 1,
            "title": "Post"
        }
    ]
}
```
##### View Post
`[GET] /api/blogs/{postId}`

```json
{
    "data": {
        "title": "Post",
        "body": "New Post"
    }
}
```
```
##### Post detail
`[GET] /api/blogs/{postId}/detail`

```json
{
    "data": {
        "id": 1,
        "title": "Post",
        "body": "New Post",
        "tags": "Tag1, Tag2, Tag3"
    }
}
```
