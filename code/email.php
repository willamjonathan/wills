<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSc1bXgLFeeVk3lv_HGyBDqRtYVexx9kfWZokub4Gc4qkh641A/formResponse';

    $data = [
        'entry.584583895' => $_POST['entry.584583895'], // First Name
        'entry.1888594087' => $_POST['entry.1888594087'], // Last Name
        'entry.199882941' => $_POST['entry.199882941'],   // Email
        'entry.1256538957' => $_POST['entry.1256538957'], // Subject
        'entry.1018729991' => $_POST['entry.1018729991']  // Message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        // Handle error
        echo json_encode(['success' => false]);
    } else {
        echo json_encode(['success' => true]);
    }
}
?>
