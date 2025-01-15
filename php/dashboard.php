<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETourna Dashboard</title>
    <link rel="stylesheet" href="../Assets/dashA.css">
</head>
<body>
    <header class="header">
        <div class="logo"><img src="../images/etourn.png" alt="elogo"></div>
        <div class="user-info">
            <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        </div>
    </header>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="profile">
                <div class="profile-icon">👤</div>
                <p>Edit Info</p>
            </div>
            <nav class="menu">
                <h2 class="team-name">Team Baun</h2>
                <p class="sub-text">Register my Team?</p>
                <hr>
                <a href="../index/loghome.php" class="menu-item">Home</a><br>
                <a href="#" class="menu-item">Players Info</a><br>
                <a href="#" class="menu-item">Match List</a><br>
                <a href="#" class="menu-item">Tournament History</a><br>
                <a href="#" class="menu-item">Standings</a><br>
                <a href="#" class="menu-item">Settings</a><br>
                <a href="../index/login.html" class="menu-item">Log Out</a>
            </nav>
        </aside>
        <main class="main-content">
            <section class="participation-section">
                <h2>Current Participation</h2>
                <div class="participation-card">
                    <h3>Valorant Tournament</h3>
                    <p>Current Score</p>
                    <br>
                    <span class="score"><strong>11 Points</strong></span><br><br><br>
                    <a href="#" class="view-more">View More</a>
                </div>
            </section>
           
            <section class="tournaments-section">
                <h2>Tournaments</h2><br>
                <div class="tournament-item">
                    <div>
                        <strong>VCT PACIFIC</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
                <div class="tournament-item">
                    <div>
                        <strong>MLBB QUALIFIERS</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn closed">Register Closed</button>
                </div>
                <div class="tournament-item">
                    <div>
                        <strong>MLBB QUALIFIERS ASIA</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn closed">Reg. Coming Soon</button>
                </div>
            </section>
        </main>
        <section class="matches-section">
            <h2>Matches Overview</h2>
            <div class="matches-summary">
                <span class="matches-count">2</span>
                <p>Matches Played</p>
            </div>
            <div class="match-list">
                <div class="match-item">
                    <div class="ml1"><span>Team Baun</span><br><br>
                    <span>Mog</span>
                    </div>
                    <div class="ml2">
                    <span>13-0</span></div>
                    <div class="ml5">
                    <span>WIN</span>
                    </div>
                    
                </div>
                <div class="match-item">
                    <div class="ml3"><span>Team Baun</span><br><br>
                        <span>Kala Kirmada</span>
                    </div>
                    <div class="ml4">
                    <span>13-0</span></div>
                    <div class="ml6">
                    <span>WIN</span>
                    </div>
                </div>
            </div>
            <a href="#" class="view-more">View More</a>
        </section>
    </div>
</body>
</html>
