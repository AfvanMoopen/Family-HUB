# Common problems FAQ

This document describes common errors/problems with a self hosted test installation.

## Q: What are the default user credentials?
A: test should open a browser after setup to create your first user. If this does not happen or during setup you see the output `Seeding: FakeUserTableSeeder` you possibly did forget to set `APP_ENV` within the `.env` file to value `production`
