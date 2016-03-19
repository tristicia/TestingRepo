Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty32"
  
  #config.vm.network :forwarded_port, guest:80, host: 4567
  config.vm.network "private_network", ip: "192.168.50.4"
  
  #config.vm.synced_folder "www/", "/var/www/html/"
  config.vm.synced_folder "api/", "/var/www/api/"
  config.vm.synced_folder "finance/", "/var/www/finance/"
  config.vm.synced_folder "rest/", "/var/www/rest/"
  
  config.vm.provider "virtualbox" do |v|
    v.customize ["modifyvm", :id, "--cpuexecutioncap", "50"]
    v.memory = 2048
    v.cpus = 2
  end
  
  config.vm.provision :shell, path: "provision.sh"
  config.vm.provision "file", source: "files/.bashrc", destination: "~/.bashrc"
  config.vm.provision "file", source: "files/.tmux.conf", destination: "~/.tmux.conf"
  
end