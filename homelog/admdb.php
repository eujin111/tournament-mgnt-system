<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admlog.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETourna Admin Dashboard</title>
    <link rel="stylesheet" href="../Assets/dashboard2.css">
</head>
<body>
    <header class="header">
        <div class="logo"><img src="../images/etourna.png" alt="elogo"></div>
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
                <p class="team-name">Admin</p>
                <br>
                <hr>
                <a href="#" class="menu-item">Players Info</a>
                <a href="#" class="menu-item">Match List</a>
                <a href="#" class="menu-item">Tournament History</a>
                <a href="#" class="menu-item">Standings</a>
                <a href="#" class="menu-item">Settings</a>
                <a href="../homelog/login.php" class="menu-item">Log Out</a>
            </nav>
        </aside>
        <main class="main-content">
            <section class="participation-section">
                <h2>Current Participation</h2>
                <div class="participation-card">
                    <h3>Valorant Tournament</h3>
                    <p>Current Score</p>
                    <span class="score">11 Points</span><br><br><br>
                    <a href="#" class="view-more">View More</a>
                </div>
            </section>
           
            <section class="tournaments-section">
                <h2>Tournaments</h2>
                <div class="tournament-item">
                    <div>
                        <strong>VCT PACIFIC</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn">Approved</button>
                </div>
                <div class="tournament-item">
                    <div>
                        <strong>MLBB QUALIFIERS</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn closed">Disaproved</button>
                </div>
                <div class="tournament-item">
                    <div>
                        <strong>MLBB QUALIFIERS ASIA</strong><br><br>
                        <p>Starting From: 2024/12/14</p><br>
                        <p>Ending In: 2024/12/29</p>
                    </div>
                    <button class="register-btn closed">Pending</button>
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
