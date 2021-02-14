GIT_TAG := $(shell git describe --abbrev=0 --tags)
VERSION := $(subst v,,$(GIT_TAG))

build: base
	rm -rf .vagrant
	GIT_TAG=$(GIT_TAG) vagrant up testhq-stable

base:
	vagrant box list | grep -q "ubuntu/bionic64" || vagrant box add ubuntu/bionic64
	vagrant box update --box ubuntu/bionic64

package: build
	rm -f testhq-stable.box
	vagrant box remove testhq/testhq --box-version 0 || true
	vagrant package testhq-stable --output ./testhq-stable.box --vagrantfile ../Vagrantfile
	vagrant box add testhq/testhq ./testhq-stable.box

upload:
	mv testhq-stable.box testhq-$(GIT_TAG).box
	./vagrant-upload.sh

.PHONY: build base package
