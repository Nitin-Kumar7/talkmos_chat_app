<?php
 



// updated code 
 
$count = count($data);

/*// Separate online and offline users
$onlineUsers = array();
$offlineUsers = array();

 

for ($i = 0; $i < $count; $i++) {
    $status = $data[$i]['user_status'];

    if ($status == 'active') {
        $onlineUsers[] = $data[$i];
    } else {
        $offlineUsers[] = $data[$i];
    }
}
// Merge online and offline users
$sortedUsers = array_merge($onlineUsers, $offlineUsers);
 

// show new message on the top

// Sort the users based on the latest message time
usort($sortedUsers, function ($a, $b) {
    $statusA = $a['user_status'];
    $statusB = $b['user_status'];

    if ($statusA == 'active' && $statusB == 'active') {
        // Both users are active, sort based on the latest message time
        $lastMsgA = showlastMessage($a['unique_id']);
        $lastMsgB = showlastMessage($b['unique_id']);

        if (empty($lastMsgA) && empty($lastMsgB)) {
            return 0;
        } elseif (empty($lastMsgA)) {
            return -1;
        } elseif (empty($lastMsgB)) {
            return 1;
        } else {
            $timeA = $lastMsgA[0]['time'];
            $timeB = $lastMsgB[0]['time'];
            return strcmp($timeB, $timeA);
        }
    } elseif ($statusA == 'active') {
        // User A is active, prioritize over User B
        return -1;
    } elseif ($statusB == 'active') {
        // User B is active, prioritize over User A
        return 1;
    } else {
        // Both users are offline, sort based on the latest message time
        $lastMsgA = showlastMessage($a['unique_id']);
        $lastMsgB = showlastMessage($b['unique_id']);

        if (empty($lastMsgA) && empty($lastMsgB)) {
            return 0;
        } elseif (empty($lastMsgA)) {
            return -1;
        } elseif (empty($lastMsgB)) {
            return 1;
        } else {
            $timeA = $lastMsgA[0]['time'];
            $timeB = $lastMsgB[0]['time'];
            return strcmp($timeB, $timeA);
        }
    }
});

*/

foreach ($data as $user) {
    $status = $user['user_status'];
   $bg_image = ($status == 'active' || $status == 'deactive') ? "background-image: url('./upload/{$user['user_avtar']}'); background-size: 100% 100%;" : "";

?>
<div class='innerBox'>
    <div class='user px-3 py-2'>
        <div id='avtar_and_details'>
            <div id='user_avtar' style="<?php echo $bg_image; ?>">
                <div class="<?php echo $status == 'active' ? 'online' : 'offline' ?>"></div>
                <input type='hidden' name='hdn' id='hidden_id' value="<?php echo $user['unique_id']; ?>">
            </div>
            <div id='user_details' class='px-2 user_details'>
                <h6 class='m-0' id='name'><?php echo $user['user_name'] ?></h6>
                <p class='m-0 user_image'>
                    <?php
                    $output = "";
                    $last_msg = showlastMessage($user['unique_id']);
                    $unseenCount = GetUnseenMessage($user['unique_id'], $_SESSION['uniqueid']);
                    if ($unseenCount > 0) {
                        if (!empty($last_msg)) {
                            $message = $last_msg[0]['message'];
                            if ($user['unique_id'] == $last_msg[0]['sender_id']) {
                                if (strpos($message, '.jpg') !== false || strpos($message, '.jpeg') !== false || strpos($message, '.png') !== false) {
                                    $output = "file";
                                } else {
                                    $output = $message;
                                }
                            } elseif ($user['unique_id'] == $last_msg[0]['receiver_id']) {
                                if (strpos($message, '.jpg') !== false || strpos($message, '.jpeg') !== false || strpos($message, '.png') !== false) {
                                    $output = "You : file";
                                } else {
                                    $output = "You : " . $message;
                                }
                            }
                        }
                    }
                    if (strlen($output) > 20) {
                        echo substr($output, 0, 20) . "...";
                    } else {
                        echo $output;
                    }
                    ?>
                </p>
            </div>
        </div>

        <p id="time">
            <?php
            $messageTime = "";
            $unseenCount = GetUnseenMessage($user['unique_id'], $_SESSION['uniqueid']);
            $label = "";
            if ($unseenCount > 0) {
                $label = '<span class="label label-success unseenmsg">' . $unseenCount . '</span>';
            }
            $last_msg = showlastMessage($user['unique_id']);

            if ($unseenCount > 0) {
                $messageTime = $last_msg[0]['time'];
            }

            echo $label;
            echo $messageTime;
            ?>
        </p>
    </div>
</div>

<?php
}
?>
  
