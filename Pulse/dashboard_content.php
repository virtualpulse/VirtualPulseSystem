<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin'] || !defined('DASHBOARD_ACCESS')) {
    header("Location: index.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Tabs</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #2E3A59;
            padding: 20px;
            margin: 0;
        }

        .dashboard-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-title {
            font-size: 32px;
            font-weight: 600;
            color: #BB86FC;
            margin-bottom: 20px;
        }

        .dashboard-buttons .btn {
            height: 150px;
            border-radius: 12px;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            font-weight: 500;
            color: #2E3A59;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .dashboard-buttons .btn:hover {
            transform: translateY(-5px);
        }

        .dashboard-buttons .btn:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <!-- Dashboard Section -->
    <div class="dashboard-container" id="dashboard-container">
        <div class="dashboard-title">Dashboard</div>
        <div class="dashboard-buttons container mt-4">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <button id="dashboard-register-patient" class="btn btn-light w-100">Register Patient</button>
                </div>
                <div class="col">
                    <button id="dashboard-appointments" class="btn btn-light w-100">Appointments</button>
                </div>
                <div class="col">
                    <button id="dashboard-patients-admit-report" class="btn btn-light w-100">Patients Admit Report</button>
                </div>
                <div class="col">
                    <button id="dashboard-pharmacy" class="btn btn-light w-100">Pharmacy</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="tabs-container" style="display: none;">
    </div>

   <script>
        const tabsContainer = document.getElementById('tabs-container');
        const dashboardContainer = document.getElementById('dashboard-container');

        document.getElementById('dashboard-register-patient').addEventListener('click', function() {
            document.getElementById('register-patient').checked = true;
            tabsContainer.style.display = 'block';
            dashboardContainer.style.display = 'none';
        });

        document.getElementById('dashboard-patients-admit-report').addEventListener('click', function() {
            document.getElementById('patients-admit-report').checked = true;
            tabsContainer.style.display = 'block';
            dashboardContainer.style.display = 'none';
        });

        document.getElementById('dashboard-appointments').addEventListener('click', function() {
            document.getElementById('appointments').checked = true;
            tabsContainer.style.display = 'block';
            dashboardContainer.style.display = 'none';
        });

        document.getElementById('dashboard-pharmacy').addEventListener('click', function() {
            document.getElementById('pharmacy').checked = true;
            tabsContainer.style.display = 'block';
            dashboardContainer.style.display = 'none';
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
