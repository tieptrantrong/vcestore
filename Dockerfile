FROM centos:7
RUN yum update -y
# Install PHP 7.3
RUN yum install -y epel-release
RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum install yum-utils -y
RUN yum-config-manager --enable remi-php73
RUN yum install -y php php-common php-fpm
RUN yum install -y php-mysql php-pecl-memcache php-pecl-memcached php-gd php-mbstring php-mcrypt php-xml php-pecl-apc php-cli php-pear php-pdo
RUN yum install php-cli php-zip wget unzip -y
RUN yum install -y php-intl 
#
RUN mkdir /opt/vcetop

# Copy existing application directory contents
COPY . /opt/vcetop
RUN mkdir /opt/vcetop/storage/framework/sessions
RUN mkdir /opt/vcetop/storage/framework/views
WORKDIR /opt/vcetop
# Expose port 8080 and start php-fpm server
EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
