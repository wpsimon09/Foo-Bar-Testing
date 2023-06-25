# Testing

## User stories

---

### As a user I want to create a profile so that I can access all of the features of the website
### Happy path

> **Given**: User wants to create a new Foo

> **When**: User registers or logs in

> **Then**: The application will allow him to preform actions on the Foo crud model

### Unhappy path

> **Given**: User wants to create a new Foo

> **When**: User tries to change url without logging in

> **Then**: He will be redirected to the login page

> **And**: User will be asked to login in or register

### How we will test it

---

> Happy path

### Arrange: 
create a new user 

### Act
make a post request to the server to with the user that was crated

### Assert
We will check if the server responded with code 200 and if the new user was indeed created in the users table

> Unhappy path
### Arrange:
we will not create a new user nor login one

### Act
make a get request 

### Assert
We will check if the server responded with code 200 and if the new user was indeed created in the users table


### As a user I want to create a new FOO so that I can have my FOOS up to date
### Happy path

> **Given**: User wants to create a new Foo

> **When**: User pressed on Create button on the index page 

> **And**: User fills in the create form without any errors 

> **Then**: User will be redirected to the index page showing the newly created foo

### Unhappy path

> **Given**: User wants to create a new Foo

> **When**: User pressed on Create button on the index page

> **And**: User fills in the create form without filling in the required field

> **And**: User will be asked to filled in the required fields

