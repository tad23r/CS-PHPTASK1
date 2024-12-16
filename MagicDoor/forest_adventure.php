<?php
session_start();

// Reset adventure if needed
if (!isset($_SESSION['forest_stage'])) {
    $_SESSION['forest_stage'] = 'start';
}

// Process user choices
if (isset($_GET['choice'])) {
    $_SESSION['forest_stage'] = $_GET['choice'];
}

// Define story stages
$stages = [
    'start' => [
        'description' => 'You enter a misty enchanted forest. Tall trees surround you with magical whispers.',
        'choices' => [
            'explore_path' => 'Explore the Winding Path',
            'climb_tree' => 'Climb a Giant Tree'
        ]
    ],
    'description' => ['The path leads you to a clearing with a mysterious stone altar.',
    'choices' => [
        'touch_altar' => 'Touch the Altar',
        'walk_around' => 'Walk Around the Altar'
        ]
    ],
    'explore_path' => [
        'description' => 'The path leads you to a clearing with a mysterious stone altar.',
        'choices' => [
            'touch_altar' => 'Touch the Altar',
            'walk_around' => 'Walk Around the Altar'
        ]
    ],
    'climb_tree' => [
        'description' => 'From the treetop, you spot a hidden fairy glade in the distance.',
        'choices' => [
            'descend' => 'Carefully Descend',
            'jump' => 'Take a Leap of Faith'
        ]
    ],
    'touch_altar' => [
        'description' => 'Magic surges through you! The altar reveals an ancient secret about the forest.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'walk_around' => [
        'description' => 'You discover magical mushrooms that glow with soft blue light.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'descend' => [
        'description' => 'You safely climb down and find a hidden path.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'jump' => [
        'description' => 'You miraculously land softly, surrounded by sparkling forest magic!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ]
];

// Current stage
$current_stage = $_SESSION['forest_stage'];

// Reset if requested
if ($current_stage === 'restart') {
    $_SESSION['forest_stage'] = 'start';
    $current_stage = 'start';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mysterious Cave Adventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container adventure">
        <h1>Enchanted Forest Adventure</h1>
        
        <div class="story-box">
            <p><?php echo $stages[$current_stage]['description']; ?></p>
            
           <div class="choice-buttons">
                <?php foreach ($stages[$current_stage]['choices'] as $choice => $text): ?>
                    <a href="?choice=<?php echo $choice; ?>" class="choice-btn">
                        <?php echo $text; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <a href=" index.html" class="return-btn">Return to Doors</a>
        </div>
    </div>
</body>
</html>