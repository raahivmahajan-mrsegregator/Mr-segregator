<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$file = 'feedback.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode([
        'q1_yes' => 0, 'q1_no' => 0,
        'q2_yes' => 0, 'q2_no' => 0,
        'total' => 0
    ], JSON_PRETTY_PRINT));
}

$data = json_decode(file_get_contents($file), true);

if (isset($input['q1'])) $data[$input['q1'] ? 'q1_yes' : 'q1_no']++;
if (isset($input['q2'])) $data[$input['q2'] ? 'q2_yes' : 'q2_no']++;
$data['total']++;

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(['success' => true]);
?>