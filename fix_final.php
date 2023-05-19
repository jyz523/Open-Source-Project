<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Character Sheet</title>
  <script src="impl.js"></script>
  <script src="impl.css"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container"></div>

  <!-- Character section -->
  <div style="text-align: left;">
    <div class="row">
      <div class="col-4">      
        <h2>Character</h2>         
        <select name="CharacterName" id="characterSelect">
          <?php
          $servername = "192.168.64.3";
          $username = "test";
          $password = "test12345";
        $dbname = "character"; // Replace with your actual database name

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the character table
        $sql = "SELECT * FROM `character`";
        $result = $conn->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
          // Output the data for each row as options in the select box
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
          }
        } else {
          echo '<option value="none">No characters found</option>';
        }

        // Close the database connection
        $conn->close();
        ?>
      </select>
      <br><br>
    </div>
  </div> 
</div>


<!-- Health section -->
<div style="display: flex; align-items: center; justify-content: space-between;">
  <div style="display: inline-flex;">
    <div style="text-align: left;">
      <h2>Health</h2>
      <span>Max HP:   </span>
      <input name="MaxHP" class="stat" type="number" id="maxHP" style="display: inline-block; width: 227px;" />
      <br>
      <span>Current HP:   </span>
      <input name="HP" class="stat" type="number" id="currentHP" style="display: inline-block;" />
      <br>

      <span class="btn btn-success" onclick="HealHP()">Heal</span>
      <input type="number" class="stat" id="modHP" max="1000" style = "width: 229px;"/>
      <br>
      <span class="btn btn-danger" onclick="TakeDamage()">Damage</span>
      <br>
      <span>Hit Dice:</span>
      <input name="HitDice" class="stat" id="hitDice" type="number" style = "width: 227px;"/> 
      <select name="HitDie" id="hitDie">
        <option>4</option>
        <option>6</option>
        <option>8</option>
        <option>10</option>
        <option>12</option>
        <option>20</option>
      </select>
    </div>

    <!-- Initiative section -->
    <div style="text-align: center;">
      <div style="display: flex; align-items: center;">
        <div class="row">
          <div class="col-6">   
           <h2>Initiative</h2> 
           <input type="number" id="Initiative" class="stat" min="-5" max="5">
         </div>

         <!-- Speed section -->
         <div class="col-6">   
          <h2>Speed</h2>
          <input type="number" id="Speed" class="stat" min="0" max="200">
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<br>
<!-- Armor section -->
<div style="display: flex; align-items: center; justify-content: space-between;">
  <div style="display: inline-flex;">
    <div style="text-align: left;">
      <h2>Armor</h2>
      <div style="display: flex-direction: column; align-items: flex-end;">
        <div style="display: flex; align-items: center;">
          <label for="equippedArmor" style="margin-right: 5px;">Equipped Armor: </label>
          <select name="Armor" id="equippedArmor" onchange="UpdateAC()">
            <?php
// Connect to the database and retrieve the updated Max HP value
            $servername = "192.168.64.3";
            $username = "test";
            $password = "test12345";
            $dbname = "Armor";

// Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

// Fetch armor options from the database
            $sql = "SELECT * FROM armor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["type"] . ' - ' . $row["name"] . '</option>';
              }
            } else {
              echo '<option value="none">None</option>';
            }

// Assuming you have retrieved the selected armor from a form submission or any other method
$selectedArmor = $_POST['armor']; // Replace 'armor' with the appropriate form field name

// Retrieve the armor data from the database
$query = "SELECT * FROM armor WHERE name = '$selectedArmor'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Armor found in the database
  $armorData = $result->fetch_assoc();
  $armorType = $armorData['type'];

    // Update the MaxHP based on armor type
  $updateQuery = "";
  switch ($armorType) {
    case 'Light Armor':
            // Perform the necessary MaxHP increment for Light Armor
    break;
    case 'Medium Armor':
            // Perform the necessary MaxHP increment for Medium Armor
    break;
    case 'Heavy Armor':
            // Perform the necessary MaxHP increment for Heavy Armor
    break;
    default:
            // Handle any other cases or default behavior here
    break;
  }

  if (!empty($updateQuery)) {
        // Execute the update query
    $conn->query($updateQuery);

        // Retrieve the updated Max HP value from the database
        $maxHPQuery = "SELECT MaxHP FROM character WHERE id = 1"; // Replace 'character' and 'id' with your appropriate table and condition
        $maxHPResult = $conn->query($maxHPQuery);
        $maxHPData = $maxHPResult->fetch_assoc();
        $maxHP = $maxHPData['MaxHP'];
      }
    }

// Close the database connection
    $conn->close();
    ?>


  </select>
</div>
<div style="display: flex; align-items: center;">
  <span style="margin-right: 10px;">Equipped Shield: </span>
  <select name="Shield" id="equippedShield" onchange="UpdateAC()">
    <?php
              // Your PHP code to connect to the database and fetch shield data
    $servername = "192.168.64.3";
    $username = "test";
    $password = "test12345";
    $dbname = "Armor";

              // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

              // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

              // Fetch shield options from the database
    $sql = "SELECT * FROM shield";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
      }
    } else {
      echo '<option value="none">None</option>';
    }

              // Close the database connection
    $conn->close();
    ?>
  </select>
</div>
</div>
</div>
</div>
</div>

<script>
  function UpdateAC() {
        // Get the selected armor and shield options
    var selectedArmor = document.getElementById("equippedArmor").value;
    var selectedShield = document.getElementById("equippedShield").value;

        // Your code to handle the selected armor and shield options
        // Add your logic here to perform any necessary actions based on the selected options
        // For example, you can update the AC (Armor Class) based on the selected armor and shield

    console.log("Selected Armor: " + selectedArmor);
    console.log("Selected Shield: " + selectedShield);

// Add your logic here to perform any necessary actions based on the selected options
// For example, you can update the AC (Armor Class) based on the selected armor and shield
// You can access the selected values using the variables selectedArmor and selectedShield
// and update the necessary elements or perform other operations accordingly

// Example logic:
// if (selectedArmor === "plate" && selectedShield === "shield") {
//     // Update AC to a specific value
//     // Perform other actions
// } else if (selectedArmor === "chainmail") {
//     // Update AC to a different value
//     // Perform other actions
// } else {
//     // Handle other cases
// }

  }
</script>

<!-- Level selection -->

<h2>Level</h2>
<input name="Level" type="number" id="playerLevel" class="form-control" min="1" max="20" value="1" onchange="SetProficiencyBonus()">
</div>
<br>

<!-- Ability Scores -->
<h2>Ability Scores</h2>
<table class="table">
  <thead>
    <tr>
      <th>Ability</th>
      <th>Score</th>
      <th>Mod</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Strength</td>
      <td><input name="STR" type="number" value="10" id="strScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="strMod"></td>
    </tr>
    <tr>
      <td>Dexterity</td>
      <td><input name="DEX" type="number" value="10" id="dexScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="dexMod"></td>
    </tr>
    <tr>
      <td>Constitution</td>
      <td><input name="CON" type="number" value="10" id="conScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="conMod"></td>
    </tr>
    <tr>
      <td>Intelligence</td>
      <td><input name="INT" type="number" value="10" id="intScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="intMod"></td>
    </tr>
    <tr>
      <td>Wisdom</td>
      <td><input name="WIS" type="number" value="10" id="wisScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="wisMod"></td>
    </tr>
    <tr>
      <td>Charisma</td>
      <td><input name="CHA" type="number" value="10" id="chaScore" onchange="UpdateModifiers()"></td>
      <td><input type="number" value="0" id="chaMod"></td>
    </tr>
  </tbody>
</table>

<div class="text-left">
  <div class="btn btn-success" onclick="SaveData()">Save Data</div>
  <div class="btn btn-info" onclick="LoadCharacter()">Load Data</div>
</div>
<br>

<!-- Set let and right side of table -->
<head>
  <style>
    .containe {
      display: flex;
      justify-content: space-between;
    }
    .left-table {
      width: 50%;
    }
    .right-table {
      width: 50%;
    }
  </style>
</head>

<!-- Skills selection -->
<div class="containe">
  <div class="left-table">
   <h2>Skills</h2>
   <table class="table">
    <tr>
      <td>Medicine:</td>
      <td><input name="Medicine" type="checkbox" id="medProf" onchange="SetSkills()"></td>
      <td><input type="number" id="medScore"></td>
    </tr>
    <tr>
      <td>Nature:</td>
      <td><input name="Nature" type="checkbox" id="natProf" onchange="SetSkills()"></td>
      <td><input type="number" id="natScore"></td>
    </tr>
    <tr>
      <td>Perception:</td>
      <td><input name="Perception" type="checkbox" id="percProf" onchange="SetSkills()"></td>
      <td><input type="number" id="percScore"></td>
    </tr>
    <tr>
      <td>Performance:</td>
      <td><input name="Performance" type="checkbox" id="perfProf" onchange="SetSkills()"></td>
      <td><input type="number" id="perfScore"></td>
    </tr>
    <tr>
      <td>Persuasion:</td>
      <td><input name="Persuasion" type="checkbox" id="persProf" onchange="SetSkills()"></td>
      <td><input type="number" id="persScore"></td>
    </tr>
    <tr>
      <td>Stealth:</td>
      <td><input name="Stealth" type="checkbox" id="steProf" onchange="SetSkills()"></td>
      <td><input type="number" id="steScore"></td>
    </tr>
  </table>
  <div class="btn btn-success" onclick="SaveData()">Save Data</div>
  <div class="btn btn-info" onclick="LoadCharacter()">Load Data</div>
</div> 
</div>
</body>
</html>
