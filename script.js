
 var onOffBtn = document.getElementById('onOffBtn');


 var isOn = false;


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
   isOn = !isOn; 
 }


 onOffBtn.addEventListener('click', toggleOnOff);
