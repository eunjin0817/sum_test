<?php
header("content-type:text/html; charset=UTF-8");
include '../lib/functions.php';
$db = dbconn();
$member = member();
extract($_GET);

if (!$member || empty($_GET)) Error("잘못된 접근입니다.", 2);
if (!is_numeric($_GET['h_id'])) Error("잘못된 접근입니다.", 2);
$m_id = $member['m_id'];
$sql = "select m_level from member where m_id='".$db->real_escape_string($m_id)."'";
$res = $db->query($sql) or trigger_error($db->error."[$sql]");
$list = $res->fetch_assoc();
if ($list['m_level'] != 0) Error("정상적인 경로로 접근해주세요.", 0);

$sql = "delete from warehouse where h_id={$h_id}";
$res = $db->query($sql) or trigger_error($db->error."[$sql]");
Error("데이터가 삭제되었습니다.", 2);
?>
