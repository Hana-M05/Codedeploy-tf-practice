<?php
  // 1. Get Version from the file (Updated by Jenkins/CodeDeploy)
  $version = file_exists('version.txt') ? trim(file_get_contents('version.txt')) : '1.0';
  
  // 2. Visual logic: Grey for Dev/Initial, Green for Production/Success
  $theme_color = ($version == '1.0') ? '#6c757d' : '#1a2282'; 
  
  // 3. Get Instance Metadata (Proves the EC2 is in a Private Subnet)
  $instance_ip = $_SERVER['SERVER_ADDR'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internal Company Portal | HR Services</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f4f7f6; }
        .header { background-color: <?php echo $theme_color; ?>; color: white; padding: 20px; text-align: center; transition: 0.5s; }
        .container { padding: 40px; max-width: 900px; margin: auto; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .status-badge { display: inline-block; padding: 5px 15px; border-radius: 20px; color: white; background: <?php echo $theme_color; ?>; font-weight: bold; }
        .arch-diagram { font-size: 0.9em; color: #555; line-height: 1.6; }
        .footer { text-align: center; font-size: 0.8em; color: #888; margin-top: 40px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Internal Company Portal</h1>
        <p>Serving 600+ Employees Globally</p>
    </div>

    <div class="container">
        <!-- Section 1: The "Product" (What employees see) -->
        <div class="card">
            <h2>Welcome, Employee</h2>
            <p>Select a service to continue:</p>
            <button disabled>Submit Timesheet</button>
            <button disabled>Request Vacation</button>
            <button disabled>Download Salary Slips</button>
        </div>

        <!-- Section 2: The "DevOps Proof" (What the CTO sees) -->
        <div class="card">
            <h3>System Status & Deployment Info</h3>
            <p>Deployment Version: <span class="status-badge">v<?php echo $version; ?></span></p>
            <hr>
            <div class="arch-diagram">
                <strong>Verified Architecture Path:</strong><br>
                <code>Internet ➔ IGW ➔ ALB (Public) ➔ EC2 (Private App) ➔ RDS (Private DB)</code>
                <br><br>
                <strong>Instance Metadata:</strong><br>
                • Node IP: <code><?php echo $instance_ip; ?></code> (Private Range)<br>
                • Storage: <code>S3 (HR-Docs-Bucket)</code> via IAM Role<br>
                • State: <code>Terraform + DynamoDB Lock</code>
            </div>
        </div>

        <div class="footer">
            Built by Hana Mazen | DevOps Infrastructure Demo | Region: us-west-2
        </div>
    </div>

</body>
</html>