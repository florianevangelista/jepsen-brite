# jepsen-brite

In our studies at Becode, we discovered PHP. We had to create a website about events using PHP. 
You will find below the instructions we were given to do this work.

See here our work <https://event-manager-8.herokuapp.com/index.php>

## Learning Objectives 

- Generate templates with PHP
- Be able to use the superglobals $_GET, $_POST, $_COOKIE and $_SESSION variable.
- Implement a CRUD
- Create a DB following the client requests
- Be able to manage SQL requests
- Use PDO
- Deploy on Heroku

## The Mission

A client from the cultural sector, Henry Fiesta, ask you to provide him a new website. The purpose of this website is to show all kinds of events to the public according to their point of interest. 

The website will be visible to any visitor who have to register to be able to interact (like registering for an event, putting in a comment, etc.).

You can compare this project to [**Eventbrite**](https://www.eventbrite.com/), except that Henry thinks you will make a better product. So, don't disapoint him. He has already paid a deposit. 

Henry doesn't have special request for the design, you're free to follow your own inspiration. 
*But don't be too focus on the design*, the aim of this project is to deliver something functional. You can take a template already made by *Bootstrap* or *Materialize*. 


### Users

Any visitor can consult the website and navigate through the event, but to interact, he must be connected as a *User*.

* Any visitor should be able to sign up and log in. 
* There is no admin user, everybody has got the same rights. 
* When a user sign up (**CREATE**), he must receive an email. 
* A user must have an unique : 
	- *email adress* which is private, so don't show it to the others users. 
	- *password*
	- *nickname* which will be displayed on the website.
	- *avatar* (use [Gravatar](https://en.gravatar.com/)) which will be displayed on the website.
* A user logged can create an event. 

### Profile page

* It displays the user informations (**READ**).  
* Users will be able to modify (**UPDATE**) their information (except email) on this page.  
* He should be able to **DELETE** his account via this page. 

### Homepage

* The homepage presents (**READ**) a list of upcoming events, in chronological order (the next to occur is the first presented, then the next, etc.). Each event must be displayed with his name, date and hour.
* At least, the 5 upcoming events should be displayed, Max 21 upcoming events.
* On each event a link must allow to go to the page of the event.
* The first event to occur has to be highlighted.

### Event page

An event should contain at least :

* A title
* The author
* A date and an hour
* An image
* A description. It must be _rich_: it must interprets **markdown** and shows **emojis**.
* A category (for example : concert, exhibition, conference...)

All these informations must be displayed on the event page. 

The author of an event, and only him, can **UPDATE** his own event. The update can be made as well on the same page as redirect to an other page (you're free to choose the best process).  

The author of an event, and only him, can **DELETE** his own event.  

* There must be a link to the event creation page.
* Any user can post a comment on the event. It must interprets **markdown** and shows **emojis**.


### Event creation page

This is here a user can **CREATE** an event.

### Past Events page

It displays the past events. It can looks like the homepage.  

### Category page

As there is not administrator for this application, you can create categories in advanced in the DB and constrains the users to use some categories (for example : concert, exhibition, conference...).

The category page displays events in regards to category. It can looks like the homepage.  

### The menu

* The menu should link to all the important pages.
* There must be a link to the profile page.
* Don't forget to add a submenu for the categories. It could be display as a sidebar for example. 


## Constraints

* Use SCRUM methodology to communicate and advance in team. Your SCRUM meeting should be a ritual everyday. The 3 steps of a SCRUM meeting :
	- Tell what was done.
	- Tell what difficulties you encountered.
	- Define objectives.
* The back-end must be programmed in **PHP**, and there is no constraint about the way you code.
* The database must be in SQL. 
* The project should be published on [**Heroku**](https://heroku.com). You have free credits to use on Heroku with your **GitHub Student Pack**.
* You must hash your password with a solution like *bcrypt*. 
* No credential must be commited on the repo Github. 

## Advices

Deploy a website is not an easy things. We can only recommend that you take an interest in it as soon as possible, ideally at the start of the project even before any of the features are available.

* First designate a DevOps manager who will take care of the majority of this deployment and documentation job (but who can ask to be helped for the parts he does not control).
* Start by setting up a stupid and nasty application which distributes a simple HTML file containing "Hello world" then deploy it on Heroku. Validate that it works well. Document how to test in development and the deployment process.
* Then upgrade this application so that it distributes a small PHP application instead. It can be very simple (like displaying the result of 1 + 1). Deploy to Heroku and validate that it works. Update the documentation for local testing and deployment.
* Add the DB, see how it works, Update the documentation for local testing and deployment.
* Ect...

**Produced by Donovan, Florian, Arti and Céline**
