<?php

include_once 'includes/resource/session.php';

session_destroy();
header('Location: index.php');

