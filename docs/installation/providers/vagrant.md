# Installing test on Vagrant <!-- omit in toc -->

<img width="96" height="117" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Vagrant.png/197px-Vagrant.png" />

testhq vagrant box is available on [Vagrant Cloud](https://app.vagrantup.com/testhq/boxes/testhq).

The only provider for this box is virtualbox.

- [Run the testhq vagrant box](#run-the-testhq-vagrant-box)
- [Default test configuration in the VM](#default-test-configuration-in-the-vm)
  - [Database users](#database-users)
  - [Apache configuration](#apache-configuration)
- [Build your own image](#build-your-own-image)

## Run the testhq vagrant box

1. Download and install [Vagrant](https://www.vagrantup.com/) for your operating system
2. Create a folder to put the vagrant configuration files
```sh
mkdir ~/test
cd ~/test
```
3. Download the `Vagrantfile` script
```sh
curl -sS https://raw.githubusercontent.com/testhq/test/master/scripts/vagrant/Vagrantfile -o Vagrantfile
```
4. Edit Vagrantfile to set the appropriate host port number (default: 8080)
```
config.vm.network "forwarded_port", guest: 80, host: 8080
```
5. Launch the virtual machine with
```sh
vagrant up
```

The virtual machine will be created and pulled up with Vagrantfile script.

Once the process is complete you can either access the virtual machine by typing `vagrant ssh` in your terminal, or access the test web interface by opening [http://localhost:8080](http://localhost:8080) in your browser on your host machine.

## Default test configuration in the VM

### Database users

* Root database user
   - Username: `root`
   - Password: `changeme`
* test database user
   - Username: `test`
   - Password: `changeme`

### Apache configuration

* The project is installed in `/var/www/html/test`
* The root folder for the web server is `/var/www/html/test/public`

## Build your own image

1. Download the `Vagrantfile` script
```sh
curl -sS https://raw.githubusercontent.com/testhq/test/master/scripts/vagrant/build/Vagrantfile -o Vagrantfile
curl -sS https://raw.githubusercontent.com/testhq/test/master/scripts/vagrant/build/install-test.sh -o install-test.sh
```
2. Run the box by calling:
```sh
vagrant up testhq-latest
```
for the latest commit, or with a GIT_TAG to run a specific version:
```sh
GIT_TAG=$(GIT_TAG) vagrant up testhq-stable
```
3. Package you own box
You can package it to use it more quickly later:
```sh
vagrant up testhq-latest
vagrant package testhq-latest --output ./my-testhq.box
vagrant box add my-testhq ./my-testhq.box
```
