<?php
include 'auth.php';
include '../class/memberClass.php';
include '../class/playlistClass.php';;
$email = $_SESSION['email'];

//getMemberId
$member = new Member();
$member->_setEmail($email);
$member_id = $member->getMemberId();

if(isset($_POST['submitDeletePlaylist'])){
    $deletePlaylistName = $_POST["deletePlaylist"];
    $playlist = new Playlist();
    $playlist->_setMemberId($member_id);
    $playlist->deletePlaylist($deletePlaylistName);
}
 ?> 
