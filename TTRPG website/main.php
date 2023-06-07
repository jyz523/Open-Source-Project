<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Character Sheet</title>
  <script src="impl.js"></script>
  <script src="impl.css"></script>
</head>
<body>
  <div class="container"></div>

  <!-- Character section -->
  <div style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: inline-flex;">
      <div style="text-align: left;">
        <h2>Character</h2>
        <select name="CharacterName" id="characterSelect">
          <?php
          $host = "IP address or localhost";
          $username = "<mysql username>";
          $password = "<mysql password>";
          $dbname = "character_type"; // Replace with your actual database name

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the character_type table
        $sql = "SELECT * FROM character_type";
        $result = $conn->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
          // Output the data for each row as options in the select box
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["type_id"] . '">' . $row["type_name"] . '</option>';
          }
        } else {
          echo '<option value="none">No characters found</option>';
        }

        // Close the database connection
        $conn->close();
        ?>
      </select>
      <button class="btn btn-success" onclick="selectCharacter()">Select</button>
      <br><br>

      <!-- Armor section -->
      <div style="display: flex; align-items: center; justify-content: space-between;">
        <div style="display: inline-flex;">
          <div style="text-align: left;">
            <h2>Armor</h2>
            <div style="display: flex-direction: column; align-items: flex-end;">
              <div style="display: flex; align-items: center;">
                <label for="equippedArmor" style="margin-right: 5px;">Equipped Armor: </label>
                <select name="Armor" id="equippedArmor">
                  <?php
            // Connect to the database and retrieve the armor options
                  $host = "IP address or localhost";
                  $username = "<mysql username>";
                  $password = "<mysql password>";
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

            // Close the database connection
                  $conn->close();
                  ?>
                </select>
              </div>
              <div style="display: flex; align-items: center;">
                <span style="margin-right: 10px;">Equipped Shield: </span>
                <select name="Shield" id="equippedShield" onchange="UpdateAC()">
                  <?php
            // Connect to the database and retrieve the shield options
                  $host = "IP address or localhost";
                  $username = "<mysql username>";
                  $password = "<mysql password>";
                  $dbname = "Armor";

            // Create a connection
                  $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

            // Fetch shield options from the database
                  $sqlShield = "SELECT * FROM shield";
                  $resultShield = $conn->query($sqlShield);

                  if ($resultShield->num_rows > 0) {
                    while ($row = $resultShield->fetch_assoc()) {
                      echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                    }
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



      <!-- JavaScript code -->
<script>
var originalMaxHP; // Declare a variable to store the original health value

function confirmArmor() {
  var equippedArmor = document.getElementById("equippedArmor").value;
  var equippedArmorId = parseInt(equippedArmor);
  var maxHPInput = document.getElementById("maxHP");
  var currentMaxHP = parseInt(maxHPInput.value);

  if (equippedArmorId >= 1 && equippedArmorId <= 3) {
    var lightArmorHealth = 1;
    var updatedMaxHP = currentMaxHP + lightArmorHealth;
    maxHPInput.value = updatedMaxHP;
  } else if (equippedArmorId >= 4 && equippedArmorId <= 8) {
    var mediumArmorHealth = 5;
    var updatedMaxHP = currentMaxHP + mediumArmorHealth;
    maxHPInput.value = updatedMaxHP;
  } else if (equippedArmorId >= 9 && equippedArmorId <= 12) {
    var heavyArmorHealth = 10;
    var updatedMaxHP = currentMaxHP + heavyArmorHealth;
    maxHPInput.value = updatedMaxHP;
  } else if (equippedArmorId === 0) {
    // Set the original value of MaxHP only if it hasn't been set before
    if (originalMaxHP === undefined) {
      originalMaxHP = currentMaxHP;
    }
    maxHPInput.value = originalMaxHP; // Reset the health to the original value
  }
}

function updateAC() {
  var equippedArmor = document.getElementById("equippedArmor").value;
  var equippedShield = document.getElementById("equippedShield").value;

  updateACValue(updatedAC);
}

document.getElementById("equippedArmor").addEventListener("change", confirmArmor);
document.getElementById("equippedShield").addEventListener("change", updateAC);
</script>


</script>

<!-- Level section -->
<div style="display: flex; align-items: center;">
  <h2 style="margin-right: 10px;">Level</h2>
  <select name="Level" id="playerLevel" class="form-control" onchange="selectLevel()">
    <?php
    for ($i = 1; $i <= 20; $i++) {
      echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
  </select>
</div>


<!-- Health section -->
<h2>Health</h2>
<span>Max HP:   </span>
<input name="MaxHP" class="stat" type="number" id="maxHP" style="display: inline-block; width: 227px;" />
<br>
<br>
<span>Current HP:   </span>
<input name="currentHP" class="stat" type="number" id="currentHP" style="display: inline-block;" />
<br>
<button class="btn btn-success" onclick="HealHP()">Heal</button>
<input type="number" class="stat" id="healAmount" max="1000" style="width: 229px;" />
<br>

<!-- Damage section -->
<span>Hit Dice:</span>
<select name="Multiplier" id="Multiplier">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
<br>
<button class="btn btn-danger" onclick="TakeDamage()">Damage</button>
<input type="number" class="stat" id="damageAmount" max="1000" style="width: 229px;" />
</div>
</div>
</div>


<script>
  function selectCharacter() {
    var selectElement = document.getElementById("characterSelect");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var typeID = selectedOption.value;

    // Make an AJAX request to fetch the health_points for the selected character
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_health_points.php?type_id=" + typeID, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var maxHPInput = document.getElementById("maxHP");
          var currentHPInput = document.getElementById("currentHP");
          var healthPoints = parseInt(xhr.responseText); // Parse the response as an integer
          maxHPInput.value = healthPoints;
          currentHPInput.value = healthPoints; // Set Current HP same as Max HP
        } else {
          console.log("Error: " + xhr.status);
        }
      }
    };
    xhr.send();
  }

  function HealHP() {
    var healAmountInput = document.getElementById("healAmount");
    var maxHPInput = document.getElementById("maxHP");
    var currentHPInput = document.getElementById("currentHP");
    var maxHP = parseInt(maxHPInput.value);
    var currentHP = parseInt(currentHPInput.value);
    var healAmount = parseInt(healAmountInput.value);

    if (isNaN(healAmount) || healAmount < 0) {
      alert("Invalid heal amount");
      return;
    }

    var newCurrentHP = currentHP + healAmount;
    if (newCurrentHP > maxHP) {
      newCurrentHP = maxHP;
    }

    currentHPInput.value = newCurrentHP;
  }

  function TakeDamage() {
    var damageAmountInput = document.getElementById("damageAmount");
    var currentHPInput = document.getElementById("currentHP");
    var currentHP = parseInt(currentHPInput.value);
    var damageAmount = parseInt(damageAmountInput.value);

    if (isNaN(damageAmount) || damageAmount < 0) {
      alert("Invalid damage amount");
      return;
    }

    var multiplierSelect = document.getElementById("Multiplier");
    var selectedMultiplier = parseInt(multiplierSelect.value);
    var damage = damageAmount * selectedMultiplier;

    if (damage > currentHP) {
      alert("Damage amount cannot exceed current HP");
      return;
    }

    var newCurrentHP = currentHP - damage;
    currentHPInput.value = newCurrentHP;
  }


  function selectLevel() {
    var selectElement = document.getElementById("playerLevel");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var level = parseInt(selectedOption.value);

    if (isNaN(level) || level < 1 || level > 20) {
      alert("Invalid level");
      return;
    }

    var maxHPInput = document.getElementById("maxHP");
    var currentHPInput = document.getElementById("currentHP");
    var oldMaxHP = parseInt(maxHPInput.value);
    var newMaxHP = oldMaxHP + (level - 1) * 5;
    maxHPInput.value = newMaxHP;
  currentHPInput.value = newMaxHP; // Set Current HP same as Max HP
}

function refreshPage() {
  // Clear input values
  document.getElementById("maxHP").value = "0";
  document.getElementById("currentHP").value = "0";
  document.getElementById("healAmount").value = "";
  document.getElementById("damageAmount").value = "";

  // Reset selected options in the dropdowns
  document.getElementById("characterSelect").selectedIndex = 0;
  document.getElementById("equippedArmor").selectedIndex = 0;
  document.getElementById("equippedShield").selectedIndex = 0;
  document.getElementById("Multiplier").selectedIndex = 0;
  document.getElementById("playerLevel").selectedIndex = 0;

  // Reset ability scores and modifiers
  var abilityScores = ["str", "dex", "con", "int", "wis", "cha"];
  abilityScores.forEach(function (ability) {
    document.getElementById(ability + "Score").value = "10";
    document.getElementById(ability + "Mod").value = "0";
  });
}


</script>

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

<script>
  function UpdateModifiers() {
    const abilities = ["str", "dex", "con", "int", "wis", "cha"];
    
    abilities.forEach((ability) => {
      const scoreInput = document.getElementById(`${ability}Score`);
      const modInput = document.getElementById(`${ability}Mod`);
      const score = parseInt(scoreInput.value);
      
      // Calculate the modifier based on the score
      const modifier = Math.floor((score - 10) / 2);
      
      // Update the modifier input field
      modInput.value = modifier;
    });
  }
</script>


<div class="text-left">
<button class="btn btn-primary" onclick="refreshPage()">Refresh Page</button>


<!-- Logout button -->
<button class="btn btn-primary" onclick="logout()">Logout</button>
</div>
<!-- Rest of the code... -->

<script>
  // Logout function
  function logout() {
    // Clear session data
    sessionStorage.clear();

    // Redirect to the desired webpage
    window.location.href = 'http://IP Address or localhost/';
  }
</script>


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
