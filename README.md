# README #

### How to use in local environment ###

The project is built using Docker. To run it locally, download the Docker image and follow these steps to start the project.

- Copy __.env.example__ file to __.env__
- Run __docker-compose up__ 
- Run __composer install__

### Explanation ###

To build the project, I adhered to Clean/Hexagonal Architecture principles to separate responsibilities but minimizing modifications to the original Laravel installation.

Since the requirements did not specify valid age values below 18 or above 70, I assumed these ages are invalid or that different business rules apply in these cases.

I created a basic structure to demonstrate handling JWT tokens.

Finally, the simple web page that handles with user input is located in __resources/views__ and is named simple_page.html.