## PHP Programming Task

This is my attempt at creating a very basic one page site that pulls commit data form github

### Prerequisites

In order for this application to run you will need:

1. Vagrant 1.7.2 or greater
2. VirtualBox V 4.3.28 or greater.

## Vagrant Setup

1. Clone the repository
2. Navigate to the ./source directory
3. Run the command `vagrant up` (This may take a while)
4. Run the command `vagrant ssh`
5. Run the command `cd /var/www/`
6. Run the command `php artisan migrate`
7. Open your local /etc/hosts file and add `192.168.56.101	picmonic.local` to the end of the file.

Your server should now be live and accessable through your browser at `http://picmonic.local`

## Author

James "T.J." Moats
toadking2@gmail.com
https://github.com/khadaj