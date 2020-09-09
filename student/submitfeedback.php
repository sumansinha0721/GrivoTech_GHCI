<?php
include_once('../include/db.php');
session_start();
if (isset($_POST['submit'])) {
    $ragging = $_POST['ragging'];
    $exam = $_POST['exam'];
    $womens = $_POST['womens'];
    $faculty = $_POST['faculty'];
    $accounts = $_POST['accounts'];
    $query = "INSERT INTO feedback(student_id, ragging, exam, womens, faculty, accounts) 
    VALUES(" . $_SESSION['id'] . ", " . $ragging . ", " . $exam . ", " . $womens . ", " . $faculty . ", " . $accounts . ")
    ON DUPLICATE KEY UPDATE ragging=" . $ragging . ", exam=" . $exam . ", womens=" . $womens . ", faculty=" . $faculty . " , accounts=" . $accounts . ";";
    mysqli_query($db, $query);
    header('location:index.php');
}
