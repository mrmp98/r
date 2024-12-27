#!/bin/bash

# Start Laravel server in the background
php artisan serve &

# Wait for a moment to ensure the server is up
sleep 5

# Run npm command
npm run