Project Description: 

TTRPG Character Management Web Page

Goal:

The goal of this project is to create a functioning web page for managing and displaying characters for Tabletop Role-Playing Games (TTRPGs). The web page will provide users with the ability to select character types, choose armor and shield options, set and modify health points, manage levels, update ability scores, and view corresponding modifiers.

Functionality:

1. Character Selection:
。Users can select a character type from a dropdown list.
。The associated health points for the selected character type will be fetched from the character_type database using PHP (main.php, line 18) and displayed on the webpage using JavaScript (main.php, line 222).
。This functionality allows users to easily understand the capabilities and limitations of their chosen character type.
。Technologies used: HTML, PHP, JavaScript, MySQL.

2. Armor Selection:
。Users can choose equipped armor and shield options from a dropdown list.
。The selected armor and shield options will affect the character's armor class and provide additional health points.
。The associated additional health points will be fetched from the armor and shield database using PHP (main.php, line 62) and added to the character's maximum health points.
。The updated maximum health points will be displayed on the webpage using JavaScript (main.php, line 139).
。This functionality enables users to tailor their character's defense and health points to suit their desired playstyle.
。Technologies used: HTML, PHP, JavaScript, MySQL.

3. Level Selection:
。Users can select a character level from a dropdown list.
。The maximum health points will be adjusted based on the selected level.
。The current maximum health points will be retrieved from the database using PHP (main.php, line 183) and PHP(get_health_points_by_level.php) and JavaScript(main.php, line 292).
。This functionality ensures that the character's health points accurately reflect their level progression, enhancing the realism and immersion of the gameplay experience.
。Technologies used: HTML, PHP, JavaScript, MySQL.

4. Health Management:
。Users can set and modify the maximum and current health points for the character.
。The web page offers options for healing the character's current health points, enabling users to manage their character's health effectively during gameplay.
。This functionality implemented using PHP (main.php, line 195), JavaScript (main.php, line 246), allows users to respond to in-game events and adjust their character's health and PHP(get_health_points..php) to check each character basic health that’s in character database.
。Technologies used: HTML, PHP, JavaScript.

5. Take Damage Section:
。Users can set the amount of damage to be dealt to the character.
。The option to multiply the damage using Hit Dice will be available.
。The take damage section will be implemented using HP (main.php, line 207), JavaScript (main.php, line 267), provides users with the means to handle combat situations and resolve damage calculations accurately.
。Technologies used: HTML, JavaScript.

6. Ability Scores:
。The web page will provide a table for managing ability scores , allowing users to input their character's ability scores.
。Users can input the ability scores, and the corresponding modifiers will be automatically calculated and displayed.
。The ability scores functionality will be implemented using HTML (main.php, line 336), JavaScript (main.php, line 380) and the impl.js file for calculating the modifiers.
。Technologies used: HTML, JavaScript, CSS.

7. Refresh Page:
。Users can reset the data for the entire web page by clicking on a dedicated "Refresh Page" button, facilitating a fresh start or the ability to make changes as needed.
。This functionality implemented using HTML (main.php, line 402), JavaScript(main.php, line 310) allows users to clear any modifications and return to the initial state of the character management web page.
。Technologies used: HTML, JavaScript.

Software Architecture:
The software architecture of the TTRPG character management web page will involve the following components:

1. Front-end:
。HTML, CSS, and JavaScript will be used for creating the user interface of the web page.
。JavaScript will handle user interactions and dynamic updates of character information.

2. Back-end:
。PHP will be used to handle server-side interactions and retrieve data from the database.
。A database (MySQL) will store character types, armor and shield options, health points, levels, and ability scores.

3. Database:
。The database will store the necessary information for character types, armor and shield options, health points, levels, and ability scores.
。PHP scripts will handle database queries and retrieval of data for the web page.
