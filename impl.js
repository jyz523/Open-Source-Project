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
  document.getElementById("strMod").value = Math.floor((strScore - 10) / 2);
  
  var dexScore = document.getElementById("dexScore").value;
  document.getElementById("dexMod").value = Math.floor((dexScore - 10) / 2);
  
  var conScore = document.getElementById("conScore").value;
  document.getElementById("conMod").value = Math.floor((conScore - 10) / 2);
  
  var intScore = document.getElementById("intScore").value;
  document.getElementById("intMod").value = Math.floor((intScore - 10) / 2);
  
  var wisScore = document.getElementById("wisScore").value;
  document.getElementById("wisMod").value = Math.floor((wisScore - 10) / 2);
  
  var chaScore = document.getElementById("chaScore").value;
  document.getElementById("chaMod").value = Math.floor((chaScore - 10) / 2);
  
  SetSkills();
}
