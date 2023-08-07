# Link Service

1. Clone repository:

   ```bash
   git clone https://github.com/your_username/shortlink-service.git
   cd shortlink-service
   cp .env.example .env
 2. Start containers
 ```docker-compose up -d --build```
 3. Run migration ```docker-compose exec app php artisan migrate```
4. Usage ```http://localhost:8001```
 

