This document is aimed at the people deploying test on https://testhq.com, and does not apply to the people installing test for their own use.

## Before deploying a new version

* Make sure `config/test.php` contains the number of the new release you are about to create.
* Update `CHANGELOG.md` accordingly.
* Create a new release on https://version.testhq.com with the release notes.
* Create a new release on https://github.com/testhq/test/releases, which will also automatically create a new tag.
* Write the release note with the tool hosted on https://testhq.com/login
* Push the code to production.

## Deployment of the Docker images

This guide has been posted by [kstrauser](https://github.com/testhq/test/issues/676#issuecomment-352047750) - thanks for his help. Here are the steps necessary to deploy test on Docker hub:
* You need an account on [Docker hub](https://hub.docker.com).
* You need to have Docker installed on your machine.
* Run the following commands (example for the version 3.4.5):

```
git reset --hard v3.4.5
make docker_build docker_tag docker_push
```

The image should be up on the Docker Hub.
