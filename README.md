# Expenditure
A simple web application to analyse expenses. Built using Laravel.

# Instructions
1. Install/Update Laravel 5.5
2. Clone this repository
3. Migrate and seed the database using php artisan migrate --seed
4. Navigate to http://expenditure.app

### For homestead users

#### Adding Additional Sites

Once your Homestead environment is provisioned and running, you may want to add additional Nginx sites for your Laravel applications. You can run as many Laravel installations as you wish on a single Homestead environment. To add an additional site, simply add the site to your  Homestead.yaml file:

```sh
sites:
    - map: homestead.app
      to: /home/vagrant/Code/Laravel/public
    - map: another.app
      to: /home/vagrant/Code/another/public
```
If Vagrant is not automatically managing your "hosts" file, you may need to add the new site to that file as well:

```sh
192.168.10.10  homestead.app
192.168.10.10  another.app
```

Once the site has been added, run the vagrant reload --provision command from your Homestead directory.
