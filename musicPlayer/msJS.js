		var songTitle = document.getElementById('songTitle');
		var songBanglaTitle = document.getElementById('songBanglaTitle');
		var songLyrics = document.getElementById('songLyrics');
		var songSinger = document.getElementById('songSinger');
		var songCategory = document.getElementById('songCategory');
		var songMood = document.getElementById('songMood');
		var currentTime = document.getElementById('currentTime');
		var duration = document.getElementById('duration');
		var volumeSlider = document.getElementById('volumeSlider');

		var song = new Audio();
		var currentSongNo = 0;

		window.onload = openNav;

		function loadSong(){
			song.src = "../shworolipiAdmin/uploads/"+songList[currentSongNo];
			//songTitle.textContent = [currentSongNo + 1] + ". " + songList[currentSongNo];
			songTitle.textContent = [currentSongNo + 1] + ". " + banglaTitleList[currentSongNo] + " - "+ singerList[currentSongNo];
			songBanglaTitle.textContent = "গানঃ "+ banglaTitleList[currentSongNo];
			songLyrics.textContent = lyricsList[currentSongNo];
			songSinger.textContent = "শিল্পীঃ "+ singerList[currentSongNo];
			songCategory.textContent = "বিভাগঃ "+ categoryList[currentSongNo];
			song.volume = volumeSlider.value;
			song.play();
			setTimeout (showDuration, 1000);
			song.addEventListener('ended', toPlayForward);
		}
		setInterval(updateSongSlider, 1000);


		function updateSongSlider(){
			var tempCurrentTime = Math.round(song.currentTime);
			songSlider.value = tempCurrentTime;
			currentTime.textContent = convertTime(tempCurrentTime);
		}

		function convertTime(secs){
			var minutes = Math.floor(secs/60);
			var seconds = secs % 60;
			minutes = (minutes < 10) ? "0" + minutes : minutes;
			seconds = (seconds < 10) ? "0" + seconds : seconds;
			return ( minutes + ":" + seconds);
		}

		function showDuration(){
			var tempDuration = Math.floor(song.duration);
			songSlider.setAttribute("max", tempDuration);
			duration.textContent = convertTime(tempDuration);
		}

		function toPlayOrPause(img){
			if(song.paused){
				song.play();
				img.src = "images/pause.png";
			}
			else{
				song.pause();
				img.src = "images/play.png";
			}
		}

		function toPlayForward(){
			currentSongNo = (currentSongNo + 1) % songList.length;
			loadSong();
		}
		function toPlayBackward(){
			currentSongNo--;
			currentSongNo = (currentSongNo < 0) ? songList.length - 1 : currentSongNo;
			loadSong();
		}
		function toReplay(){
			loadSong();
		}
		function seekSong(){
			song.currentTime = songSlider.value;
			currentTime.textContent = convertTime(song.currentTime);
		}
		function adjustVolume(){
			song.volume = volumeSlider.value;
		}
		function toMuteUnmute(img){
			if(song.volume){
				song.volume = 0;
				volumeSlider.style.visibility = 'hidden';
				img.src = "images/mute.png";
			}
			else{
				volumeSlider.style.visibility = "visible";
				song.volume = volumeSlider.value;
				img.src = "images/sound.png";
			}
			//alert("কাজ চলছে... :'(");
		}

		/* Open when someone clicks on the span element */
		function openNav() {
		    document.getElementById("myNav").style.width = "100%";
			song.src = "../shworolipiAdmin/uploads/"+songList[currentSongNo];
			songTitle.textContent = [currentSongNo + 1] + ". " + banglaTitleList[currentSongNo] + " - "+ singerList[currentSongNo];
			songBanglaTitle.textContent = "গানঃ "+ banglaTitleList[currentSongNo];
			songLyrics.textContent = lyricsList[currentSongNo];
			songSinger.textContent = "শিল্পীঃ "+ singerList[currentSongNo];
			songCategory.textContent = "বিভাগঃ "+ categoryList[currentSongNo];
			song.volume = volumeSlider.value;
			song.play();
			setTimeout (showDuration, 1000);
			song.addEventListener('ended', toPlayForward);
		}

		/* Close when someone clicks on the "x" symbol inside the overlay */
		function closeNav() {
			song.pause();
		    document.getElementById("myNav").style.width = "0%";
			window.close();
			history.back();
			//window.location = '/shworolipi/index.php';	
		}