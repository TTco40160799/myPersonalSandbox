# vagrant
- vagrant remove : remove a box file
- vagrant destroy: remove a vagrant enviornment

## Vagrantfile
```vagrantfile
Vagrant::Config.run do |+config|
  #...
  config.vm.share_folder "original_folder", "/virtual_folder", ""
  config.vm.provision "shell", path: "provision.sh"
  config.vm.provision "chef_solo", run_list: ["name_of_list"]
  config.vm.provision "puppet"
end
```
- shell may be replaced by or use with puppet or chef

#### to use chef for provisioning in Vagrantfile
- put the recipe in "/cookbooks/'name_of_list'/recipes/default.rb" relative path to the project root
- example below;

```ruby
execute "apt-get update"
package "apache2"
execute "rm -rf /var/www"
link "/var/www" do
  to "/vagrant"
end
```

#### to use puppet for provisioning in Vagrantfile
- make a file in "/manifests/default.pp" relative path to the project root

```puppet
exec { "apt-get update":
    command => "/usr/bin/apt-get update",
}

package { "apache2":
    require => Exec["apt-get update"],
}

file { "/var/www":
    ensure => link,
    target => "/vagrant"
    force => true,
}
```

#### to use shell for provisioning in Vagrantfile

```shell
echo "Installing Apache and setting it up..."
apt-get update >/dev/null 2>&1
apt-get install -y apache2 >/dev/null 2>&1
rm -rf /var/www
ln -fs /vagrant_/var/www
```


# setup vagrant for docker
```
Vagrant.configure("2") do |config|
#...
 config.vm.provision "shell", inline: <<-SHELL
    /etc/init.d/docker restart latest
    
    wget -L https://github.com/docker/compose/releases/download/1.24.1/docker-compose-`uname -s`-`uname -m`
    chmod +x docker-compose-`uname -s`-`uname -m`
    mv docker-compose-`uname -s`-`uname -m` /opt/bin/docker-compose
    chown root:root /opt/bin/docker-compose

    echo 'cd /vagrant' >> /etc/bashrc
    echo 'docker-compose up -d' >> /etc/bashrc
  SHELL
```

