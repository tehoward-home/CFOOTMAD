<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CFOOTMAD - Price List</title>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="../../js/scripts.js"></script>
    <!-- CFOOTMAD JS -->
    <script src="../../js/cfootmad.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    <link rel="icon" type="../image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS -->
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../css/CFOOTMAD.css" rel="stylesheet" />
    <link href="../../css/CFOOTMADForms.css" rel="stylesheet" />
</head>
<body id="page-top">
    <?php
    // Include necessary files    
    require_once '../php/classes/Price.php';

    session_start();

    use CFOOTMAD\Classes\Price;
   

    // Fetch all prices
    //$price = new Price();
    $price = new Price();
    $result = $price->SelectAllPrices();

    if ($result->GetResult()->GetStatus()) {
        $prices = $result->GetData(); // Assuming the data is returned in a 'Data' property
    } else {
        $prices = [];
        echo "<p>Error: " . $result->GetReturnMessage() . "</p>";
    }

    // Check if an edit request is made
    $editPrice = null;
    if (isset($_GET['edit_id'])) {
        foreach ($prices as $p) {
            if ($p['id'] == $_GET['edit_id']) {
                $editPrice = $p;
                break;
            }
        }
    }

    // Generate CSRF token
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    ?>
    <div class="cfm-container">
        <div class="cfm-center">
            <h2 class="display-5">Price List</h2>
            <table class="cfm-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sliding Low</th>
                        <th>Sliding High</th>
                        <th>Non-Member</th>
                        <th>Member</th>
                        <th>Student</th>
                        <th>Free Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($prices)): ?>
                        <?php foreach ($prices as $price): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($price['name']); ?></td>
                                <td><?php echo htmlspecialchars($price['slidingLow']); ?></td>
                                <td><?php echo htmlspecialchars($price['slidingHigh']); ?></td>
                                <td><?php echo htmlspecialchars($price['nonMember']); ?></td>
                                <td><?php echo htmlspecialchars($price['member']); ?></td>
                                <td><?php echo htmlspecialchars($price['student']); ?></td>
                                <td><?php echo htmlspecialchars($price['freeAge']); ?></td>
                                <td>
                                    <a href="?edit_id=<?php echo $price['id']; ?>" class="cfm-button">Edit</a>
                                    <a href="ProcessPrice.php?action=delete&id=<?php echo $price['id']; ?>" class="cfm-button cfm-button-danger" onclick="return confirm('Are you sure you want to delete this price?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No prices found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <div class="p-2">
                <h2 class="display-5"><?php echo $editPrice ? 'Edit Price' : 'Add New Price'; ?></h2>
                <form method="POST" action="ProcessPrice.php" class="inputform">
                    <input type="hidden" name="id" value="<?php echo $editPrice['id'] ?? ''; ?>">
                    <input type="hidden" name="action" value="<?php echo $editPrice ? 'update' : 'add'; ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                    <div class="row">
                        <div class="col-25">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($editPrice['name'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="slidingLow">Sliding Low:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" step="0.01" name="slidingLow" id="slidingLow" value="<?php echo htmlspecialchars($editPrice['slidingLow'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="slidingHigh">Sliding High:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" step="0.01" name="slidingHigh" id="slidingHigh" value="<?php echo htmlspecialchars($editPrice['slidingHigh'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="nonMember">Non-Member Price:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" step="0.01" name="nonMember" id="nonMember" value="<?php echo htmlspecialchars($editPrice['nonMember'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="member">Member Price:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" step="0.01" name="member" id="member" value="<?php echo htmlspecialchars($editPrice['member'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="student">Student Price:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" step="0.01" name="student" id="student" value="<?php echo htmlspecialchars($editPrice['student'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="freeAge">Free Age:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" name="freeAge" id="freeAge" value="<?php echo htmlspecialchars($editPrice['freeAge'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <input type="submit" value="<?php echo $editPrice ? 'Update' : 'Add'; ?>">
                        </div>
                        <div class="col-25">
                            <input type="reset" value="Clear" onclick="window.location.href='admin_prices.html';">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        loadHTML("navbarcontainer", "admin_navigation.html");
    </script>
</body>
</html>