<?php
$file = 'feedback.json';
if (file_exists($file)) {
    $stats = json_decode(file_get_contents($file), true);
    ?>
    <h1>📊 Mr. Segregator Feedback Stats</h1>
    <p><strong>Total Responses:</strong> <?= $stats['total'] ?></p>
    <p><strong>1. Did the guide help you segregate better?</strong><br>
       ✅ Yes: <?= $stats['q1_yes'] ?> | ❌ No: <?= $stats['q1_no'] ?></p>
    <p><strong>2. Will you segregate at home?</strong><br>
       ✅ Yes: <?= $stats['q2_yes'] ?> | ❌ No: <?= $stats['q2_no'] ?></p>
    <?php
} else {
    echo "<h1>No feedback yet.</h1>";
}
?>