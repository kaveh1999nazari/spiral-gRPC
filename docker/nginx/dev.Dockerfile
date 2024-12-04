FROM nginx:alpine

# Remove the default Nginx configuration file
RUN rm /etc/nginx/conf.d/default.conf

# Copy the Nginx configuration file from your project into the Docker image
COPY docker/nginx/default_dev.conf /etc/nginx/conf.d/default.conf

COPY public /var/www/public

RUN chown -R nginx:nginx /var/www/public

# Expose port 80
EXPOSE 80

# Start Nginx when the Docker container starts
CMD ["nginx", "-g", "daemon off;"]
