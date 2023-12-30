<?php

namespace App\Libraries;

class TargetService {
    public function forUserId($userId) : array {
        $db = \Config\Database::connect();
        $sqlRequest = 'SELECT track_target.* from track_target, track_application, track_user '.
            'WHERE track_target.app_id = track_application.id '.
            'AND track_application.owner = track_user.id '.
            'AND track_user.id = ' . $userId;

        $query = $db->query($sqlRequest);
        return $query->getResult('array');
    }
}