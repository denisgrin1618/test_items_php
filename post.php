<?php

$post_data = file_get_contents('php://input');
echo $post_data;
echo htmlspecialchars($_POST['username']);
echo "branch_2 2222222222222222222222222222";
