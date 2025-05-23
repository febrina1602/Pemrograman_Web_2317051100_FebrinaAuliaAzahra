<?php
    $pw_hash = password_hash("12345678", PASSWORD_DEFAULT);

    echo $pw_hash;