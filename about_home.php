<!DOCTYPE html>
<html lang="en">
<head>
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #12486B;
        }

        .content {
            font-size: 30px;
            text-align: center;
            color: #fff;
            padding: 40px;
        }

        .content h1 {
            font-size: 40px;
        }

        .card {
            display: flex;
            flex-wrap: wrap; /* Allow the boxes to wrap to the next line on smaller screens */
            justify-content: space-between;
            max-width: 800px;
            margin: 0 auto;
        }

        .box {
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
            margin: 0 10px;
            text-align: center;
            margin-bottom: 20px; /* Add some space between boxes */
        }

        .box:hover {
            transform: scale(1.1);
            transition: .3s;
            background-color: #78D6C6;
        }

        .box h3 {
            font-size: 24px;
            margin: 10px 0;
            color: black;
        }

        .box i {
            font-size: 40px;
            color: #12486B;
        }

        .box p {
            font-size: 16px;
            color: black;
        }

        /* Media query for smaller screens */
        @media (max-width: 600px) {
            .card {
                flex-direction: column; /* Stack the boxes vertically on smaller screens */
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h1>About</h1>
    <div class="card">
        <div class="box">
            <i class="fas fa-map-marked-alt"></i>
            <h3>Grave Location</h3>
            <p>Locate specific graves within a cemetery; provide detailed maps with plot numbers.</p>
        </div>
        <div class="box">
            <i class="fas fa-book"></i>
            <h3>Record Keeping</h3>
            <p> Store and manage burial records, including the names of the deceased, dates of birth and death.</p>
        </div>
        <div class="box">
            <i class="fas fa-tasks"></i>
            <h3>Plot Management</h3>
            <p>Enable cemetery administrators to efficiently manage the allocation and use of burial plots.</p>
        </div>
    </div>
</div>

</body>
</html>
