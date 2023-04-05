 // Get the button element by its ID
 var onOffBtn = document.getElementById('onOffBtn');

 // Set initial state to off
 var isOn = false;

 // Function to toggle the state
 function toggleOnOff() {
   if (isOn) {
     onOffBtn.textContent = 'On';
     document.getElementById('imgon').style.display='none';
     document.getElementById('imgoff').style.display='block';
     
   } else {
     onOffBtn.textContent = 'Off';
     document.getElementById('imgoff').style.display='none';
     document.getElementById('imgon').style.display='block';
   }
   isOn = !isOn; // Toggle the state
 }

 // Add event listener to the button
 onOffBtn.addEventListener('click', toggleOnOff);