<!DOCTYPE html>
<html>
<head>
    <script src='https://cdn.jsdelivr.net/npm/disable-devtool'></script>
<script
    disable-devtool-auto
    src='https://cdn.jsdelivr.net/npm/disable-devtool'
    url='https://pay.kiwify.com.br/MaddIZr'
></script>
  <title>Chat Simulado</title>
</head>
<body>
 <script>
 var synt = new Array(2);

document.addEventListener("DOMContentLoaded", function() {
   
    synt["voz2"] = 'Microsoft Antonio Online (Natural) - Portuguese (Brazil)';
    synt["voz1"] = 'Microsoft Francisca Online (Natural) - Portuguese (Brazil)';

    let speech = new SpeechSynthesisUtterance();

    let voices = []; // global array

    window.speechSynthesis.onvoiceschanged = () => {
    // Get List of Voices
    voices = window.speechSynthesis.getVoices();

    // Initially set the First Voice in the Array.
    speech.voice = voices[0];

    // Set the Voice Select List. (Set the Index as the value, which we'll use later when the user updates the Voice using the Select Menu.)
    let voz1 = document.querySelector("#voz1");
    let voz2 = document.querySelector("#voz2");
    voices.forEach((voice, i) => (voz1.options[i] = new Option(voice.name, i),voz2.options[i] = new Option(voice.name, i)));
    };    

    setTimeout(function(){document.getElementById("voz1").querySelectorAll("option").forEach(o => o.selected = o.innerText == synt["voz1"]);},1000);
    setTimeout(function(){document.getElementById("voz2").querySelectorAll("option").forEach(o => o.selected = o.innerText == synt["voz2"])},1000);


}); 


async function start_(){
    document.getElementById("painel").style.display="none";

    //document.getElementById("painel").style.visibility="hidden";

    synt["voz1"] = document.getElementById("voz1").selectedOptions[0].text;
    synt["voz2"] = document.getElementById("voz2").selectedOptions[0].text;

    back_url = document.getElementById("imgfundo").value;

    document.body.style.backgroundImage = "url('"+back_url+"')";

    var mensagens = document.getElementById("conversa").value;

    mensagens = mensagens.trim();
    mensagens = mensagens.split("\n");
    
    for(let i=0;i<mensagens.length;i++){   
    avoz = mensagens[i].substr(0,4);
    otexto = mensagens[i].substr(5);

    if(otexto.length =="") continue;

    await appendLi(avoz,otexto);
    await limpa(false);
    await speak(avoz, otexto);

    }

    setTimeout('limpa(true)',4000);
    setTimeout(function(){document.getElementById("painel").style.display="block"},4000);
    document.getElementById("voz1").querySelectorAll("option").forEach(o => o.selected = o.innerText == synt["voz1"]);
    document.getElementById("voz2").querySelectorAll("option").forEach(o => o.selected = o.innerText == synt["voz2"]);
 }
 
 </script>

  <script>
    async function speak(voiceName, text) {

        voiceName = synt[voiceName];


        return new Promise((resolve, reject) => {

            // Verificar se a sÃ­ntese de fala Ã© suportada pelo navegador
            if ('speechSynthesis' in window) {
                // Obter a lista de vozes disponÃ­veis
                var voices = speechSynthesis.getVoices();

                // Encontrar a voz desejada pelo nome
                var voice = voices.find(function(voice) {
        
                return voice.name === voiceName;
                });


                // Criar um objeto SpeechSynthesisUtterance
                var utterance = new SpeechSynthesisUtterance(text);
                utterance.voice = voice;

                // Narrar o texto
                speechSynthesis.speak(utterance);

                utterance.onend = resolve;

            } else {
                console.log('A sÃ­ntese de fala nÃ£o Ã© suportada pelo navegador.');
            }

        });

    }
    
    
  </script>
  



<style>
@import url('https://fonts.googleapis.com/css?family=Lato');

* {
	box-sizing: border-box;
}

body {
	background: url('02.jpg');
	background-size: cover;
	background-position: center	center;
	
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;

	min-height: 100vh;
	font-family: 'Lato', sans-serif;
	margin: 0 0 0px;
}

h2 {
  	text-shadow: 1px 1px 2px rgba(0,0,0,1);
	color: #fff;
	letter-spacing: 1px;
	text-transform: uppercase;
	text-align: center;
}

.chat-container {
	background: url('2.png');
	border-radius: 25px;
	box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.7);
	overflow: hidden;
	padding: 15px;
	position: relative;
	width: 600px;
	height: 1020px;
	max-width: 100%;
}

.chat {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: flex-start;
	list-style-type: none;
	padding: 0;
	margin: 30px;
    margin-top: 30px;
}

.message {
	background-color: rgba(255, 255, 255, 0.9);
	border-radius: 30px;
	box-shadow: 0px 15px 5px 0px rgba(0,0,0,0.5);
	position: relative;
	margin-bottom: 30px;
    max-width: 80%;
}

.message.left {
	padding: 15px 20px 15px 120px;
}

.message.right {
	align-self: flex-end;
	padding: 15px 120px 15px 20px;
    background-color: #D9FDD3;
    color:#0e0e0e;
}

.logo {
	border-radius: 50%;
	box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.7);
	object-fit: cover;
	position: absolute;
	left: 10px;
	top: -10px;
	width: 100px;
	height: 100px;
}

.message.right .logo {
	left: auto;
	right: 10px;
}

.message p {
	margin: 0;
    font-size:18px;
}

.text_input {
	font-size: 16px;
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	padding: 10px 15px;
	width: 100%;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
</style>

<div style="height:10px;"></div>

<div id="painel" style="background-color: #f5f5f5; border-radius: 10px; padding: 20px; text-align: center;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">DialogBot <a href="https://ideiaschatgpt.com.br" target="_blank" class="linkcanal" style="color: #22b62e;"><strong>Ideias ChatGPT</strong></a></h1>
    <div style="margin-bottom: 10px;">
        <label for="voz1" style="margin-right: 10px;">Voz 1:</label>
        <select id="voz1" style="padding: 5px; width: 200px;"></select>
        <label for="img1" style="margin-left: 20px;">Img Avatar:</label>
        <input type="text" id="img1" placeholder="Coloque a URL da Imagem Aqui" value="https://randomuser.me/api/portraits/men/31.jpg" style="padding: 5px; width: 400px;">
        <img id="preview1" src="https://randomuser.me/api/portraits/men/31.jpg" alt="Preview" style="margin-left: 10px; width: 50px; height: 50px;">
    </div>
    <div style="margin-bottom: 10px;">
        <label for="voz2" style="margin-right: 10px;">Voz 2:</label>
        <select id="voz2" style="padding: 5px; width: 200px;"></select>
        <label for="img2" style="margin-left: 20px;">Img Avatar:</label>
        <input type="text" id="img2" placeholder="Coloque a URL da Imagem Aqui" value="https://randomuser.me/api/portraits/women/63.jpg" style="padding: 5px; width: 400px;">
        <img id="preview2" src="https://randomuser.me/api/portraits/women/63.jpg" alt="Preview" style="margin-left: 10px; width: 50px; height: 50px;">
    </div>
    <div style="margin-bottom: 10px;">
        <label for="imgfundo" style="margin-right: 10px;">Imagem do Fundo:</label>
        <input type="text" id="imgfundo" placeholder="Coloque a URL da Imagem Aqui" value="02.jpg" style="padding: 5px; width: 400px;">
    </div>
    <textarea id="conversa" cols="75" rows="10" style="padding: 5px; width: 100%; resize: vertical;"></textarea>
    <br>
    <button onclick="start_()" style="padding: 10px 20px; font-size: 16px; font-weight: bold; color: white; background-color: #22b62e; border: none; border-radius: 5px; text-decoration: none; cursor: pointer;">Iniciar</button>
</div>

<script>
    function updatePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        preview.src = input.value;
    }

    document.getElementById('img1').addEventListener('input', () => updatePreview('img1', 'preview1'));
    document.getElementById('img2').addEventListener('input', () => updatePreview('img2', 'preview2'));

    document.getElementById('imgfundo').addEventListener('input', () => {
        const imgFundo = document.getElementById('imgfundo').value;
        document.body.style.backgroundImage = `url('${imgFundo}')`;
    });
</script>



<br><br>
<div class="chat-container">
	<ul class="chat" id="chat">
	</ul>
</div>

<div style="height:10px;"></div>


<script>
    async function limpa(tudo){

        tamanho_box = document.getElementById("chat").offsetHeight;
        const listItems = document.querySelectorAll('#chat li');

        const toKeep = [listItems.length-1];

        //alert(tamanho_box);
        if(!tudo){
            if(tamanho_box >1010){

                Array.from(listItems).forEach((listItem, index) => {
                if (!toKeep.includes(index)) {
                    listItem.parentNode.removeChild(listItem);
                }
                });

            }
        }else{
            Array.from(listItems).forEach((listItem, index) => {
                
                    listItem.parentNode.removeChild(listItem);
                
                });            

        }
    }

    async function appendLi(voz,texto)
    {
       
      let img1 = document.getElementById("img1").value;
      let img2 = document.getElementById("img2").value;

      let cimg = voz=="voz1"?img1:img2;
      cimg = cimg.trim();


      classe_voz=voz=="voz1"?"message left":"message right";  
      var ul = document.getElementById("chat");
      var li = document.createElement("li");
      li.className=classe_voz;
      var text = "<img class='logo' src='"+cimg+"'><p>"+texto+"</p>";    
      li.innerHTML=text;
      ul.appendChild(li);



    }


    

    
    </script>
    <style>

        .linkcanal:link, .linkcanal:visited{
            color:#b41f14;
        }
    </style>
</body>
</html>
