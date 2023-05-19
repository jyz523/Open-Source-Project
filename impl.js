var characterData = [];

function PopulateData(data) {
  var playerList = "";
  var uniquePlayers = [];
  
  for (var i = 0; i < data.length; i++) {
    if (!uniquePlayers.includes(data[i].PlayerName)) {
      uniquePlayers.push(data[i].PlayerName);
      playerList += '<option>' + data[i].PlayerName + '</option>';
    } 
  }
  
  document.getElementById("players").innerHTML = playerList;
  LoadPlayer();
}

function LoadPlayer() {
  var selectedPlayer = document.getElementById("playerSelect").value;
  var playerCharacters = "";
  
  for (var i = 0; i < characterData.length; i++) {
    if (characterData[i].PlayerName == selectedPlayer) {
      playerCharacters += '<option>' + characterData[i].CharacterName + '</option>';
    } 
  }
  
  document.getElementById("characters").innerHTML = playerCharacters;
  LoadCharacter();
}

function LoadCharacter() {
  SetLevel();
  UpdateAbilityScores();
  UpdateSkillProficiency();
  UpdateHP();
  UpdateHitDice();
  LoadGear();
}

function SetLevel() {
  var selectedCharacter = document.getElementById("characterSelect").value;
  
  for (var i = 0; i < characterData.length; i++) {
    if (characterData[i].CharacterName == selectedCharacter) {
      document.getElementById("playerLevel").value = characterData[i].Level;
      return;
    }
  }
}


function UpdateAbilityScores() {
  var selectedCharacter = document.getElementById("characterSelect").value;
  
  for (var i = 0; i < characterData.length; i++) {
    if (characterData[i].CharacterName == selectedCharacter) {
      document.getElementById("strScore").value = characterData[i].STR;
      document.getElementById("dexScore").value = characterData[i].DEX;
      document.getElementById("conScore").value = characterData[i].CON;
      document.getElementById("intScore").value = characterData[i].INT;
      document.getElementById("wisScore").value = characterData[i].WIS;
      document.getElementById("chaScore").value = characterData[i].CHA;
      UpdateModifiers();
      return;
    } 
  }
}

function UpdateModifiers() {
  var strScore = document.getElementById("strScore").value;
  document.getElementById("strMod").value = Math.floor((strScore - 10)/2);
  
  var dexScore = document.getElementById("dexScore").value;
  document.getElementById("dexMod").value = Math.floor((dexScore - 10)/2);
  
  var conScore = document.getElementById("conScore").value;
  document.getElementById("conMod").value = Math.floor((conScore - 10)/2);
  
  var intScore = document.getElementById("intScore").value;
  document.getElementById("intMod").value = Math.floor((intScore - 10)/2);
  
  var wisScore = document.getElementById("wisScore").value;
  document.getElementById("wisMod").value = Math.floor((wisScore - 10)/2);
  
  var chaScore = document.getElementById("chaScore").value;
  document.getElementById("chaMod").value = Math.floor((chaScore - 10)/2);
  
  SetSkills();
}

function UpdateSkillProficiency() {
  var selectedCharacter = document.getElementById("characterSelect").value;
  
  for (var i = 0; i < characterData.length; i++) {
    if (characterData[i].CharacterName == selectedCharacter) {
      document.getElementById("acroProf").checked = IsTrue(characterData[i].Acrobatics); 
      document.getElementById("animProf").checked = IsTrue(characterData[i].AnimalHandling);
      document.getElementById("arcaProf").checked = IsTrue(characterData[i].Arcana);
      document.getElementById("athlProf").checked = IsTrue(characterData[i].Athletics);
      document.getElementById("decProf").checked = IsTrue(characterData[i].Deception);
      document.getElementById("hisProf").checked = IsTrue(characterData[i].History);
      document.getElementById("insProf").checked = IsTrue(characterData[i].Insight);
      document.getElementById("intiProf").checked = IsTrue(characterData[i].Intimidation);
      document.getElementById("invProf").checked = IsTrue(characterData[i].Investigation);
      document.getElementById("medProf").checked = IsTrue(characterData[i].Medicine);
      document.getElementById("natProf").checked = IsTrue(characterData[i].Nature);
      document.getElementById("percProf").checked = IsTrue(characterData[i].Perception);
      document.getElementById("perfProf").checked = IsTrue(characterData[i].Performance);
      document.getElementById("persProf").checked = IsTrue(characterData[i].Persuasion);
      document.getElementById("relProf").checked = IsTrue(characterData[i].Religion);
      document.getElementById("sleiProf").checked = IsTrue(characterData[i].SleightOfHand);
      document.getElementById("steProf").checked = IsTrue(characterData[i].Stealth);
      document.getElementById("survProf").checked = IsTrue(characterData[i].Survival);
      SetSkills();
      return;
    } 
  }
}

function UpdateHP() {
  var selectedCharacter = document.getElementById("characterSelect").value;
  
  for (var i = 0; i < characterData.length; i++) {
    if (characterData[i].CharacterName == selectedCharacter) {
      document.getElementById("maxHP").value = characterData[i].MaxHP;
      document.getElementById("currentHP").value = characterData[i].HP;
    }
  }
}

function updateMaxHP() {
  var equippedArmor = document.getElementById("equippedArmor");
  var maxHP = document.getElementById("maxHP");

  // Get the selected armor ID
  var selectedArmorId = equippedArmor.value;

  // Perform an AJAX request to fetch the armor data
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "fix_final.php?id=" + selectedArmorId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var armorData = JSON.parse(xhr.responseText);

      if (armorData) {
        var armorType = armorData.type;
        var maxHPIncrement = 0;

        // Perform the necessary MaxHP increment for each armor type
        switch (armorType) {
          case 'Light Armor':
            maxHPIncrement = 10;
            break;
          case 'Medium Armor':
            maxHPIncrement = 20;
            break;
          case 'Heavy Armor':
            maxHPIncrement = 30;
            break;
          default:
            maxHPIncrement = 0;
            break;
        }

        // Update the Max HP field
        maxHP.value = parseInt(maxHP.value) + maxHPIncrement;
      }
    }
  };
  xhr.send();
}
