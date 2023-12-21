<!DOCTYPE html>
<html>
<head>
<style>
body {
  display: flex; /* Removed -webkit- prefix */
  color: #6B4ECA; /* purple */
}
#main {
  font-family: "Avenir Next", Helvetica;
  border: 2px solid lightgrey;
  border-radius: 10px;
  margin: auto;
  width: 700px;
  height: 520px;
  overflow: hidden;
}

.hello, .world {
  text-align: center;
  margin: 10px auto -50px auto;

  text-transform: uppercase;
  font-family: "Avenir Next", Helvetica;
  font-weight: bold;
  font-size: 6em;
  letter-spacing: 4;
}
.hello {
  margin-top: 90px;
}
.world {
  transition: transform 1s, opacity 1s; /* Removed -webkit- prefixes */
}
.world.offscreen {
  transform: translateY(280px) scaleY(2);
  opacity: 0.5;
}
.letter {
  display: inline-block;
  transition: transform 1s, opacity 1s; /* Removed -webkit- prefixes */
}
.letter.offscreen {
  transform: translateX(-720px) rotate(-360deg);
  opacity: 0.5;
}
.offscreen {
  transition: none; /* Removed -webkit- prefixes */
}
.button {
  background-color: #A4A4A4;
  color: white;
  display: inline-block;
  margin: 10px;
  padding: 6px 10px 6px 10px;
  border-radius: 5px;
  font-size: 12px;
  font-family: Helvetica Neue;
  text-shadow: 0px 0px 2px rgba(50, 50, 50, 0.5);
}
@media screen and (max-width: 768px) {
  #main {
    width: 540px;
  }
}
#title {
  color: grey;
  margin: 10px 0px 0px 12px;
}
</style>
</head>
<body onload="init();">
  <div id="main">
  <div id="title">H-E-L-L-O WORLD Animation</div>
  <div class="button" onclick="resetTransitions();">Reset Transitions</div>
    <div class="button" onclick="startTransitions();">Start Transitions</div>
      
    <div class="hello" ontransitionend="checkLetter(event);"> <!-- Changed to ontransitionend -->
      <span class="first letter offscreen">H</span><span class="letter offscreen">E</span><span class="letter offscreen">L</span><span class="letter offscreen">L</span><span class="letter offscreen">O</span>
    </div>
    
    <div class="world offscreen">WORLD</div>
  </div> <!-- end main -->
</body>

<script>
function init() {
  var letters = document.querySelectorAll('.hello > .letter');
  var delay = 3;
  var duration = 0.8;
  for (var i = 0; i < letters.length; i++) {
    letters[i].style.transitionDelay = delay + "s"; // Removed -webkit- prefix
    letters[i].style.transitionDuration = duration + "s"; // Removed -webkit- prefix
    
    delay -= 0.5;
    duration += 0.2;
  }
  startTransitions();
}

function startTransitions() {
  var letters = document.querySelectorAll('.letter');
  for (var i = 0; i < letters.length; i++) {
    letters[i].classList.remove('offscreen');
  }
}

function resetTransitions() {
  var letters = document.querySelectorAll('.letter');
  for (var i = 0; i < letters.length; i++) {
    letters[i].classList.add('offscreen');
  }
  document.querySelector('.world').classList.add('offscreen');
}

function checkLetter(event) {
  var letter = event.target;
  console.log(letter.innerText);
  if (!letter.classList.contains('first')) return;
  
  document.querySelector('.world.offscreen').classList.remove('offscreen');
}
</script>
</html>
