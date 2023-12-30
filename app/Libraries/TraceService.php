<?php

namespace App\Libraries;

class TraceService {
    public function forUserId($userId) : array {
        $db = \Config\Database::connect();
        $sqlRequest = 'SELECT track_trace.* FROM track_trace, track_application, track_user '.
            'WHERE track_trace.app_id = track_application.id '.
            'AND track_application.owner = track_user.id ' . 
            'AND track_user.id = ' . $userId;
            
        $query = $db->query($sqlRequest);
        return $query->getResult('array');
    }
}